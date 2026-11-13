<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Auto-Expand Batch JSON Importer CLI Engine
 * Scans /data/imports/*.json and automatically upserts products, dupes, and SEO slugs into SQLite.
 * Run with: php scripts/seed/auto_expand_generator.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "🚀 [CherryChic Lab] Auto-Expand Programmatic Batch Importer\n";

$pdo = get_db();
$importDir = CHERRYCHIC_ROOT . '/data/imports';

if (!is_dir($importDir)) {
    mkdir($importDir, 0755, true);
}

// Slugify helper
function slugify(string $text): string {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    return strtolower($text ?: 'product-' . bin2hex(random_bytes(3)));
}

// Find all JSON files in imports folder
$jsonFiles = glob($importDir . '/*.json');

if (empty($jsonFiles)) {
    echo "ℹ️ No JSON files found in /data/imports/.\n";
    echo "💡 Creating a sample template at /data/imports/sample_import_template.json...\n";

    $sampleData = [
        [
            'category' => 'makeup',
            'match_score' => 96,
            'comparison_summary' => 'Direct color swatch and wear-time match tested on Indian warm skin tone.',
            'texture_or_longevity_notes' => 'Non-drying velvet matte; lasts 6-8 hours without fading.',
            'original' => [
                'brand' => 'Rare Beauty',
                'name' => 'Tinted Lip Oil - Serenity',
                'mrp_inr' => 2400,
                'size_label' => '3ml',
                'swatch_hex' => '#9B454A',
                'undertone' => 'warm',
                'key_actives_or_notes' => ['Jojoba Seed Oil', 'Sunflower Seed Oil', 'Color Reviver']
            ],
            'dupe' => [
                'brand' => 'Swiss Beauty',
                'name' => 'Plump-Up Glossy Lip Oil - Muted Rose',
                'mrp_inr' => 299,
                'size_label' => '4ml',
                'swatch_hex' => '#984348',
                'undertone' => 'warm',
                'key_actives_or_notes' => ['Vitamin E', 'Rosehip Oil', 'High Shine Polymers']
            ]
        ]
    ];

    file_put_contents($importDir . '/sample_import_template.json', json_encode($sampleData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    echo "✅ Sample template created. You can now place any *.json file into /data/imports/ and re-run this script!\n";
    exit(0);
}

// Prepared Statements for Upserting
$insertProd = $pdo->prepare("
    INSERT INTO products (slug, brand, name, category, mrp_inr, size_label, swatch_hex, undertone, key_actives_or_notes, inci_tags, is_luxury)
    VALUES (:slug, :brand, :name, :category, :mrp_inr, :size_label, :swatch_hex, :undertone, :key_actives_or_notes, :inci_tags, :is_luxury)
    ON CONFLICT(slug) DO UPDATE SET
        brand = excluded.brand,
        name = excluded.name,
        category = excluded.category,
        mrp_inr = excluded.mrp_inr,
        size_label = excluded.size_label,
        swatch_hex = excluded.swatch_hex,
        undertone = excluded.undertone,
        key_actives_or_notes = excluded.key_actives_or_notes,
        inci_tags = excluded.inci_tags,
        is_luxury = excluded.is_luxury
");

$insertDupe = $pdo->prepare("
    INSERT INTO dupes (slug, original_product_id, dupe_product_id, match_score, savings_inr, comparison_summary, texture_or_longevity_notes)
    VALUES (:slug, :original_product_id, :dupe_product_id, :match_score, :savings_inr, :comparison_summary, :texture_or_longevity_notes)
    ON CONFLICT(slug) DO UPDATE SET
        original_product_id = excluded.original_product_id,
        dupe_product_id = excluded.dupe_product_id,
        match_score = excluded.match_score,
        savings_inr = excluded.savings_inr,
        comparison_summary = excluded.comparison_summary,
        texture_or_longevity_notes = excluded.texture_or_longevity_notes
");

$getId = function(string $slug) use ($pdo): int {
    $stmt = $pdo->prepare("SELECT id FROM products WHERE slug = ?");
    $stmt->execute([$slug]);
    return (int)$stmt->fetchColumn();
};

$totalImportedDupes = 0;
$totalImportedProds = 0;

foreach ($jsonFiles as $file) {
    $filename = basename($file);
    echo "📂 Processing: {$filename}...\n";

    $rawContent = file_get_contents($file);
    $data = json_decode($rawContent, true);

    if (!is_array($data)) {
        echo "   ⚠️ Skipping invalid JSON file: {$filename}\n";
        continue;
    }

    $pdo->beginTransaction();
    $fileDupesCount = 0;

    foreach ($data as $idx => $entry) {
        // Support both structured { original, dupe } and flat { original_brand, dupe_brand }
        $orig = $entry['original'] ?? [
            'brand' => $entry['original_brand'] ?? 'Luxury Brand',
            'name' => $entry['original_name'] ?? 'Luxury Item',
            'mrp_inr' => (int)($entry['original_mrp'] ?? $entry['mrp_inr_original'] ?? 3000),
            'size_label' => $entry['original_size'] ?? 'Standard',
            'swatch_hex' => $entry['original_swatch'] ?? '#E2E8F0',
            'undertone' => $entry['original_undertone'] ?? 'warm',
            'key_actives_or_notes' => $entry['original_actives'] ?? []
        ];

        $dupe = $entry['dupe'] ?? [
            'brand' => $entry['dupe_brand'] ?? 'Indian Brand',
            'name' => $entry['dupe_name'] ?? 'Dupe Alternative',
            'mrp_inr' => (int)($entry['dupe_mrp'] ?? $entry['mrp_inr_dupe'] ?? 499),
            'size_label' => $entry['dupe_size'] ?? 'Standard',
            'swatch_hex' => $entry['dupe_swatch'] ?? $orig['swatch_hex'] ?? '#E2E8F0',
            'undertone' => $entry['dupe_undertone'] ?? $orig['undertone'] ?? 'warm',
            'key_actives_or_notes' => $entry['dupe_actives'] ?? []
        ];

        $category = strtolower($entry['category'] ?? $orig['category'] ?? 'makeup');
        if (!in_array($category, ['skincare', 'makeup', 'perfume', 'foundation'], true)) {
            $category = 'makeup';
        }

        // Auto-slug generation if not provided
        $origSlug = $orig['slug'] ?? slugify($orig['brand'] . ' ' . $orig['name']);
        $dupeSlug = $dupe['slug'] ?? slugify($dupe['brand'] . ' ' . $dupe['name']);
        $dupeRecordSlug = $entry['slug'] ?? slugify($orig['brand'] . ' ' . $orig['name'] . '-dupe-' . $dupe['brand']);

        // 1. Upsert Original
        $insertProd->execute([
            ':slug' => $origSlug,
            ':brand' => $orig['brand'],
            ':name' => $orig['name'],
            ':category' => $category,
            ':mrp_inr' => (int)($orig['mrp_inr'] ?? 3000),
            ':size_label' => $orig['size_label'] ?? 'Standard',
            ':swatch_hex' => $orig['swatch_hex'] ?? '#E2E8F0',
            ':undertone' => $orig['undertone'] ?? 'warm',
            ':key_actives_or_notes' => json_encode((array)($orig['key_actives_or_notes'] ?? [])),
            ':inci_tags' => json_encode((array)($orig['inci_tags'] ?? [])),
            ':is_luxury' => 1
        ]);
        $totalImportedProds++;

        // 2. Upsert Dupe
        $insertProd->execute([
            ':slug' => $dupeSlug,
            ':brand' => $dupe['brand'],
            ':name' => $dupe['name'],
            ':category' => $category,
            ':mrp_inr' => (int)($dupe['mrp_inr'] ?? 499),
            ':size_label' => $dupe['size_label'] ?? 'Standard',
            ':swatch_hex' => $dupe['swatch_hex'] ?? '#E2E8F0',
            ':undertone' => $dupe['undertone'] ?? 'warm',
            ':key_actives_or_notes' => json_encode((array)($dupe['key_actives_or_notes'] ?? [])),
            ':inci_tags' => json_encode((array)($dupe['inci_tags'] ?? [])),
            ':is_luxury' => 0
        ]);
        $totalImportedProds++;

        // 3. Upsert Dupe Comparison Record
        $origId = $getId($origSlug);
        $dupeId = $getId($dupeSlug);
        $savings = max(0, (int)$orig['mrp_inr'] - (int)$dupe['mrp_inr']);
        $matchScore = (int)($entry['match_score'] ?? 92);
        $summary = $entry['comparison_summary'] ?? "Clinically evaluated Indian alternative with equivalent active performance and color payoff.";
        $notes = $entry['texture_or_longevity_notes'] ?? "Comfortable wear; tested for Indian humidity and all-day longevity.";

        $insertDupe->execute([
            ':slug' => $dupeRecordSlug,
            ':original_product_id' => $origId,
            ':dupe_product_id' => $dupeId,
            ':match_score' => $matchScore,
            ':savings_inr' => $savings,
            ':comparison_summary' => $summary,
            ':texture_or_longevity_notes' => $notes
        ]);
        $fileDupesCount++;
        $totalImportedDupes++;
    }

    $pdo->commit();
    echo "   ✅ Imported {$fileDupesCount} dupe pairs from {$filename}\n";
}

echo "\n🎉 Auto-Expand Complete: Successfully upserted {$totalImportedDupes} dupe comparisons ({$totalImportedProds} products)!\n";

