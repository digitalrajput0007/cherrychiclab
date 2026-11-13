<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder 4: Cross-Brand Indian Foundation & Concealer Shade Matches
 * Maps MAC NC25-NC45 to Maybelline Fit Me, Kay Beauty, Nykaa, PAC, and Mamaearth.
 * Run with: php scripts/seed/seed_shades.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "🎨 [CherryChic Lab] Seeding Indian Foundation & Shade Matches...\n";

$pdo = get_db();

// Clean existing shade matches for idempotent re-runs
$pdo->exec("
    CREATE TABLE IF NOT EXISTS shade_matches (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        source_product_id INTEGER NOT NULL,
        target_product_id INTEGER NOT NULL,
        shade_family TEXT,
        skin_depth TEXT CHECK(skin_depth IN ('Fair', 'Light-Medium', 'Wheatish', 'Medium-Tan', 'Dusky', 'Deep')),
        match_notes TEXT,
        FOREIGN KEY (source_product_id) REFERENCES products(id) ON DELETE CASCADE,
        FOREIGN KEY (target_product_id) REFERENCES products(id) ON DELETE CASCADE
    );
    DELETE FROM shade_matches;
    CREATE INDEX IF NOT EXISTS idx_shade_matches_source ON shade_matches(source_product_id);
    CREATE INDEX IF NOT EXISTS idx_shade_matches_target ON shade_matches(target_product_id);
    CREATE INDEX IF NOT EXISTS idx_shade_matches_depth ON shade_matches(skin_depth);
");

// 1. Foundation Products Catalog
$foundations = [
    // Reference MAC Foundations
    [
        'slug' => 'mac-studio-fix-fluid-nc25',
        'brand' => 'M.A.C Cosmetics',
        'name' => 'Studio Fix Fluid SPF 15 - NC25',
        'category' => 'foundation',
        'mrp_inr' => 3600,
        'size_label' => '30ml',
        'swatch_hex' => '#E5B88F',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Light-Medium with Golden Warm Undertone', 'SPF 15', '24-Hour Matte Finish'],
        'inci_tags' => ['silica', 'titanium-dioxide'],
        'is_luxury' => 1
    ],
    [
        'slug' => 'mac-studio-fix-fluid-nc30',
        'brand' => 'M.A.C Cosmetics',
        'name' => 'Studio Fix Fluid SPF 15 - NC30',
        'category' => 'foundation',
        'mrp_inr' => 3600,
        'size_label' => '30ml',
        'swatch_hex' => '#DEAB7C',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Wheatish Neutral-Warm Golden', 'Oil Control', 'Medium-to-Full Coverage'],
        'inci_tags' => ['iron-oxides'],
        'is_luxury' => 1
    ],
    [
        'slug' => 'mac-studio-fix-fluid-nc35',
        'brand' => 'M.A.C Cosmetics',
        'name' => 'Studio Fix Fluid SPF 15 - NC35',
        'category' => 'foundation',
        'mrp_inr' => 3600,
        'size_label' => '30ml',
        'swatch_hex' => '#D6A374',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Wheatish True Golden Warm (Most Popular Indian Shade)', 'Matte 24H Wear'],
        'inci_tags' => ['dimethicone', 'silica'],
        'is_luxury' => 1
    ],
    [
        'slug' => 'mac-studio-fix-fluid-nc40',
        'brand' => 'M.A.C Cosmetics',
        'name' => 'Studio Fix Fluid SPF 15 - NC40',
        'category' => 'foundation',
        'mrp_inr' => 3600,
        'size_label' => '30ml',
        'swatch_hex' => '#C79061',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Medium-Tan with Golden Peach Warmth', 'Transfer-Resistant'],
        'inci_tags' => ['iron-oxides'],
        'is_luxury' => 1
    ],
    [
        'slug' => 'mac-studio-fix-fluid-nc42',
        'brand' => 'M.A.C Cosmetics',
        'name' => 'Studio Fix Fluid SPF 15 - NC42',
        'category' => 'foundation',
        'mrp_inr' => 3600,
        'size_label' => '30ml',
        'swatch_hex' => '#BC8454',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Medium-Tan to Dusky Rich Caramel Golden', 'Non-Ashy Indian Formulation'],
        'inci_tags' => ['silica'],
        'is_luxury' => 1
    ],
    [
        'slug' => 'mac-studio-fix-fluid-nc44',
        'brand' => 'M.A.C Cosmetics',
        'name' => 'Studio Fix Fluid SPF 15 - NC44',
        'category' => 'foundation',
        'mrp_inr' => 3600,
        'size_label' => '30ml',
        'swatch_hex' => '#AB7244',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Dusky Golden Bronze Undertone', 'Full Pigment Matte'],
        'inci_tags' => ['iron-oxides'],
        'is_luxury' => 1
    ],
    [
        'slug' => 'fenty-beauty-pro-filtr-290',
        'brand' => 'Fenty Beauty by Rihanna',
        'name' => "Pro Filt'r Soft Matte Longwear Foundation - 290",
        'category' => 'foundation',
        'mrp_inr' => 3800,
        'size_label' => '32ml',
        'swatch_hex' => '#CD9967',
        'undertone' => 'olive',
        'key_actives_or_notes' => ['Medium with Warm Olive Undertone', 'Climate Adaptive', 'Sweat-Resistant'],
        'inci_tags' => ['olive-pigment'],
        'is_luxury' => 1
    ],

    // Drugstore Alternatives (Maybelline, Kay Beauty, Nykaa, PAC, Mamaearth)
    [
        'slug' => 'maybelline-fit-me-matte-128-warm-nude',
        'brand' => 'Maybelline New York',
        'name' => 'Fit Me Matte + Poreless - 128 Warm Nude',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#E3B58C',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Micro-Powders', 'Clay Anti-Shine', 'Natural Matte'],
        'inci_tags' => ['perlite'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'maybelline-fit-me-matte-220-natural-beige',
        'brand' => 'Maybelline New York',
        'name' => 'Fit Me Matte + Poreless - 220 Natural Beige',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#D5A172',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Oil-Free', 'Seamless Blending Micro-Powders'],
        'inci_tags' => ['dimethicone'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'maybelline-fit-me-matte-230-natural-buff',
        'brand' => 'Maybelline New York',
        'name' => 'Fit Me Matte + Poreless - 230 Natural Buff',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#D49F70',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Pore Blurring', 'Anti-Oxidation Formula'],
        'inci_tags' => ['perlite'],
        'is_luxury' => 0
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
        'key_actives_or_notes' => ['Warm Golden Caramel', 'Zero Flashback'],
        'inci_tags' => ['aerogel'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'maybelline-fit-me-matte-330-toffee',
        'brand' => 'Maybelline New York',
        'name' => 'Fit Me Matte + Poreless - 330 Toffee',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#B27C4E',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Dusky Melanin True Tone', 'Non-Ashy'],
        'inci_tags' => ['iron-oxides'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'maybelline-fit-me-matte-332-golden-caramel',
        'brand' => 'Maybelline New York',
        'name' => 'Fit Me Matte + Poreless - 332 Golden Caramel',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#A86F41',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Rich Dusky Undertone', 'Mattifying'],
        'inci_tags' => ['perlite'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'kay-beauty-hydrating-foundation-110y',
        'brand' => 'Kay Beauty',
        'name' => 'Hydrating Foundation - 110Y Light',
        'category' => 'foundation',
        'mrp_inr' => 1200,
        'size_label' => '30ml',
        'swatch_hex' => '#E4B68D',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Hyaluronic Acid', 'Chamomile Oil', 'Dewy Luminous'],
        'inci_tags' => ['hyaluronic-acid', 'chamomile'],
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
        'key_actives_or_notes' => ['Formulated for Indian Skin', 'Hyaluronic Acid'],
        'inci_tags' => ['hyaluronic-acid'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'kay-beauty-hydrating-foundation-140y',
        'brand' => 'Kay Beauty',
        'name' => 'Hydrating Foundation - 140Y Medium Tan',
        'category' => 'foundation',
        'mrp_inr' => 1200,
        'size_label' => '30ml',
        'swatch_hex' => '#C58E5F',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Golden Olive Medium Tan', 'Seamless Glow'],
        'inci_tags' => ['chamomile'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'kay-beauty-hydrating-foundation-150y',
        'brand' => 'Kay Beauty',
        'name' => 'Hydrating Foundation - 150Y Deep Tan',
        'category' => 'foundation',
        'mrp_inr' => 1200,
        'size_label' => '30ml',
        'swatch_hex' => '#BA8353',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Rich Indian Golden Amber', 'Dewy Finish'],
        'inci_tags' => ['hyaluronic-acid'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'nykaa-skingenius-foundation-03-warm-sand',
        'brand' => 'Nykaa',
        'name' => 'SkinShield Anti-Pollution Matte Foundation - 03 Warm Sand',
        'category' => 'foundation',
        'mrp_inr' => 799,
        'size_label' => '30ml',
        'swatch_hex' => '#D5A273',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Anti-Pollution Shield', 'Enriched with Vitamin E', 'Medium Coverage'],
        'inci_tags' => ['vitamin-e'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'nykaa-skingenius-foundation-05-golden-hour',
        'brand' => 'Nykaa',
        'name' => 'SkinShield Anti-Pollution Matte Foundation - 05 Golden Hour',
        'category' => 'foundation',
        'mrp_inr' => 799,
        'size_label' => '30ml',
        'swatch_hex' => '#B88050',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Indian Melanin Match', 'Non-Ashy', 'Sun Protection'],
        'inci_tags' => ['titanium-dioxide'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'pac-spotlight-liquid-foundation-04-honey',
        'brand' => 'PAC',
        'name' => 'Spotlight Liquid Foundation - 04 Honey',
        'category' => 'foundation',
        'mrp_inr' => 995,
        'size_label' => '30ml',
        'swatch_hex' => '#C68F60',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Pro HD Formula', 'Bridal Medium-Tan Match', 'Waterproof'],
        'inci_tags' => ['dimethicone'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'mamaearth-glow-serum-foundation-02-nude-glow',
        'brand' => 'Mamaearth',
        'name' => 'Glow Serum Foundation with Vitamin C & Turmeric - 02 Nude Glow',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#D6A375',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Vitamin C', 'Turmeric Root', '12-Hour Dewy Hydration'],
        'inci_tags' => ['vitamin-c', 'turmeric'],
        'is_luxury' => 0
    ],
    [
        'slug' => 'mamaearth-glow-serum-foundation-04-toffee-glow',
        'brand' => 'Mamaearth',
        'name' => 'Glow Serum Foundation with Vitamin C & Turmeric - 04 Toffee Glow',
        'category' => 'foundation',
        'mrp_inr' => 599,
        'size_label' => '30ml',
        'swatch_hex' => '#AB7244',
        'undertone' => 'warm',
        'key_actives_or_notes' => ['Turmeric Antioxidant', 'Dusky Skin Glow', 'Zero Cakey Feel'],
        'inci_tags' => ['turmeric'],
        'is_luxury' => 0
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
        'key_actives_or_notes' => ['True Olive Undertone', 'Balancing Hyaluronic Acid'],
        'inci_tags' => ['olive-undertone'],
        'is_luxury' => 0
    ]
];

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

$pdo->beginTransaction();
foreach ($foundations as $f) {
    $insertProd->execute([
        ':slug' => $f['slug'],
        ':brand' => $f['brand'],
        ':name' => $f['name'],
        ':category' => $f['category'],
        ':mrp_inr' => $f['mrp_inr'],
        ':size_label' => $f['size_label'],
        ':swatch_hex' => $f['swatch_hex'],
        ':undertone' => $f['undertone'],
        ':key_actives_or_notes' => json_encode($f['key_actives_or_notes']),
        ':inci_tags' => json_encode($f['inci_tags']),
        ':is_luxury' => $f['is_luxury']
    ]);
}
$pdo->commit();

// 2. Cross-Brand Matches
$getId = function(string $slug) use ($pdo): int {
    $stmt = $pdo->prepare("SELECT id FROM products WHERE slug = ?");
    $stmt->execute([$slug]);
    return (int)$stmt->fetchColumn();
};

$matchesData = [
    // NC25 matches
    [
        'src' => 'mac-studio-fix-fluid-nc25',
        'tgt' => 'maybelline-fit-me-matte-128-warm-nude',
        'family' => 'Warm Peach Nude',
        'depth' => 'Light-Medium',
        'notes' => 'Maybelline 128 Warm Nude matches MAC NC25 depth with yellow-peach undertone that keeps North and East Indian complexions luminous.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc25',
        'tgt' => 'kay-beauty-hydrating-foundation-110y',
        'family' => 'Golden Light',
        'depth' => 'Light-Medium',
        'notes' => 'Kay Beauty 110Y provides an identical golden hue with a significantly dewier, hydrating finish.'
    ],

    // NC30 matches
    [
        'src' => 'mac-studio-fix-fluid-nc30',
        'tgt' => 'maybelline-fit-me-matte-220-natural-beige',
        'family' => 'Warm Neutral Beige',
        'depth' => 'Wheatish',
        'notes' => 'Maybelline 220 is a 95% match to MAC NC30/NC35 depth without oxidizing orange.'
    ],

    // NC35 matches (Most popular Indian shade)
    [
        'src' => 'mac-studio-fix-fluid-nc35',
        'tgt' => 'maybelline-fit-me-matte-220-natural-beige',
        'family' => 'Golden Warm Beige',
        'depth' => 'Wheatish',
        'notes' => 'The #1 requested shade dupe in India. Maybelline 220 Natural Beige provides the exact yellow-golden balance of MAC NC35.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc35',
        'tgt' => 'kay-beauty-hydrating-foundation-130y',
        'family' => 'Light Medium Yellow',
        'depth' => 'Wheatish',
        'notes' => 'Kay Beauty 130Y is formulated specifically for Indian undertones and eliminates grey ashy cast under wedding camera flashes.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc35',
        'tgt' => 'nykaa-skingenius-foundation-03-warm-sand',
        'family' => 'Warm Sand Golden',
        'depth' => 'Wheatish',
        'notes' => 'Nykaa Warm Sand blends into NC35 skin like a second skin with anti-pollution barrier protection.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc35',
        'tgt' => 'mamaearth-glow-serum-foundation-02-nude-glow',
        'family' => 'Natural Warm Nude',
        'depth' => 'Wheatish',
        'notes' => 'Mamaearth 02 Nude Glow gives a breathable everyday sheer-to-medium glow with Vitamin C and Turmeric.'
    ],

    // NC40 matches
    [
        'src' => 'mac-studio-fix-fluid-nc40',
        'tgt' => 'maybelline-fit-me-matte-310-sun-beige',
        'family' => 'Golden Caramel',
        'depth' => 'Medium-Tan',
        'notes' => 'Maybelline 310 Sun Beige matches the warm golden-amber depth of NC40 without creating a mask-like divide.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc40',
        'tgt' => 'kay-beauty-hydrating-foundation-140y',
        'family' => 'Medium Golden Tan',
        'depth' => 'Medium-Tan',
        'notes' => 'Kay Beauty 140Y offers seamless golden olive undertones for medium-tan Indian skin.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc40',
        'tgt' => 'pac-spotlight-liquid-foundation-04-honey',
        'family' => 'Golden Honey',
        'depth' => 'Medium-Tan',
        'notes' => 'PAC 04 Honey matches NC40 depth with HD bridal camera coverage and water resistance.'
    ],

    // NC42 matches (Dusky Warm)
    [
        'src' => 'mac-studio-fix-fluid-nc42',
        'tgt' => 'maybelline-fit-me-matte-310-sun-beige',
        'family' => 'Golden Caramel',
        'depth' => 'Medium-Tan',
        'notes' => 'Maybelline 310 Sun Beige matches MAC NC42 depth without turning grey or ashy on rich Indian melanin.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc42',
        'tgt' => 'maybelline-fit-me-matte-330-toffee',
        'family' => 'Rich Toffee Caramel',
        'depth' => 'Dusky',
        'notes' => 'If NC42 oxidizes slightly deep, Maybelline 330 Toffee provides an exact warm amber match.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc42',
        'tgt' => 'kay-beauty-hydrating-foundation-150y',
        'family' => 'Deep Warm Tan',
        'depth' => 'Dusky',
        'notes' => 'Kay Beauty 150Y has rich golden pigments that celebrate deeper Indian melanin without chalkiness.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc42',
        'tgt' => 'nykaa-skingenius-foundation-05-golden-hour',
        'family' => 'Golden Hour Bronze',
        'depth' => 'Dusky',
        'notes' => 'Nykaa Golden Hour is celebrated for keeping NC42 skin warm and glowing all day.'
    ],

    // NC44 / NC45 matches
    [
        'src' => 'mac-studio-fix-fluid-nc44',
        'tgt' => 'maybelline-fit-me-matte-332-golden-caramel',
        'family' => 'Deep Golden Bronze',
        'depth' => 'Dusky',
        'notes' => 'Maybelline 332 Golden Caramel is custom-formulated for deep dusky Indian complexions.'
    ],
    [
        'src' => 'mac-studio-fix-fluid-nc44',
        'tgt' => 'mamaearth-glow-serum-foundation-04-toffee-glow',
        'family' => 'Warm Toffee Bronze',
        'depth' => 'Dusky',
        'notes' => 'Mamaearth 04 Toffee Glow provides breathable everyday coverage without turning ashy.'
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

$insertMatch = $pdo->prepare("
    INSERT INTO shade_matches (source_product_id, target_product_id, shade_family, skin_depth, match_notes)
    VALUES (:source_product_id, :target_product_id, :shade_family, :skin_depth, :match_notes)
");

$pdo->beginTransaction();
$matchCount = 0;

foreach ($matchesData as $m) {
    $srcId = $getId($m['src']);
    $tgtId = $getId($m['tgt']);

    if ($srcId > 0 && $tgtId > 0) {
        $insertMatch->execute([
            ':source_product_id' => $srcId,
            ':target_product_id' => $tgtId,
            ':shade_family' => $m['family'],
            ':skin_depth' => $m['depth'],
            ':match_notes' => $m['notes']
        ]);
        $matchCount++;
    }
}
$pdo->commit();

echo "✅ Successfully seeded {$matchCount} cross-brand Indian foundation shade matches!\n";

