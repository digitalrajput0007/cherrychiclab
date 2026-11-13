<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Central Database Connection & Core Query Helpers
 * High-performance PDO SQLite with WAL journal mode.
 */

require_once __DIR__ . '/config.php';

function get_db(): PDO {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    $dbPath = __DIR__ . '/../data/cherrychic.sqlite';
    $dbDir = dirname($dbPath);

    if (!is_dir($dbDir)) {
        mkdir($dbDir, 0755, true);
    }

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO('sqlite:' . $dbPath, null, null, $options);

    // Enforce WAL mode, normal synchronous, foreign keys, and memory temp store for high concurrency
    $pdo->exec('PRAGMA journal_mode = WAL;');
    $pdo->exec('PRAGMA synchronous = NORMAL;');
    $pdo->exec('PRAGMA foreign_keys = ON;');
    $pdo->exec('PRAGMA temp_store = MEMORY;');
    $pdo->exec('PRAGMA mmap_size = 268435456;'); // 256MB memory-mapped I/O

    return $pdo;
}

/**
 * Helper to safely format Indian Rupee prices (e.g. ₹1,299 or ₹14,500)
 */
function format_inr(int|float|string|null $amount): string {
    if ($amount === null || $amount === '') {
        return '₹0';
    }
    $val = (float)$amount;
    return '₹' . number_format($val, 0, '.', ',');
}

/**
 * JSON Decode helper with fallback
 */
function json_array_decode(?string $json): array {
    if (empty($json)) {
        return [];
    }
    $decoded = json_decode($json, true);
    return is_array($decoded) ? $decoded : [];
}

/**
 * Render sleek, bold 3D cosmetic swatch droplet using Hex code.
 * Eliminates external product images, zero bandwidth cost, no copyright issues.
 */
function render_swatch_pill(?string $hex, string $label = '', string $size = 'md'): string {
    $hasRealHex = !empty($hex) && preg_match('/^#[a-f0-9]{3,6}$/i', $hex);
    
    // Choose appropriate beauty gradient if hex is missing
    $lowerLabel = strtolower($label);
    if ($hasRealHex) {
        $bgStyle = "background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.5), transparent 50%), " . htmlspecialchars($hex) . ";";
    } elseif (str_contains($lowerLabel, 'perfume') || str_contains($lowerLabel, 'edp') || str_contains($lowerLabel, 'eau') || str_contains($lowerLabel, 'extrait') || str_contains($lowerLabel, 'parfum')) {
        $bgStyle = "background: linear-gradient(135deg, #A855F7 0%, #6366F1 50%, #4338CA 100%);";
    } elseif (str_contains($lowerLabel, 'sunscreen') || str_contains($lowerLabel, 'spf') || str_contains($lowerLabel, 'hydrat') || str_contains($lowerLabel, 'hyaluronic') || str_contains($lowerLabel, 'gel')) {
        $bgStyle = "background: linear-gradient(135deg, #06B6D4 0%, #0EA5E9 50%, #0284C7 100%);";
    } elseif (str_contains($lowerLabel, 'vitamin c') || str_contains($lowerLabel, 'retinol') || str_contains($lowerLabel, 'oil') || str_contains($lowerLabel, 'glow')) {
        $bgStyle = "background: linear-gradient(135deg, #F59E0B 0%, #D97706 50%, #EA580C 100%);";
    } else {
        $bgStyle = "background: linear-gradient(135deg, #F43F5E 0%, #E11D48 50%, #BE123C 100%);";
    }

    $dimensions = match ($size) {
        'sm' => 'w-8 h-8 rounded-xl',
        'lg' => 'w-14 h-14 rounded-2xl',
        'xl' => 'w-16 h-16 rounded-2xl',
        default => 'w-12 h-12 rounded-2xl'
    };

    $html = '<div class="inline-flex items-center gap-2.5 group" title="' . htmlspecialchars($label . ($hasRealHex ? ' (' . $hex . ')' : '')) . '">';
    $html .= '<span class="relative inline-block ' . $dimensions . ' transition-all group-hover:scale-105 shrink-0 overflow-hidden ring-2 ring-white/80 shadow-md" style="' . $bgStyle . ' box-shadow: inset 0 -3px 8px rgba(0,0,0,0.3), 0 4px 14px rgba(225,29,72,0.12);">';
    $html .= '<span class="absolute inset-0 bg-gradient-to-tr from-black/15 via-transparent to-white/40 pointer-events-none"></span>';
    $html .= '</span>';
    if (!empty($label)) {
        $html .= '<span class="text-sm font-semibold text-slate-800 font-sans">' . htmlspecialchars($label) . '</span>';
    }
    if ($hasRealHex) {
        $html .= '<span class="text-xs font-mono text-slate-500 uppercase tracking-wider font-semibold">' . htmlspecialchars($hex) . '</span>';
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
