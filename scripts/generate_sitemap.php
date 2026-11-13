<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Programmatic XML Sitemap Generator
 * Saves to /public/sitemap.xml for lightning-fast zero-overhead delivery
 */

require_once __DIR__ . '/../src/db.php';

$pdo = get_db();
$sitemapPath = CHERRYCHIC_ROOT . '/public/sitemap.xml';

$baseUrl = 'https://cherrychic.in';
$now = date('Y-m-d');

$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Static tool hubs
$staticRoutes = [
    ['loc' => '/', 'changefreq' => 'daily', 'priority' => '1.0'],
    ['loc' => '/dupes', 'changefreq' => 'daily', 'priority' => '0.9'],
    ['loc' => '/perfumes', 'changefreq' => 'daily', 'priority' => '0.9'],
    ['loc' => '/routine-checker', 'changefreq' => 'weekly', 'priority' => '0.8'],
    ['loc' => '/shade-finder', 'changefreq' => 'weekly', 'priority' => '0.8'],
];

foreach ($staticRoutes as $r) {
    $xml .= "  <url>\n";
    $xml .= "    <loc>{$baseUrl}{$r['loc']}</loc>\n";
    $xml .= "    <lastmod>{$now}</lastmod>\n";
    $xml .= "    <changefreq>{$r['changefreq']}</changefreq>\n";
    $xml .= "    <priority>{$r['priority']}</priority>\n";
    $xml .= "  </url>\n";
}

// Dynamic Programmatic Dupe & Clone pages from SQLite
$stmt = $pdo->query("
    SELECT d.slug, orig.category
    FROM dupes d
    JOIN products orig ON d.original_product_id = orig.id
    ORDER BY d.id ASC
");
$allDupes = $stmt->fetchAll();

foreach ($allDupes as $dupe) {
    $prefix = ($dupe['category'] === 'perfume') ? '/perfume-clone/' : '/dupe/';
    $url = $baseUrl . $prefix . urlencode($dupe['slug']);
    $xml .= "  <url>\n";
    $xml .= "    <loc>{$url}</loc>\n";
    $xml .= "    <lastmod>{$now}</lastmod>\n";
    $xml .= "    <changefreq>weekly</changefreq>\n";
    $xml .= "    <priority>0.8</priority>\n";
    $xml .= "  </url>\n";
}

$xml .= '</urlset>';

file_put_contents($sitemapPath, $xml);
echo "✅ Generated /public/sitemap.xml (" . count($allDupes) . " dynamic SEO dupe/clone URLs, " . strlen($xml) . " bytes)\n";

