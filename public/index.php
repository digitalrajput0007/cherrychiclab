<?php
declare(strict_types=1);

/**
 * CherryChic Beauty & Fragrance Lab - High-Performance Low-Memory Router
 * Target: 1GB RAM Ubuntu VPS (Nginx + PHP 8.x-FPM + SQLite WAL)
 */

require_once __DIR__ . '/../src/db.php';

// Normalize URI path
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
$path = rtrim($path, '/');
if ($path === '') {
    $path = '/';
}

$pdo = get_db();

// -------------------------------------------------------------
// 1. SITEMAP.XML (Programmatic SEO Feed)
// -------------------------------------------------------------
if ($path === '/sitemap.xml') {
    header('Content-Type: application/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    $baseUrl = 'https://cherrychic.in';
    $now = date('Y-m-d');

    // Static tool hubs
    $staticRoutes = [
        ['loc' => '/', 'changefreq' => 'daily', 'priority' => '1.0'],
        ['loc' => '/dupes', 'changefreq' => 'daily', 'priority' => '0.9'],
        ['loc' => '/perfumes', 'changefreq' => 'daily', 'priority' => '0.9'],
        ['loc' => '/routine-checker', 'changefreq' => 'weekly', 'priority' => '0.8'],
        ['loc' => '/shade-finder', 'changefreq' => 'weekly', 'priority' => '0.8'],
    ];

    foreach ($staticRoutes as $r) {
        echo "  <url>\n";
        echo "    <loc>{$baseUrl}{$r['loc']}</loc>\n";
        echo "    <lastmod>{$now}</lastmod>\n";
        echo "    <changefreq>{$r['changefreq']}</changefreq>\n";
        echo "    <priority>{$r['priority']}</priority>\n";
        echo "  </url>\n";
    }

    // Dynamic Programmatic Dupe & Clone pages
    $stmt = $pdo->query("
        SELECT d.slug, orig.category
        FROM dupes d
        JOIN products orig ON d.original_product_id = orig.id
    ");
    $allDupes = $stmt->fetchAll();

    foreach ($allDupes as $dupe) {
        $prefix = ($dupe['category'] === 'perfume') ? '/perfume-clone/' : '/dupe/';
        $url = $baseUrl . $prefix . urlencode($dupe['slug']);
        echo "  <url>\n";
        echo "    <loc>{$url}</loc>\n";
        echo "    <lastmod>{$now}</lastmod>\n";
        echo "    <changefreq>weekly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        echo "  </url>\n";
    }

    echo '</urlset>';
    exit;
}

// -------------------------------------------------------------
// 2. API ENDPOINTS (For Alpine.js & Client Interactivity)
// -------------------------------------------------------------
if ($path === '/api/request-dupe' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $input = json_decode(file_get_contents('php://input'), true);

    $productName = trim($input['product_name'] ?? '');
    $category = trim($input['category'] ?? 'skincare');

    if (empty($productName)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Product name is required.']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO product_requests (product_name, category, created_at) VALUES (?, ?, ?)");
        $stmt->execute([mb_substr($productName, 0, 255), mb_substr($category, 0, 50), gmdate('Y-m-d H:i:s')]);
        echo json_encode(['success' => true, 'message' => 'Product dupe request submitted successfully.']);
    } catch (\Throwable $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Database error.']);
    }
    exit;
}

if ($path === '/api/check-routine' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $input = json_decode(file_get_contents('php://input'), true);
    $selectedSlugs = (array)($input['ingredient_slugs'] ?? []);

    if (empty($selectedSlugs)) {
        echo json_encode(['clashes' => [], 'fungal_triggers' => [], 'max_comedogenic' => 0]);
        exit;
    }

    // Fetch active rules from DB
    $inClause = implode(',', array_fill(0, count($selectedSlugs), '?'));
    $stmt = $pdo->prepare("SELECT * FROM ingredient_rules WHERE slug IN ($inClause)");
    $stmt->execute($selectedSlugs);
    $rules = $stmt->fetchAll();

    $clashes = [];
    $fungalTriggers = [];
    $maxComedogenic = 0;
    $checkedPairs = [];

    foreach ($rules as $rA) {
        $maxComedogenic = max($maxComedogenic, (int)$rA['comedogenic_score']);
        if ((int)$rA['is_fungal_acne_trigger'] === 1) {
            $fungalTriggers[] = [
                'name' => $rA['name'],
                'explanation' => $rA['clash_explanation']
            ];
        }

        $clashSlugs = json_array_decode($rA['clashes_with_slugs']);
        foreach ($rules as $rB) {
            if ($rA['slug'] === $rB['slug']) continue;
            $pair = [$rA['slug'], $rB['slug']];
            sort($pair);
            $pairKey = implode(':', $pair);

            if (!isset($checkedPairs[$pairKey]) && in_array($rB['slug'], $clashSlugs, true)) {
                $checkedPairs[$pairKey] = true;
                $clashes[] = [
                    'itemA' => $rA['name'],
                    'itemB' => $rB['name'],
                    'explanation' => $rA['clash_explanation'] ?: $rB['clash_explanation']
                ];
            }
        }
    }

    echo json_encode([
        'clashes' => $clashes,
        'fungal_triggers' => $fungalTriggers,
        'max_comedogenic' => $maxComedogenic,
        'is_safe' => empty($clashes) && empty($fungalTriggers)
    ]);
    exit;
}

// -------------------------------------------------------------
// 3. FRONT-CONTROLLER VIEW ROUTING
// -------------------------------------------------------------

// HELPER: Base dupe query
$baseDupeSql = "
    SELECT 
        d.id, d.slug, d.match_score, d.savings_inr, d.comparison_summary, d.texture_or_longevity_notes,
        orig.id as orig_id, orig.name as orig_name, orig.brand as orig_brand, orig.mrp_inr as orig_mrp, orig.size_label as orig_size, orig.swatch_hex as orig_swatch, orig.category as orig_cat, orig.key_actives_or_notes as orig_actives,
        dupe.id as dupe_id, dupe.name as dupe_name, dupe.brand as dupe_brand, dupe.mrp_inr as dupe_mrp, dupe.size_label as dupe_size, dupe.swatch_hex as dupe_swatch, dupe.category as dupe_cat, dupe.key_actives_or_notes as dupe_actives
    FROM dupes d
    JOIN products orig ON d.original_product_id = orig.id
    JOIN products dupe ON d.dupe_product_id = dupe.id
";

// ROUTE: Homepage
if ($path === '/') {
    $currentRoute = '/';
    $pageTitle = 'CherryChic Beauty & Fragrance Lab | Indian Luxury Dupes & Clones';
    $pageDescription = 'Discover scientifically verified Indian skincare dupes, viral makeup alternatives, beast-mode perfume clones, and cross-brand foundation shade matches.';

    // Skincare & Makeup trending dupes
    $stmt = $pdo->query($baseDupeSql . " WHERE orig.category IN ('skincare', 'makeup') ORDER BY d.savings_inr DESC LIMIT 12");
    $rawTrending = $stmt->fetchAll();
    $trendingDupes = [];
    foreach ($rawTrending as $row) {
        $row['sub_category'] = categorize_dupe($row);
        $trendingDupes[] = $row;
    }

    // Perfume clones
    $stmt = $pdo->query($baseDupeSql . " WHERE orig.category = 'perfume' ORDER BY d.savings_inr DESC LIMIT 8");
    $perfumeClones = $stmt->fetchAll();

    // Metrics
    $totalSavings = (int)$pdo->query("SELECT SUM(savings_inr) FROM dupes")->fetchColumn();
    $totalDupesCount = (int)$pdo->query("SELECT COUNT(*) FROM dupes")->fetchColumn();

    require __DIR__ . '/../views/home.php';
    exit;
}

// ROUTE: /dupes (Skincare & Makeup Dupes Directory)
if ($path === '/dupes') {
    $currentRoute = '/dupes';
    $selectedCategory = trim($_GET['cat'] ?? 'all');
    $searchQuery = trim($_GET['q'] ?? '');

    $stmt = $pdo->query($baseDupeSql . " WHERE orig.category IN ('skincare', 'makeup') ORDER BY d.savings_inr DESC");
    $rawDupes = $stmt->fetchAll();
    $dupesList = [];
    foreach ($rawDupes as $row) {
        $row['sub_category'] = categorize_dupe($row);
        $dupesList[] = $row;
    }

    require __DIR__ . '/../views/dupes.php';
    exit;
}

// ROUTE: /perfumes (Indian Perfume Clone Finder)
if ($path === '/perfumes') {
    $currentRoute = '/perfumes';
    $searchQuery = trim($_GET['q'] ?? '');

    $stmt = $pdo->query($baseDupeSql . " WHERE orig.category = 'perfume' ORDER BY d.savings_inr DESC");
    $perfumesList = $stmt->fetchAll();

    require __DIR__ . '/../views/perfumes.php';
    exit;
}

// ROUTE: /routine-checker (Skincare Active Clash & Fungal Acne Checker)
if ($path === '/routine-checker') {
    $currentRoute = '/routine-checker';
    $stmt = $pdo->query("SELECT * FROM ingredient_rules ORDER BY name ASC");
    $ingredientRules = $stmt->fetchAll();

    require __DIR__ . '/../views/routine-checker.php';
    exit;
}

// ROUTE: /shade-finder (Cross-Brand Indian Foundation & Lipstick Shade Matcher)
if ($path === '/shade-finder') {
    $currentRoute = '/shade-finder';
    $stmt = $pdo->query("
        SELECT 
            sm.id, sm.shade_family, sm.skin_depth, sm.match_notes,
            src.id as src_id, src.name as src_name, src.brand as src_brand, src.mrp_inr as src_mrp, src.swatch_hex as src_swatch, src.undertone as src_undertone, src.size_label as src_size,
            tgt.id as tgt_id, tgt.name as tgt_name, tgt.brand as tgt_brand, tgt.mrp_inr as tgt_mrp, tgt.swatch_hex as tgt_swatch, tgt.undertone as tgt_undertone, tgt.size_label as tgt_size
        FROM shade_matches sm
        JOIN products src ON sm.source_product_id = src.id
        JOIN products tgt ON sm.target_product_id = tgt.id
        ORDER BY sm.skin_depth ASC
    ");
    $shadeMatches = $stmt->fetchAll();

    require __DIR__ . '/../views/shade-finder.php';
    exit;
}

// ROUTE: /dupe/{slug} & /perfume-clone/{slug} (Single Dupe Comparison)
if (preg_match('#^/(dupe|perfume-clone)/([a-zA-Z0-9_\-]+)$#', $path, $matches)) {
    $routeType = $matches[1];
    $slug = $matches[2];

    $stmt = $pdo->prepare($baseDupeSql . " WHERE d.slug = ? LIMIT 1");
    $stmt->execute([$slug]);
    $dupe = $stmt->fetch();

    if (!$dupe) {
        http_response_code(404);
        $pageTitle = 'Dupe Not Found | CherryChic Lab';
        require __DIR__ . '/../views/header.php';
        echo '<div class="max-w-2xl mx-auto py-20 px-4 text-center">';
        echo '<h1 class="text-4xl font-bold font-serif text-stone-900">404 - Dupe Comparison Not Found</h1>';
        echo '<p class="text-sm text-stone-600 mt-3">We haven\'t published a breakdown for this specific slug yet.</p>';
        echo '<a href="/dupes" class="inline-block mt-6 px-5 py-2.5 rounded-xl bg-cherry-700 text-white font-bold text-xs">Browse All Dupes →</a>';
        echo '</div>';
        require __DIR__ . '/../views/footer.php';
        exit;
    }

    // Related dupes in the same category
    $relStmt = $pdo->prepare($baseDupeSql . " WHERE d.id != ? AND orig.category = ? ORDER BY d.match_score DESC LIMIT 3");
    $relStmt->execute([$dupe['id'], $dupe['orig_cat']]);
    $relatedDupes = $relStmt->fetchAll();

    require __DIR__ . '/../views/single-dupe.php';
    exit;
}

// -------------------------------------------------------------
// 4. 404 NOT FOUND HANDLER
// -------------------------------------------------------------
http_response_code(404);
$pageTitle = 'Page Not Found (404) | CherryChic Lab';
$currentRoute = $path;
require __DIR__ . '/../views/header.php';
?>
<div class="max-w-3xl mx-auto py-24 px-4 text-center">
    <div class="w-16 h-16 rounded-2xl bg-cherry-100 text-cherry-700 flex items-center justify-center text-3xl mx-auto mb-4 font-bold">
        🍒
    </div>
    <h1 class="font-serif text-4xl font-extrabold text-stone-900 tracking-tight">404 - Page Not Found</h1>
    <p class="text-stone-600 text-sm mt-3 max-w-md mx-auto leading-relaxed">
        The formulation, dupe page, or lab tool you are looking for has been moved or does not exist.
    </p>
    <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
        <a href="/" class="px-5 py-2.5 rounded-xl text-xs font-bold bg-cherry-700 hover:bg-cherry-800 text-white shadow-sm transition-all">
            Return to Lab Home
        </a>
        <a href="/dupes" class="px-5 py-2.5 rounded-xl text-xs font-bold bg-stone-100 hover:bg-stone-200 text-stone-700 transition-all">
            Browse All Dupes
        </a>
    </div>
</div>
<?php
require __DIR__ . '/../views/footer.php';

