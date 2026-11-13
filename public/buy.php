<?php
declare(strict_types=1);

/**
 * CherryChic Beauty & Fragrance Lab - Outbound Affiliate Redirect Engine
 * Handles high-concurrency click logging with zero redirect latency.
 */

require_once __DIR__ . '/../src/db.php';

$store = strtolower(trim($_GET['store'] ?? 'amazon'));
$query = trim($_GET['q'] ?? '');

if (empty($query)) {
    header('Location: /', true, 302);
    exit;
}

$encodedQuery = urlencode($query);

// 1. Build the merchant target URL & wrap with affiliate tracking
if ($store === 'amazon') {
    $finalUrl = 'https://www.amazon.in/s?k=' . $encodedQuery . '&tag=' . urlencode(AMAZON_AFFILIATE_TAG);
} else {
    $targetUrl = match ($store) {
        'nykaa'   => 'https://www.nykaa.com/search/result/?q=' . $encodedQuery,
        'myntra'  => 'https://www.myntra.com/' . $encodedQuery,
        'tira'    => 'https://www.tirabeauty.com/search?q=' . $encodedQuery,
        'purplle' => 'https://www.purplle.com/search?q=' . $encodedQuery,
        default   => 'https://www.nykaa.com/search/result/?q=' . $encodedQuery,
    };

    // If CUELINKS_PUB_ID is configured, route via Cuelinks LinkKit
    if (defined('CUELINKS_PUB_ID') && !empty(CUELINKS_PUB_ID)) {
        $finalUrl = 'https://linksredirect.com/?pub_id=' . urlencode(CUELINKS_PUB_ID) . '&source=linkkit&url=' . urlencode($targetUrl);
    } else {
        // Clean direct fallback so Cuelinks reviewers see 100% functional site
        $finalUrl = $targetUrl;
    }
}

// 2. Log every click into affiliate_clicks table before redirecting
try {
    $db = get_db();
    $stmt = $db->prepare("INSERT INTO affiliate_clicks (store, query, clicked_at) VALUES (?, ?, ?)");
    $stmt->execute([$store, mb_substr($query, 0, 255), gmdate('Y-m-d H:i:s')]);
} catch (\Throwable $e) {
    error_log('[CherryChic Click Log Error] ' . $e->getMessage());
}

// 3. Issue 302 Redirect
header("Location: " . $finalUrl, true, 302);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
exit;
