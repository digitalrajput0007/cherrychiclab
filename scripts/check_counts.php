<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/db.php';

$pdo = get_db();

echo "📊 [CherryChic Lab] Comprehensive Catalog & Duplicate Slug Audit\n\n";

// 1. Check for Duplicate Slugs in products
$stmt1 = $pdo->query("SELECT slug, COUNT(*) as c FROM products GROUP BY slug HAVING c > 1");
$dupProducts = $stmt1->fetchAll();
echo "1. Duplicate Product Slugs: " . count($dupProducts) . "\n";
if (!empty($dupProducts)) {
    foreach ($dupProducts as $dp) {
        echo "   ❌ Duplicate product slug: {$dp['slug']} ({$dp['c']} times)\n";
    }
} else {
    echo "   ✅ ZERO duplicate product slugs found.\n";
}

// 2. Check for Duplicate Slugs in dupes
$stmt2 = $pdo->query("SELECT slug, COUNT(*) as c FROM dupes GROUP BY slug HAVING c > 1");
$dupDupes = $stmt2->fetchAll();
echo "2. Duplicate Dupe Slugs: " . count($dupDupes) . "\n";
if (!empty($dupDupes)) {
    foreach ($dupDupes as $dd) {
        echo "   ❌ Duplicate dupe slug: {$dd['slug']} ({$dd['c']} times)\n";
    }
} else {
    echo "   ✅ ZERO duplicate dupe slugs found.\n";
}

// 3. Output Total Counts
echo "\n3. Database Entity Counts (/data/cherrychic.sqlite):\n";
$tables = ['products', 'dupes', 'ingredient_rules', 'shade_matches', 'affiliate_clicks', 'product_requests'];
foreach ($tables as $t) {
    $count = (int)$pdo->query("SELECT COUNT(*) FROM $t")->fetchColumn();
    echo "   - Table '$t': $count rows\n";
}

// 4. Category breakdown
echo "\n4. Products by Category:\n";
$catStmt = $pdo->query("SELECT category, COUNT(*) as c FROM products GROUP BY category ORDER BY c DESC");
while ($row = $catStmt->fetch()) {
    echo "   - " . ucfirst($row['category']) . ": " . $row['c'] . " products\n";
}

