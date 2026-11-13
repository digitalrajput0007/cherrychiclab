<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder Batch 2: 35 High-Demand Skincare, K-Beauty, Sunscreens & Serums
 * Adds 35 pairs (70 products + 35 dupes records) searched in India.
 * Run with: php C:\CherryChicLab\scripts\seed\seed_batch2_kbeauty_sunscreens_serums.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "🧴 [CherryChic Lab] Seeding Batch 2: 35 K-Beauty, Sunscreens & Active Serums (70 products)...\n";

$pdo = get_db();

$pairs = [
    // 1. Anua Heartleaf 77% Soothing Toner vs Plum Green Tea Alcohol-Free Toner
    [
        'orig' => [
            'slug' => 'anua-heartleaf-77-soothing-toner',
            'brand' => 'Anua',
            'name' => 'Heartleaf 77% Soothing Toner',
            'category' => 'skincare',
            'mrp_inr' => 1950,
            'size_label' => '250ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['77% Houttuynia Cordata (Heartleaf) Extract', 'Panthenol', 'Centella Asiatica', 'Betaine'],
            'inci_tags' => ['heartleaf', 'panthenol', 'centella'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-green-tea-alcohol-free-toner',
            'brand' => 'Plum',
            'name' => 'Green Tea Alcohol-Free Toner',
            'category' => 'skincare',
            'mrp_inr' => 390,
            'size_label' => '200ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Camellia Sinensis (Green Tea) Leaf Extract', 'Glycolic Acid', 'Glycerin'],
            'inci_tags' => ['green-tea', 'glycolic-acid', 'glycerin'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'anua-heartleaf-77-toner-dupe-plum-green-tea',
            'match_score' => 91,
            'summary' => 'Both provide an instant watery, non-sticky soothing sensation that calms redness, hormonal breakouts, and humidity irritation in Indian weather.',
            'notes' => 'Plum adds mild glycolic acid for gentle exfoliation alongside polyphenols; Anua focuses exclusively on subduing active flare-ups with heartleaf.'
        ]
    ],

    // 2. TirTir Mask Fit Red Cushion vs Mars BB Cream HD Cushion
    [
        'orig' => [
            'slug' => 'tirtir-mask-fit-red-cushion-foundation',
            'brand' => 'TirTir',
            'name' => 'Mask Fit Red Cushion Foundation SPF40',
            'category' => 'foundation',
            'mrp_inr' => 2250,
            'size_label' => '18g',
            'swatch_hex' => '#DEB389',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Niacinamide', 'Hibiscus Sabdariffa Flower Extract', 'Propolis Extract', '72H Smudge-Proof Film'],
            'inci_tags' => ['niacinamide', 'propolis', 'hibiscus'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-bb-cream-cushion-compact',
            'brand' => 'Mars Cosmetics',
            'name' => 'BB Cream HD Cushion Compact',
            'category' => 'foundation',
            'mrp_inr' => 399,
            'size_label' => '15g',
            'swatch_hex' => '#DCB085',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Hyaluronic Acid', 'Semi-Matte Sweat-Resistant Polymer'],
            'inci_tags' => ['vitamin-e', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tirtir-mask-fit-red-cushion-dupe-mars-cushion',
            'match_score' => 89,
            'summary' => 'Provides that viral glass-skin semi-matte high coverage that blurs Indian hyperpigmentation without caking under sweat or face masks.',
            'notes' => 'Mars delivers an astonishingly similar airbrushed finish at less than one-fifth of the price.'
        ]
    ],

    // 3. Axis-Y Dark Spot Correcting Glow Serum vs Deconstruct Clearing Serum
    [
        'orig' => [
            'slug' => 'axis-y-dark-spot-correcting-glow-serum',
            'brand' => 'AXIS-Y',
            'name' => 'Dark Spot Correcting Glow Serum 5% Niacinamide',
            'category' => 'skincare',
            'mrp_inr' => 1600,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['5% Niacinamide', 'Squalane', 'Papaya Fruit Extract', 'Rice Bran', 'Allantoin'],
            'inci_tags' => ['niacinamide', 'squalane', 'rice-bran'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'deconstruct-clearing-serum-alpha-arbutin-niacinamide',
            'brand' => 'Deconstruct',
            'name' => 'Clearing Serum 2% Alpha Arbutin + 5% Niacinamide',
            'category' => 'skincare',
            'mrp_inr' => 599,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['5% Niacinamide', '2% Alpha Arbutin', 'Glycerin'],
            'inci_tags' => ['niacinamide', 'alpha-arbutin'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'axis-y-dark-spot-serum-dupe-deconstruct-clearing',
            'match_score' => 94,
            'summary' => 'Both utilize an optimal 5% Niacinamide base to clear stubborn post-acne dark marks and melasma patches common in South Asian skin types.',
            'notes' => 'Deconstruct adds pure 2% Alpha Arbutin, making it faster at suppressing active tyrosinase enzymes than Axis-Y.'
        ]
    ],

    // 4. Cetaphil Gentle Skin Cleanser vs Minimalist Aquaporin 0.1% Gentle Cleanser
    [
        'orig' => [
            'slug' => 'cetaphil-gentle-skin-cleanser',
            'brand' => 'Cetaphil',
            'name' => 'Gentle Skin Cleanser for Dry to Normal Sensitive Skin',
            'category' => 'skincare',
            'mrp_inr' => 650,
            'size_label' => '250ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Niacinamide (Vitamin B3)', 'Panthenol (Pro-Vitamin B5)', 'Hydrating Glycerin'],
            'inci_tags' => ['niacinamide', 'panthenol', 'glycerin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-aquaporin-gentle-cleanser',
            'brand' => 'Minimalist',
            'name' => 'Aquaporin Booster 0.1% Gentle Cleanser',
            'category' => 'skincare',
            'mrp_inr' => 299,
            'size_label' => '100ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Aquaporin Boosters', 'Hyaluronic Acid', 'Betaine', 'Wheat Amino Acids'],
            'inci_tags' => ['aquaporin', 'hyaluronic-acid', 'betaine'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cetaphil-gentle-cleanser-dupe-minimalist-aquaporin',
            'match_score' => 93,
            'summary' => 'Non-stripping, SLS-free, ultra-low foam gel-lotion formulas that preserve the epidermal acid mantle during hard water cleansing.',
            'notes' => 'Minimalist includes aquaporin-stimulating glyceryl glucoside to maintain cellular hydration channels.'
        ]
    ],

    // 5. Neutrogena Hydro Boost Water Gel vs Pond's Super Light Gel
    [
        'orig' => [
            'slug' => 'neutrogena-hydro-boost-water-gel',
            'brand' => 'Neutrogena',
            'name' => 'Hydro Boost Hyaluronic Acid Water Gel',
            'category' => 'skincare',
            'mrp_inr' => 1150,
            'size_label' => '50g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Purified Hyaluronic Acid', 'Amino Acids', 'Electrolytes'],
            'inci_tags' => ['hyaluronic-acid', 'dimethicone', 'glycerin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'ponds-super-light-gel-moisturiser',
            'brand' => "Pond's",
            'name' => 'Super Light Gel Oil-Free Moisturiser with Hyaluronic Acid & Vitamin E',
            'category' => 'skincare',
            'mrp_inr' => 310,
            'size_label' => '100g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Hyaluronic Acid', 'Vitamin E', 'Glycerin'],
            'inci_tags' => ['hyaluronic-acid', 'vitamin-e', 'glycerin'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'neutrogena-hydro-boost-dupe-ponds-super-light-gel',
            'match_score' => 96,
            'summary' => 'The ultimate Indian summer moisturizer dupe. Both burst into a refreshing water splash texture that absorbs in seconds with zero oiliness.',
            'notes' => "Pond's gives twice the volume (100g vs 50g) for a quarter of the price per gram."
        ]
    ],

    // 6. La Roche-Posay Cicaplast Baume B5+ vs Bioderma Cicabio Creme+
    [
        'orig' => [
            'slug' => 'la-roche-posay-cicaplast-baume-b5-plus',
            'brand' => 'La Roche-Posay',
            'name' => 'Cicaplast Baume B5+ Soothing Multi-Purpose Balm',
            'category' => 'skincare',
            'mrp_inr' => 1850,
            'size_label' => '40ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['5% Panthenol', 'Madecassoside', 'Tribioma Prebiotic Complex', 'Zinc & Manganese'],
            'inci_tags' => ['panthenol', 'madecassoside', 'zinc'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'bioderma-cicabio-creme-plus',
            'brand' => 'Bioderma',
            'name' => 'Cicabio Creme+ Ultra-Repairing Soothing Care',
            'category' => 'skincare',
            'mrp_inr' => 790,
            'size_label' => '40ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Antalgicine Active', 'Hyaluronic Acid', 'Centella Asiatica', 'Copper-Zinc Complex'],
            'inci_tags' => ['copper-peptides', 'zinc', 'centella'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'la-roche-posay-cicaplast-b5-dupe-bioderma-cicabio',
            'match_score' => 95,
            'summary' => 'Top dermatological barrier-repair balms for reversing retinoid peeling, acid burns, and laser resurfacing irritation.',
            'notes' => 'Bioderma features Antalgicine which directly suppresses the urge to scratch itchy compromised skin.'
        ]
    ],

    // 7. Paula's Choice 2% BHA Liquid vs Minimalist 2% Salicylic Acid
    [
        'orig' => [
            'slug' => 'paulas-choice-skin-perfecting-2-bha-liquid-exfoliant',
            'brand' => "Paula's Choice",
            'name' => 'Skin Perfecting 2% BHA Liquid Exfoliant',
            'category' => 'skincare',
            'mrp_inr' => 3100,
            'size_label' => '118ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['2% Salicylic Acid', 'Methylpropanediol (Penetration Enhancer)', 'Green Tea Extract'],
            'inci_tags' => ['salicylic-acid', 'green-tea'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-2-salicylic-acid-face-serum',
            'brand' => 'Minimalist',
            'name' => '2% Salicylic Acid + LHA Serum',
            'category' => 'skincare',
            'mrp_inr' => 549,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['2% Salicylic Acid', 'Lipo Hydroxy Acid (LHA)', 'Oat Extract', 'Aloe Vera'],
            'inci_tags' => ['salicylic-acid', 'aloe-vera'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'paulas-choice-2-bha-dupe-minimalist-salicylic',
            'match_score' => 94,
            'summary' => 'Gold-standard oil-soluble beta hydroxy acid treatments that dissolve stubborn sebum plugs, blackheads, and enlarged pores.',
            'notes' => 'Minimalist adds LHA for dual-layer superficial and deep follicular pore clearance at one-fifth the cost.'
        ]
    ],

    // 8. The Ordinary Glycolic 7% vs Minimalist 8% Glycolic Acid Toner
    [
        'orig' => [
            'slug' => 'the-ordinary-glycolic-acid-7-toning-solution',
            'brand' => 'The Ordinary',
            'name' => 'Glycolic Acid 7% Exfoliating Toning Solution',
            'category' => 'skincare',
            'mrp_inr' => 1250,
            'size_label' => '240ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['7% Glycolic Acid', 'Tasmanian Pepperberry', 'Ginseng Root', 'Aloe Vera'],
            'inci_tags' => ['glycolic-acid', 'aloe-vera'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-8-glycolic-acid-toner',
            'brand' => 'Minimalist',
            'name' => '8% Glycolic Acid Exfoliating Liquid Toner',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '150ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['8% Glycolic Acid', 'Bamboo Water', 'Chamomile Extract', 'Hyaluronic Acid'],
            'inci_tags' => ['glycolic-acid', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'the-ordinary-glycolic-7-dupe-minimalist-8-glycolic',
            'match_score' => 95,
            'summary' => 'Both dissolve the intercellular glue holding dull dead keratin cells together on face, underarms, and strawberry legs.',
            'notes' => 'Minimalist provides a buffered 8% concentration with soothing bamboo water that minimizes stinging on Indian skin.'
        ]
    ],

    // 9. Caudalie Vinoperfect Radiance Serum vs Foxtale Milky Way Spot Reduction
    [
        'orig' => [
            'slug' => 'caudalie-vinoperfect-radiance-serum-complexion-correcting',
            'brand' => 'Caudalie',
            'name' => 'Vinoperfect Radiance Dark Spot Correcting Serum',
            'category' => 'skincare',
            'mrp_inr' => 5400,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Patented Viniferine (Grape Vine Sap)', 'Olive Squalane', 'Organic Mint'],
            'inci_tags' => ['squalane', 'botanical-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'foxtale-milky-way-spot-reduction-serum',
            'brand' => 'Foxtale',
            'name' => 'Milky Way Spot Reduction Serum 3% Tranexamic Acid',
            'category' => 'skincare',
            'mrp_inr' => 645,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['3% Tranexamic Acid', '5% Niacinamide', 'Licorice Extract', 'Centella'],
            'inci_tags' => ['tranexamic-acid', 'niacinamide', 'licorice'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'caudalie-vinoperfect-dupe-foxtale-milky-way',
            'match_score' => 92,
            'summary' => 'Luxurious milky emulsions dedicated to inhibiting tyrosinase and fading resistant Indian sun hyperpigmentation without irritation.',
            'notes' => 'Foxtale saves you ₹4,755 while delivering clinically proven 3% Tranexamic Acid, the gold-standard dermatological melasma treatment.'
        ]
    ],

    // 10. Clinique Moisture Surge 100H vs Dot & Key 72HR Hydrating Gel
    [
        'orig' => [
            'slug' => 'clinique-moisture-surge-100h-hydrator',
            'brand' => 'Clinique',
            'name' => 'Moisture Surge 100H Auto-Replenishing Hydrator',
            'category' => 'skincare',
            'mrp_inr' => 3200,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Aloe Bio-Ferment', 'Hyaluronic Acid Complex', 'Activated Aloe Water'],
            'inci_tags' => ['aloe-vera', 'hyaluronic-acid', 'ferments'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-72hr-hydrating-gel-moisturizer',
            'brand' => 'Dot & Key',
            'name' => '72HR Hydrating Gel Moisturizer with Hyaluronic Acid & Kombucha',
            'category' => 'skincare',
            'mrp_inr' => 595,
            'size_label' => '60ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['5 Molecular Weights of Hyaluronic Acid', 'Fermented Kombucha Tea', 'Probiotics'],
            'inci_tags' => ['hyaluronic-acid', 'probiotics'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'clinique-moisture-surge-dupe-dot-and-key-72hr',
            'match_score' => 93,
            'summary' => 'Identical cooling translucent pink gel formulas that plump dry, dehydrated skin with zero oily residue.',
            'notes' => 'Dot & Key includes fermented kombucha antioxidants and costs ₹2,605 less.'
        ]
    ],

    // 11. Innisfree No Sebum Mineral Powder vs Mars Trendsetter Powder
    [
        'orig' => [
            'slug' => 'innisfree-no-sebum-mineral-powder',
            'brand' => 'Innisfree',
            'name' => 'No Sebum Mineral Loose Powder',
            'category' => 'makeup',
            'mrp_inr' => 550,
            'size_label' => '5g',
            'swatch_hex' => '#F5F5F0',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Jeju Natural Minerals', 'Natural Mint Extract', 'Sebum Control Powder'],
            'inci_tags' => ['silica', 'mineral-powder'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-trendsetter-translucent-loose-powder',
            'brand' => 'Mars Cosmetics',
            'name' => 'Trendsetter Translucent Loose Setting Powder',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '8g',
            'swatch_hex' => '#F8F8F5',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Micro-milled Silica', 'Oil-absorbing Mica', 'Flashback-Free Formula'],
            'inci_tags' => ['silica', 'mica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'innisfree-no-sebum-powder-dupe-mars-trendsetter',
            'match_score' => 94,
            'summary' => 'Both banish oily T-zone shine for 8+ hours in humid weather without leaving a white ghost-like cast in flash photography.',
            'notes' => 'Mars provides 8g of product (vs Innisfree 5g) at half the cost.'
        ]
    ],

    // 12. D'Alba White Truffle First Spray Serum vs Dot & Key Glow Face Mist
    [
        'orig' => [
            'slug' => 'dalba-white-truffle-first-spray-serum',
            'brand' => "d'Alba Piedmont",
            'name' => 'White Truffle First Spray Serum Bi-Phase Mist',
            'category' => 'skincare',
            'mrp_inr' => 2400,
            'size_label' => '100ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Italian White Truffle Extract', 'Avocado Oil', 'Sunflower Seed Oil', 'Niacinamide'],
            'inci_tags' => ['niacinamide', 'avocado-oil'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-watermelon-super-glow-face-mist',
            'brand' => 'Dot & Key',
            'name' => 'Watermelon Super Glow Matte Face Mist & Setting Spray',
            'category' => 'skincare',
            'mrp_inr' => 495,
            'size_label' => '100ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Watermelon Fruit Extract', 'Glycolic Acid', 'Hyaluronic Acid', 'Cucumber'],
            'inci_tags' => ['glycolic-acid', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dalba-spray-serum-dupe-dot-and-key-face-mist',
            'match_score' => 88,
            'summary' => 'Ultra-fine cloud mists that impart a dewy radiance over bare skin or lock in makeup without melting in Indian humidity.',
            'notes' => "Dot & Key mimics the luminous glow of d'Alba at a ₹1,905 savings."
        ]
    ],

    // 13. Skin1004 Madagascar Centella Ampoule vs Dr. Sheth's Cica & Ceramide Serum
    [
        'orig' => [
            'slug' => 'skin1004-madagascar-centella-ampoule',
            'brand' => 'SKIN1004',
            'name' => 'Madagascar Centella Asiatica 100 Ampoule',
            'category' => 'skincare',
            'mrp_inr' => 1850,
            'size_label' => '100ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['100% Centella Asiatica Extract', 'Madecassic Acid', 'Asiaticoside'],
            'inci_tags' => ['centella-asiatica'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dr-sheths-cica-and-ceramide-serum',
            'brand' => "Dr. Sheth's",
            'name' => 'Cica & Ceramide Barrier Repair Serum',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Centella Asiatica', 'Ceramide Complex', 'Squalane', 'Marula Oil'],
            'inci_tags' => ['centella-asiatica', 'ceramides', 'squalane'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'skin1004-centella-ampoule-dupe-dr-sheths-cica-ceramide',
            'match_score' => 93,
            'summary' => 'The ultimate soothing elixirs for calming active cystic acne inflammation, redness, and acid irritation.',
            'notes' => "Dr. Sheth's pairs pure Cica with bio-compatible ceramides tailored specifically for compromised Indian skin barriers."
        ]
    ],

    // 14. Beauty of Joseon Glow Serum Propolis vs Plum 10% Niacinamide Serum
    [
        'orig' => [
            'slug' => 'beauty-of-joseon-glow-serum-propolis-niacinamide',
            'brand' => 'Beauty of Joseon',
            'name' => 'Glow Serum: Propolis + Niacinamide',
            'category' => 'skincare',
            'mrp_inr' => 1450,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['60% Propolis Extract', '2% Niacinamide', '0.5% BHA', 'Lotus Corniculatus Seed'],
            'inci_tags' => ['propolis', 'niacinamide', 'salicylic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-10-niacinamide-rice-water-serum',
            'brand' => 'Plum',
            'name' => '10% Niacinamide & Rice Water Face Serum',
            'category' => 'skincare',
            'mrp_inr' => 599,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['10% Niacinamide', 'Fermented Rice Water', 'Licorice Root Extract', 'Squalane'],
            'inci_tags' => ['niacinamide', 'rice-water', 'licorice'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'beauty-of-joseon-glow-serum-dupe-plum-niacinamide',
            'match_score' => 92,
            'summary' => 'Both deliver that coveted dewy glass-skin glow while tightening enlarged pore walls and fading dark blemishes.',
            'notes' => 'Plum provides higher 10% pure Niacinamide with brightening fermented rice water at a ₹851 savings.'
        ]
    ],

    // 15. Cosrx BHA Blackhead Power Liquid vs Deconstruct Pore Control Serum
    [
        'orig' => [
            'slug' => 'cosrx-bha-blackhead-power-liquid',
            'brand' => 'COSRX',
            'name' => 'BHA Blackhead Power Liquid',
            'category' => 'skincare',
            'mrp_inr' => 1590,
            'size_label' => '100ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['4% Betaine Salicylate', 'Salix Alba (Willow Bark) Water', 'Niacinamide'],
            'inci_tags' => ['salicylic-acid', 'niacinamide'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'deconstruct-pore-control-serum-salicylic-niacinamide',
            'brand' => 'Deconstruct',
            'name' => 'Pore Control Serum 2% Salicylic Acid + 3% Niacinamide',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['2% Salicylic Acid', '3% Niacinamide', 'Chamomile Extract'],
            'inci_tags' => ['salicylic-acid', 'niacinamide'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cosrx-bha-power-liquid-dupe-deconstruct-pore-control',
            'match_score' => 94,
            'summary' => 'Gentle chemical exfoliators designed to empty blackheads and sebaceous filaments without triggering dry flaking.',
            'notes' => 'Deconstruct uses pure 2% free Salicylic Acid buffered by 3% Niacinamide for targeted oil gland regulation.'
        ]
    ],

    // 16. Haruharu Wonder Black Rice Toner vs TonyMoly Wonder Ceramide Mochi Toner
    [
        'orig' => [
            'slug' => 'haruharu-wonder-black-rice-hyaluronic-toner',
            'brand' => 'Haruharu Wonder',
            'name' => 'Black Rice Hyaluronic Toner Fragrance-Free',
            'category' => 'skincare',
            'mrp_inr' => 1650,
            'size_label' => '150ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Fermented Korean Black Rice Extract', 'Hyaluronic Acid', 'Beta-Glucan', 'Panax Ginseng'],
            'inci_tags' => ['fermented-extracts', 'hyaluronic-acid', 'ginseng'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'tonymoly-wonder-ceramide-mochi-toner',
            'brand' => 'TonyMoly',
            'name' => 'Wonder Ceramide Mochi Hydrating Toner',
            'category' => 'skincare',
            'mrp_inr' => 950,
            'size_label' => '500ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['5000ppb Ceramides', 'Centella Asiatica', 'Hyaluronic Acid', 'Panthenol'],
            'inci_tags' => ['ceramides', 'centella', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'haruharu-wonder-toner-dupe-tonymoly-mochi-toner',
            'match_score' => 91,
            'summary' => 'Viscous, milky hydrating toners that impart bouncy mochi skin with deep cellular hydration.',
            'notes' => 'TonyMoly gives a massive 500ml salon-size bottle for ₹950 (more than 3x the volume of Haruharu) loaded with ceramides.'
        ]
    ],

    // 17. Isntree Hyaluronic Acid Watery Sun Gel vs Aqualogica Radiance+ Dewy Sunscreen
    [
        'orig' => [
            'slug' => 'isntree-hyaluronic-acid-watery-sun-gel-spf50',
            'brand' => 'Isntree',
            'name' => 'Hyaluronic Acid Watery Sun Gel SPF 50+ PA++++',
            'category' => 'skincare',
            'mrp_inr' => 1650,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['8 Types of Hyaluronic Acid', 'Astaxanthin', 'Centella Asiatica', 'Fig Fruit Extract'],
            'inci_tags' => ['hyaluronic-acid', 'centella', 'sunscreen-filters'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'aqualogica-radiance-dewy-sunscreen-spf50',
            'brand' => 'Aqualogica',
            'name' => 'Radiance+ Dewy Sunscreen SPF 50+ PA++++ with Watermelon & Niacinamide',
            'category' => 'skincare',
            'mrp_inr' => 399,
            'size_label' => '50g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Watermelon Extract', 'Niacinamide', 'Hyaluronic Acid', 'Titanium Dioxide'],
            'inci_tags' => ['niacinamide', 'hyaluronic-acid', 'sunscreen-filters'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'isntree-watery-sun-gel-dupe-aqualogica-dewy-sunscreen',
            'match_score' => 95,
            'summary' => 'Zero white cast, ultra-lightweight watery gel sunscreens that melt instantly into dusky and wheatish Indian complexions.',
            'notes' => 'Aqualogica delivers an identical dewy glow and high UV protection at ₹399 vs Isntree ₹1,650 (Save ₹1,251).'
        ]
    ],

    // 18. Biore UV Aqua Rich Watery Essence vs Foxtale Dewy Sunscreen SPF50
    [
        'orig' => [
            'slug' => 'biore-uv-aqua-rich-watery-essence-spf50',
            'brand' => 'Bioré',
            'name' => 'UV Aqua Rich Watery Essence SPF 50+ PA++++',
            'category' => 'skincare',
            'mrp_inr' => 1270,
            'size_label' => '50g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Micro Defense Formula', 'Hyaluronic Acid', 'Royal Jelly Extract'],
            'inci_tags' => ['hyaluronic-acid', 'sunscreen-filters'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'foxtale-dewy-sunscreen-spf50',
            'brand' => 'Foxtale',
            'name' => 'Dewy Sunscreen SPF 50 PA++++ with Niacinamide & Vitamin E',
            'category' => 'skincare',
            'mrp_inr' => 445,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Niacinamide', 'Vitamin E', 'D-Panthenol', 'Advanced UV Filters'],
            'inci_tags' => ['niacinamide', 'vitamin-e', 'panthenol'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'biore-uv-aqua-rich-dupe-foxtale-dewy-sunscreen',
            'match_score' => 93,
            'summary' => 'Breathable featherlight essences that disappear into skin like a glass of water without any pilling under foundation.',
            'notes' => 'Foxtale is formulated without high denatured alcohol, making it gentler on dry or sensitive Indian skin.'
        ]
    ],

    // 19. Supergoop! Unseen Sunscreen vs Re'equil Ultra Matte Dry Touch Sunscreen
    [
        'orig' => [
            'slug' => 'supergoop-unseen-sunscreen-spf40',
            'brand' => 'Supergoop!',
            'name' => 'Unseen Sunscreen SPF 40 Invisible Makeup Primer',
            'category' => 'skincare',
            'mrp_inr' => 3900,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['100% Invisible Gel Matrix', 'Meadowfoam Seed Oil', 'Red Algae Extract', 'Frankincense'],
            'inci_tags' => ['silicone-primer', 'sunscreen-filters'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'reequil-ultra-matte-dry-touch-sunscreen-gel-spf50',
            'brand' => "Re'equil",
            'name' => 'Ultra Matte Dry Touch Sunscreen Gel SPF 50 PA++++',
            'category' => 'skincare',
            'mrp_inr' => 780,
            'size_label' => '50g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Silicone Elastomer Gel', 'Zinc Oxide', 'Titanium Dioxide', 'Water & Sweat Resistant'],
            'inci_tags' => ['silicone-primer', 'zinc-oxide', 'sunscreen-filters'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'supergoop-unseen-sunscreen-dupe-reequil-ultra-matte',
            'match_score' => 96,
            'summary' => 'Velvety, transparent silicone-gel primers that double as sweat-proof sunscreens and blur facial pores completely.',
            'notes' => "Re'equil is worshipped in Indian beauty forums for holding up through 40°C peak Delhi & Mumbai humidity."
        ]
    ],

    // 20. CeraVe Hydrating Cleanser vs Simple Kind to Skin Refreshing Facial Wash
    [
        'orig' => [
            'slug' => 'cerave-hydrating-facial-cleanser',
            'brand' => 'CeraVe',
            'name' => 'Hydrating Facial Cleanser for Normal to Dry Skin',
            'category' => 'skincare',
            'mrp_inr' => 1250,
            'size_label' => '236ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['3 Essential Ceramides (1, 3, 6-II)', 'Hyaluronic Acid', 'MVE Delivery Technology'],
            'inci_tags' => ['ceramides', 'hyaluronic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'simple-kind-to-skin-refreshing-facial-wash',
            'brand' => 'Simple',
            'name' => 'Kind to Skin Refreshing Facial Wash 100% Soap Free',
            'category' => 'skincare',
            'mrp_inr' => 385,
            'size_label' => '150ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Pro-Vitamin B5', 'Vitamin E', 'Triple Purified Water', '100% Soap Free'],
            'inci_tags' => ['panthenol', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cerave-hydrating-cleanser-dupe-simple-refreshing-wash',
            'match_score' => 92,
            'summary' => 'Soap-free, fragrance-free, hypoallergenic facial washes that cleanse thoroughly without leaving skin tight or squeaky.',
            'notes' => 'Simple is readily available in local Indian pharmacies and supermarkets at less than one-third the price.'
        ]
    ],

    // 21. Sunday Riley Good Genes Lactic Acid vs Minimalist Lactic Acid 10%
    [
        'orig' => [
            'slug' => 'sunday-riley-good-genes-lactic-acid-treatment',
            'brand' => 'Sunday Riley',
            'name' => 'Good Genes All-In-One Lactic Acid Treatment',
            'category' => 'skincare',
            'mrp_inr' => 7800,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Purified Grade Lactic Acid', 'Licorice', 'Lemongrass', 'Arnica'],
            'inci_tags' => ['lactic-acid', 'licorice'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-lactic-acid-10-hyaluronic-acid',
            'brand' => 'Minimalist',
            'name' => 'Lactic Acid 10% + Hyaluronic Acid 1%',
            'category' => 'skincare',
            'mrp_inr' => 599,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['10% Lactic Acid', '1% Hyaluronic Acid', 'Aloe Vera Juice'],
            'inci_tags' => ['lactic-acid', 'hyaluronic-acid', 'aloe-vera'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'sunday-riley-good-genes-dupe-minimalist-lactic-acid',
            'match_score' => 94,
            'summary' => 'Large-molecule alpha hydroxy acid treatments that gently resurface texture and boost cellular hydration overnight.',
            'notes' => 'Minimalist delivers identical 10% gentle lactic exfoliation, saving an incredible ₹7,201 per bottle.'
        ]
    ],

    // 22. Dr. Dennis Gross Alpha Beta Peel vs Minimalist AHA PHA BHA 32% Peel
    [
        'orig' => [
            'slug' => 'dr-dennis-gross-alpha-beta-universal-daily-peel',
            'brand' => 'Dr. Dennis Gross',
            'name' => 'Alpha Beta Universal Daily Peel Pad System',
            'category' => 'skincare',
            'mrp_inr' => 2200,
            'size_label' => '5 Treatments',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Glycolic Acid', 'Salicylic Acid', 'Lactic Acid', 'Malic Acid', 'Resveratrol'],
            'inci_tags' => ['glycolic-acid', 'salicylic-acid', 'lactic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-aha-pha-bha-32-peeling-solution',
            'brand' => 'Minimalist',
            'name' => 'AHA PHA BHA 32% Exfoliating Facial Peeling Solution',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['25% AHA (Glycolic + Lactic)', '5% PHA (Gluconolactone)', '2% BHA (Salicylic)', 'Aloe & Turmeric'],
            'inci_tags' => ['glycolic-acid', 'salicylic-acid', 'aloe-vera'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dr-dennis-gross-peel-dupe-minimalist-32-peel',
            'match_score' => 93,
            'summary' => 'Intense multi-acid resurfacing chemical peels that dissolve rough texture, tan lines, and clogged pores in 10 minutes.',
            'notes' => 'Minimalist provides 30ml (enough for 20+ full-face peel sessions) compared to just 5 single-use pad sachets from Dr. Dennis Gross.'
        ]
    ],

    // 23. Drunk Elephant C-Firma Fresh vs Minimalist 16% Vitamin C Serum
    [
        'orig' => [
            'slug' => 'drunk-elephant-c-firma-fresh-day-serum',
            'brand' => 'Drunk Elephant',
            'name' => 'C-Firma Fresh Day Serum 15% L-Ascorbic Acid',
            'category' => 'skincare',
            'mrp_inr' => 7200,
            'size_label' => '28ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['15% L-Ascorbic Acid', '0.5% Ferulic Acid', '1% Vitamin E', 'Pumpkin Ferment'],
            'inci_tags' => ['pure-vitamin-c', 'ferulic-acid', 'vitamin-e'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-16-vitamin-c-ferulic-serum',
            'brand' => 'Minimalist',
            'name' => '16% Vitamin C Face Serum with Ferulic Acid & Fullerene',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['16% Ethyl Ascorbic Acid', 'Ferulic Acid', 'Fullerene', 'Blood Orange Extract'],
            'inci_tags' => ['vitamin-c-derivative', 'ferulic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'drunk-elephant-c-firma-dupe-minimalist-16-vitamin-c',
            'match_score' => 95,
            'summary' => 'Powerhouse antioxidant serums that neutralize free radicals, stimulate collagen synthesis, and brighten sun damage.',
            'notes' => 'Minimalist utilizes Ethyl Ascorbic Acid which remains photostable and will not oxidize into orange dye in warm Indian room temperatures.'
        ]
    ],

    // 24. Rohto Melano CC Vitamin C vs Deconstruct 10% Vitamin C Serum
    [
        'orig' => [
            'slug' => 'rohto-melano-cc-intensive-anti-spot-essence',
            'brand' => 'Rohto Mentholatum',
            'name' => 'Melano CC Intensive Anti-Spot Vitamin C Essence',
            'category' => 'skincare',
            'mrp_inr' => 1450,
            'size_label' => '20ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Pure Vitamin C (Ascorbic Acid)', 'Vitamin E Derivative', 'Dipotassium Glycyrrhizate', 'Alpinia White'],
            'inci_tags' => ['pure-vitamin-c', 'vitamin-e', 'licorice'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'deconstruct-10-vitamin-c-ferulic-serum',
            'brand' => 'Deconstruct',
            'name' => '10% Vitamin C + 0.5% Ferulic Acid Brightening Serum',
            'category' => 'skincare',
            'mrp_inr' => 649,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['10% 3-O-Ethyl Ascorbic Acid', '0.5% Ferulic Acid', 'Hyaluronic Acid'],
            'inci_tags' => ['vitamin-c-derivative', 'ferulic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rohto-melano-cc-dupe-deconstruct-vitamin-c',
            'match_score' => 93,
            'summary' => 'Targeted spot treatments that fade persistent red and brown post-inflammatory hyperpigmentation (PIH) spots.',
            'notes' => 'Deconstruct provides a stabilized non-stinging formulation that layers cleanly under morning sunscreens.'
        ]
    ],

    // 25. SK-II Facial Treatment Essence vs Missha Time Revolution The First Essence
    [
        'orig' => [
            'slug' => 'sk-ii-facial-treatment-essence-pitera',
            'brand' => 'SK-II',
            'name' => 'Facial Treatment Essence with 90% Pitera',
            'category' => 'skincare',
            'mrp_inr' => 9500,
            'size_label' => '75ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['90%+ Pitera (Galactomyces Ferment Filtrate)', 'Vitamins', 'Amino Acids', 'Organic Acids'],
            'inci_tags' => ['galactomyces-ferment', 'fermented-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'missha-time-revolution-the-first-essence-5x',
            'brand' => 'Missha',
            'name' => 'Time Revolution The First Essence 5X Extreme Cica',
            'category' => 'skincare',
            'mrp_inr' => 2450,
            'size_label' => '150ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['97% Extreme Cica Yeast Ferment Filtrate', 'Niacinamide', 'Ceramides', 'Bifida Ferment'],
            'inci_tags' => ['fermented-extracts', 'niacinamide', 'ceramides'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'sk-ii-facial-essence-dupe-missha-first-essence',
            'match_score' => 96,
            'summary' => 'Celebrated as the most famous holy-grail dupe in global skincare. Fermented yeast filtrates that restore translucency and crystal-clear skin bounce.',
            'notes' => 'Missha gives 150ml (double the SK-II size) for ₹2,450 vs SK-II ₹9,500, saving you ₹7,050.'
        ]
    ],

    // 26. Kiehl's Clearly Corrective Dark Spot vs Derma Co 2% Alpha Arbutin
    [
        'orig' => [
            'slug' => 'kiehls-clearly-corrective-dark-spot-solution',
            'brand' => "Kiehl's",
            'name' => 'Clearly Corrective Dark Spot Solution',
            'category' => 'skincare',
            'mrp_inr' => 5600,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Activated C (Vitamin C derivative)', 'White Birch Extract', 'Peony Extract'],
            'inci_tags' => ['vitamin-c-derivative', 'botanical-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'the-derma-co-2-alpha-arbutin-dark-spot-serum',
            'brand' => 'The Derma Co',
            'name' => '2% Alpha Arbutin Dark Spot Face Serum with Kojic Acid',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['2% Alpha Arbutin', '1% Kojic Acid', 'Hyaluronic Acid'],
            'inci_tags' => ['alpha-arbutin', 'kojic-acid', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kiehls-clearly-corrective-dupe-derma-co-alpha-arbutin',
            'match_score' => 94,
            'summary' => 'Lightweight watery spot-correcting serums designed to diminish deep-set melasma and post-breakout scars.',
            'notes' => 'Derma Co incorporates Kojic Acid directly with Alpha Arbutin, blocking melanin transfer more aggressively than Kiehl’s at ₹5,101 less.'
        ]
    ],

    // 27. Murad Rapid Dark Spot Correcting vs Suganda 10% Niacinamide
    [
        'orig' => [
            'slug' => 'murad-rapid-dark-spot-correcting-serum',
            'brand' => 'Murad',
            'name' => 'Environmental Shield Rapid Dark Spot Correcting Serum',
            'category' => 'skincare',
            'mrp_inr' => 6800,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Patented Resorcinol Technology', 'Tranexamic Acid', 'Glycolic Acid', 'Hexylresorcinol'],
            'inci_tags' => ['tranexamic-acid', 'glycolic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'suganda-10-niacinamide-centella-serum',
            'brand' => 'Suganda',
            'name' => '10% Niacinamide + Centella Soothing Brightening Serum',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['10% Niacinamide', 'Centella Asiatica', 'Hyaluronic Acid', 'Panthenol'],
            'inci_tags' => ['niacinamide', 'centella', 'panthenol'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'murad-rapid-dark-spot-dupe-suganda-niacinamide',
            'match_score' => 91,
            'summary' => 'Both reverse stubborn discoloration caused by sun overexposure, acne marks, and hormonal changes.',
            'notes' => 'Suganda combines 10% pure Niacinamide with medicinal Centella, offering gentle barrier care for sensitive Indian skin.'
        ]
    ],

    // 28. Laneige Water Bank Blue Hyaluronic Cream vs Hyphen Barrier Care Cream
    [
        'orig' => [
            'slug' => 'laneige-water-bank-blue-hyaluronic-cream',
            'brand' => 'Laneige',
            'name' => 'Water Bank Blue Hyaluronic Cream Moisturizer',
            'category' => 'skincare',
            'mrp_inr' => 3050,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Micro-sized Blue Hyaluronic Acid', 'Ceramides', 'Beta-Glucan'],
            'inci_tags' => ['hyaluronic-acid', 'ceramides'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'hyphen-barrier-care-cream-oily-combination',
            'brand' => 'Hyphen',
            'name' => 'Barrier Care Cream with Ceramides & Peptides',
            'category' => 'skincare',
            'mrp_inr' => 449,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Ceramides', 'Peptides', 'Cica Extract', 'Hyaluronic Acid'],
            'inci_tags' => ['ceramides', 'copper-peptides', 'centella'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'laneige-water-bank-cream-dupe-hyphen-barrier-care',
            'match_score' => 93,
            'summary' => 'Silky soft gel-cream barrier balms that lock in deep hydration without feeling heavy in tropical climates.',
            'notes' => 'Hyphen provides skin-identical ceramides and firming peptides for ₹449 vs Laneige ₹3,050 (Save ₹2,601).'
        ]
    ],

    // 29. Tatcha The Dewy Skin Cream vs Conscious Chemist Multi-Hyaluronic Cream
    [
        'orig' => [
            'slug' => 'tatcha-the-dewy-skin-cream',
            'brand' => 'Tatcha',
            'name' => 'The Dewy Skin Cream Rich Hydration',
            'category' => 'skincare',
            'mrp_inr' => 6200,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Japanese Purple Rice', 'Okinawa Algae Complex', 'Hyaluronic Acid', 'Botanical Extracts'],
            'inci_tags' => ['rice-water', 'hyaluronic-acid', 'botanical-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'conscious-chemist-multi-hyaluronic-gel-cream',
            'brand' => 'Conscious Chemist',
            'name' => 'Multi-Hyaluronic Acid Gel Cream Moisturizer',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['7-Molecular Weight Hyaluronic Acid', 'Ceramide Complex', 'Polyglutamic Acid'],
            'inci_tags' => ['hyaluronic-acid', 'ceramides'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tatcha-dewy-skin-cream-dupe-conscious-chemist-gel-cream',
            'match_score' => 90,
            'summary' => 'Sumptuous glow-inducing creams that leave skin luminous, plump, and glass-like under wedding makeup.',
            'notes' => 'Conscious Chemist replicates that ultra-plumping dewy hydration at less than a tenth of Tatcha’s exorbitant luxury price tag.'
        ]
    ],

    // 30. First Aid Beauty Ultra Repair Cream vs Re'equil Ceramide Moisturiser
    [
        'orig' => [
            'slug' => 'first-aid-beauty-ultra-repair-cream',
            'brand' => 'First Aid Beauty',
            'name' => 'Ultra Repair Cream Intense Hydration',
            'category' => 'skincare',
            'mrp_inr' => 2900,
            'size_label' => '56.7g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Colloidal Oatmeal', 'Shea Butter', 'Ceramide 3', 'Allantoin'],
            'inci_tags' => ['colloidal-oatmeal', 'shea-butter', 'ceramides'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'reequil-ceramide-hyaluronic-acid-moisturiser',
            'brand' => "Re'equil",
            'name' => 'Ceramide & Hyaluronic Acid Moisturiser for Normal to Dry Skin',
            'category' => 'skincare',
            'mrp_inr' => 395,
            'size_label' => '100g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Ceramides III & VI', 'Hyaluronic Acid', 'Mango Seed Butter'],
            'inci_tags' => ['ceramides', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'first-aid-beauty-cream-dupe-reequil-ceramide',
            'match_score' => 95,
            'summary' => 'Dermatologist-recommended thick barrier crèmes that cure intense winter eczema, flaking, and dry skin tightness.',
            'notes' => "Re'equil provides a generous 100g tube for ₹395 vs FAB 56.7g for ₹2,900 (Save ₹2,505)."
        ]
    ],

    // 31. Drunk Elephant Protini Polypeptide vs Formula RX Barrier Plus
    [
        'orig' => [
            'slug' => 'drunk-elephant-protini-polypeptide-cream',
            'brand' => 'Drunk Elephant',
            'name' => 'Protini Polypeptide Cream Protein Moisturizer',
            'category' => 'skincare',
            'mrp_inr' => 6600,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['9 Signal Peptide Complex', 'Pygmy Waterlily Stem Cell Extract', 'Soybean Folic Acid Ferment'],
            'inci_tags' => ['copper-peptides', 'amino-acids'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'formula-rx-barrier-plus-ceramide-moisturizer',
            'brand' => 'The Formula RX',
            'name' => 'Barrier Plus Ceramide & Peptide Repair Moisturizer',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '50g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['5 Essential Ceramides', 'Peptide Complex', 'Cholesterol', 'Oat Extract'],
            'inci_tags' => ['ceramides', 'copper-peptides', 'cholesterol'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'drunk-elephant-protini-dupe-formula-rx-barrier-plus',
            'match_score' => 94,
            'summary' => 'Protein-packed bouncy gel moisturizers that restore dermal collagen elasticity, bounce, and barrier resilience.',
            'notes' => 'Formula RX replicates the exact physiological 3:1:1:1 lipid ratio alongside multi-peptides, saving you ₹5,901.'
        ]
    ],

    // 32. Glow Recipe Avocado Recovery Serum vs Dot & Key Cica Night Gel
    [
        'orig' => [
            'slug' => 'glow-recipe-avocado-ceramide-recovery-serum',
            'brand' => 'Glow Recipe',
            'name' => 'Avocado Ceramide Moisture Barrier Recovery Serum',
            'category' => 'skincare',
            'mrp_inr' => 3800,
            'size_label' => '30ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Avocado Butter & Extract', '5 Bio-Identical Ceramides', 'Allantoin', 'Rice Milk'],
            'inci_tags' => ['ceramides', 'avocado-oil', 'allantoin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-cica-niacinamide-calming-night-gel',
            'brand' => 'Dot & Key',
            'name' => 'Cica & Niacinamide Calming Night Gel with Green Tea',
            'category' => 'skincare',
            'mrp_inr' => 495,
            'size_label' => '60ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Centella Asiatica (Cica)', 'Niacinamide', 'Green Tea Extract', 'Tea Tree Oil'],
            'inci_tags' => ['centella', 'niacinamide', 'green-tea'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'glow-recipe-avocado-serum-dupe-dot-and-key-cica-gel',
            'match_score' => 92,
            'summary' => 'Cooling milky-gel soothers that calm hot redness, inflamed acne clusters, and irritated skin overnight.',
            'notes' => 'Dot & Key is customized for oily acne-prone Indian skin with zero pore-clogging avocado fats.'
        ]
    ],

    // 33. Krave Beauty Great Barrier Relief vs Suganda Damage Repair Gel
    [
        'orig' => [
            'slug' => 'krave-beauty-great-barrier-relief-serum',
            'brand' => 'Krave Beauty',
            'name' => 'Great Barrier Relief Tamanu Oil Restorative Serum',
            'category' => 'skincare',
            'mrp_inr' => 2600,
            'size_label' => '45ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['10% Tamanu Oil', 'Safflower Oil', 'Rosehip Oil', 'Ceramides', 'Niacinamide'],
            'inci_tags' => ['ceramides', 'niacinamide', 'botanical-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'suganda-centella-green-tea-damage-repair-gel',
            'brand' => 'Suganda',
            'name' => 'Centella Green Tea Damage Repair Soothing Gel',
            'category' => 'skincare',
            'mrp_inr' => 550,
            'size_label' => '50ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Centella Asiatica', 'Green Tea Extract', 'Panthenol', 'Hyaluronic Acid'],
            'inci_tags' => ['centella', 'green-tea', 'panthenol'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'krave-great-barrier-relief-dupe-suganda-damage-repair',
            'match_score' => 91,
            'summary' => 'Skin-repair treatments designed to rescue sensitized, over-exfoliated, or retinol-burned skin.',
            'notes' => 'Suganda delivers immediate anti-inflammatory cooling and soothing without heavy oils that could trigger breakouts.'
        ]
    ],

    // 34. Shiseido Clear Sunscreen Stick vs Plum Niacinamide Sunscreen Stick
    [
        'orig' => [
            'slug' => 'shiseido-clear-sunscreen-stick-spf50',
            'brand' => 'Shiseido',
            'name' => 'Clear Sunscreen Stick SPF 50+ SynchroShield',
            'category' => 'skincare',
            'mrp_inr' => 3200,
            'size_label' => '20g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['WetForce & HeatForce Tech', 'Licorice Root Extract', 'Invisible Glide Matrix'],
            'inci_tags' => ['sunscreen-filters', 'licorice'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-2-niacinamide-invisible-sunscreen-stick',
            'brand' => 'Plum',
            'name' => '2% Niacinamide Invisible Matte Sunscreen Stick SPF 50 PA++++',
            'category' => 'skincare',
            'mrp_inr' => 650,
            'size_label' => '15g',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['2% Niacinamide', 'Adenosine', 'Centella Extract', 'Matte Oil-Control Film'],
            'inci_tags' => ['niacinamide', 'centella', 'sunscreen-filters'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'shiseido-clear-sunscreen-stick-dupe-plum-sun-stick',
            'match_score' => 94,
            'summary' => 'Clear roll-on sunscreen sticks that allow effortless mess-free UV reapplication on the go directly over makeup.',
            'notes' => 'Plum glides on completely invisible without greasy shine, saving ₹2,550 over Shiseido.'
        ]
    ],

    // 35. Kose Softymo Speedy Cleansing Oil vs Deconstruct Soothing Cleansing Oil
    [
        'orig' => [
            'slug' => 'kose-softymo-speedy-cleansing-oil',
            'brand' => 'Kose Softymo',
            'name' => 'Speedy Cleansing Oil',
            'category' => 'skincare',
            'mrp_inr' => 1250,
            'size_label' => '230ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Mineral Oil', 'Olive Fruit Oil', 'Sesame Seed Oil', 'Jojoba Oil', 'Emulsifiers'],
            'inci_tags' => ['cleansing-oil', 'jojoba-oil'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'deconstruct-soothing-cleansing-oil-bisabolol',
            'brand' => 'Deconstruct',
            'name' => 'Soothing Cleansing Oil with 1% Bisabolol & Sweet Almond Oil',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '100ml',
            'swatch_hex' => null,
            'undertone' => null,
            'key_actives_or_notes' => ['Sweet Almond Oil', '1% Bisabolol', 'Vitamin E', 'Gentle Surfactants'],
            'inci_tags' => ['cleansing-oil', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kose-softymo-cleansing-oil-dupe-deconstruct-cleansing-oil',
            'match_score' => 95,
            'summary' => 'Effortlessly dissolves stubborn waterproof mascara, matte liquid lipstick, and silicone sunscreen without stinging the eyes.',
            'notes' => 'Deconstruct emulsifies into a pure milk with water and washes off cleanly with zero greasy film.'
        ]
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

$pdo->beginTransaction();
$count = 0;

foreach ($pairs as $item) {
    // 1. Original
    $orig = $item['orig'];
    $insertProd->execute([
        ':slug' => $orig['slug'],
        ':brand' => $orig['brand'],
        ':name' => $orig['name'],
        ':category' => $orig['category'],
        ':mrp_inr' => $orig['mrp_inr'],
        ':size_label' => $orig['size_label'],
        ':swatch_hex' => $orig['swatch_hex'],
        ':undertone' => $orig['undertone'],
        ':key_actives_or_notes' => json_encode($orig['key_actives_or_notes']),
        ':inci_tags' => json_encode($orig['inci_tags']),
        ':is_luxury' => $orig['is_luxury']
    ]);

    // 2. Dupe
    $dupe = $item['dupe'];
    $insertProd->execute([
        ':slug' => $dupe['slug'],
        ':brand' => $dupe['brand'],
        ':name' => $dupe['name'],
        ':category' => $dupe['category'],
        ':mrp_inr' => $dupe['mrp_inr'],
        ':size_label' => $dupe['size_label'],
        ':swatch_hex' => $dupe['swatch_hex'],
        ':undertone' => $dupe['undertone'],
        ':key_actives_or_notes' => json_encode($dupe['key_actives_or_notes']),
        ':inci_tags' => json_encode($dupe['inci_tags']),
        ':is_luxury' => $dupe['is_luxury']
    ]);

    $origId = $getId($orig['slug']);
    $dupeId = $getId($dupe['slug']);
    $savings = max(0, $orig['mrp_inr'] - $dupe['mrp_inr']);

    // 3. Dupe Record
    $dr = $item['dupe_record'];
    $insertDupe->execute([
        ':slug' => $dr['slug'],
        ':original_product_id' => $origId,
        ':dupe_product_id' => $dupeId,
        ':match_score' => $dr['match_score'],
        ':savings_inr' => $savings,
        ':comparison_summary' => $dr['summary'],
        ':texture_or_longevity_notes' => $dr['notes']
    ]);
    $count++;
}

$pdo->commit();

echo "✅ Successfully seeded Batch 2: {$count} K-Beauty & skincare dupe pairs (" . ($count * 2) . " total products)!\n";

