<?php
declare(strict_types=1);

/**
 * CherryChic Beauty & Fragrance Lab - Database & Core Helpers
 * Optimized for low-memory PHP 8.x + SQLite WAL on 1GB VPS.
 */

define('CHERRYCHIC_ROOT', dirname(__DIR__));
define('CHERRYCHIC_DB_PATH', CHERRYCHIC_ROOT . '/data/cherrychic.sqlite');

// Load central configuration
require_once __DIR__ . '/config.php';

/**
 * Returns a shared PDO instance configured for high concurrency and ultra-low memory.
 */
function get_db(): PDO {
    static $pdo = null;

    if ($pdo === null) {
        $dbFile = CHERRYCHIC_DB_PATH;
        $dbDir = dirname($dbFile);

        if (!is_dir($dbDir)) {
            mkdir($dbDir, 0755, true);
        }

        $dsn = 'sqlite:' . $dbFile;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, null, null, $options);

            // Execute critical SQLite pragmas for high concurrent read performance & zero write lock contention
            $pdo->exec('PRAGMA journal_mode = WAL;');
            $pdo->exec('PRAGMA synchronous = NORMAL;');
            $pdo->exec('PRAGMA busy_timeout = 5000;');
            $pdo->exec('PRAGMA foreign_keys = ON;');
            $pdo->exec('PRAGMA cache_size = -16000;'); // 16MB cache (safe for 1GB VPS)
            $pdo->exec('PRAGMA temp_store = MEMORY;');
        } catch (PDOException $e) {
            error_log('[CherryChic DB Error] ' . $e->getMessage());
            throw $e;
        }
    }

    return $pdo;
}

/**
 * Format Indian currency with rupee symbol and comma formatting.
 */
function format_inr(int|float|string|null $amount): string {
    $val = (float)($amount ?? 0);
    return '₹' . number_format($val, 0, '.', ',');
}

/**
 * Safely parse JSON array or return empty array.
 */
function json_array_decode(?string $raw): array {
    if (empty($raw)) {
        return [];
    }
    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : [];
}

/**
 * Render sleek CSS glossy color swatch pill using Hex code.
 * Eliminates external product images, zero bandwidth cost, no copyright issues.
 */
function render_swatch_pill(?string $hex, string $label = '', string $size = 'md'): string {
    $fallbackHex = '#E2E8F0';
    $color = (!empty($hex) && preg_match('/^#[a-f0-9]{3,6}$/i', $hex)) ? $hex : $fallbackHex;

    $dimensions = match ($size) {
        'sm' => 'w-5 h-5',
        'lg' => 'w-10 h-10',
        'xl' => 'w-14 h-14',
        default => 'w-7 h-7'
    };

    $html = '<div class="inline-flex items-center gap-2 group" title="' . htmlspecialchars($label . ' (' . $color . ')') . '">';
    $html .= '<span class="relative inline-block ' . $dimensions . ' rounded-full shadow-inner ring-2 ring-white/80 dark:ring-stone-800 transition-transform group-hover:scale-110 overflow-hidden" style="background-color: ' . htmlspecialchars($color) . ';">';
    // Glossy reflection highlight overlay
    $html .= '<span class="absolute inset-0 bg-gradient-to-b from-white/40 via-transparent to-black/20 pointer-events-none rounded-full"></span>';
    $html .= '</span>';
    if (!empty($label)) {
        $html .= '<span class="text-xs font-medium text-stone-700 dark:text-stone-300">' . htmlspecialchars($label) . '</span>';
    }
    $html .= '</div>';

    return $html;
}

/**
 * Build dynamic affiliate buy link routing via /buy.php
 */
function affiliate_buy_url(string $store, string $productQuery): string {
    return '/buy.php?store=' . urlencode(strtolower($store)) . '&q=' . urlencode($productQuery);
}

/**
 * Determine high-level filter category for skincare & makeup dupes.
 * Returns: 'makeup' | 'serum-active' | 'sunscreen-moisturizer'
 */
function categorize_dupe(array $item): string {
    $text = strtolower(($item['orig_name'] ?? '') . ' ' . ($item['orig_cat'] ?? '') . ' ' . ($item['dupe_name'] ?? ''));
    if (($item['orig_cat'] ?? '') === 'makeup' || 
        str_contains($text, 'lipstick') || str_contains($text, 'lip') || str_contains($text, 'blush') || 
        str_contains($text, 'tint') || str_contains($text, 'mascara') || str_contains($text, 'filter') || 
        str_contains($text, 'powder') || str_contains($text, 'primer') || str_contains($text, 'bronzer') || 
        str_contains($text, 'concealer') || str_contains($text, 'palette') || str_contains($text, 'liner') || 
        str_contains($text, 'eyeliner') || str_contains($text, 'brow')) {
        return 'makeup';
    }
    if (str_contains($text, 'sunscreen') || str_contains($text, 'spf') || str_contains($text, 'cream') || 
        str_contains($text, 'hydrator') || str_contains($text, 'gel') || str_contains($text, 'moisturi') || 
        str_contains($text, 'butter') || str_contains($text, 'lotion')) {
        return 'sunscreen-moisturizer';
    }
    return 'serum-active';
}
