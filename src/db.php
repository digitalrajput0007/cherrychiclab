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
 * Render sleek 3D cosmetic swatch droplet using Hex code.
 * Eliminates external product images, zero bandwidth cost, no copyright issues.
 */
function render_swatch_pill(?string $hex, string $label = '', string $size = 'md'): string {
    $fallbackHex = '#E8E3DC';
    $color = (!empty($hex) && preg_match('/^#[a-f0-9]{3,6}$/i', $hex)) ? $hex : $fallbackHex;

    $dimensions = match ($size) {
        'sm' => 'w-5 h-5 rounded-full',
        'lg' => 'w-9 h-9 rounded-2xl',
        'xl' => 'w-11 h-11 rounded-2xl',
        default => 'w-7 h-7 rounded-full'
    };

    $html = '<div class="inline-flex items-center gap-2 group" title="' . htmlspecialchars($label . ' (' . $color . ')') . '">';
    $html .= '<span class="relative inline-block ' . $dimensions . ' transition-all group-hover:scale-105 shrink-0 overflow-hidden ring-1 ring-[#E8E3DC]" style="background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.45), transparent 50%), ' . htmlspecialchars($color) . '; box-shadow: inset 0 -3px 6px rgba(0,0,0,0.25), 0 4px 10px rgba(20,20,19,0.08);">';
    $html .= '<span class="absolute inset-0 bg-gradient-to-tr from-black/10 via-transparent to-white/30 pointer-events-none"></span>';
    $html .= '</span>';
    if (!empty($label)) {
        $html .= '<span class="text-xs font-medium text-[#141413] font-sans">' . htmlspecialchars($label) . '</span>';
    }
    if (!empty($hex)) {
        $html .= '<span class="text-[10px] font-mono text-[#5C5852] uppercase tracking-wider">' . htmlspecialchars($color) . '</span>';
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
