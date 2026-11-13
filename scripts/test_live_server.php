<?php
declare(strict_types=1);

/**
 * CherryChic Lab - HTTP Live Server Route Validator
 * Hits http://localhost:8000/ across all core pages, SEO endpoints, and APIs
 */

$baseUrl = 'http://localhost:8000';

$testUrls = [
    '/' => ['CherryChic', 'Stop Overpaying for Luxury', 'Find Verified Indian Dupes'],
    '/dupes' => ['Skincare & Makeup Dupe Directory', 'Lipsticks & Makeup', 'Serums & Actives', 'View on Nykaa', 'Check Lowest Price on Amazon'],
    '/perfumes' => ['Indian Perfume Clone Finder', 'Vanilla', 'Oud', 'Beast-Mode Clone', 'Amazon'],
    '/routine-checker' => ['Skincare Conflict & Fungal Acne Analyzer', 'Molecular Compatibility'],
    '/shade-finder' => ['Cross-Brand Indian Shade Matcher', 'MAC Studio Fix NC35', 'Wheatish', 'Maybelline'],
    '/dupe/estee-lauder-advanced-night-repair-dupe' => ['Estée Lauder', 'Minimalist', 'FAQPage', 'Frequently Asked Questions'],
    '/dupe/clinique-black-honey-dupe-elf-ecstatic' => ['Clinique', 'Black Honey', 'e.l.f.', 'FAQPage'],
    '/dupe/charlotte-tilbury-pillow-talk-dupe-nykaa-chai' => ['Pillow Talk', 'Nykaa', 'Chai', 'FAQPage'],
    '/perfume-clone/baccarat-rouge-540-clone-club-de-nuit-untold' => ['Baccarat Rouge 540', 'Club De Nuit Untold', 'FAQPage'],
    '/perfume-clone/dior-sauvage-clone-ajmal-kuro' => ['Sauvage', 'Ajmal Kuro', 'FAQPage'],
    '/sitemap.xml' => ['<urlset', '<loc>https://cherrychic.in/dupe/', '<loc>https://cherrychic.in/perfume-clone/']
];

echo "🌐 Testing Live HTTP Routes on $baseUrl ...\n\n";

$allPassed = true;

foreach ($testUrls as $route => $expectedKeywords) {
    $url = $baseUrl . $route;
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 5,
            'ignore_errors' => true
        ]
    ]);

    $response = @file_get_contents($url, false, $ctx);
    $statusLine = $http_response_header[0] ?? 'HTTP/1.1 000 No Response';
    preg_match('#HTTP/\S+\s+(\d+)#', $statusLine, $m);
    $code = isset($m[1]) ? (int)$m[1] : 0;

    if ($code !== 200 || $response === false) {
        echo "❌ FAILED: $route -> Status $code\n";
        $allPassed = false;
        continue;
    }

    $missing = [];
    foreach ($expectedKeywords as $kw) {
        if (stripos($response, $kw) === false) {
            $missing[] = $kw;
        }
    }

    if (!empty($missing)) {
        echo "⚠️ WARNING: $route missing keywords: " . implode(', ', $missing) . "\n";
        $allPassed = false;
    } else {
        echo "✅ OK (200): $route (" . number_format(strlen($response)) . " bytes)\n";
    }
}

// Test /buy.php HTTP redirect
echo "\n🛒 Testing /buy.php Affiliate Redirector...\n";
$buyUrl = $baseUrl . '/buy.php?store=nykaa&q=' . urlencode('Minimalist Multi Peptides');
$buyCtx = stream_context_create([
    'http' => [
        'timeout' => 5,
        'follow_location' => 0,
        'ignore_errors' => true
    ]
]);
$res = @file_get_contents($buyUrl, false, $buyCtx);
$buyStatus = $http_response_header[0] ?? '';
$location = '';
foreach ($http_response_header ?? [] as $hdr) {
    if (stripos($hdr, 'Location:') === 0) {
        $location = trim(substr($hdr, 9));
    }
}
echo "   - Buy redirect header: $buyStatus\n";
echo "   - Target location: $location\n";

if (str_contains($buyStatus, '302') && str_contains($location, 'nykaa.com')) {
    echo "   ✅ /buy.php Nykaa Redirect Verified!\n";
} else {
    echo "   ❌ /buy.php failed redirect check.\n";
    $allPassed = false;
}

// Test /api/request-dupe (AJAX endpoint)
echo "\n💡 Testing /api/request-dupe AJAX API...\n";
$apiUrl = $baseUrl . '/api/request-dupe';
$apiCtx = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode(['product_name' => 'Rhode Glazing Milk', 'category' => 'skincare']),
        'timeout' => 5,
        'ignore_errors' => true
    ]
]);
$apiRes = @file_get_contents($apiUrl, false, $apiCtx);
$apiData = json_decode((string)$apiRes, true);

if (!empty($apiData['success'])) {
    echo "   ✅ /api/request-dupe returned success: " . json_encode($apiData) . "\n";
} else {
    echo "   ❌ /api/request-dupe failed: $apiRes\n";
    $allPassed = false;
}

if ($allPassed) {
    echo "\n🎉 ALL LIVE HTTP ENDPOINTS TESTED AND VERIFIED CLEANLY!\n";
} else {
    echo "\n❌ Some live endpoint checks encountered errors.\n";
    exit(1);
}

