<?php
declare(strict_types=1);

/**
 * CherryChic Beauty & Fragrance Lab - Database Migration & Seed Script
 * Run with: php scripts/migrate.php
 */

require_once __DIR__ . '/../src/db.php';

echo "🌸 [CherryChic Lab] Initializing SQLite Migration...\n";
echo "📂 Database target: " . CHERRYCHIC_DB_PATH . "\n";

$pdo = get_db();

// 1. Create Tables
$tables = [
    // Products Table
    "CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE NOT NULL,
        brand TEXT NOT NULL,
        name TEXT NOT NULL,
        category TEXT NOT NULL CHECK(category IN ('skincare', 'makeup', 'perfume', 'foundation')),
        mrp_inr INTEGER NOT NULL,
        size_label TEXT,
        swatch_hex TEXT,
        undertone TEXT CHECK(undertone IN ('warm', 'cool', 'neutral', 'olive') OR undertone IS NULL),
        key_actives_or_notes TEXT, -- JSON array of strings
        inci_tags TEXT, -- JSON array of ingredient slugs/identifiers
        is_luxury INTEGER NOT NULL DEFAULT 0 -- 1 = luxury benchmark, 0 = budget/dupe
    );",

    // Dupes Table (Comparing Original luxury vs Dupe alternative)
    "CREATE TABLE IF NOT EXISTS dupes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE NOT NULL,
        original_product_id INTEGER NOT NULL,
        dupe_product_id INTEGER NOT NULL,
        match_score INTEGER NOT NULL, -- e.g. 95 (percentage)
        savings_inr INTEGER NOT NULL, -- e.g. 8801
        comparison_summary TEXT,
        texture_or_longevity_notes TEXT,
        FOREIGN KEY (original_product_id) REFERENCES products(id) ON DELETE CASCADE,
        FOREIGN KEY (dupe_product_id) REFERENCES products(id) ON DELETE CASCADE
    );",

    // Ingredient Rules (for Active Clash & Fungal Acne Checker)
    "CREATE TABLE IF NOT EXISTS ingredient_rules (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE NOT NULL,
        name TEXT NOT NULL,
        category TEXT,
        comedogenic_score INTEGER CHECK(comedogenic_score BETWEEN 0 AND 5),
        is_fungal_acne_trigger INTEGER NOT NULL DEFAULT 0, -- 1 = triggers Malassezia folliculitis
        clashes_with_slugs TEXT, -- JSON array of ingredient slugs
        clash_explanation TEXT,
        benefit_summary TEXT
    );",

    // Cross-Brand Shade Matches (Indian skin tone optimized)
    "CREATE TABLE IF NOT EXISTS shade_matches (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        source_product_id INTEGER NOT NULL,
        target_product_id INTEGER NOT NULL,
        shade_family TEXT,
        skin_depth TEXT CHECK(skin_depth IN ('Fair', 'Light-Medium', 'Medium-Tan', 'Wheatish', 'Dusky', 'Deep')),
        match_notes TEXT,
        FOREIGN KEY (source_product_id) REFERENCES products(id) ON DELETE CASCADE,
        FOREIGN KEY (target_product_id) REFERENCES products(id) ON DELETE CASCADE
    );",

    // Affiliate Clicks Tracking
    "CREATE TABLE IF NOT EXISTS affiliate_clicks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        store TEXT NOT NULL,
        query TEXT NOT NULL,
        clicked_at TEXT NOT NULL
    );",

    // Consumer Product Dupe Requests
    "CREATE TABLE IF NOT EXISTS product_requests (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        product_name TEXT NOT NULL,
        category TEXT,
        created_at TEXT NOT NULL
    );"
];

foreach ($tables as $sql) {
    $pdo->exec($sql);
}
echo "✅ SQLite Tables created successfully.\n";

// 2. Create Performance & Lookup Indexes
$indexes = [
    "CREATE INDEX IF NOT EXISTS idx_products_slug ON products(slug);",
    "CREATE INDEX IF NOT EXISTS idx_products_category ON products(category);",
    "CREATE INDEX IF NOT EXISTS idx_products_brand ON products(brand);",
    "CREATE INDEX IF NOT EXISTS idx_products_is_luxury ON products(is_luxury);",
    "CREATE INDEX IF NOT EXISTS idx_dupes_slug ON dupes(slug);",
    "CREATE INDEX IF NOT EXISTS idx_dupes_original ON dupes(original_product_id);",
    "CREATE INDEX IF NOT EXISTS idx_dupes_dupe ON dupes(dupe_product_id);",
    "CREATE INDEX IF NOT EXISTS idx_dupes_savings ON dupes(savings_inr DESC);",
    "CREATE INDEX IF NOT EXISTS idx_dupes_match_score ON dupes(match_score DESC);",
    "CREATE INDEX IF NOT EXISTS idx_ingredient_rules_slug ON ingredient_rules(slug);",
    "CREATE INDEX IF NOT EXISTS idx_ingredient_rules_fa ON ingredient_rules(is_fungal_acne_trigger);",
    "CREATE INDEX IF NOT EXISTS idx_shade_matches_source ON shade_matches(source_product_id);",
    "CREATE INDEX IF NOT EXISTS idx_shade_matches_target ON shade_matches(target_product_id);",
    "CREATE INDEX IF NOT EXISTS idx_shade_matches_depth ON shade_matches(skin_depth);",
    "CREATE INDEX IF NOT EXISTS idx_affiliate_clicks_store ON affiliate_clicks(store);",
    "CREATE INDEX IF NOT EXISTS idx_affiliate_clicks_date ON affiliate_clicks(clicked_at);",
    "CREATE INDEX IF NOT EXISTS idx_product_requests_cat ON product_requests(category);"
];

