<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Comprehensive Architecture & Routing Verification Suite
 */

echo "🧪 [CherryChic Lab] Starting End-to-End Architectural Verification...\n\n";

// 1. Verify DB Connection & WAL Mode
require_once __DIR__ . '/../src/db.php';
$pdo = get_db();

$journalMode = $pdo->query("PRAGMA journal_mode")->fetchColumn();
$synchronous = $pdo->query("PRAGMA synchronous")->fetchColumn();
echo "1. SQLite Pragmas:\n";
echo "   - journal_mode: $journalMode (Expected: wal)\n";
echo "   - synchronous: $synchronous (Expected: 1 / NORMAL)\n";

if (strtolower((string)$journalMode) !== 'wal') {
    throw new RuntimeException("WAL mode not active!");
}
echo "   ✅ WAL Mode Verified.\n\n";

// 2. Verify Table Row Counts
echo "2. Database Catalog Counts:\n";
$tables = ['products', 'dupes', 'ingredient_rules', 'shade_matches', 'affiliate_clicks', 'product_requests'];
foreach ($tables as $t) {
    $count = (int)$pdo->query("SELECT COUNT(*) FROM $t")->fetchColumn();
    echo "   - Table '$t': $count rows\n";
    if ($count === 0 && !in_array($t, ['affiliate_clicks', 'product_requests'])) {
        throw new RuntimeException("Table $t has 0 rows!");
    }
}
echo "   ✅ Seed Data Verified.\n\n";

// 3. Test Front-Controller Routes
echo "3. Testing Front-Controller Routes:\n";
$routesToTest = [
    '/' => ['CherryChic', 'Stop Overpaying for Luxury'],
    '/dupes' => ['Skincare & Makeup Dupe Directory', 'Minimalist'],
    '/perfumes' => ['Indian Perfume Clone Finder', 'Armaf'],
    '/routine-checker' => ['Skincare Active Clash', 'Retinol'],
    '/shade-finder' => ['Cross-Brand Indian Shade Matcher', 'NC35'],
    '/dupe/estee-lauder-advanced-night-repair-dupe' => ['Estée Lauder', 'Minimalist', 'application/ld+json'],
    '/perfume-clone/baccarat-rouge-540-clone-club-de-nuit-untold' => ['Baccarat Rouge', 'Club De Nuit Untold'],
    '/sitemap.xml' => ['<urlset', '<loc>https://cherrychic.in/dupe/']
];

$testRouteScript = realpath(__DIR__ . '/test_route.php');

foreach ($routesToTest as $r => $expectedKeywords) {
    $cmd = 'php ' . escapeshellarg($testRouteScript) . ' ' . escapeshellarg($r);
    $output = shell_exec($cmd);

    if ($output === null || empty($output)) {
        echo "   ❌ Route $r returned empty output!\n";
        exit(1);
    }

    $allFound = true;
    foreach ($expectedKeywords as $kw) {
        if (stripos($output, $kw) === false) {
            echo "   ❌ Route $r missing expected keyword: '$kw'\n";
            $allFound = false;
        }
    }
    if ($allFound) {
        echo "   ✅ Route '$r' rendered successfully (" . strlen($output) . " bytes)\n";
    } else {
        exit(1);
    }
}

// 4. Test Buy Redirector
echo "\n4. Testing /public/buy.php (Affiliate Engine):\n";
$initialClickCount = (int)$pdo->query("SELECT COUNT(*) FROM affiliate_clicks")->fetchColumn();

// Execute a test redirect request
$testBuyScript = __DIR__ . '/test_buy.php';
file_put_contents($testBuyScript, '<?php
$_GET["store"] = "nykaa";
$_GET["q"] = "Minimalist Multi Peptides 10";
require __DIR__ . "/../public/buy.php";
');

shell_exec('php ' . escapeshellarg($testBuyScript));
@unlink($testBuyScript);

$newClickCount = (int)$pdo->query("SELECT COUNT(*) FROM affiliate_clicks")->fetchColumn();
echo "   - Clicks before: $initialClickCount, Clicks after: $newClickCount\n";
if ($newClickCount > $initialClickCount) {
    $lastClick = $pdo->query("SELECT * FROM affiliate_clicks ORDER BY id DESC LIMIT 1")->fetch();
    echo "   - Click logged: store={$lastClick['store']}, query={$lastClick['query']}, date={$lastClick['clicked_at']}\n";
    echo "   ✅ Affiliate Click Tracking Verified.\n";
} else {
    echo "   ❌ Affiliate click not logged!\n";
    exit(1);
}

echo "\n🎉 ALL ARCHITECTURAL AND VERIFICATION CHECKS PASSED!\n";
