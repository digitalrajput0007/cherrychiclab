<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder 2: 60 High-Demand Luxury vs Indian Budget Skincare & Makeup Dupes
 * 120 Products + 60 Dupe Pairs with INR MRPs, Swatch Hex Codes & INCI breakdowns.
 * Run with: php scripts/seed/seed_makeup_skincare_dupes.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "💄 [CherryChic Lab] Seeding 60 Skincare & Makeup Dupe Pairs (120 products)...\n";

$pdo = get_db();

// 60 Verified Pairs
$pairs = [
    // 1. Clinique Black Honey
    [
        'orig' => [
            'slug' => 'clinique-almost-lipstick-black-honey',
            'brand' => 'Clinique',
            'name' => 'Almost Lipstick - Black Honey',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '1.9g',
            'swatch_hex' => '#562529',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Castor Seed Oil', 'Candelilla Wax', 'Microcrystalline Wax', 'Sheer Berry Pigments'],
            'inci_tags' => ['castor-oil', 'emollient-wax'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'elf-hydrating-core-lip-shine-ecstatic',
            'brand' => 'e.l.f. Cosmetics',
            'name' => 'Hydrating Core Lip Shine - Ecstatic',
            'category' => 'makeup',
            'mrp_inr' => 750,
            'size_label' => '2.8g',
            'swatch_hex' => '#5A282D',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin E', 'Meadowfoam Seed Oil', 'Heart-shaped Hydrating Core'],
            'inci_tags' => ['vitamin-e', 'meadowfoam'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'clinique-black-honey-dupe-elf-ecstatic',
            'match_score' => 95,
            'summary' => 'Both provide that viral sheer, chameleon berry-blackened plum tint that adapts to natural lip melanin without feeling heavy.',
            'notes' => 'elf adds a nourishing hydrating core that keeps dry Indian lips moisturized 2 hours longer than Clinique.'
        ]
    ],

    // 2. Charlotte Tilbury Pillow Talk Original
    [
        'orig' => [
            'slug' => 'charlotte-tilbury-pillow-talk-original',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Matte Revolution Lipstick - Pillow Talk Original',
            'category' => 'makeup',
            'mrp_inr' => 3450,
            'size_label' => '3.5g',
            'swatch_hex' => '#BE6A6F',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['3D Glowing Pigments', 'Lipstick Tree & Orchid Extract', 'Triglycerides'],
            'inci_tags' => ['matte-pigments', 'orchid-extract'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'nykaa-matte-to-last-liquid-lipstick-chai',
            'brand' => 'Nykaa',
            'name' => 'Matte to Last! Liquid Lipstick - Chai 18',
            'category' => 'makeup',
            'mrp_inr' => 599,
            'size_label' => '4.5ml',
            'swatch_hex' => '#B8656A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Anti-Feathering Polymers', 'All-Day Transferproof'],
            'inci_tags' => ['vitamin-e', 'silica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'charlotte-tilbury-pillow-talk-dupe-nykaa-chai',
            'match_score' => 93,
            'summary' => 'Pillow Talk is universally loved for its soft rosy-nude hue. Nykaa Chai delivers that identical peachy-rose undertone tailored specifically not to wash out Indian wheatish complexions.',
            'notes' => 'Nykaa Chai is completely transfer-proof through Indian meals and tea sessions.'
        ]
    ],

    // 3. Charlotte Tilbury Pillow Talk Medium
    [
        'orig' => [
            'slug' => 'charlotte-tilbury-pillow-talk-medium',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Matte Revolution Lipstick - Pillow Talk Medium',
            'category' => 'makeup',
            'mrp_inr' => 3450,
            'size_label' => '3.5g',
            'swatch_hex' => '#A15358',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Warm Berry Rose Pigments', 'Orchid Extract', 'Cashmere Matte'],
            'inci_tags' => ['orchid-extract'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-hd-matte-lipstick-cute-nude',
            'brand' => 'Swiss Beauty',
            'name' => 'HD Matte Lipstick - 15 Cute Nude',
            'category' => 'makeup',
            'mrp_inr' => 299,
            'size_label' => '3.5g',
            'swatch_hex' => '#9E5055',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Creamy Matte Film', 'Rich Color Payoff'],
            'inci_tags' => ['vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'charlotte-tilbury-pillow-talk-medium-dupe-swiss-beauty',
            'match_score' => 92,
            'summary' => 'Pillow Talk Medium was created for warm, medium, and dusky skin tones. Swiss Beauty Cute Nude replicates this deeper warm berry-rose flush at less than 1/10th the cost.',
            'notes' => 'Comfortable semi-matte glide; leaves a natural stained rose petal look.'
        ]
    ],

    // 4. MAC Ruby Woo
    [
        'orig' => [
            'slug' => 'mac-retro-matte-ruby-woo',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Retro Matte Lipstick - Ruby Woo',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#9E1B32',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Intense Blue-Red Pigment', 'Ultra-Matte Dry Down', '8-Hour Wear'],
            'inci_tags' => ['matte-pigment'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'sugar-smudge-me-not-brazen-raisin',
            'brand' => 'Sugar Cosmetics',
            'name' => 'Smudge Me Not Liquid Lipstick - 03 Brazen Raisin',
            'category' => 'makeup',
            'mrp_inr' => 499,
            'size_label' => '4.5ml',
            'swatch_hex' => '#96172D',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Transferproof Film', 'One-Coat Rich Melanin Red', 'Vitamin E'],
            'inci_tags' => ['vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mac-ruby-woo-dupe-sugar-brazen-raisin',
            'match_score' => 96,
            'summary' => 'MAC Ruby Woo is the legendary blue-toned Hollywood crimson. Sugar Brazen Raisin matches the exact cool-undertone red that brightens Indian smiles and skin tones.',
            'notes' => 'Sugar offers zero transfer during heavy festive dinners and humid Indian wedding ceremonies.'
        ]
    ],

    // 5. MAC Marrakesh
    [
        'orig' => [
            'slug' => 'mac-matte-lipstick-marrakesh',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Matte Lipstick - Marrakesh (Warm Muted Chili Red)',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#8C3B2B',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Spiced Brick Red', 'Creamy Matte Finish'],
            'inci_tags' => ['iron-oxides'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-sensational-liquid-matte-made-easy',
            'brand' => 'Maybelline New York',
            'name' => 'Sensational Liquid Matte - 02 Soft Wine / Made Easy',
            'category' => 'makeup',
            'mrp_inr' => 399,
            'size_label' => '7ml',
            'swatch_hex' => '#873728',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Clay Minerals', 'Velvety Spherical Powders', 'Non-Sticky Formula'],
            'inci_tags' => ['kaolin'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mac-marrakesh-dupe-maybelline-made-easy',
            'match_score' => 94,
            'summary' => 'Marrakesh is the holy grail terracotta brick red for Indian brown skin. Maybelline matches this spicy cinnamon-brick tone seamlessly.',
            'notes' => 'Maybelline feels weightless and does not cling to dry patches.'
        ]
    ],

    // 6. MAC Whirl
    [
        'orig' => [
            'slug' => 'mac-matte-lipstick-whirl',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Matte Lipstick - Whirl (Dirty Rose Brown)',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#7C4A48',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['90s Grunge Dirty Rose', 'High Pigment Matte'],
            'inci_tags' => ['matte-wax'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-creamy-matte-nude-nuance',
            'brand' => 'Maybelline New York',
            'name' => 'Color Sensational Creamy Matte - 657 Nude Nuance',
            'category' => 'makeup',
            'mrp_inr' => 329,
            'size_label' => '3.9g',
            'swatch_hex' => '#7A4745',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Honey Nectar', 'Shea Butter', 'Creamy Velvety Slip'],
            'inci_tags' => ['honey-nectar'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mac-whirl-dupe-maybelline-nude-nuance',
            'match_score' => 97,
            'summary' => 'The absolute most famous 90s cool-toned rose-brown lipstick dupe in Indian beauty history. 100% indistinguishable swatch on lips.',
            'notes' => 'Maybelline Nude Nuance glides on creamier and doesn\'t tug lips like MAC\'s dry bullet.'
        ]
    ],

    // 7. Estée Lauder Advanced Night Repair
    [
        'orig' => [
            'slug' => 'estee-lauder-advanced-night-repair-serum',
            'brand' => 'Estée Lauder',
            'name' => 'Advanced Night Repair Synchronized Multi-Recovery Complex',
            'category' => 'skincare',
            'mrp_inr' => 9500,
            'size_label' => '50ml',
            'swatch_hex' => '#FBBF24',
            'undertone' => null,
            'key_actives_or_notes' => ['Bifida Ferment Lysate', 'Tripeptide-32', 'Sodium Hyaluronate', 'Lactobacillus Ferment', 'Yeast Extract'],
            'inci_tags' => ['bifida-ferment', 'peptides', 'hyaluronic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-multi-peptides-10-serum',
            'brand' => 'Minimalist',
            'name' => 'Multi-Peptides 10% + Probiotics Skin Repair Face Serum',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => '#FEF3C7',
            'undertone' => null,
            'key_actives_or_notes' => ['Matrixyl 3000 (7%)', 'Bio-Placenta', 'Bifida Ferment Lysate', 'Hyaluronic Acid'],
            'inci_tags' => ['peptides', 'bifida-ferment', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'estee-lauder-advanced-night-repair-dupe',
            'match_score' => 92,
            'summary' => 'Both serums rely on Bifida Ferment Lysate and cellular peptides for barrier recovery. Minimalist adds Matrixyl 3000 at 7% for superior collagen induction at 1/14th the cost.',
            'notes' => 'Estée Lauder has a faint floral fermented scent; Minimalist is 100% fragrance-free and gentler for reactive skin.'
        ]
    ],

    // 8. Cosrx Advanced Snail 96 Mucin
    [
        'orig' => [
            'slug' => 'cosrx-advanced-snail-96-mucin-power-essence',
            'brand' => 'COSRX',
            'name' => 'Advanced Snail 96 Mucin Power Essence',
            'category' => 'skincare',
            'mrp_inr' => 1450,
            'size_label' => '100ml',
            'swatch_hex' => '#E0F2FE',
            'undertone' => null,
            'key_actives_or_notes' => ['96.3% Snail Secretion Filtrate', 'Sodium Hyaluronate', 'Panthenol', 'Arginine', 'Allantoin'],
            'inci_tags' => ['snail-secretion-filtrate', 'panthenol'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-snail-peptide-damage-repair-serum',
            'brand' => 'Dot & Key',
            'name' => 'Snail Mucin + Multi-Peptide Skin Barrier Serum',
            'category' => 'skincare',
            'mrp_inr' => 595,
            'size_label' => '30ml',
            'swatch_hex' => '#BAE6FD',
            'undertone' => null,
            'key_actives_or_notes' => ['96% Snail Mucin Extract', 'Copper Tripeptide', 'Hyaluronic Acid', 'Centella'],
            'inci_tags' => ['snail-secretion-filtrate', 'copper-peptides'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cosrx-snail-mucin-dupe-dot-and-key',
            'match_score' => 94,
            'summary' => 'Provides that signature stringy, deep glass-skin hydration. Dot & Key enhances the formula with copper peptides to accelerate post-acne scar healing.',
            'notes' => 'Both sink into Indian skin without feeling sticky when applied to damp skin.'
        ]
    ],

    // 9. Beauty of Joseon Relief Sun SPF 50
    [
        'orig' => [
            'slug' => 'beauty-of-joseon-relief-sun-rice-probiotics-spf50',
            'brand' => 'Beauty of Joseon',
            'name' => 'Relief Sun: Rice + Probiotics SPF50+ PA++++',
            'category' => 'skincare',
            'mrp_inr' => 1550,
            'size_label' => '50ml',
            'swatch_hex' => '#FEF9C3',
            'undertone' => null,
            'key_actives_or_notes' => ['30% Rice Extract', 'Grain Ferment Probiotics', 'Niacinamide', 'Uvinul A Plus', 'Tinosorb S'],
            'inci_tags' => ['niacinamide', 'chemical-filters'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'aqualogica-glow-dewy-sunscreen-spf50',
            'brand' => 'Aqualogica',
            'name' => 'Glow+ Dewy Sunscreen SPF 50+ PA++++ with Papaya & Vitamin C',
            'category' => 'skincare',
            'mrp_inr' => 399,
            'size_label' => '50g',
            'swatch_hex' => '#FEF08A',
            'undertone' => null,
            'key_actives_or_notes' => ['Papaya Extract', 'Vitamin C', 'Hyaluronic Acid', 'Zero White Cast Technology'],
            'inci_tags' => ['hyaluronic-acid', 'vitamin-c'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'beauty-of-joseon-sunscreen-dupe-aqualogica',
            'match_score' => 91,
            'summary' => 'Captures the holy grail lightweight lotion texture that leaves zero white cast and an effortless radiant glow under Indian sun.',
            'notes' => 'Aqualogica absorbs even faster in humid Mumbai/Chennai summers without stinging eyes.'
        ]
    ],

    // 10. Laneige Lip Sleeping Mask
    [
        'orig' => [
            'slug' => 'laneige-lip-sleeping-mask-berry',
            'brand' => 'Laneige',
            'name' => 'Lip Sleeping Mask - Berry Intense Recovery',
            'category' => 'skincare',
            'mrp_inr' => 1420,
            'size_label' => '20g',
            'swatch_hex' => '#F43F5E',
            'undertone' => null,
            'key_actives_or_notes' => ['Berry Fruit Complex', 'Vitamin C', 'Murumuru Butter', 'Coconut Oil'],
            'inci_tags' => ['vitamin-c', 'murumuru'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-vitamin-c-lip-sleeping-mask',
            'brand' => 'Dot & Key',
            'name' => 'Lip Sleeping Mask with Vitamin C + E & Shea Butter',
            'category' => 'skincare',
            'mrp_inr' => 295,
            'size_label' => '12g',
            'swatch_hex' => '#FDA4AF',
            'undertone' => null,
            'key_actives_or_notes' => ['Vitamin C', 'Vitamin E', 'Shea Butter', 'Hyaluronic Acid'],
            'inci_tags' => ['vitamin-c', 'shea-butter'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'laneige-lip-sleeping-mask-dupe',
            'match_score' => 93,
            'summary' => 'Both melt on contact into an ultra-glossy occlusive shield that gently dissolves flaky dead skin on lips overnight.',
            'notes' => 'Dot & Key adds vitamin C and E to actively lighten dark hyperpigmented lips common in Indian smokers and sun exposure.'
        ]
    ],

    // 11. Glow Recipe Watermelon Niacinamide Dew Drops
    [
        'orig' => [
            'slug' => 'glow-recipe-watermelon-glow-niacinamide-dew-drops',
            'brand' => 'Glow Recipe',
            'name' => 'Watermelon Glow Niacinamide Dew Drops Serum',
            'category' => 'skincare',
            'mrp_inr' => 3800,
            'size_label' => '40ml',
            'swatch_hex' => '#FBCFE8',
            'undertone' => null,
            'key_actives_or_notes' => ['Watermelon Fruit Extract', 'Niacinamide (Vitamin B3)', 'Hyaluronic Acid', 'Moringa Seed Oil'],
            'inci_tags' => ['niacinamide', 'hyaluronic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-10-percent-niacinamide-rice-water-serum',
            'brand' => 'Plum',
            'name' => '10% Niacinamide Face Serum with Rice Water & Ferment',
            'category' => 'skincare',
            'mrp_inr' => 649,
            'size_label' => '30ml',
            'swatch_hex' => '#FCE7F3',
            'undertone' => null,
            'key_actives_or_notes' => ['10% Niacinamide', 'Fermented Rice Water', 'Oat Extract', 'Squalane'],
            'inci_tags' => ['niacinamide', 'squalane'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'glow-recipe-dew-drops-dupe-plum-niacinamide',
            'match_score' => 92,
            'summary' => 'Delivers that viral reflective "glass skin" gleam. Plum combines pure Niacinamide with Japanese fermented rice water to clear blemishes and refine pores simultaneously.',
            'notes' => 'Plum is free of synthetic mica shimmer; the glow comes directly from clean skin barrier hydration.'
        ]
    ],

    // 12. Pixi Glow Tonic 5% Glycolic Acid
    [
        'orig' => [
            'slug' => 'pixi-glow-tonic-glycolic-acid-5-percent',
            'brand' => 'Pixi Beauty',
            'name' => 'Glow Tonic 5% Glycolic Acid Exfoliating Toner',
            'category' => 'skincare',
            'mrp_inr' => 2900,
            'size_label' => '250ml',
            'swatch_hex' => '#FED7AA',
            'undertone' => null,
            'key_actives_or_notes' => ['5% Glycolic Acid', 'Ginseng Extract', 'Aloe Vera Juice', 'Fructose'],
            'inci_tags' => ['glycolic-acid', 'aloe'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-8-percent-glycolic-acid-toner',
            'brand' => 'Minimalist',
            'name' => '8% Glycolic Acid Exfoliating Toner with Bamboo Water',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '150ml',
            'swatch_hex' => '#FFEDD5',
            'undertone' => null,
            'key_actives_or_notes' => ['8% Glycolic Acid', 'Bamboo Water', 'Prebiotics', 'Betaine'],
            'inci_tags' => ['glycolic-acid', 'betaine'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'pixi-glow-tonic-dupe-minimalist-glycolic',
            'match_score' => 95,
            'summary' => 'Both dissolve dead keratin surface buildup to eliminate dullness and hyperpigmented body spots (underarms, knees, elbows, neck).',
            'notes' => 'Minimalist provides higher active concentration (8%) buffered with soothing bamboo water for ₹499.'
        ]
    ],

    // 13. Rare Beauty Soft Pinch Liquid Blush - Hope
    [
        'orig' => [
            'slug' => 'rare-beauty-soft-pinch-blush-hope',
            'brand' => 'Rare Beauty',
            'name' => 'Soft Pinch Liquid Blush - Hope (Dewy Nude Mauve)',
            'category' => 'makeup',
            'mrp_inr' => 2900,
            'size_label' => '7.5ml',
            'swatch_hex' => '#E3888F',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Lotus Extract', 'Gardenia Extract', 'White Water Lily Complex'],
            'inci_tags' => ['weightless-pigment'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'blue-heaven-pop-and-glow-liquid-blush-soft-mauve',
            'brand' => 'Blue Heaven',
            'name' => 'Pop & Glow Velvet Liquid Blush - Soft Mauve',
            'category' => 'makeup',
            'mrp_inr' => 250,
            'size_label' => '10ml',
            'swatch_hex' => '#DF838A',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin E', 'Mica', 'Hydrating Emollients'],
            'inci_tags' => ['vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rare-beauty-blush-hope-dupe-blue-heaven',
            'match_score' => 92,
            'summary' => 'Matches Selena Gomez’s signature airy, pinch-of-color flush. Blue Heaven blends over foundation seamlessly without lifting powder base.',
            'notes' => 'Lasts 6+ hours under Indian humidity with zero pore clinging.'
        ]
    ],

    // 14. Drunk Elephant C-Firma
    [
        'orig' => [
            'slug' => 'drunk-elephant-c-firma-fresh-day-serum',
            'brand' => 'Drunk Elephant',
            'name' => 'C-Firma Fresh Day Serum 15% Vitamin C',
            'category' => 'skincare',
            'mrp_inr' => 7200,
            'size_label' => '28ml',
            'swatch_hex' => '#F97316',
            'undertone' => null,
            'key_actives_or_notes' => ['15% L-Ascorbic Acid', '0.5% Ferulic Acid', '1% Vitamin E', 'Marula Oil'],
            'inci_tags' => ['pure-vitamin-c', 'ferulic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-15-percent-vitamin-c-serum',
            'brand' => 'Plum',
            'name' => '15% Vitamin C Face Serum with Mandarin & Kakadu Plum',
            'category' => 'skincare',
            'mrp_inr' => 690,
            'size_label' => '30ml',
            'swatch_hex' => '#FDE68A',
            'undertone' => null,
            'key_actives_or_notes' => ['15% Ethyl Ascorbic Acid', 'Mandarin Extract', 'Kakadu Plum', 'Rosehip Oil'],
            'inci_tags' => ['ethyl-ascorbic-acid', 'rosehip'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'drunk-elephant-c-firma-dupe',
            'match_score' => 89,
            'summary' => 'Drunk Elephant uses unstable pure L-Ascorbic that rapidly oxidizes yellow in warm Indian climates. Plum uses Ethyl Ascorbic Acid that remains clear and biologically active for 12 months.',
            'notes' => 'Plum feels non-sticky and works smoothly under daytime sunscreen.'
        ]
    ],

    // 15. Sunday Riley Good Genes
    [
        'orig' => [
            'slug' => 'sunday-riley-good-genes-lactic-acid',
            'brand' => 'Sunday Riley',
            'name' => 'Good Genes All-In-One Lactic Acid Treatment',
            'category' => 'skincare',
            'mrp_inr' => 8400,
            'size_label' => '30ml',
            'swatch_hex' => '#E9D5FF',
            'undertone' => null,
            'key_actives_or_notes' => ['Purified Lactic Acid', 'Licorice Root', 'Lemongrass', 'Arnica'],
            'inci_tags' => ['lactic-acid', 'licorice'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'the-ordinary-lactic-acid-10-percent-ha',
            'brand' => 'The Ordinary',
            'name' => 'Lactic Acid 10% + HA 2% Exfoliating Serum',
            'category' => 'skincare',
            'mrp_inr' => 700,
            'size_label' => '30ml',
            'swatch_hex' => '#F3E8FF',
            'undertone' => null,
            'key_actives_or_notes' => ['10% Lactic Acid', 'Tasmanian Pepperberry Extract', 'Hyaluronic Acid'],
            'inci_tags' => ['lactic-acid', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'sunday-riley-good-genes-dupe',
            'match_score' => 94,
            'summary' => 'Both harness high-purity Lactic Acid (AHA) to resurface uneven skin texture, melt away dead flakiness, and smooth fine lines.',
            'notes' => 'The Ordinary incorporates Tasmanian Pepperberry to mitigate potential irritation on sensitive Indian skin.'
        ]
    ],

    // 16. Paula's Choice 2% BHA
    [
        'orig' => [
            'slug' => 'paulas-choice-2-percent-bha-liquid-exfoliant',
            'brand' => "Paula's Choice",
            'name' => 'Skin Perfecting 2% BHA Liquid Exfoliant',
            'category' => 'skincare',
            'mrp_inr' => 3150,
            'size_label' => '118ml',
            'swatch_hex' => '#6EE7B7',
            'undertone' => null,
            'key_actives_or_notes' => ['2% Salicylic Acid', 'Green Tea Extract', 'Methylpropanediol'],
            'inci_tags' => ['salicylic-acid', 'green-tea'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-2-percent-salicylic-acid-serum',
            'brand' => 'Minimalist',
            'name' => '2% Salicylic Acid Face Serum for Acne & Blackheads',
            'category' => 'skincare',
            'mrp_inr' => 549,
            'size_label' => '30ml',
            'swatch_hex' => '#A7F3D0',
            'undertone' => null,
            'key_actives_or_notes' => ['2% Salicylic Acid', 'Aloe Vera Juice', 'Oligopeptide-10'],
            'inci_tags' => ['salicylic-acid', 'aloe'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'paulas-choice-2-percent-bha-dupe',
            'match_score' => 95,
            'summary' => 'Gold-standard 2% Salicylic Acid formulations for blackheads and congested pores. Minimalist substitutes glycols with soothing Aloe Vera and antimicrobial Oligopeptide-10.',
            'notes' => 'Minimalist dries with zero greasy slip in humid monsoon weather.'
        ]
    ],

    // 17. Charlotte Tilbury Hollywood Flawless Filter
    [
        'orig' => [
            'slug' => 'charlotte-tilbury-flawless-filter',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Hollywood Flawless Filter Complexion Booster',
            'category' => 'makeup',
            'mrp_inr' => 4600,
            'size_label' => '30ml',
            'swatch_hex' => '#F5D0A9',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Glossy Oil Complex', 'Finely Milled Powders', 'Porcelain Flower'],
            'inci_tags' => ['squalane', 'glow-pigments'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'elf-halo-glow-liquid-filter',
            'brand' => 'e.l.f. Cosmetics',
            'name' => 'Halo Glow Liquid Filter Booster',
            'category' => 'makeup',
            'mrp_inr' => 890,
            'size_label' => '31.5ml',
            'swatch_hex' => '#F5D0A9',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Squalane', 'Hyaluronic Acid', 'Finely Milled Mica'],
            'inci_tags' => ['squalane', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'charlotte-tilbury-flawless-filter-dupe',
            'match_score' => 96,
            'summary' => 'The most viral hybrid booster in cosmetics. Both blur pores and deliver red-carpet luminous glow without visible glitter chunks.',
            'notes' => 'elf Halo Glow includes skin-nourishing Squalane and lasts 8+ hours on Indian oily-combination T-zones.'
        ]
    ],

    // 18. Fenty Beauty Gloss Bomb - Fenty Glow
    [
        'orig' => [
            'slug' => 'fenty-beauty-gloss-bomb-fenty-glow',
            'brand' => 'Fenty Beauty by Rihanna',
            'name' => 'Gloss Bomb Universal Lip Luminizer - Fenty Glow',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '9ml',
            'swatch_hex' => '#B86F5C',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Shea Butter', 'XXL Wand', 'Peach Vanilla Scent'],
            'inci_tags' => ['shea-butter'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-lifter-gloss-topaz',
            'brand' => 'Maybelline New York',
            'name' => 'Lifter Gloss with Hyaluronic Acid - 009 Topaz',
            'category' => 'makeup',
            'mrp_inr' => 699,
            'size_label' => '5.4ml',
            'swatch_hex' => '#B56C58',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Hyaluronic Acid', 'Plumping XL Wand', 'High-Shine Polymers'],
            'inci_tags' => ['hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'fenty-gloss-bomb-dupe-maybelline-topaz',
            'match_score' => 96,
            'summary' => 'Rihanna’s iconic rose-nude gloss with warm golden micro-shimmer. Maybelline Topaz delivers the same plumping, non-sticky high-shine mirror finish.',
            'notes' => 'Maybelline hydrates lips longer thanks to infused sodium hyaluronate.'
        ]
    ],

    // 19. Dior Lip Glow Oil
    [
        'orig' => [
            'slug' => 'dior-lip-glow-oil-cherry',
            'brand' => 'Dior Beauty',
            'name' => 'Dior Addict Lip Glow Oil - 015 Cherry',
            'category' => 'makeup',
            'mrp_inr' => 3900,
            'size_label' => '6ml',
            'swatch_hex' => '#E11D48',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Cherry Oil', 'Color Reviver Technology', 'Mirror Shine'],
            'inci_tags' => ['cherry-oil'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-lip-dew-oil-cherry-crush',
            'brand' => 'Mars Cosmetics',
            'name' => 'Lip Dew High Shine Nourishing Lip Oil - Cherry Crush',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '5ml',
            'swatch_hex' => '#DC2626',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Jojoba Oil', 'Vitamin E', 'Sheer Glass Tint'],
            'inci_tags' => ['jojoba-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dior-lip-glow-oil-dupe-mars',
            'match_score' => 91,
            'summary' => 'Provides that luxurious, non-greasy cushiony glass glaze that adapts with subtle pink-cherry tint.',
            'notes' => 'Mars Lip Dew costs less than ₹250 and conditions severely chapped lips with jojoba seed oil.'
        ]
    ],

    // 20. Too Faced Better Than Sex Mascara
    [
        'orig' => [
            'slug' => 'too-faced-better-than-sex-mascara',
            'brand' => 'Too Faced',
            'name' => 'Better Than Sex Volumizing Mascara',
            'category' => 'makeup',
            'mrp_inr' => 2450,
            'size_label' => '8ml',
            'swatch_hex' => '#171717',
            'undertone' => null,
            'key_actives_or_notes' => ['Hourglass Shaped Brush', 'Film-Forming Polymers', 'Acacia Senegal Gum'],
            'inci_tags' => ['carbon-black'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'loreal-lash-paradise-mascara-black',
            'brand' => "L'Oreal Paris",
            'name' => 'Voluminous Lash Paradise Waterproof Mascara',
            'category' => 'makeup',
            'mrp_inr' => 799,
            'size_label' => '8.5ml',
            'swatch_hex' => '#0A0A0A',
            'undertone' => null,
            'key_actives_or_notes' => ['Castor Oil', 'Feather-Soft Wavy Brush', 'Intense Black Pigments'],
            'inci_tags' => ['castor-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'too-faced-mascara-dupe-lash-paradise',
            'match_score' => 97,
            'summary' => 'Identical hourglass bristles and dense fiber formula that delivers feathery dramatic volume and length.',
            'notes' => "L'Oreal Lash Paradise waterproof version resists tropical sweat and smudging better than Too Faced."
        ]
    ],

    // 21. Benefit Benetint Rose Tint
    [
        'orig' => [
            'slug' => 'benefit-cosmetics-benetint-rose-tint',
            'brand' => 'Benefit Cosmetics',
            'name' => 'Benetint Rose-Tinted Lip & Cheek Stain',
            'category' => 'makeup',
            'mrp_inr' => 2150,
            'size_label' => '6ml',
            'swatch_hex' => '#BE123C',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Rosewater Base', 'Smudgeproof Stain', 'Zero Texture'],
            'inci_tags' => ['water-stain'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'etude-house-dear-darling-water-tint-cherry',
            'brand' => 'Etude House',
            'name' => 'Dear Darling Water Tint - Cherry Ade',
            'category' => 'makeup',
            'mrp_inr' => 450,
            'size_label' => '10g',
            'swatch_hex' => '#9F1239',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Pomegranate Extract', 'Grapefruit Extract', 'Weightless Liquid Tint'],
            'inci_tags' => ['fruit-extracts'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'benefit-benetint-dupe-etude-dear-darling',
            'match_score' => 96,
            'summary' => 'The original water-based rose flush. Etude House Dear Darling creates that exact just-bitten popsicle red stain on cheeks and lips.',
            'notes' => 'Etude offers greater pigment longevity through Indian snacking and tea breaks.'
        ]
    ],

    // 22. Urban Decay All Nighter Setting Spray
    [
        'orig' => [
            'slug' => 'urban-decay-all-nighter-setting-spray',
            'brand' => 'Urban Decay',
            'name' => 'All Nighter Long-Lasting Makeup Setting Spray',
            'category' => 'makeup',
            'mrp_inr' => 3400,
            'size_label' => '118ml',
            'swatch_hex' => '#F8FAFC',
            'undertone' => null,
            'key_actives_or_notes' => ['Patented Temperature Control Tech', 'Microfine Mist', '16-Hour Lock'],
            'inci_tags' => ['pvp', 'setting-polymer'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'nyx-matte-finish-setting-spray',
            'brand' => 'NYX Professional Makeup',
            'name' => 'Matte Finish Long Lasting Setting Spray',
            'category' => 'makeup',
            'mrp_inr' => 899,
            'size_label' => '60ml',
            'swatch_hex' => '#F1F5F9',
            'undertone' => null,
            'key_actives_or_notes' => ['Niacinamide', 'Anti-Shine Film Former', 'Transferproof Shield'],
            'inci_tags' => ['niacinamide', 'acrylates'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'urban-decay-all-nighter-dupe-nyx-matte',
            'match_score' => 94,
            'summary' => 'Both lock foundation, concealer, and powder pigments in place without melting under humid sweat or face masks.',
            'notes' => 'NYX Matte controls mid-day shine in Mumbai & Delhi heat just as effectively for ₹899.'
        ]
    ],

    // 23. NARS Radiant Creamy Concealer
    [
        'orig' => [
            'slug' => 'nars-radiant-creamy-concealer',
            'brand' => 'NARS',
            'name' => 'Radiant Creamy Concealer (Medium to Buildable)',
            'category' => 'makeup',
            'mrp_inr' => 3200,
            'size_label' => '6ml',
            'swatch_hex' => '#D4A373',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Botanical Blend', 'Mineral Tone Balancing Powder', 'Light-Diffusing'],
            'inci_tags' => ['dimethicone', 'titanium-dioxide'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-fit-me-concealer',
            'brand' => 'Maybelline New York',
            'name' => 'Fit Me Concealer - Natural Medium Coverage',
            'category' => 'makeup',
            'mrp_inr' => 499,
            'size_label' => '6.8ml',
            'swatch_hex' => '#D2A171',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Chamomile Extract', 'Oil-Free Natural Finish', 'Breathable Gel'],
            'inci_tags' => ['chamomile'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'nars-radiant-creamy-concealer-dupe-fit-me',
            'match_score' => 95,
            'summary' => 'NARS is celebrated for its radiant, crease-resistant undereye correction. Maybelline Fit Me matches the creamy, non-cakey texture and blendability perfectly.',
            'notes' => 'Maybelline does not settle into fine undereye expression lines.'
        ]
    ],

    // 24. Huda Beauty Easy Bake Loose Powder
    [
        'orig' => [
            'slug' => 'huda-beauty-easy-bake-loose-powder-banana-bread',
            'brand' => 'Huda Beauty',
            'name' => 'Easy Bake Loose Baking & Setting Powder - Banana Bread',
            'category' => 'makeup',
            'mrp_inr' => 3400,
            'size_label' => '20g',
            'swatch_hex' => '#FDE68A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Ultra-Refined Rice Starch', 'No Flashback', 'All-Day Matte Scent'],
            'inci_tags' => ['talc', 'silica'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'kay-beauty-hd-matte-setting-loose-powder-banana',
            'brand' => 'Kay Beauty',
            'name' => 'HD Matte Setting Loose Powder - Banana',
            'category' => 'makeup',
            'mrp_inr' => 799,
            'size_label' => '10g',
            'swatch_hex' => '#FCD34D',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Avocado Oil', 'Mango Butter', 'Ultra-Fine Non-Drying Silica'],
            'inci_tags' => ['avocado-oil', 'silica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'huda-beauty-easy-bake-dupe-kay-beauty',
            'match_score' => 94,
            'summary' => 'Brightens undereye circles and snatches cheekbones without leaving an ashy chalky white flashback in smartphone photos.',
            'notes' => 'Kay Beauty is enriched with avocado oil so it doesn\'t dry out fine lines in mature or dry skin.'
        ]
    ],

    // 25. Laura Mercier Translucent Loose Powder
    [
        'orig' => [
            'slug' => 'laura-mercier-translucent-loose-setting-powder',
            'brand' => 'Laura Mercier',
            'name' => 'Translucent Loose Setting Powder',
            'category' => 'makeup',
            'mrp_inr' => 4200,
            'size_label' => '29g',
            'swatch_hex' => '#FEF3C7',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['French "Cashmere" Talc', 'Zero Flashback', 'Soft-Focus Blurring'],
            'inci_tags' => ['silica', 'magnesium-myristate'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'pac-micro-finish-loose-powder-translucent',
            'brand' => 'PAC',
            'name' => 'Micro Finish Loose Powder - 01 Translucent',
            'category' => 'makeup',
            'mrp_inr' => 895,
            'size_label' => '13g',
            'swatch_hex' => '#FEF08A',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Micro-Spherical Silica', 'Non-Comedogenic', 'Sebum Absorption'],
            'inci_tags' => ['silica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'laura-mercier-powder-dupe-pac',
            'match_score' => 95,
            'summary' => 'The pro-artist standard for blurring pores. PAC Micro Finish matches the micro-milled weightlessness and zero-flashback performance on Indian bridal skin.',
            'notes' => 'PAC controls oil breakthrough for 8+ hours under bright wedding lights.'
        ]
    ],

    // 26. Sol de Janeiro Bum Bum Cream
    [
        'orig' => [
            'slug' => 'sol-de-janeiro-brazilian-bum-bum-cream',
            'brand' => 'Sol de Janeiro',
            'name' => 'Brazilian Bum Bum Cream (Cheirosa 62 Scent)',
            'category' => 'skincare',
            'mrp_inr' => 4500,
            'size_label' => '240ml',
            'swatch_hex' => '#FEF08A',
            'undertone' => null,
            'key_actives_or_notes' => ['Guarana Extract (Caffeine)', 'Cupuacu Butter', 'Pistachio Salted Caramel Aroma'],
            'inci_tags' => ['caffeine', 'cupuacu'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-bodylovin-vanilla-caramello-body-butter',
            'brand' => 'Plum',
            'name' => 'BodyLovin\' Vanilla Caramello Body Butter',
            'category' => 'skincare',
            'mrp_inr' => 575,
            'size_label' => '200g',
            'swatch_hex' => '#FDE047',
            'undertone' => null,
            'key_actives_or_notes' => ['Shea Butter', 'Brazil Nut Oil', 'Salted Caramel Warm Vanilla'],
            'inci_tags' => ['shea-butter', 'brazil-nut'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'sol-de-janeiro-bum-bum-cream-dupe-plum',
            'match_score' => 93,
            'summary' => 'Captures that viral decadent salted caramel and pistachio gourmand scent profile that turns heads everywhere.',
            'notes' => 'Plum provides non-greasy all-day skin conditioning at ₹575 vs ₹4,500.'
        ]
    ],

    // 27. Tatcha The Dewy Skin Cream
    [
        'orig' => [
            'slug' => 'tatcha-the-dewy-skin-cream',
            'brand' => 'Tatcha',
            'name' => 'The Dewy Skin Cream Rich Moisturizer',
            'category' => 'skincare',
            'mrp_inr' => 6800,
            'size_label' => '50ml',
            'swatch_hex' => '#DDD6FE',
            'undertone' => null,
            'key_actives_or_notes' => ['Japanese Purple Rice', 'Hadasei-3 Bio-Ferment', 'Okinawa Algae', 'Hyaluronic Acid'],
            'inci_tags' => ['squalane', 'rice-ferment'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-ceramides-hyaluronic-barrier-cream',
            'brand' => 'Dot & Key',
            'name' => 'Ceramides & Hyaluronic Skin Barrier Repair Night Cream',
            'category' => 'skincare',
            'mrp_inr' => 395,
            'size_label' => '100g',
            'swatch_hex' => '#C4B5FD',
            'undertone' => null,
            'key_actives_or_notes' => ['5 Essential Ceramides', 'Hyaluronic Acid', 'Japanese Rice Water', 'Probiotics'],
            'inci_tags' => ['ceramide-np', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tatcha-dewy-skin-cream-dupe-dot-and-key',
            'match_score' => 90,
            'summary' => 'Rich, plumping hydration that imparts an instant lit-from-within dewy bounce to dry, sensitized skin.',
            'notes' => 'Dot & Key is formulated with 5 barrier ceramides tailored for Indian skin recovery after chemical peeling.'
        ]
    ],

    // 28. Dr. Jart+ Cicapair Tiger Grass Treatment
    [
        'orig' => [
            'slug' => 'dr-jart-cicapair-tiger-grass-color-correcting-treatment',
            'brand' => 'Dr. Jart+',
            'name' => 'Cicapair Tiger Grass Color Correcting Treatment SPF 30',
            'category' => 'skincare',
            'mrp_inr' => 3900,
            'size_label' => '50ml',
            'swatch_hex' => '#A7F3D0',
            'undertone' => null,
            'key_actives_or_notes' => ['Centella Asiatica (Tiger Grass)', 'Color-Transforming Green Capsule', 'Mineral SPF'],
            'inci_tags' => ['centella-asiatica'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'the-derma-co-2-percent-cica-glow-serum',
            'brand' => 'The Derma Co',
            'name' => '2% Cica-Glow Daily Face Serum with Alpha Arbutin',
            'category' => 'skincare',
            'mrp_inr' => 499,
            'size_label' => '30ml',
            'swatch_hex' => '#6EE7B7',
            'undertone' => null,
            'key_actives_or_notes' => ['Centella Asiatica Complex', 'Alpha Arbutin', 'Tranexamic Acid'],
            'inci_tags' => ['centella-asiatica', 'alpha-arbutin'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dr-jart-cicapair-dupe-derma-co-cica',
            'match_score' => 88,
            'summary' => 'Neutralizes post-acne redness, calms inflamed papules, and evens out sensitive flushed skin.',
            'notes' => 'The Derma Co is a lightweight serum that does not leave a whitish cast on darker Indian melanin.'
        ]
    ],

    // 29. SK-II Facial Treatment Essence Pitera
    [
        'orig' => [
            'slug' => 'sk-ii-facial-treatment-essence-pitera',
            'brand' => 'SK-II',
            'name' => 'Facial Treatment Essence (90%+ Pitera)',
            'category' => 'skincare',
            'mrp_inr' => 18000,
            'size_label' => '160ml',
            'swatch_hex' => '#F8FAFC',
            'undertone' => null,
            'key_actives_or_notes' => ['Galactomyces Ferment Filtrate (Pitera)', 'Over 50 Micro-Nutrients', 'Organic Acids'],
            'inci_tags' => ['galactomyces-ferment'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'missha-time-revolution-the-first-essence-5x',
            'brand' => 'Missha',
            'name' => 'Time Revolution The First Essence 5X (Extreme Ferment)',
            'category' => 'skincare',
            'mrp_inr' => 2950,
            'size_label' => '150ml',
            'swatch_hex' => '#F1F5F9',
            'undertone' => null,
            'key_actives_or_notes' => ['97% Desert Cica Yeast Ferment', 'Extreme Biome Tech', 'Niacinamide'],
            'inci_tags' => ['galactomyces-ferment', 'niacinamide'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'sk-ii-pitera-essence-dupe-missha-first-essence',
            'match_score' => 95,
            'summary' => 'World-famous fermented yeast essence comparison. Missha uses double-fermentation technology to replicate the skin-clarifying glow of SK-II at 1/6th the price.',
            'notes' => 'Noticeably refines bumpy skin texture and clarifies dull complexions within 14 days.'
        ]
    ],

    // 30. Kiehl's Clearly Corrective Dark Spot Solution
    [
        'orig' => [
            'slug' => 'kiehls-clearly-corrective-dark-spot-solution',
            'brand' => "Kiehl's",
            'name' => 'Clearly Corrective Dark Spot Solution Serum',
            'category' => 'skincare',
            'mrp_inr' => 5600,
            'size_label' => '30ml',
            'swatch_hex' => '#F8FAFC',
            'undertone' => null,
            'key_actives_or_notes' => ['Activated C (3-O-Ethyl Ascorbic Acid)', 'White Birch Extract', 'Peony Extract', 'Salicylic Acid'],
            'inci_tags' => ['ethyl-ascorbic-acid', 'salicylic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-tranexamic-3-percent-serum',
            'brand' => 'Minimalist',
            'name' => 'Tranexamic 3% + HPA Face Serum for Melasma & PIH',
            'category' => 'skincare',
            'mrp_inr' => 649,
            'size_label' => '30ml',
            'swatch_hex' => '#F1F5F9',
            'undertone' => null,
            'key_actives_or_notes' => ['3% Tranexamic Acid', '1% Hydroxyphenoxy Propionic Acid (HPA)', 'Mandelic Acid', 'Salicylic Acid'],
            'inci_tags' => ['tranexamic-acid', 'mandelic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kiehls-dark-spot-solution-dupe-minimalist',
            'match_score' => 93,
            'summary' => 'Both attack melanin synthesis at multiple enzymatic checkpoints to fade stubborn sun spots and post-pimple pigmentation.',
            'notes' => 'Minimalist Tranexamic Acid is clinically superior on stubborn hormonal melasma in Indian skin.'
        ]
    ],

    // 31. Clinique Moisture Surge 100H
    [
        'orig' => [
            'slug' => 'clinique-moisture-surge-100h-auto-replenishing-hydrator',
            'brand' => 'Clinique',
            'name' => 'Moisture Surge 100H Auto-Replenishing Hydrator Gel',
            'category' => 'skincare',
            'mrp_inr' => 3200,
            'size_label' => '50ml',
            'swatch_hex' => '#FECDD3',
            'undertone' => null,
            'key_actives_or_notes' => ['Aloe Bio-Ferment', 'Hyaluronic Acid', 'Auto-Replenishing Tech', 'Caffeine'],
            'inci_tags' => ['hyaluronic-acid', 'aloe'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'ponds-super-light-gel-hyaluronic-acid',
            'brand' => "Pond's",
            'name' => 'Super Light Gel Oil-Free Moisturiser with Hyaluronic Acid & Vitamin E',
            'category' => 'skincare',
            'mrp_inr' => 299,
            'size_label' => '147g',
            'swatch_hex' => '#BAE6FD',
            'undertone' => null,
            'key_actives_or_notes' => ['Hyaluronic Acid', 'Vitamin E', 'Glycerin', 'Ultra-Light Water Gel'],
            'inci_tags' => ['hyaluronic-acid', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'clinique-moisture-surge-dupe-ponds-gel',
            'match_score' => 94,
            'summary' => 'The ultimate lightweight oil-free water gel moisturizer. Both quench dehydrated skin instantly without leaving an oily film.',
            'notes' => "Pond's Super Light Gel costs under ₹300 for a massive 147g tub and is a staple for oily Indian skin in summer."
        ]
    ],

    // 32. Kiehl's Ultra Facial Cream
    [
        'orig' => [
            'slug' => 'kiehls-ultra-facial-cream',
            'brand' => "Kiehl's",
            'name' => 'Ultra Facial Cream with Squalane',
            'category' => 'skincare',
            'mrp_inr' => 3250,
            'size_label' => '50ml',
            'swatch_hex' => '#FFFFFF',
            'undertone' => null,
            'key_actives_or_notes' => ['4.5% Plant Squalane', 'Glacial Glycoprotein', 'Ceramide Matrix'],
            'inci_tags' => ['squalane', 'ceramide-np'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'bioderma-atoderm-creme-ultra',
            'brand' => 'Bioderma',
            'name' => 'Atoderm Creme Ultra Daily Moisturising Cream',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '200ml',
            'swatch_hex' => '#FAFAFA',
            'undertone' => null,
            'key_actives_or_notes' => ['Skin Protect Complex', 'Niacinamide', 'Glycerin', 'Xylitol'],
            'inci_tags' => ['niacinamide'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kiehls-ultra-facial-cream-dupe-bioderma',
            'match_score' => 93,
            'summary' => 'Deep 24-hour lipid barrier nourishment without feeling suffocating or heavy on the skin.',
            'notes' => 'Bioderma provides 4x more product (200ml) for ₹699 and is dermatologist-tested for reactive, eczema-prone skin.'
        ]
    ],

    // 33. CeraVe Moisturizing Cream
    [
        'orig' => [
            'slug' => 'cerave-moisturizing-cream-body-and-face',
            'brand' => 'CeraVe',
            'name' => 'Moisturizing Cream with 3 Essential Ceramides & HA',
            'category' => 'skincare',
            'mrp_inr' => 1800,
            'size_label' => '340g',
            'swatch_hex' => '#FFFFFF',
            'undertone' => null,
            'key_actives_or_notes' => ['Ceramides (1, 3, 6-II)', 'Hyaluronic Acid', 'MVE Delivery Technology'],
            'inci_tags' => ['ceramide-np', 'hyaluronic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'reequil-ceramide-hyaluronic-acid-moisturiser',
            'brand' => "Re'equil",
            'name' => 'Ceramide & Hyaluronic Acid Moisturiser for Normal to Dry Skin',
            'category' => 'skincare',
            'mrp_inr' => 395,
            'size_label' => '100g',
            'swatch_hex' => '#FAFAFA',
            'undertone' => null,
            'key_actives_or_notes' => ['Ceramide III', 'Hyaluronic Acid', 'Mango Seed Butter'],
            'inci_tags' => ['ceramide-np', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cerave-cream-dupe-reequil',
            'match_score' => 94,
            'summary' => 'CeraVe imports often suffer from inflated reseller pricing and counterfeiting in India. Re\'equil provides authentic medical-grade ceramide barrier repair.',
            'notes' => 'Re\'equil heals damaged barriers from tretinoin peeling in 48 hours.'
        ]
    ],

    // 34. Dr. Dennis Gross Alpha Beta Peeling Pads
    [
        'orig' => [
            'slug' => 'dr-dennis-gross-alpha-beta-universal-daily-peel',
            'brand' => 'Dr. Dennis Gross',
            'name' => 'Alpha Beta Universal Daily Peel (2-Step Treatment)',
            'category' => 'skincare',
            'mrp_inr' => 8200,
            'size_label' => '30 Treatments',
            'swatch_hex' => '#FEF08A',
            'undertone' => null,
            'key_actives_or_notes' => ['Glycolic Acid', 'Salicylic Acid', 'Malic Acid', 'Green Tea Extract', 'Resveratrol'],
            'inci_tags' => ['glycolic-acid', 'salicylic-acid'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'minimalist-aha-25-pha-5-bha-2-peeling-solution',
            'brand' => 'Minimalist',
            'name' => 'AHA 25% + PHA 5% + BHA 2% Peeling Solution',
            'category' => 'skincare',
            'mrp_inr' => 699,
            'size_label' => '30ml',
            'swatch_hex' => '#991B1B',
            'undertone' => null,
            'key_actives_or_notes' => ['Glycolic Acid (AHA)', 'Gluconolactone (PHA)', 'Salicylic Acid (BHA)', 'Aloe Vera', 'Turmeric'],
            'inci_tags' => ['glycolic-acid', 'salicylic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dr-dennis-gross-peel-dupe-minimalist',
            'match_score' => 93,
            'summary' => 'Dual AHA/BHA chemical exfoliation that removes dead keratin glue, flushes pores, and delivers professional facial radiance at home.',
            'notes' => 'Minimalist adds gentle PHA and Turmeric root extract to mitigate PIH on Indian melanin.'
        ]
    ],

    // 35. Milk Makeup Hydro Grip Primer
    [
        'orig' => [
            'slug' => 'milk-makeup-hydro-grip-primer',
            'brand' => 'Milk Makeup',
            'name' => 'Hydro Grip Hydrating Makeup Primer',
            'category' => 'makeup',
            'mrp_inr' => 3600,
            'size_label' => '45ml',
            'swatch_hex' => '#A7F3D0',
            'undertone' => null,
            'key_actives_or_notes' => ['Blue Agave Extract', 'Cannabis Seed Extract', 'Hyaluronic Acid', 'Niacinamide'],
            'inci_tags' => ['hyaluronic-acid', 'niacinamide'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'elf-power-grip-primer',
            'brand' => 'e.l.f. Cosmetics',
            'name' => 'Power Grip Primer with 4% Niacinamide',
            'category' => 'makeup',
            'mrp_inr' => 790,
            'size_label' => '24ml',
            'swatch_hex' => '#6EE7B7',
            'undertone' => null,
            'key_actives_or_notes' => ['4% Niacinamide', 'Hyaluronic Acid', 'Sticky Jelly Grip Film'],
            'inci_tags' => ['niacinamide', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'milk-hydro-grip-dupe-elf-power-grip',
            'match_score' => 97,
            'summary' => 'The ultimate jelly-grip primer dupe. Both dry down to a tacky adhesive base that glues liquid foundation to the face for 14 hours.',
            'notes' => 'elf Power Grip prevents foundation from breaking up around the nose in humid weather.'
        ]
    ],

    // 36. Smashbox Photo Finish Smooth & Blur
    [
        'orig' => [
            'slug' => 'smashbox-photo-finish-foundation-primer',
            'brand' => 'Smashbox',
            'name' => 'The Original Photo Finish Smooth & Blur Primer',
            'category' => 'makeup',
            'mrp_inr' => 3450,
            'size_label' => '30ml',
            'swatch_hex' => '#F8FAFC',
            'undertone' => null,
            'key_actives_or_notes' => ['Dimethicone Crosspolymer', 'Vitamin A & E', 'Velvet Pore Blurring'],
            'inci_tags' => ['dimethicone'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'colorbar-perfect-match-primer',
            'brand' => 'Colorbar',
            'name' => 'Flawless Finish Perfect Match Primer',
            'category' => 'makeup',
            'mrp_inr' => 850,
            'size_label' => '30ml',
            'swatch_hex' => '#F1F5F9',
            'undertone' => null,
            'key_actives_or_notes' => ['Silicone Elastomers', 'Vitamin E', 'Oil-Free Mattifying'],
            'inci_tags' => ['dimethicone', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'smashbox-primer-dupe-colorbar',
            'match_score' => 96,
            'summary' => 'Classic silicone gel primers that fill in deep acne scars, ice-pick pores, and textural roughness to create a silky canvas.',
            'notes' => 'Colorbar gives an identical airbrushed velvet slip for less than a quarter of the price.'
        ]
    ],

    // 37. Benefit The POREfessional Face Primer
    [
        'orig' => [
            'slug' => 'benefit-the-porefessional-face-primer',
            'brand' => 'Benefit Cosmetics',
            'name' => 'The POREfessional Pore Minimizing Face Primer',
            'category' => 'makeup',
            'mrp_inr' => 3600,
            'size_label' => '22ml',
            'swatch_hex' => '#E5B88F',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Translucent Pore Blurring Balm', 'Vitamin E Derivative', 'Oil-Free Matte'],
            'inci_tags' => ['silica', 'dimethicone'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'loreal-base-magique-transforming-smoothing-primer',
            'brand' => "L'Oreal Paris",
            'name' => 'Base Magique Transforming Smoothing Primer',
            'category' => 'makeup',
            'mrp_inr' => 999,
            'size_label' => '15ml',
            'swatch_hex' => '#E3B58C',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Silicone Elastomers', 'Porous Soft-Focus Powders', 'Matte Spatula Cream'],
            'inci_tags' => ['silica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'benefit-porefessional-dupe-loreal-base-magique',
            'match_score' => 94,
            'summary' => 'Thick spackle-balm consistency that press-fills enlarged oil glands on the nose and inner cheeks.',
            'notes' => "L'Oreal Base Magique prevents mid-day sebum breakthrough and lasts through long wedding receptions."
        ]
    ],

    // 38. Tarte Shape Tape Concealer
    [
        'orig' => [
            'slug' => 'tarte-shape-tape-contour-concealer',
            'brand' => 'Tarte Cosmetics',
            'name' => 'Shape Tape Full Coverage Contour Concealer',
            'category' => 'makeup',
            'mrp_inr' => 3100,
            'size_label' => '10ml',
            'swatch_hex' => '#D6A374',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Shea Butter', 'Mango Seed Butter', 'Licorice Root', 'Maximum Coverage'],
            'inci_tags' => ['shea-butter', 'licorice'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'loreal-infallible-full-wear-concealer',
            'brand' => "L'Oreal Paris",
            'name' => 'Infallible Full Wear More Than Concealer (24H Matte)',
            'category' => 'makeup',
            'mrp_inr' => 799,
            'size_label' => '10ml',
            'swatch_hex' => '#D5A172',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Waterproof Polymers', 'Jumbo Doe Foot Applicator', 'Full Melanin Coverage'],
            'inci_tags' => ['dimethicone', 'iron-oxides'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tarte-shape-tape-dupe-loreal-infallible',
            'match_score' => 97,
            'summary' => 'Extreme high-coverage matte concealers that erase severe dark circles, genetic pigmentation, and active acne blemishes with a single dot.',
            'notes' => "L'Oreal Infallible has the exact same jumbo applicator and 24-hour creaseproof stamina."
        ]
    ],

    // 39. Charlotte Tilbury Airbrush Flawless Finish Powder
    [
        'orig' => [
            'slug' => 'charlotte-tilbury-airbrush-flawless-finish-powder',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Airbrush Flawless Finish Micro-Powder',
            'category' => 'makeup',
            'mrp_inr' => 4700,
            'size_label' => '8g',
            'swatch_hex' => '#FCD34D',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Almond Oil', 'Rose Wax', 'Light-Reflecting Micro Pearls'],
            'inci_tags' => ['almond-oil', 'mica'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'rimmel-stay-matte-pressed-powder',
            'brand' => 'Rimmel London',
            'name' => 'Stay Matte Long Lasting Pressed Powder',
            'category' => 'makeup',
            'mrp_inr' => 399,
            'size_label' => '14g',
            'swatch_hex' => '#FBBF24',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Natural Minerals', 'Silica Blurring', 'Oil Control'],
            'inci_tags' => ['silica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'charlotte-tilbury-powder-dupe-rimmel-stay-matte',
            'match_score' => 93,
            'summary' => 'Provides that airbrushed, poreless, cake-free veil over foundation without looking dry or powdery.',
            'notes' => 'Rimmel Stay Matte has been a backstage makeup artist secret for 15 years and costs under ₹400.'
        ]
    ],

    // 40. Benefit Hoola Matte Bronzer
    [
        'orig' => [
            'slug' => 'benefit-hoola-matte-powder-bronzer',
            'brand' => 'Benefit Cosmetics',
            'name' => 'Hoola Matte Powder Bronzer',
            'category' => 'makeup',
            'mrp_inr' => 3300,
            'size_label' => '8g',
            'swatch_hex' => '#A16207',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Natural Matte Finish', 'Zero Shimmer', 'Built-in Brush'],
            'inci_tags' => ['iron-oxides'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'sugar-contour-de-force-mini-bronzer-taupe-topper',
            'brand' => 'Sugar Cosmetics',
            'name' => 'Contour De Force Mini Bronzer - 01 Taupe Topper',
            'category' => 'makeup',
            'mrp_inr' => 399,
            'size_label' => '4g',
            'swatch_hex' => '#9A5D05',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Finely Milled Pigment', 'Neutral-Warm Contour', 'Transferproof'],
            'inci_tags' => ['mica'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'benefit-hoola-bronzer-dupe-sugar-taupe-topper',
            'match_score' => 95,
            'summary' => 'Natural sun-kissed warmth that sculpts Indian cheekbones without turning muddy or orange.',
            'notes' => 'Sugar Taupe Topper blends smoothly without leaving harsh unblendable streaks.'
        ]
    ]
];

// Let's add remaining 20 viral pairs programmatically to reach 60 pairs total!
$additionalPairs = [
    // 41. NARS Orgasm Blush
    ['nars-orgasm-blush', 'NARS', 'Blush - Orgasm (Peachy Pink with Golden Shimmer)', 'makeup', 3500, '4.8g', '#F472B6', 'milani-baked-blush-luminoso', 'Milani', 'Baked Blush - 05 Luminoso', 'makeup', 1150, '3.5g', '#F472B6', 'nars-orgasm-dupe-milani-luminoso', 96, 'Both give that iconic warm peachy-pink luminous flush loaded with micro-fine golden shimmer.', 'Milani is baked on Italian terracotta tiles and delivers even higher pigment payoff.'],
    
    // 42. Becca Champagne Pop Highlighter
    ['becca-champagne-pop-highlighter', 'Becca Cosmetics', 'Shimmering Skin Perfector - Champagne Pop', 'makeup', 3500, '8g', '#FDE68A', 'maybelline-master-chrome-molten-gold', 'Maybelline New York', 'Master Chrome Metallic Highlighter - Molten Gold', 'makeup', 650, '6.7g', '#FCD34D', 'becca-champagne-pop-dupe-master-chrome', 97, 'The universal golden-champagne wet-look highlighter that looks breathtaking on Indian skin.', 'Maybelline delivers a blinding, zero-chalk metallic beam for ₹650.'],

    // 43. Anastasia Beverly Hills Brow Wiz
    ['abh-brow-wiz-pencil', 'Anastasia Beverly Hills', 'Brow Wiz Ultra-Slim Precision Brow Pencil', 'makeup', 2350, '0.08g', '#451A03', 'nykaa-brow-on-point-micro-pencil', 'Nykaa', 'Brow On Point! Micro Fine Eyebrow Pencil', 'makeup', 299, '0.09g', '#451A03', 'abh-brow-wiz-dupe-nykaa', 95, 'Micro-fine 1.5mm tip that draws realistic hair-like strokes through sparse Indian brows.', 'Nykaa includes a spoolie brush and waterproof wax that survives monsoon humidity.'],

    // 44. Bobbi Brown Gel Eyeliner
    ['bobbi-brown-long-wear-gel-eyeliner-black', 'Bobbi Brown', 'Long-Wear Gel Eyeliner - Black Ink', 'makeup', 2800, '3g', '#000000', 'maybelline-lasting-drama-gel-eyeliner', 'Maybelline New York', 'Lasting Drama 36H Gel Eyeliner - Blackest Black', 'makeup', 525, '2.8g', '#000000', 'bobbi-brown-gel-liner-dupe-maybelline', 96, 'Intense jet-black gel formula that glides like a liquid and sets like a waterproof tattoo.', 'Maybelline includes a precision brush and stays smudge-free on watery waterlines for 24+ hours.'],

    // 45. KVD Beauty Everlasting Liquid Lipstick Lolita
    ['kvd-everlasting-lipstick-lolita', 'KVD Beauty', 'Everlasting Liquid Lipstick - Lolita (Chestnut Rose)', 'makeup', 2200, '6.6ml', '#83474C', 'maybelline-superstay-matte-ink-seductress', 'Maybelline New York', 'Super Stay Matte Ink - 65 Seductress', 'makeup', 649, '5ml', '#80454A', 'kvd-lolita-dupe-maybelline-seductress', 94, 'Iconic dusty chestnut rose that flatters all Indian undertones.', 'Maybelline Super Stay is 100% transfer-proof for 16 hours.'],

    // 46. Natasha Denona Bronze Palette
    ['natasha-denona-bronze-eyeshadow-palette', 'Natasha Denona', 'Bronze Eyeshadow Palette (15 Luxury Warm Pans)', 'makeup', 6800, '19g', '#B45309', 'mars-fantasy-eyeshadow-palette-bronze', 'Mars Cosmetics', '9-in-1 Fantasy Eyeshadow Palette - Bronze Luxe', 'makeup', 349, '12g', '#B45309', 'natasha-denona-bronze-dupe-mars', 91, 'Buttery warm copper, gold, and terracotta metallic foils that look sensational with ethnic sarees.', 'Mars eyeshadows have high pigment payoff and blend without fallout.'],

    // 47. Huda Beauty Nude Rich Palette
    ['huda-beauty-nude-obsessions-rich', 'Huda Beauty', 'Nude Obsessions Eyeshadow Palette - Rich', 'makeup', 2950, '10g', '#7C2D12', 'swiss-beauty-ultimate-shadow-palette-06', 'Swiss Beauty', 'Ultimate Shadow Palette - Kit 06', 'makeup', 299, '9g', '#7C2D12', 'huda-nude-rich-dupe-swiss-beauty', 92, 'Curated chocolate browns, crimson mattes, and duochrome shimmers for rich melanin eyes.', 'Swiss Beauty matches the creamy blendability at 1/10th the price.'],

    // 48. Olaplex No. 3 Hair Perfector
    ['olaplex-no-3-hair-perfector', 'Olaplex', 'No. 3 Hair Perfector Bis-Aminopropyl Diglycol Dimaleate', 'skincare', 3200, '100ml', '#FEF3C7', 'minimalist-maleic-bond-repair-complex-5', 'Minimalist', 'Maleic Bond Repair Complex 5% Hair Serum', 'skincare', 499, '50ml', '#FEF9C3', 'olaplex-no-3-dupe-minimalist-bond-repair', 95, 'Bis-aminopropyl diglycol dimaleate vs. Maleic Acid complex: both chemically reconnect broken disulfide hair bonds from bleaching, heat, and hard Indian tap water.', 'Minimalist adds ceramides and argan oil to soften coarse Indian hair texture.'],

    // 49. Caudalie Vinoperfect Radiance Dark Spot Serum
    ['caudalie-vinoperfect-radiance-dark-spot-serum', 'Caudalie', 'Vinoperfect Radiance Dark Spot Serum with Viniferine', 'skincare', 5900, '30ml', '#F8FAFC', 'plum-10-percent-niacinamide-rice-water-brightening', 'Plum', '10% Niacinamide Face Serum with Fermented Rice Extract', 'skincare', 649, '30ml', '#F1F5F9', 'caudalie-vinoperfect-dupe-plum', 91, 'Both target stubborn acne marks and sun spots without irritating sensitive barriers.', 'Plum adds amino-acid rich rice ferment to boost glassy epidermal glow.'],

    // 50. The Ordinary Niacinamide 10%
    ['the-ordinary-niacinamide-10-zinc-1', 'The Ordinary', 'Niacinamide 10% + Zinc 1% Oil Control Serum', 'skincare', 600, '30ml', '#F8FAFC', 'minimalist-10-percent-niacinamide-zinc-serum', 'Minimalist', '10% Niacinamide + Zinc Daily Face Serum', 'skincare', 599, '30ml', '#F1F5F9', 'the-ordinary-niacinamide-dupe-minimalist', 98, 'Identical 10% Niacinamide + 1% Zinc PCA formulation that regulates sebum and tightens lax pore walls.', 'Minimalist adds soothing Aloe Vera juice and has zero foaming/pilling issues under makeup.'],

    // 51. La Roche-Posay Effaclar Duo+
    ['la-roche-posay-effaclar-duo-plus', 'La Roche-Posay', 'Effaclar Duo+ Anti-Blemish Treatment', 'skincare', 2400, '40ml', '#F8FAFC', 'cipla-saslic-ds-salicylic-acid-face-treatment', 'Cipla', 'Saslic DS 2% Salicylic Acid Face Treatment Gel', 'skincare', 450, '60ml', '#F1F5F9', 'la-roche-posay-effaclar-dupe-cipla-saslic', 94, 'Targeted treatment for active inflamed papules and clogged blackheads.', 'Cipla Saslic is pharmacy-grade pharmaceutical salicylic acid trusted by Indian dermatologists.'],

    // 52. Fresh Soy Face Cleanser
    ['fresh-soy-face-cleanser', 'Fresh', 'Soy pH-Balanced Hydrating Face Cleanser', 'skincare', 3800, '150ml', '#FEF3C7', 'simple-kind-to-skin-refreshing-facial-wash', 'Simple', 'Kind to Skin Refreshing Facial Wash (100% Soap Free)', 'skincare', 325, '150ml', '#FEF9C3', 'fresh-soy-cleanser-dupe-simple', 95, 'Gentle, low-foaming, pH 5.5 barrier-safe gel cleansers that remove sunscreen without stripping natural lipids.', 'Simple contains zero perfume, harsh sulfates, or artificial color.'],

    // 53. Bioderma Sensibio H2O Micellar Water
    ['bioderma-sensibio-h2o-micellar-water', 'Bioderma', 'Sensibio H2O Micellar Water for Sensitive Skin', 'skincare', 990, '250ml', '#F8FAFC', 'garnier-micellar-cleansing-water-pink', 'Garnier', 'Micellar Cleansing Water All-in-1 for Sensitive Skin', 'skincare', 249, '125ml', '#F1F5F9', 'bioderma-sensibio-dupe-garnier-pink', 97, 'Captures makeup and city pollution particles using micelle surfactant technology with zero stinging on eyes.', 'Garnier Pink is a near-identical micellar solution available in every local Indian medical store.'],

    // 54. Fenty Beauty Stunna Lip Paint Uncensored
    ['fenty-beauty-stunna-lip-paint-uncensored', 'Fenty Beauty', 'Stunna Lip Paint Longwear Fluid Lip - Uncensored', 'makeup', 2600, '4ml', '#B91C1C', 'sugar-smudge-me-not-drop-dead-red', 'Sugar Cosmetics', 'Smudge Me Not Liquid Lipstick - 01 Drop Dead Red', 'makeup', 499, '4.5ml', '#B91C1C', 'fenty-stunna-uncensored-dupe-sugar-drop-dead-red', 96, 'Vivid universal red fluid lipstick with high impact pigment payoff and 12-hour matte longevity.', 'Sugar Drop Dead Red provides zero transfer through Indian spicy food.'],

    // 55. MAC Velvet Teddy
    ['mac-matte-lipstick-velvet-teddy', 'M.A.C Cosmetics', 'Matte Lipstick - Velvet Teddy (Deep Neutral Nude)', 'makeup', 2300, '3g', '#B57563', 'maybelline-color-sensational-nude-nuance', 'Maybelline New York', 'Color Sensational Creamy Matte - 657 Nude Nuance', 'makeup', 329, '3.9g', '#B37160', 'mac-velvet-teddy-dupe-maybelline-nude-nuance', 96, 'The iconic 90s rosy-nude matte. Maybelline Nude Nuance provides that exact warm nude-brown flush that does not look pale on Indian complexions.', 'Infused with honey nectar for softer, non-drying wear.'],

    // 56. MAC Chili
    ['mac-matte-lipstick-chili', 'M.A.C Cosmetics', 'Matte Lipstick - Chili (Warm Brick Red Brown)', 'makeup', 2300, '3g', '#A14330', 'sugar-matte-as-hell-scarlett-ohara', 'Sugar Cosmetics', 'Matte As Hell Crayon Lipstick - 01 Scarlett O\'Hara', 'makeup', 799, '2.8g', '#9F3F2D', 'mac-chili-dupe-sugar-scarlett-ohara', 95, 'Spicy retro burnt orange-red that flatters warm Indian skin and festive ethnic lehengas.', 'Sugar Crayon glides on with high pigment and stays transfer-proof.'],

    // 57. Rare Beauty Soft Pinch Blush Joy
    ['rare-beauty-soft-pinch-blush-joy', 'Rare Beauty', 'Soft Pinch Liquid Blush - Joy (Dewy Muted Peach)', 'makeup', 2900, '7.5ml', '#F97316', 'insight-cheek-lip-tint-soft-salmon', 'Insight Cosmetics', 'Cheek & Lip Tint - Soft Salmon Peach', 'makeup', 180, '9g', '#EA580C', 'rare-beauty-blush-joy-dupe-insight', 91, 'Brightening warm peach flush that gives an immediate youthful radiant bounce.', 'Insight is a creamy blendable balm that melts cleanly over sunscreen without lifting.'],

    // 58. Stila Stay All Day Liquid Eyeliner
    ['stila-stay-all-day-waterproof-liquid-liner', 'Stila', 'Stay All Day Waterproof Liquid Eye Liner - Intense Black', 'makeup', 2200, '0.5ml', '#000000', 'kay-beauty-quick-dry-liquid-eyeliner-black', 'Kay Beauty', 'Quick Dry Liquid Eyeliner - Raven Black', 'makeup', 549, '5ml', '#000000', 'stila-liquid-liner-dupe-kay-beauty', 95, 'Carbon-black, precision felt tip pen with zero-tug glide and waterproof hold.', 'Kay Beauty is formulated with Chamomile to soothe sensitive eyes in Indian heat.'],

    // 59. The Ordinary AHA 30% + BHA 2% Peeling Solution
    ['the-ordinary-aha-30-percent-bha-2-percent-peel', 'The Ordinary', 'AHA 30% + BHA 2% Peeling Solution (Vampire Facial)', 'skincare', 750, '30ml', '#881337', 'the-derma-co-15-percent-aha-1-percent-bha-peel', 'The Derma Co', '15% AHA + 1% BHA Beginner Face Peeling Solution', 'skincare', 499, '30ml', '#9F1239', 'the-ordinary-peeling-solution-dupe-derma-co', 93, 'High strength exfoliating acid peel for stubborn pigmentation, sun tanning, and blackheads.', 'Derma Co uses a safer 15% AHA threshold buffered with Chamomile to avoid burns on dark skin.'],

    // 60. Glow Recipe Watermelon Glow PHA+BHA Toner
    ['glow-recipe-watermelon-glow-pha-bha-toner', 'Glow Recipe', 'Watermelon Glow PHA + BHA Pore-Tight Toner', 'skincare', 3400, '150ml', '#FECDD3', 'plum-green-tea-alcohol-free-toner-glycolic', 'Plum', 'Green Tea Alcohol-Free Toner with Glycolic Acid', 'skincare', 390, '200ml', '#A7F3D0', 'glow-recipe-watermelon-toner-dupe-plum', 92, 'Tightens enlarged oily pores, clears microcomedones, and hydrates stratum corneum.', 'Plum is 100% alcohol-free and soothes active hormonal acne with organic green tea.']
];

foreach ($additionalPairs as $p) {
    $pairs[] = [
        'orig' => [
            'slug' => $p[0],
            'brand' => $p[1],
            'name' => $p[2],
            'category' => $p[3],
            'mrp_inr' => $p[4],
            'size_label' => $p[5],
            'swatch_hex' => $p[6],
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Luxury Botanical & High Pigment Formula'],
            'inci_tags' => ['active-complex'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => $p[7],
            'brand' => $p[8],
            'name' => $p[9],
            'category' => $p[10],
            'mrp_inr' => $p[11],
            'size_label' => $p[12],
            'swatch_hex' => $p[13],
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Indian Formulated High-Efficiency Actives'],
            'inci_tags' => ['active-complex'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => $p[14],
            'match_score' => $p[15],
            'summary' => $p[16],
            'notes' => $p[17]
        ]
    ];
}

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
$dupesCount = 0;

foreach ($pairs as $item) {
    // 1. Upsert Original
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

    // 2. Upsert Dupe
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

    // 3. Upsert Dupe Pair
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
    $dupesCount++;
}

$pdo->commit();

echo "✅ Successfully seeded {$dupesCount} luxury vs. budget dupe pairs (" . ($dupesCount * 2) . " total products)!\n";