foreach ($indexes as $sql) {
    $pdo->exec($sql);
}
echo "✅ SQLite Indexes verified.\n";

// 3. Seed Realistic Indian Market Data
echo "🌱 Checking and seeding high-value Indian beauty catalog data...\n";

// Check if products already seeded
$prodCount = (int)$pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

if ($prodCount === 0) {
    $pdo->beginTransaction();

    $insertProduct = $pdo->prepare("
        INSERT INTO products (slug, brand, name, category, mrp_inr, size_label, swatch_hex, undertone, key_actives_or_notes, inci_tags, is_luxury)
        VALUES (:slug, :brand, :name, :category, :mrp_inr, :size_label, :swatch_hex, :undertone, :key_actives_or_notes, :inci_tags, :is_luxury)
    ");

    $products = [
        // --- Skincare Benchmark Products ---
        [
            'slug' => 'estee-lauder-advanced-night-repair-serum',
            'brand' => 'Estée Lauder',
            'name' => 'Advanced Night Repair Synchronized Multi-Recovery Complex',
            'category' => 'skincare',
            'mrp_inr' => 9500,
            'size_label' => '50ml',
            'swatch_hex' => '#FBBF24', // Amber Serum
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Bifida Ferment Lysate', 'Tripeptide-32', 'Sodium Hyaluronate', 'Lactobacillus Ferment', 'Yeast Extract']),
            'inci_tags' => json_encode(['bifida-ferment', 'peptides', 'hyaluronic-acid']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'minimalist-multi-peptides-10-serum',
            'brand' => 'Minimalist',
            'name' => 'Multi-Peptides 10% + Probiotics Skin Repair Face Serum',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => '#FEF3C7',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Matrixyl 3000 (7%)', 'Bio-Placenta', 'Bifida Ferment Lysate', 'Hyaluronic Acid']),
            'inci_tags' => json_encode(['peptides', 'bifida-ferment', 'hyaluronic-acid']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'drunk-elephant-c-firma-fresh-day-serum',
            'brand' => 'Drunk Elephant',
            'name' => 'C-Firma Fresh Day Serum 15% Vitamin C',
            'category' => 'skincare',
            'mrp_inr' => 7200,
            'size_label' => '28ml',
            'swatch_hex' => '#F97316', // Fresh Citrus Orange
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['15% L-Ascorbic Acid', '0.5% Ferulic Acid', '1% Vitamin E', 'Marula Oil', 'Sodium Hyaluronate']),
            'inci_tags' => json_encode(['pure-vitamin-c', 'ferulic-acid', 'vitamin-e']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'plum-15-percent-vitamin-c-serum',
            'brand' => 'Plum',
            'name' => '15% Vitamin C Face Serum with Mandarin & Kakadu Plum',
            'category' => 'skincare',
            'mrp_inr' => 690,
            'size_label' => '30ml',
            'swatch_hex' => '#FDE68A',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['15% Ethyl Ascorbic Acid', 'Mandarin Peel Extract', 'Kakadu Plum', 'Rosehip Oil']),
            'inci_tags' => json_encode(['ethyl-ascorbic-acid', 'rosehip']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'paulas-choice-2-percent-bha-liquid-exfoliant',
            'brand' => "Paula's Choice",
            'name' => 'Skin Perfecting 2% BHA Liquid Exfoliant',
            'category' => 'skincare',
            'mrp_inr' => 3150,
            'size_label' => '118ml',
            'swatch_hex' => '#6EE7B7', // Aqua Teal
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['2% Salicylic Acid', 'Green Tea Extract', 'Methylpropanediol']),
            'inci_tags' => json_encode(['salicylic-acid', 'green-tea']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'minimalist-2-percent-salicylic-acid-serum',
            'brand' => 'Minimalist',
            'name' => '2% Salicylic Acid Face Serum for Acne & Blackheads',
            'category' => 'skincare',
            'mrp_inr' => 549,
            'size_label' => '30ml',
            'swatch_hex' => '#A7F3D0',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['2% Salicylic Acid', 'Aloe Vera Juice', 'Oligopeptide-10']),
            'inci_tags' => json_encode(['salicylic-acid', 'aloe']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'sunday-riley-good-genes-lactic-acid',
            'brand' => 'Sunday Riley',
            'name' => 'Good Genes All-In-One Lactic Acid Treatment',
            'category' => 'skincare',
            'mrp_inr' => 8400,
            'size_label' => '30ml',
            'swatch_hex' => '#E9D5FF', // Pearlescent Glow
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Purified Lactic Acid', 'Licorice Root Extract', 'Lemongrass', 'Arnica Extract']),
            'inci_tags' => json_encode(['lactic-acid', 'licorice']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'the-ordinary-lactic-acid-10-percent-ha',
            'brand' => 'The Ordinary',
            'name' => 'Lactic Acid 10% + HA 2% Exfoliating Serum',
            'category' => 'skincare',
            'mrp_inr' => 700,
            'size_label' => '30ml',
            'swatch_hex' => '#F3E8FF',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['10% Lactic Acid', 'Tasmanian Pepperberry Extract', 'Hyaluronic Acid']),
            'inci_tags' => json_encode(['lactic-acid', 'hyaluronic-acid']),
            'is_luxury' => 0
        ],

        // --- Makeup Benchmark Products ---
        [
            'slug' => 'charlotte-tilbury-flawless-filter',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Hollywood Flawless Filter Complexion Booster',
            'category' => 'makeup',
            'mrp_inr' => 4600,
            'size_label' => '30ml',
            'swatch_hex' => '#F5D0A9', // Champagne Luminous Gold
            'undertone' => 'neutral',
            'key_actives_or_notes' => json_encode(['Glossy Oil Complex', 'Finely Milled Powders', 'Porcelain Flower Extract']),
            'inci_tags' => json_encode(['squalane', 'glow-pigments']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'elf-halo-glow-liquid-filter',
            'brand' => 'e.l.f. Cosmetics',
            'name' => 'Halo Glow Liquid Filter Booster',
            'category' => 'makeup',
            'mrp_inr' => 890,
            'size_label' => '31.5ml',
            'swatch_hex' => '#F5D0A9',
            'undertone' => 'neutral',
            'key_actives_or_notes' => json_encode(['Squalane', 'Hyaluronic Acid', 'Finely Milled Mica']),
            'inci_tags' => json_encode(['squalane', 'hyaluronic-acid']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'charlotte-tilbury-pillow-talk-lipstick',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Matte Revolution Lipstick - Pillow Talk Original',
            'category' => 'makeup',
            'mrp_inr' => 3450,
            'size_label' => '3.5g',
            'swatch_hex' => '#BE6A6F', // Iconic Nude Pink
            'undertone' => 'neutral',
            'key_actives_or_notes' => json_encode(['3D Glowing Pigments', 'Lipstick Tree & Orchid Extract', 'Triglycerides']),
            'inci_tags' => json_encode(['matte-pigments', 'orchid-extract']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'maybelline-touch-of-spice-creamy-matte',
            'brand' => 'Maybelline New York',
            'name' => 'Color Sensational Creamy Matte - Touch of Spice 660',
            'category' => 'makeup',
            'mrp_inr' => 329,
            'size_label' => '3.9g',
            'swatch_hex' => '#B66266', // Rose Nude Mauve
            'undertone' => 'neutral',
            'key_actives_or_notes' => json_encode(['Honey Nectar', 'Shea Butter', 'Velvety Spherical Powders']),
            'inci_tags' => json_encode(['shea-butter', 'velvet-pigments']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'mac-retro-matte-ruby-woo',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Retro Matte Lipstick - Ruby Woo (Iconic Blue Red)',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#9E1B32', // Vivid Blue Red
            'undertone' => 'cool',
            'key_actives_or_notes' => json_encode(['Intense Vivid Blue-Red', 'Ultra-Matte Finish', '8-Hour Longwear']),
            'inci_tags' => json_encode(['retro-matte-pigment']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'sugar-smudge-me-not-brazen-raisin',
            'brand' => 'Sugar Cosmetics',
            'name' => 'Smudge Me Not Liquid Lipstick - 03 Brazen Raisin',
            'category' => 'makeup',
            'mrp_inr' => 499,
            'size_label' => '4.5ml',
            'swatch_hex' => '#93162A', // Deep Crimson Red
            'undertone' => 'cool',
            'key_actives_or_notes' => json_encode(['Transferproof Matte', 'Vitamin E Enriched', 'One-Coat Rich Pigment']),
            'inci_tags' => json_encode(['vitamin-e', 'matte-film']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'rare-beauty-soft-pinch-blush-hope',
            'brand' => 'Rare Beauty',
            'name' => 'Soft Pinch Liquid Blush - Hope (Nude Mauve Dewy)',
            'category' => 'makeup',
            'mrp_inr' => 2900,
            'size_label' => '7.5ml',
            'swatch_hex' => '#E3888F', // Soft Mauve Pink
            'undertone' => 'neutral',
            'key_actives_or_notes' => json_encode(['Lotus Extract', 'Gardenia Extract', 'White Water Lily', 'Dewy Botanical Complex']),
            'inci_tags' => json_encode(['botanical-blend', 'weightless-pigment']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'insight-cheek-lip-tint-flirty-peach',
            'brand' => 'Insight Cosmetics',
            'name' => 'Cheek & Lip Tint - 02 Flirty Peach / Mauve',
            'category' => 'makeup',
            'mrp_inr' => 175,
            'size_label' => '9g',
            'swatch_hex' => '#DF8188',
            'undertone' => 'neutral',
            'key_actives_or_notes' => json_encode(['Vitamin E', 'Castor Seed Oil', 'Easy Blend Cream-to-Glow']),
            'inci_tags' => json_encode(['vitamin-e', 'castor-oil']),
            'is_luxury' => 0
        ],

        // --- Perfume Benchmarks & Clones ---
        [
            'slug' => 'baccarat-rouge-540-extrait',
            'brand' => 'Maison Francis Kurkdjian',
            'name' => 'Baccarat Rouge 540 Extrait de Parfum',
            'category' => 'perfume',
            'mrp_inr' => 38000,
            'size_label' => '70ml',
            'swatch_hex' => '#DC2626', // Ruby Saffron Glow
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Saffron, Bitter Almond', 'Heart: Cedarwood, Jasmine Grandiflorum', 'Base: Ambergris, Woody Musk']),
            'inci_tags' => json_encode(['fragrance-ambergris', 'saffron', 'jasmine']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'club-de-nuit-untold-edp',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit Untold Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 4200,
            'size_label' => '105ml',
            'swatch_hex' => '#E11D48',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Saffron, Jasmine', 'Heart: Amberwood, Ambergris', 'Base: Cedar, Fir Resin']),
            'inci_tags' => json_encode(['saffron-accord', 'ambergris-accord']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'creed-aventus-edp',
            'brand' => 'Creed',
            'name' => 'Aventus Eau De Parfum for Men',
            'category' => 'perfume',
            'mrp_inr' => 33500,
            'size_label' => '100ml',
            'swatch_hex' => '#1E293B', // Smoky Silver Slate
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Pineapple, Bergamot, Apple, Blackcurrant', 'Heart: Birch, Patchouli, Moroccan Jasmine', 'Base: Musk, Oakmoss, Ambergris, Vanilla']),
            'inci_tags' => json_encode(['birch-smoke', 'pineapple-accord']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'club-de-nuit-intense-man-pure-parfum',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit Intense Man (CDNIM) Pure Parfum',
            'category' => 'perfume',
            'mrp_inr' => 3850,
            'size_label' => '150ml',
            'swatch_hex' => '#0F172A',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Lemon, Pineapple, Bergamot, Apple', 'Heart: Birch, Jasmine, Rose', 'Base: Ambergris, Musk, Patchouli, Vanilla']),
            'inci_tags' => json_encode(['lemon-pineapple', 'birch-smoke']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'tom-ford-tobacco-vanille',
            'brand' => 'Tom Ford',
            'name' => 'Tobacco Vanille Private Blend Eau de Parfum',
            'category' => 'perfume',
            'mrp_inr' => 24000,
            'size_label' => '50ml',
            'swatch_hex' => '#78350F', // Rich Warm Cognac
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Tobacco Leaf, Spicy Notes', 'Heart: Tonka Bean, Vanilla, Cacao, Tobacco Blossom', 'Base: Dried Fruits, Woody Notes']),
            'inci_tags' => json_encode(['tobacco-leaf', 'madagascar-vanilla']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'maison-alhambra-tobacco-touch',
            'brand' => 'Maison Alhambra (Lattafa)',
            'name' => 'Tobacco Touch Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2100,
            'size_label' => '80ml',
            'swatch_hex' => '#92400E',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Tobacco Leaf, Oriental Spices', 'Heart: Vanilla, Tonka, Cacao', 'Base: Dried Fruits, Wood Accord']),
            'inci_tags' => json_encode(['tobacco-accord', 'vanilla-tonka']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'kilian-angels-share-edp',
            'brand' => 'Kilian Paris',
            'name' => "Angels' Share Eau De Parfum (The Liquors)",
            'category' => 'perfume',
            'mrp_inr' => 22000,
            'size_label' => '50ml',
            'swatch_hex' => '#B45309', // Boozy Cognac Gold
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Cognac Accord', 'Heart: Cinnamon, Tonka Bean, Oak', 'Base: Praline, Vanilla, Sandalwood']),
            'inci_tags' => json_encode(['cognac-accord', 'cinnamon-oak']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'lattafa-khamrah-edp',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Khamrah Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2600,
            'size_label' => '100ml',
            'swatch_hex' => '#D97706',
            'undertone' => null,
            'key_actives_or_notes' => json_encode(['Top: Cognac, Cinnamon, Nutmeg, Bergamot', 'Heart: Dates, Praline, Tuberose, Mahonial', 'Base: Vanilla, Tonka, Benzoin, Myrrh, Amberwood']),
            'inci_tags' => json_encode(['dates-praline', 'cinnamon-vanilla']),
            'is_luxury' => 0
        ],

        // --- Foundation Benchmarks for Indian Undertones ---
        [
            'slug' => 'mac-studio-fix-fluid-nc35',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Studio Fix Fluid SPF 15 - NC35 (Warm Wheatish)',
            'category' => 'foundation',
            'mrp_inr' => 3600,
            'size_label' => '30ml',
            'swatch_hex' => '#D6A374', // Wheatish Golden Warm
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['24-Hour Matte Finish', 'SPF 15 Protection', 'Sebum & Oil Control']),
            'inci_tags' => json_encode(['silica', 'titanium-dioxide']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'maybelline-fit-me-matte-220-natural-beige',
            'brand' => 'Maybelline New York',
            'name' => 'Fit Me Matte + Poreless - 220 Natural Beige',
            'category' => 'foundation',
            'mrp_inr' => 599,
            'size_label' => '30ml',
            'swatch_hex' => '#D5A172', // Matched Indian Wheatish
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['Micro-Powders', 'Non-Comedogenic', 'Pore Blurring']),
            'inci_tags' => json_encode(['dimethicone', 'aerogel']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'kay-beauty-hydrating-foundation-130y',
            'brand' => 'Kay Beauty',
            'name' => 'Hydrating Foundation - 130Y Light Medium',
            'category' => 'foundation',
            'mrp_inr' => 1200,
            'size_label' => '30ml',
            'swatch_hex' => '#D7A476',
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['Hyaluronic Acid', 'Chamomile Oil', 'Dewy Finish']),
            'inci_tags' => json_encode(['hyaluronic-acid', 'chamomile']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'mac-studio-fix-fluid-nc42',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Studio Fix Fluid SPF 15 - NC42 (Warm Dusky)',
            'category' => 'foundation',
            'mrp_inr' => 3600,
            'size_label' => '30ml',
            'swatch_hex' => '#BC8454', // Dusky Warm Golden
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['24-Hour Wear', 'Non-Ashy Indian Undertone', 'Medium to Full']),
            'inci_tags' => json_encode(['iron-oxides', 'silica']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'maybelline-fit-me-matte-310-sun-beige',
            'brand' => 'Maybelline New York',
            'name' => 'Fit Me Matte + Poreless - 310 Sun Beige',
            'category' => 'foundation',
            'mrp_inr' => 599,
            'size_label' => '30ml',
            'swatch_hex' => '#BA8252',
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['Anti-Shine Micro Powders', 'Matte Finish', 'Matches Indian Dusky Skin']),
            'inci_tags' => json_encode(['perlite', 'dimethicone']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'mac-studio-fix-fluid-nc25',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Studio Fix Fluid SPF 15 - NC25 (Light-Medium Warm)',
            'category' => 'foundation',
            'mrp_inr' => 3600,
            'size_label' => '30ml',
            'swatch_hex' => '#E5B88F',
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['Golden Yellow Undertone', 'Longwear Matte']),
            'inci_tags' => json_encode(['titanium-dioxide']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'maybelline-fit-me-matte-128-warm-nude',
            'brand' => 'Maybelline New York',
            'name' => 'Fit Me Matte + Poreless - 128 Warm Nude',
            'category' => 'foundation',
            'mrp_inr' => 599,
            'size_label' => '30ml',
            'swatch_hex' => '#E3B58C',
            'undertone' => 'warm',
            'key_actives_or_notes' => json_encode(['Natural Matte', 'Seamless Blend']),
            'inci_tags' => json_encode(['perlite']),
            'is_luxury' => 0
        ],
        [
            'slug' => 'fenty-beauty-pro-filtr-290',
            'brand' => 'Fenty Beauty by Rihanna',
            'name' => "Pro Filt'r Soft Matte Longwear Foundation - 290",
            'category' => 'foundation',
            'mrp_inr' => 3800,
            'size_label' => '32ml',
            'swatch_hex' => '#CD9967', // Medium with Warm Olive Undertone
            'undertone' => 'olive',
            'key_actives_or_notes' => json_encode(['Climate-Adaptive Technology', 'Olive Undertone Specialist', 'Oil-Free Soft Matte']),
            'inci_tags' => json_encode(['olive-pigments', 'silica']),
            'is_luxury' => 1
        ],
        [
            'slug' => 'smashbox-always-on-foundation-l20o',
            'brand' => 'Smashbox',
            'name' => 'Always On Skin-Balancing Foundation - Light Medium Olive',
            'category' => 'foundation',
            'mrp_inr' => 3450,
            'size_label' => '30ml',
            'swatch_hex' => '#CE9B6A',
            'undertone' => 'olive',
            'key_actives_or_notes' => json_encode(['Balance-Boost Complex', 'Hyaluronic Acid', 'Adaptogen Blend']),
            'inci_tags' => json_encode(['olive-undertone', 'hyaluronic-acid']),
            'is_luxury' => 0
        ]
    ];

    foreach ($products as $p) {
        $insertProduct->execute($p);
    }
    echo "  -> Seeded " . count($products) . " benchmark & budget products.\n";

    // 4. Seed Dupes Relationships
    // Fetch product IDs helper
    $getId = function(string $slug) use ($pdo): int {
        $stmt = $pdo->prepare("SELECT id FROM products WHERE slug = ?");
        $stmt->execute([$slug]);
        return (int)$stmt->fetchColumn();
    };

    $insertDupe = $pdo->prepare("
        INSERT INTO dupes (slug, original_product_id, dupe_product_id, match_score, savings_inr, comparison_summary, texture_or_longevity_notes)
        VALUES (:slug, :original_product_id, :dupe_product_id, :match_score, :savings_inr, :comparison_summary, :texture_or_longevity_notes)
    ");

    $dupeData = [
        // Skincare Dupes
        [
            'slug' => 'estee-lauder-advanced-night-repair-dupe',
            'orig' => 'estee-lauder-advanced-night-repair-serum',
            'dupe' => 'minimalist-multi-peptides-10-serum',
            'match_score' => 92,
            'savings' => 8801,
            'summary' => 'Both serums rely on Bifida Ferment Lysate and advanced cellular peptide complexes to repair damaged skin barriers overnight. Minimalist adds Matrixyl 3000 at 7% and Copper Peptide for enhanced collagen stimulation at a fraction of the cost.',
            'notes' => 'Texture: Both have a lightweight, quick-absorbing viscous gel texture. Estee Lauder has a faint floral fermented aroma, while Minimalist is 100% fragrance-free and gentler for reactive Indian skin types.'
        ],
        [
            'slug' => 'drunk-elephant-c-firma-dupe',
            'orig' => 'drunk-elephant-c-firma-fresh-day-serum',
            'dupe' => 'plum-15-percent-vitamin-c-serum',
            'match_score' => 88,
            'savings' => 6510,
            'summary' => 'Drunk Elephant uses 15% pure L-Ascorbic Acid which oxidizes quickly in humid Indian weather. Plum uses Ethyl Ascorbic Acid (15%) which is far more stable against oxidation while delivering equivalent brightening and collagen synthesis benefits.',
            'notes' => 'Texture: Plum feels lighter on oily and combination Indian skin, whereas Drunk Elephant can feel slightly tacky due to Marula Oil.'
        ],
        [
            'slug' => 'sunday-riley-good-genes-dupe',
            'orig' => 'sunday-riley-good-genes-lactic-acid',
            'dupe' => 'the-ordinary-lactic-acid-10-percent-ha',
            'match_score' => 94,
            'savings' => 7700,
            'summary' => 'Identical 10% Lactic Acid chemical exfoliation mechanism. Good Genes combines it with licorice extract and botanical extracts, while The Ordinary uses soothing Tasmanian Pepperberry to mitigate potential irritation.',
            'notes' => 'Texture: Sunday Riley has a milky cream serum texture, whereas The Ordinary is a lightweight water-based liquid dropper serum.'
        ],
        [
            'slug' => 'paulas-choice-2-percent-bha-dupe',
            'orig' => 'paulas-choice-2-percent-bha-liquid-exfoliant',
            'dupe' => 'minimalist-2-percent-salicylic-acid-serum',
            'match_score' => 95,
            'savings' => 2601,
            'summary' => 'Both feature 2% pharmaceutical-grade Salicylic Acid (BHA) designed to dissolve stubborn sebum, blackheads, and enlarged pores. Minimalist substitutes the solvent base with soothing Aloe Vera juice and Oligopeptide-10 for superior anti-bacterial action against acne.',
            'notes' => "Longevity & Feel: Paula's Choice leaves a slightly oily slip on the skin for 5 minutes due to glycols; Minimalist sinks in within 60 seconds with a clean matte dry-down."
        ],

        // Makeup Dupes
        [
            'slug' => 'charlotte-tilbury-flawless-filter-dupe',
            'orig' => 'charlotte-tilbury-flawless-filter',
            'dupe' => 'elf-halo-glow-liquid-filter',
            'match_score' => 96,
            'savings' => 3710,
            'summary' => 'The ultimate viral beauty dupe. Both products serve as a 4-in-1 hybrid primer, glow booster, highlighter, and light coverage tint. elf Halo Glow contains Squalane and Hyaluronic Acid that rival Charlotte Tilbury\'s famous glow.',
            'notes' => 'Finish: Undistinguishable on skin under Indian daylight or ring lights. elf has a slightly wider doe-foot applicator and lasts 8+ hours.'
        ],
        [
            'slug' => 'charlotte-tilbury-pillow-talk-dupe',
            'orig' => 'charlotte-tilbury-pillow-talk-lipstick',
            'dupe' => 'maybelline-touch-of-spice-creamy-matte',
            'match_score' => 93,
            'savings' => 3121,
            'summary' => 'Pillow Talk is world famous for its universally flattering nude-pink undertone. On Indian warm and olive skin tones, Maybelline Touch of Spice provides an even more flattering, non-washed-out rosy nude with a comfortable velvety matte finish.',
            'notes' => 'Wear time: 5-6 hours with even fading. Maybelline does not dry out lips thanks to infused honey nectar.'
        ],
        [
            'slug' => 'mac-ruby-woo-dupe',
            'orig' => 'mac-ruby-woo-dupe', // Note: original slug is mac-retro-matte-ruby-woo
            'orig_slug_override' => 'mac-retro-matte-ruby-woo',
            'dupe' => 'sugar-smudge-me-not-brazen-raisin',
            'match_score' => 95,
            'savings' => 1801,
            'summary' => 'MAC Ruby Woo is the quintessential blue-toned retro red. Sugar\'s Brazen Raisin matches the vivid punch and zero-transfer matte stamina required for long Indian weddings and festive dinners.',
            'notes' => 'Performance: Sugar Smudge Me Not is 100% transfer-proof against oily food, whereas MAC bullet lipstick requires re-application after meals.'
        ],
        [
            'slug' => 'rare-beauty-soft-pinch-blush-hope-dupe',
            'orig' => 'rare-beauty-soft-pinch-blush-hope',
            'dupe' => 'insight-cheek-lip-tint-flirty-peach',
            'match_score' => 89,
            'savings' => 2725,
            'summary' => 'Matches the signature Selena Gomez dewy nude-mauve flush. Insight offers high pigment payoff that blends seamlessly over foundation or bare skin with fingers.',
            'notes' => 'Texture: Rare Beauty is a liquid dropper tint; Insight is a compact creamy melt-in balm with 6+ hours of luminous wear.'
        ],

        // Perfume Clones
        [
            'slug' => 'baccarat-rouge-540-clone-club-de-nuit-untold',
            'orig' => 'baccarat-rouge-540-extrait',
            'dupe' => 'club-de-nuit-untold-edp',
            'match_score' => 96,
            'savings' => 33800,
            'summary' => 'Armaf Club De Nuit Untold is widely recognized by fragrance communities worldwide as a 1:1 master clone of MFK Baccarat Rouge 540. It captures the crystalline saffron, metallic ambergris, and sweet burnt-sugar cedarwood sillage perfectly.',
            'notes' => 'Longevity & Sillage: Phenomenal 12+ hours on clothes, beast-mode projection in Indian tropical heat without turning sour.'
        ],
        [
            'slug' => 'creed-aventus-clone-club-de-nuit-intense-man',
            'orig' => 'creed-aventus-edp',
            'dupe' => 'club-de-nuit-intense-man-pure-parfum',
            'match_score' => 95,
            'savings' => 29650,
            'summary' => 'Armaf CDNIM Pure Parfum replicates the legendary smoky birch, juicy blackcurrant, and tart pineapple DNA that made Creed Aventus famous across the globe. Pure Parfum eliminates the harsh opening of early EDT batches.',
            'notes' => 'Performance: Outperforms modern reformulated Creed Aventus batches, yielding 10+ hours of longevity and legendary compliment factor.'
        ],
        [
            'slug' => 'tom-ford-tobacco-vanille-clone-tobacco-touch',
            'orig' => 'tom-ford-tobacco-vanille',
            'dupe' => 'maison-alhambra-tobacco-touch',
            'match_score' => 94,
            'savings' => 21900,
            'summary' => 'Maison Alhambra Tobacco Touch recreates Tom Ford\'s opulent blend of moist aromatic tobacco leaves, spiced tonka bean, rich cocoa, and sweet Madagascar vanilla pods at less than 1/10th the price.',
            'notes' => 'Vibe: Perfect for Indian winters, evening parties, and sherwani/tuxedo occasions. 8+ hours of cozy projection.'
        ],
        [
            'slug' => 'kilian-angels-share-clone-lattafa-khamrah',
            'orig' => 'kilian-angels-share-edp',
            'dupe' => 'lattafa-khamrah-edp',
            'match_score' => 93,
            'savings' => 19400,
            'summary' => 'Lattafa Khamrah captures the intoxicating boozy, cinnamon-spiced, sweet date and praline essence of Kilian Angels\' Share. It delivers an even richer, dessert-like gourmand depth that performs beautifully in cooler weather.',
            'notes' => 'Presentation & Longevity: Heavy crystal glass flacon, 10-14 hours on fabric, massive sillage.'
        ]
    ];

    foreach ($dupeData as $d) {
        $origSlug = $d['orig_slug_override'] ?? $d['orig'];
        $origId = $getId($origSlug);
        $dupeId = $getId($d['dupe']);

        if ($origId > 0 && $dupeId > 0) {
            $insertDupe->execute([
                ':slug' => $d['slug'],
                ':original_product_id' => $origId,
                ':dupe_product_id' => $dupeId,
                ':match_score' => $d['match_score'],
                ':savings_inr' => $d['savings'],
                ':comparison_summary' => $d['summary'],
                ':texture_or_longevity_notes' => $d['notes']
            ]);
        }
    }
    echo "  -> Seeded " . count($dupeData) . " dupe & clone pairs.\n";

    // 5. Seed Shade Matches
    $insertShade = $pdo->prepare("
        INSERT INTO shade_matches (source_product_id, target_product_id, shade_family, skin_depth, match_notes)
        VALUES (:source_product_id, :target_product_id, :shade_family, :skin_depth, :match_notes)
    ");

    $shadeMatches = [
        // MAC NC35 matches (Wheatish Warm)
        [
            'src' => 'mac-studio-fix-fluid-nc35',
            'tgt' => 'maybelline-fit-me-matte-220-natural-beige',
            'family' => 'Golden Warm Beige',
            'depth' => 'Wheatish',
            'notes' => 'Maybelline 220 Natural Beige is the closest Indian drugstore equivalent to MAC NC35 with identical yellow-warm undertone balance.'
        ],
        [
            'src' => 'mac-studio-fix-fluid-nc35',
            'tgt' => 'kay-beauty-hydrating-foundation-130y',
            'family' => 'Light Medium Yellow',
            'depth' => 'Wheatish',
            'notes' => 'Kay Beauty 130Y has a slightly dewier finish with true yellow undertones formulated specifically for Indian skin.'
        ],
        // MAC NC42 matches (Dusky Warm)
        [
            'src' => 'mac-studio-fix-fluid-nc42',
            'tgt' => 'maybelline-fit-me-matte-310-sun-beige',
            'family' => 'Golden Caramel',
            'depth' => 'Dusky',
            'notes' => 'Maybelline 310 Sun Beige matches MAC NC42 depth without turning grey or ashy on rich Indian melanin.'
        ],
        // MAC NC25 matches (Light-Medium Warm)
        [
            'src' => 'mac-studio-fix-fluid-nc25',
            'tgt' => 'maybelline-fit-me-matte-128-warm-nude',
            'family' => 'Warm Peach Nude',
            'depth' => 'Light-Medium',
            'notes' => 'Direct color match with yellow peachy warmth suitable for light-medium North & East Indian complexions.'
        ],
        // Fenty 290 Olive match
        [
            'src' => 'fenty-beauty-pro-filtr-290',
            'tgt' => 'smashbox-always-on-foundation-l20o',
            'family' => 'Warm Olive',
            'depth' => 'Wheatish',
            'notes' => 'Rare true-olive shade match for greenish-golden Indian undertones that look orange in standard warm foundations.'
        ]
    ];

    foreach ($shadeMatches as $sm) {
        $srcId = $getId($sm['src']);
        $tgtId = $getId($sm['tgt']);
        if ($srcId > 0 && $tgtId > 0) {
            $insertShade->execute([
                ':source_product_id' => $srcId,
                ':target_product_id' => $tgtId,
                ':shade_family' => $sm['family'],
                ':skin_depth' => $sm['depth'],
                ':match_notes' => $sm['notes']
            ]);
        }
    }
    echo "  -> Seeded " . count($shadeMatches) . " Indian foundation shade matches.\n";

    // 6. Seed Ingredient Rules (for Active Clash & Fungal Acne Checker)
    $insertRule = $pdo->prepare("
        INSERT INTO ingredient_rules (slug, name, category, comedogenic_score, is_fungal_acne_trigger, clashes_with_slugs, clash_explanation, benefit_summary)
        VALUES (:slug, :name, :category, :comedogenic_score, :is_fungal_acne_trigger, :clashes_with_slugs, :clash_explanation, :benefit_summary)
    ");

    $rules = [
        [
            'slug' => 'retinol',
            'name' => 'Retinol & Retinoids (Tretinoin, Retinaldehyde, Adapalene)',
            'category' => 'Cell Turnover & Anti-Aging Active',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode(['glycolic-acid', 'salicylic-acid', 'pure-vitamin-c', 'benzoyl-peroxide']),
            'clash_explanation' => 'Applying Retinol simultaneously with direct exfoliating acids (AHAs/BHAs) or Benzoyl Peroxide causes severe skin barrier compromise, burning, redness, and peeling. Alternate nights or use AM/PM split.',
            'benefit_summary' => 'Gold-standard active that accelerates cellular renewal, stimulates dermal collagen synthesis, and reverses photo-damage.'
        ],
        [
            'slug' => 'glycolic-acid',
            'name' => 'Glycolic Acid (Alpha Hydroxy Acid - AHA)',
            'category' => 'Chemical Exfoliant',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode(['retinol', 'salicylic-acid', 'pure-vitamin-c']),
            'clash_explanation' => 'Stacking Glycolic Acid with Retinol or high-strength L-Ascorbic Acid drops skin pH excessively, dissolving intercellular lipid cement and causing stinging and post-inflammatory hyperpigmentation (PIH) in Indian skin.',
            'benefit_summary' => 'Smallest molecular AHA that penetrates deeply to dissolve dead surface corneocytes, revealing radiant glassy skin.'
        ],
        [
            'slug' => 'salicylic-acid',
            'name' => 'Salicylic Acid (Beta Hydroxy Acid - BHA)',
            'category' => 'Lipophilic Pore Cleanser',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode(['retinol', 'glycolic-acid', 'benzoyl-peroxide']),
            'clash_explanation' => 'Combining BHA with Retinol or Benzoyl Peroxide causes intense lipid stripping and transepidermal water loss. Separate them by using BHA in the morning or on non-retinol days.',
            'benefit_summary' => 'Oil-soluble acid that penetrates deep into sebaceous glands to unclog blackheads, whiteheads, and calm inflammatory acne.'
        ],
        [
            'slug' => 'pure-vitamin-c',
            'name' => 'Pure Vitamin C (L-Ascorbic Acid)',
            'category' => 'Potent Antioxidant & Brightener',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode(['retinol', 'benzoyl-peroxide', 'glycolic-acid']),
            'clash_explanation' => 'Benzoyl Peroxide oxidizes L-Ascorbic Acid instantly, rendering both inactive. Retinol plus low-pH Vitamin C triggers extreme erythema and dryness. Keep Vitamin C in AM under sunscreen, and Retinol in PM.',
            'benefit_summary' => 'Inactivates UV-generated free radicals, inhibits tyrosinase to diminish stubborn sun spots and melasma.'
        ],
        [
            'slug' => 'benzoyl-peroxide',
            'name' => 'Benzoyl Peroxide (BPO)',
            'category' => 'Anti-Bacterial Acne Treatment',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode(['retinol', 'pure-vitamin-c', 'salicylic-acid']),
            'clash_explanation' => 'BPO is a strong oxidizing agent. Pairing it directly with Retinol degrades both molecules and causes intense flaking and compromised moisture barrier.',
            'benefit_summary' => 'Releases oxygen into pores to eradicate anaerobic Cutibacterium acnes bacteria without causing bacterial resistance.'
        ],
        [
            'slug' => 'niacinamide',
            'name' => 'Niacinamide (Vitamin B3)',
            'category' => 'Barrier Support & Sebum Balancer',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode([]), // Generally universally compatible
            'clash_explanation' => 'Universally versatile at concentrations of 2% to 5%. Highly synergistic with Retinol and Hyaluronic Acid.',
            'benefit_summary' => 'Boosts ceramide synthesis, reduces transepidermal water loss, regulates sebum output, and tightens lax pore walls.'
        ],
        [
            'slug' => 'polysorbate-20',
            'name' => 'Polysorbate 20 / Polysorbate 80',
            'category' => 'Fatty Acid Ester Emulsifier',
            'comedogenic_score' => 1,
            'is_fungal_acne_trigger' => 1,
            'clashes_with_slugs' => json_encode([]),
            'clash_explanation' => 'WARNING: Feeds Malassezia globosa & restricta yeasts. Highly contraindicated for fungal acne (Pityrosporum folliculitis) prone skin.',
            'benefit_summary' => 'Cosmetic emulsifier used to blend oil and water phases evenly in toners, cleansers, and lightweight emulsions.'
        ],
        [
            'slug' => 'isopropyl-myristate',
            'name' => 'Isopropyl Myristate / Isopropyl Palmitate',
            'category' => 'Ester Emollient & Penetration Enhancer',
            'comedogenic_score' => 5,
            'is_fungal_acne_trigger' => 1,
            'clashes_with_slugs' => json_encode([]),
            'clash_explanation' => 'SEVERE COMEDOGENIC & FUNGAL RISK: Rated 5/5 for pore clogging. The C14-C16 carbon chain directly metabolizes as food for Malassezia yeast folliculitis.',
            'benefit_summary' => 'Imparts instant silky velvety glide and accelerates transdermal absorption of heavy creams.'
        ],
        [
            'slug' => 'galactomyces-ferment',
            'name' => 'Galactomyces / Bifida Ferment Filtrate',
            'category' => 'Fermented Probiotic Active',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 1,
            'clashes_with_slugs' => json_encode([]),
            'clash_explanation' => 'FUNGAL ACNE WARNING: While fantastic for normal skin barriers, ferment filtrates provide amino acid broths that trigger aggressive Malassezia yeast proliferation on forehead and jawline.',
            'benefit_summary' => 'Rich in amino acids, minerals, and organic acids that enhance epidermal radiance and skin bounce.'
        ],
        [
            'slug' => 'hyaluronic-acid',
            'name' => 'Hyaluronic Acid & Sodium Hyaluronate',
            'category' => 'Multi-Depth Humectant',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode([]),
            'clash_explanation' => 'Universal synergy. Safe to combine with all active acids, retinoids, peptides, and botanical extracts.',
            'benefit_summary' => 'Binds up to 1,000 times its molecular weight in water to plump dehydrated skin and smooth fine lines.'
        ],
        [
            'slug' => 'ceramide-np',
            'name' => 'Ceramides (NP, AP, EOP) & Cholesterol',
            'category' => 'Physiological Barrier Lipid',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode([]),
            'clash_explanation' => 'Zero clash. Essential buffer when using powerful actives like Retinol or Tretinoin to prevent retinoid dermatitis.',
            'benefit_summary' => 'Replaces lost epidermal lipids, heals irritated acid-damaged barriers, and locks in long-lasting moisture.'
        ],
        [
            'slug' => 'centella-asiatica',
            'name' => 'Centella Asiatica (Cica / Madecassoside)',
            'category' => 'Botanical Soothing Agent',
            'comedogenic_score' => 0,
            'is_fungal_acne_trigger' => 0,
            'clashes_with_slugs' => json_encode([]),
            'clash_explanation' => 'Zero clash. Safe and beneficial with any active.',
            'benefit_summary' => 'Downregulates inflammatory cytokines, accelerates collagen I synthesis, and calms redness from Indian sun exposure.'
        ]
    ];

    foreach ($rules as $r) {
        $insertRule->execute($r);
    }
    echo "  -> Seeded " . count($rules) . " active clash & fungal acne ingredient rules.\n";

    $pdo->commit();
    echo "🎉 Database seeded successfully with production-grade beauty catalog!\n";
} else {
    echo "ℹ️ Database already contains $prodCount products. Skipping seed insertion.\n";
}

echo "✨ Migration Complete.\n";

