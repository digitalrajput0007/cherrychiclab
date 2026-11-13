<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder Batch 4: 30 High-Demand Indian Winter & Wedding Perfumes & Clones
 * Adds 30 pairs (60 fragrances + 30 clone records) with olfactory notes & longevity notes.
 * Run with: php C:\CherryChicLab\scripts\seed\seed_batch4_indian_winter_wedding_perfumes.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "✨ [CherryChic Lab] Seeding Batch 4: 30 Winter & Wedding Perfumes & Clones (60 fragrances)...\n";

$pdo = get_db();

$pairs = [
    // 1. Viktor&Rolf Spicebomb Extreme vs Lattafa Asad
    [
        'orig' => [
            'slug' => 'viktor-and-rolf-spicebomb-extreme-edp',
            'brand' => 'Viktor&Rolf',
            'name' => 'Spicebomb Extreme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 10500,
            'size_label' => '90ml',
            'swatch_hex' => '#78350F',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pimento, Black Pepper, Cinnamon', 'Heart: Tobacco, Cumin', 'Base: Bourbon Vanilla, Amber, Lavender'],
            'inci_tags' => ['cinnamon', 'tobacco', 'bourbon-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-asad-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Asad Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1650,
            'size_label' => '100ml',
            'swatch_hex' => '#713F12',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Black Pepper, Pineapple, Tobacco', 'Heart: Coffee, Patchouli, Iris', 'Base: Amber, Vanilla, Dry Woods, Benzoin'],
            'inci_tags' => ['tobacco', 'coffee', 'black-pepper'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'spicebomb-extreme-clone-lattafa-asad',
            'match_score' => 93,
            'summary' => 'A monstrous cold-weather projection bomb. Blends hot crackling spices, rich pipe tobacco, and warm vanilla amber.',
            'notes' => 'Longevity: 10-12 hours on sherwanis and wool suits; projects intensely across North Indian winter wedding receptions.'
        ]
    ],

    // 2. Jean Paul Gaultier Ultra Male vs Afnan 9PM
    [
        'orig' => [
            'slug' => 'jean-paul-gaultier-ultra-male-edt-intense',
            'brand' => 'Jean Paul Gaultier',
            'name' => 'Ultra Male Eau De Toilette Intense',
            'category' => 'perfume',
            'mrp_inr' => 8200,
            'size_label' => '125ml',
            'swatch_hex' => '#1E3A8A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pear, Lavender, Mint, Bergamot', 'Heart: Cinnamon, Clary Sage, Caraway', 'Base: Black Vanilla Husk, Amber, Patchouli, Cedar'],
            'inci_tags' => ['sweet-pear', 'lavender', 'cinnamon', 'black-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'afnan-9-pm-pour-homme-edp',
            'brand' => 'Afnan Perfumes',
            'name' => '9 PM Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1950,
            'size_label' => '100ml',
            'swatch_hex' => '#172554',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Juicy Apple, Cinnamon, Wild Lavender, Bergamot', 'Heart: Orange Blossom, Lily of the Valley', 'Base: Vanilla, Amber, Tonka Bean, Patchouli'],
            'inci_tags' => ['apple-pear', 'cinnamon', 'vanilla-amber'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'jpg-ultra-male-clone-afnan-9pm',
            'match_score' => 97,
            'summary' => 'The undisputed clubbing and party king in India. Opens with intoxicating candied fruit, spicy cinnamon, and sweet bubblegum vanilla.',
            'notes' => 'Longevity: 12+ hours with massive room-filling sillage. Widely considered superior to modern reformulated batches of Ultra Male.'
        ]
    ],

    // 3. Jean Paul Gaultier Le Male Elixir vs Lattafa Liam Grey
    [
        'orig' => [
            'slug' => 'jean-paul-gaultier-le-male-elixir-parfum',
            'brand' => 'Jean Paul Gaultier',
            'name' => 'Le Male Elixir Parfum',
            'category' => 'perfume',
            'mrp_inr' => 9400,
            'size_label' => '125ml',
            'swatch_hex' => '#B45309',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lavender, Mint', 'Heart: Vanilla, Benzoin', 'Base: Honey, Tonka Bean, Tobacco'],
            'inci_tags' => ['lavender', 'warm-honey', 'tonka-bean', 'tobacco'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-liam-grey-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Liam Grey Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1850,
            'size_label' => '100ml',
            'swatch_hex' => '#92400E',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cardamom, Fig, Black Tea', 'Heart: Iris, Vetiver, Labdanum', 'Base: Vanilla, Sandalwood, Tonka Bean, Patchouli'],
            'inci_tags' => ['cardamom', 'black-tea', 'vanilla', 'sandalwood'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'jpg-le-male-elixir-clone-lattafa-liam-grey',
            'match_score' => 93,
            'summary' => 'Rich, resinous, honeyed-vanilla warmth blended with cozy spices and smooth dry woods for winter cocktails and sangeet evenings.',
            'notes' => 'Longevity: 9-11 hours on fabric with sweet seductive projection.'
        ]
    ],

    // 4. Parfums de Marly Layton vs Al Haramain Detour Noir
    [
        'orig' => [
            'slug' => 'parfums-de-marly-layton-edp',
            'brand' => 'Parfums de Marly',
            'name' => 'Layton Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 24500,
            'size_label' => '125ml',
            'swatch_hex' => '#1E293B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Apple, Lavender, Bergamot, Mandarin', 'Heart: Geranium, Violet, Jasmine', 'Base: Vanilla, Cardamom, Sandalwood, Pepper, Guaiac Wood'],
            'inci_tags' => ['crisp-apple', 'vanilla', 'cardamom', 'guaiac-wood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'al-haramain-detour-noir-edp',
            'brand' => 'Al Haramain',
            'name' => 'Detour Noir Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1999,
            'size_label' => '100ml',
            'swatch_hex' => '#0F172A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Crisp Apple, Almond, Bergamot', 'Heart: Lavender, Jasmine, Geranium', 'Base: Vanilla, Cardamom, Sandalwood, Guaiac Wood'],
            'inci_tags' => ['apple', 'vanilla', 'cardamom', 'sandalwood'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'pdm-layton-clone-al-haramain-detour-noir',
            'match_score' => 96,
            'summary' => 'The crown jewel of niche winter perfumery. Crisp caramelized green apple, cooling minty-cardamom, and regal bourbon vanilla.',
            'notes' => 'Detour Noir delivers 95%+ olfactory fidelity for ₹1,999 vs PDM Layton ₹24,500 (Save ₹22,501).'
        ]
    ],

    // 5. Parfums de Marly Delina Exclusif vs Armaf Club De Nuit White Imperiale
    [
        'orig' => [
            'slug' => 'parfums-de-marly-delina-exclusif-parfum',
            'brand' => 'Parfums de Marly',
            'name' => 'Delina Exclusif Parfum',
            'category' => 'perfume',
            'mrp_inr' => 26000,
            'size_label' => '75ml',
            'swatch_hex' => '#FDA4AF',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lychee, Pear, Bergamot', 'Heart: Turkish Rose, Incense, Agarwood (Oud)', 'Base: Vanilla, Amber, Woody Notes'],
            'inci_tags' => ['turkish-rose', 'lychee', 'vanilla-oud'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'armaf-club-de-nuit-white-imperiale-edp',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit White Imperiale Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2250,
            'size_label' => '105ml',
            'swatch_hex' => '#FB7185',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lychee, Bergamot, Nutmeg', 'Heart: Turkish Rose, Peony, Vanilla, Musk', 'Base: Cashmeran, Cedarwood, Vetiver, Incense'],
            'inci_tags' => ['turkish-rose', 'lychee', 'vanilla', 'incense'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'pdm-delina-clone-armaf-white-imperiale',
            'match_score' => 97,
            'summary' => 'The royal Indian bridal fragrance benchmark. Decadent jammy Turkish rose, tart lychee, smoky incense, and creamy vanilla.',
            'notes' => 'Armaf White Imperiale performs with beast-mode longevity (12-14 hours on lehengas and silks) for ₹2,250 vs PDM ₹26,000.'
        ]
    ],

    // 6. Giorgio Armani Acqua Di Gio Profumo vs Lattafa Suqraat
    [
        'orig' => [
            'slug' => 'giorgio-armani-acqua-di-gio-profumo-parfum',
            'brand' => 'Giorgio Armani',
            'name' => 'Acqua Di Gio Profumo Parfum',
            'category' => 'perfume',
            'mrp_inr' => 9800,
            'size_label' => '75ml',
            'swatch_hex' => '#1F2937',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Sea Notes, Bergamot', 'Heart: Rosemary, Sage, Geranium', 'Base: Incense, Patchouli'],
            'inci_tags' => ['marine-notes', 'incense', 'patchouli'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-suqraat-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Suqraat Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1450,
            'size_label' => '100ml',
            'swatch_hex' => '#111827',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Ginger', 'Heart: Violet Leaf, Lavender, Rosemary', 'Base: Incense, Amber, Musk, Sandalwood'],
            'inci_tags' => ['bergamot', 'incense', 'rosemary'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'adg-profumo-clone-lattafa-suqraat',
            'match_score' => 94,
            'summary' => 'Dark aquatic elegance. Opens with salty sea breeze and Sicilian bergamot before settling into mysterious church incense and patchouli.',
            'notes' => 'Now that Armani has discontinued ADG Profumo, Lattafa Suqraat has become the premier affordable substitute in India.'
        ]
    ],

    // 7. Giorgio Armani Si vs Lattafa Fakhar Rose
    [
        'orig' => [
            'slug' => 'giorgio-armani-si-eau-de-parfum',
            'brand' => 'Giorgio Armani',
            'name' => 'Sì Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 8500,
            'size_label' => '100ml',
            'swatch_hex' => '#F472B6',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Blackcurrant Nectar', 'Heart: Rose de Mai, Freesia', 'Base: Vanilla, Patchouli, Ambroxan, Woody Notes'],
            'inci_tags' => ['cassis', 'rose-de-mai', 'vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-fakhar-rose-for-women',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Fakhar Rose (Pride of Lattafa) for Women',
            'category' => 'perfume',
            'mrp_inr' => 1550,
            'size_label' => '100ml',
            'swatch_hex' => '#EC4899',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Fruits, Lily, Pomegranate, Aldehydes', 'Heart: Tuberose, Jasmine, Gardenia, Honeysuckle, Rose', 'Base: Vanilla, Sandalwood, Ambroxan, White Musk'],
            'inci_tags' => ['tuberose', 'jasmine', 'vanilla-musk'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'armani-si-clone-lattafa-fakhar-rose',
            'match_score' => 95,
            'summary' => 'Luxurious white floral and blackcurrant nectar bouquets wrapped in warm spun sugar and creamy sandalwood.',
            'notes' => 'Fakhar Rose comes in a stunning rose-gold metallic flacon with 8-10 hours projection for ₹1,550.'
        ]
    ],

    // 8. Kayali Vanilla 28 vs Lattafa Nebras
    [
        'orig' => [
            'slug' => 'kayali-vanilla-28-eau-de-parfum',
            'brand' => 'KAYALI by Mona Kattan',
            'name' => 'Vanilla | 28 Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 9200,
            'size_label' => '100ml',
            'swatch_hex' => '#78350F',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Vanilla Orchid, Creamy Jasmine', 'Heart: Brown Sugar, Tonka Bean', 'Base: Amber Woods, Musk, Patchouli'],
            'inci_tags' => ['brown-sugar', 'vanilla-orchid', 'tonka-bean'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-nebras-pride-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Nebras (Pride of Lattafa) Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2100,
            'size_label' => '100ml',
            'swatch_hex' => '#713F12',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Red Berries, Mandarin Orange', 'Heart: Vanilla, Cacao, Rose', 'Base: Sugar, Tonka Bean, Amber, Musk'],
            'inci_tags' => ['vanilla', 'cacao', 'sugar', 'amber'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kayali-vanilla-28-clone-lattafa-nebras',
            'match_score' => 96,
            'summary' => 'The ultimate boozy gourmand vanilla. Rich caramelized brown sugar, dark melted cocoa, tonka bean, and warm amber.',
            'notes' => 'Nebras outperforms Kayali in projection and lasts 12+ hours in chilly winter air for ₹2,100 (Save ₹7,100).'
        ]
    ],

    // 9. Kayali Eden Juicy Apple vs Lattafa Bade'e Al Oud Honor & Glory
    [
        'orig' => [
            'slug' => 'kayali-eden-juicy-apple-01',
            'brand' => 'KAYALI by Mona Kattan',
            'name' => 'Eden Juicy Apple | 01 Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 8900,
            'size_label' => '100ml',
            'swatch_hex' => '#EF4444',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Red Apple, Blackcurrant, Pink Grapefruit, Lychee', 'Heart: Wild Berries, Raspberry Bloom, Jasmine', 'Base: Vanilla, Sugar, Amber, Musk'],
            'inci_tags' => ['red-apple', 'wild-berries', 'sugar-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-badee-al-oud-honor-and-glory',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Bade\'e Al Oud Honor & Glory Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1850,
            'size_label' => '100ml',
            'swatch_hex' => '#EAB308',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pineapple Brulee, Crème Brulee', 'Heart: Turmeric, Cinnamon, Black Pepper, Benzoin', 'Base: Vanilla, Cashmeran, Sandalwood, Moss'],
            'inci_tags' => ['pineapple-brulee', 'vanilla', 'cinnamon', 'cashmeran'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kayali-eden-apple-clone-lattafa-honor-glory',
            'match_score' => 92,
            'summary' => 'Delectable mouth-watering gourmands. Blends caramelized fruit pastry, vanilla cream, and warming exotic spices.',
            'notes' => 'Honor & Glory adds decadent golden pineapple brulee with monstrous 10-hour sillage.'
        ]
    ],

    // 10. Maison Margiela By the Fireplace vs Lattafa Ameer Al Oudh Intense Oud
    [
        'orig' => [
            'slug' => 'maison-margiela-replica-by-the-fireplace',
            'brand' => 'Maison Margiela',
            'name' => 'REPLICA By the Fireplace Eau De Toilette',
            'category' => 'perfume',
            'mrp_inr' => 11500,
            'size_label' => '100ml',
            'swatch_hex' => '#78350F',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cloves, Pink Pepper, Orange Blossom', 'Heart: Chestnut, Guaiac Wood, Juniper', 'Base: Vanilla, Peru Balsam, Cashmeran'],
            'inci_tags' => ['chestnut', 'vanilla', 'guaiac-wood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-ameer-al-oudh-intense-oud',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Ameer Al Oudh Intense Oud Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1450,
            'size_label' => '100ml',
            'swatch_hex' => '#713F12',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Woodsy Notes, Agarwood (Oud)', 'Heart: Vanilla, Sugar', 'Base: Agarwood (Oud), Sandalwood, Herbal Notes'],
            'inci_tags' => ['oud', 'burnt-sugar', 'vanilla', 'sandalwood'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'by-the-fireplace-clone-ameer-al-oudh-intense',
            'match_score' => 95,
            'summary' => 'Captures the intoxicating scent of roasted chestnuts over a crackling wood fire with sweet spun sugar and smoky vanilla.',
            'notes' => 'Ameer Al Oudh Intense Oud is praised as one of the single best winter budget fragrance purchases on earth for ₹1,450.'
        ]
    ],

    // 11. Versace Eros EDP vs Titan Skinn Raw
    [
        'orig' => [
            'slug' => 'versace-eros-eau-de-parfum',
            'brand' => 'Versace',
            'name' => 'Eros Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 7800,
            'size_label' => '100ml',
            'swatch_hex' => '#0284C7',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Mint, Candy Apple, Lemon, Mandarin', 'Heart: Ambroxan, Geranium, Clary Sage', 'Base: Vanilla, Cedar, Sandalwood, Patchouli, Leather'],
            'inci_tags' => ['mint', 'green-apple', 'vanilla', 'cedarwood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'titan-skinn-raw-eau-de-parfum',
            'brand' => 'Titan Skinn',
            'name' => 'Raw Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2495,
            'size_label' => '100ml',
            'swatch_hex' => '#0369A1',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Crisp Bergamot, Watery Fruits, Mandarin', 'Heart: Violet Leaves, Pomarose, Geranium', 'Base: Indonesian Patchouli, Gaiac Wood, Cashmeran'],
            'inci_tags' => ['bergamot', 'watery-fruits', 'patchouli', 'woods'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'versace-eros-clone-titan-skinn-raw',
            'match_score' => 93,
            'summary' => 'Dynamic, masculine, compliment-magnet scents combining crisp zesty fruits, green herbs, and deep woody warmth.',
            'notes' => 'Titan Skinn Raw is crafted in France specifically for Indian heat and skin chemistry, lasting 8+ hours easily.'
        ]
    ],

    // 12. Versace Bright Crystal vs Titan Skinn Celeste
    [
        'orig' => [
            'slug' => 'versace-bright-crystal-absolu-edp',
            'brand' => 'Versace',
            'name' => 'Bright Crystal Absolu Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 7400,
            'size_label' => '90ml',
            'swatch_hex' => '#F472B6',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pomegranate, Yuzu, Water Notes', 'Heart: Peony, Raspberry, Lotus, Magnolia', 'Base: Musk, Mahogany, Amber'],
            'inci_tags' => ['pomegranate', 'peony', 'lotus', 'amber'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'titan-skinn-celeste-eau-de-parfum',
            'brand' => 'Titan Skinn',
            'name' => 'Celeste for Women Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2495,
            'size_label' => '100ml',
            'swatch_hex' => '#EC4899',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Mandarine, Green Pear, Ginger, Blood Orange', 'Heart: Orange Flower, Jasmine, Waterlily, Lotus', 'Base: Patchouli, Amber, Apricot Nectar, Sandalwood'],
            'inci_tags' => ['waterlily', 'mandarine', 'jasmine', 'sandalwood'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'versace-bright-crystal-clone-titan-skinn-celeste',
            'match_score' => 95,
            'summary' => 'Sparkling, effervescent, crystal-clean floral gems with juicy fruit facets that feel youthful and luminous.',
            'notes' => 'Titan Skinn Celeste is one of India’s most gifted women’s perfumes, boasting outstanding sillage and compliment factor.'
        ]
    ],

    // 13. Sol de Janeiro Cheirosa 62 vs Plum BodyLovin' Hawaiian Rumba EDP
    [
        'orig' => [
            'slug' => 'sol-de-janeiro-brazilian-crush-cheirosa-62',
            'brand' => 'Sol de Janeiro',
            'name' => 'Brazilian Crush Cheirosa 62 Perfume Mist (Bum Bum Scent)',
            'category' => 'perfume',
            'mrp_inr' => 2350,
            'size_label' => '90ml',
            'swatch_hex' => '#D97706',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pistachio, Almond', 'Heart: Heliotrope, Jasmine Petals', 'Base: Salted Caramel, Vanilla, Sandalwood'],
            'inci_tags' => ['pistachio', 'salted-caramel', 'vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-bodylovin-hawaiian-rumba-edp',
            'brand' => 'Plum BodyLovin\'',
            'name' => 'Hawaiian Rumba Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 650,
            'size_label' => '50ml',
            'swatch_hex' => '#CA8A04',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Coconut, Passion Fruit', 'Heart: White Floral, Gardenia', 'Base: Vanilla, Amber, Tonka Bean'],
            'inci_tags' => ['coconut', 'passion-fruit', 'vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cheirosa-62-clone-plum-hawaiian-rumba',
            'match_score' => 94,
            'summary' => 'Tropical vacation in a bottle. Delicious salted caramel, creamy coconut cream, and sun-baked sweet vanilla.',
            'notes' => 'Plum Hawaiian Rumba comes in concentrated EDP formulation that projects for 6-8 hours for ₹650 vs SDJ mist ₹2,350.'
        ]
    ],

    // 14. Sol de Janeiro Cheirosa 68 vs Plum Vanilla Caramello Mist
    [
        'orig' => [
            'slug' => 'sol-de-janeiro-cheirosa-68-beija-flor',
            'brand' => 'Sol de Janeiro',
            'name' => 'Cheirosa 68 Beija Flor Perfume Mist',
            'category' => 'perfume',
            'mrp_inr' => 2350,
            'size_label' => '90ml',
            'swatch_hex' => '#FB7185',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pink Dragonfruit, Lychee Essence', 'Heart: Brazilian Jasmine, Ocean Air, Hibiscus', 'Base: Sheer Vanilla, Sun Musk'],
            'inci_tags' => ['dragonfruit', 'lychee', 'brazilian-jasmine'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'plum-bodylovin-vanilla-caramello-body-mist',
            'brand' => 'Plum BodyLovin\'',
            'name' => 'Vanilla Caramello Body Mist',
            'category' => 'perfume',
            'mrp_inr' => 395,
            'size_label' => '150ml',
            'swatch_hex' => '#F43F5E',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Sweet Lychee, Sugar Flower', 'Heart: Jasmine, Vanilla Cream', 'Base: Warm Amber, Musk'],
            'inci_tags' => ['lychee', 'jasmine', 'vanilla-musk'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'cheirosa-68-clone-plum-vanilla-caramello',
            'match_score' => 93,
            'summary' => 'Ethereal airy cotton-candy and pink dragonfruit florals with a salty mineral breeze reminiscent of Baccarat Rouge.',
            'notes' => 'Plum offers 150ml for ₹395, saving ₹1,955 over Sol de Janeiro.'
        ]
    ],

    // 15. Zara Rich Warm Addictive vs Lattafa Khamrah Qahwa
    [
        'orig' => [
            'slug' => 'zara-tobacco-collection-rich-warm-addictive',
            'brand' => 'Zara',
            'name' => 'Tobacco Collection Rich Warm Addictive EDT',
            'category' => 'perfume',
            'mrp_inr' => 1490,
            'size_label' => '100ml',
            'swatch_hex' => '#78350F',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Rum, Peony', 'Heart: Bourbon Vanilla, Coconut', 'Base: Warm Tobacco, Sandalwood'],
            'inci_tags' => ['rum', 'bourbon-vanilla', 'tobacco'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-khamrah-qahwa-edp',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Khamrah Qahwa Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2150,
            'size_label' => '100ml',
            'swatch_hex' => '#713F12',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cinnamon, Cardamom, Ginger', 'Heart: Praline, Candied Fruit, White Flowers, Roasted Arabic Coffee', 'Base: Coffee, Vanilla, Tonka Bean, Benzoin, Musk'],
            'inci_tags' => ['cinnamon', 'arabic-coffee', 'praline', 'vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'zara-rich-warm-addictive-dupe-khamrah-qahwa',
            'match_score' => 96,
            'summary' => 'The ultimate winter gourmand showdown. Roasted Arabic cardamom coffee, boozy rum, sweet praline, and warm pipe tobacco.',
            'notes' => 'While Zara struggles with 3-4 hours longevity, Khamrah Qahwa is an absolute beast lasting 14+ hours with nuclear projection.'
        ]
    ],

    // 16. Burberry Her EDP vs Lattafa Rave Now Women
    [
        'orig' => [
            'slug' => 'burberry-her-eau-de-parfum',
            'brand' => 'Burberry',
            'name' => 'Her Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 8500,
            'size_label' => '100ml',
            'swatch_hex' => '#F472B6',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Strawberry, Raspberry, Blackberry, Sour Cherry', 'Heart: Violet, Jasmine', 'Base: Musk, Amber, Woody Notes, Oakmoss'],
            'inci_tags' => ['crushed-berries', 'strawberry', 'amber-musk'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-rave-now-women-edp',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Rave Now Women Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1550,
            'size_label' => '100ml',
            'swatch_hex' => '#EC4899',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Red Fruits, Sweet Orange', 'Heart: Marshmallow, Jasmine, Lily of the Valley', 'Base: Vanilla, Moss, Musk'],
            'inci_tags' => ['wild-berries', 'marshmallow', 'vanilla-musk'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'burberry-her-clone-lattafa-rave-now',
            'match_score' => 94,
            'summary' => 'Sparkling crushed strawberry milkshake and fluffy marshmallows with a sophisticated amber-musk drydown.',
            'notes' => 'Rave Now Women delivers intoxicating sweet berry projection for ₹1,550 vs Burberry ₹8,500 (Save ₹6,950).'
        ]
    ],

    // 17. Burberry Goddess vs Lattafa Angham
    [
        'orig' => [
            'slug' => 'burberry-goddess-eau-de-parfum',
            'brand' => 'Burberry',
            'name' => 'Goddess Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 9200,
            'size_label' => '100ml',
            'swatch_hex' => '#D97706',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Vanilla Infusion, Lavender', 'Heart: Vanilla Caviar', 'Base: Vanilla Absolute'],
            'inci_tags' => ['triple-vanilla', 'lavender'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-angham-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Angham Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2200,
            'size_label' => '100ml',
            'swatch_hex' => '#B45309',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Mandarin Orange, Ginger, Pink Pepper', 'Heart: Praline, Lavender, Jasmine, Cacao', 'Base: Vanilla, Amber, Musk'],
            'inci_tags' => ['vanilla', 'praline', 'lavender', 'cacao'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'burberry-goddess-clone-lattafa-angham',
            'match_score' => 96,
            'summary' => 'A royal symphony of triple vanilla caviar balanced by calming aromatic French lavender and warm ginger.',
            'notes' => 'Lattafa Angham is 2024’s most viral Burberry Goddess clone, delivering regal winter sillage for ₹2,200.'
        ]
    ],

    // 18. Tom Ford Ombre Leather vs Afnan Rare Carbon
    [
        'orig' => [
            'slug' => 'tom-ford-ombre-leather-edp',
            'brand' => 'Tom Ford',
            'name' => 'Ombré Leather Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 16500,
            'size_label' => '100ml',
            'swatch_hex' => '#18181B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cardamom', 'Heart: Leather, Jasmine Sambac', 'Base: Amber, Moss, Patchouli'],
            'inci_tags' => ['black-leather', 'jasmine-sambac', 'cardamom'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'afnan-rare-carbon-eau-de-parfum',
            'brand' => 'Afnan Perfumes',
            'name' => 'Rare Carbon Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2450,
            'size_label' => '100ml',
            'swatch_hex' => '#09090B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Leather, Violet Leaf, Cinnamon, Nutmeg', 'Heart: Violet, Rose, Cedarwood, Oud', 'Base: Amber, Sandalwood, Vetiver'],
            'inci_tags' => ['rich-leather', 'violet', 'amber-oud'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tom-ford-ombre-leather-clone-afnan-rare-carbon',
            'match_score' => 97,
            'summary' => 'Sleek, opulent black leather jacket perfumery. Opens with spicy cardamom before unveiling intoxicating floral jasmine and supple suede.',
            'notes' => 'Rare Carbon is practically indistinguishable in the air from Tom Ford and lasts 12+ hours for ₹2,450 (Save ₹14,050).'
        ]
    ],

    // 19. Tom Ford Lost Cherry vs Maison Alhambra Lovely Cherie
    [
        'orig' => [
            'slug' => 'tom-ford-lost-cherry-eau-de-parfum',
            'brand' => 'Tom Ford',
            'name' => 'Lost Cherry Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 28500,
            'size_label' => '50ml',
            'swatch_hex' => '#881337',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Black Cherry, Bitter Almond, Cherry Liqueur', 'Heart: Griotte Syrup, Turkish Rose, Jasmine Sambac', 'Base: Peru Balsam, Roasted Tonka, Sandalwood, Vetiver, Cedar'],
            'inci_tags' => ['black-cherry', 'bitter-almond', 'cherry-liqueur', 'tonka'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maison-alhambra-lovely-cherie-edp',
            'brand' => 'Maison Alhambra (Lattafa)',
            'name' => 'Lovely Chèrie Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1750,
            'size_label' => '80ml',
            'swatch_hex' => '#701A75',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Sour Cherry, Bitter Almond', 'Heart: Plum, Turkish Rose, Jasmine Sambac', 'Base: Tonka Bean, Vanilla, Peru Balsam, Cinnamon, Cedar'],
            'inci_tags' => ['sour-cherry', 'almond', 'vanilla-tonka'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tom-ford-lost-cherry-clone-lovely-cherie',
            'match_score' => 96,
            'summary' => 'Seductive boozy black cherry liqueur drenched in bitter almond, roasted tonka bean, and sweet vanilla.',
            'notes' => 'Lovely Cherie gives 80ml for ₹1,750 vs Tom Ford 50ml for ₹28,500, saving an unbelievable ₹26,750!'
        ]
    ],

    // 20. Kilian Angels' Share vs Lattafa Khamrah
    [
        'orig' => [
            'slug' => 'kilian-angels-share-eau-de-parfum',
            'brand' => 'Kilian Paris',
            'name' => "Angels' Share Eau De Parfum",
            'category' => 'perfume',
            'mrp_inr' => 22000,
            'size_label' => '50ml',
            'swatch_hex' => '#B45309',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cognac Oil', 'Heart: Cinnamon Bark, Tonka Bean, Oak Wood', 'Base: Praline, Vanilla, Sandalwood'],
            'inci_tags' => ['cognac', 'cinnamon', 'tonka-bean', 'praline'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-khamrah-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Khamrah Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1950,
            'size_label' => '100ml',
            'swatch_hex' => '#92400E',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cinnamon, Nutmeg, Bergamot', 'Heart: Dates, Praline, Tuberose, Mahonial', 'Base: Vanilla, Tonka Bean, Benzoin, Myrrh, Amberwood, Akigalawood'],
            'inci_tags' => ['cinnamon', 'sweet-dates', 'praline', 'vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kilian-angels-share-clone-lattafa-khamrah',
            'match_score' => 97,
            'summary' => 'The #1 viral Middle Eastern perfume in India. Warm boozy cognac, warm cinnamon apple pie, sweet dates, and melted praline.',
            'notes' => 'Khamrah comes in a heavy crystal glass flacon with 14+ hours of nuclear projection across winter weddings.'
        ]
    ],

    // 21. YSL Libre Intense vs Lattafa Tharwah Gold
    [
        'orig' => [
            'slug' => 'ysl-libre-intense-eau-de-parfum',
            'brand' => 'Yves Saint Laurent',
            'name' => 'Libre Eau De Parfum Intense',
            'category' => 'perfume',
            'mrp_inr' => 9800,
            'size_label' => '90ml',
            'swatch_hex' => '#CA8A04',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lavender, Mandarin Orange, Bergamot', 'Heart: Orange Blossom, Orchid, Jasmine Sambac', 'Base: Madagascar Vanilla, Tonka Bean, Ambergris, Vetiver'],
            'inci_tags' => ['orange-blossom', 'french-lavender', 'madagascar-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-tharwah-gold-pride-edp',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Tharwah Gold (Pride of Lattafa) Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1950,
            'size_label' => '100ml',
            'swatch_hex' => '#A16207',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Lavender', 'Heart: Orange Blossom, Egyptian Jasmine', 'Base: Madagascar Vanilla, Amber, Vetiver'],
            'inci_tags' => ['orange-blossom', 'lavender', 'vanilla-amber'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'ysl-libre-intense-clone-lattafa-tharwah-gold',
            'match_score' => 96,
            'summary' => 'Fierce, golden, opulent femininity. Blends sensual French lavender with Moroccan orange blossom and rich bourbon vanilla.',
            'notes' => 'Tharwah Gold replicates Libre Intense’s luxurious golden aura for ₹1,950 vs YSL ₹9,800 (Save ₹7,850).'
        ]
    ],

    // 22. YSL Tuxedo vs Maison Alhambra The Tux
    [
        'orig' => [
            'slug' => 'ysl-tuxedo-eau-de-parfum',
            'brand' => 'Yves Saint Laurent',
            'name' => 'Tuxedo Eau De Parfum (Vestiaire des Parfums)',
            'category' => 'perfume',
            'mrp_inr' => 19500,
            'size_label' => '125ml',
            'swatch_hex' => '#292524',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Violet Leaf, Coriander, Bergamot', 'Heart: Rose, Black Pepper, Lily of the Valley', 'Base: Patchouli, Ambergris, Bourbon Vanilla'],
            'inci_tags' => ['patchouli', 'black-pepper', 'ambergris', 'bourbon-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maison-alhambra-the-tux-edp',
            'brand' => 'Maison Alhambra (Lattafa)',
            'name' => 'The Tux Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1950,
            'size_label' => '90ml',
            'swatch_hex' => '#1C1917',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Violet Leaf, Bergamot, Coriander', 'Heart: Black Pepper, Rose, Lily', 'Base: Patchouli, Ambergris, Bourbon Vanilla'],
            'inci_tags' => ['patchouli', 'pepper', 'bourbon-vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'ysl-tuxedo-clone-the-tux',
            'match_score' => 97,
            'summary' => 'Aristocratic black-tie luxury. Earthy refined patchouli illuminated by crisp black pepper, ozone violet leaves, and smooth vanilla.',
            'notes' => 'The Tux is famous among Indian fragrance collectors as an exact 98% clone of YSL Tuxedo, saving ₹17,550.'
        ]
    ],

    // 23. Nishane Hacivat vs Afnan Supremacy Not Only Intense
    [
        'orig' => [
            'slug' => 'nishane-hacivat-extrait-de-parfum',
            'brand' => 'Nishane',
            'name' => 'Hacivat Extrait De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 18500,
            'size_label' => '100ml',
            'swatch_hex' => '#15803D',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pineapple, Grapefruit, Bergamot', 'Heart: Cedarwood, Patchouli, Jasmine', 'Base: Oakmoss, Woody Notes'],
            'inci_tags' => ['tart-pineapple', 'oakmoss', 'cedarwood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'afnan-supremacy-not-only-intense-extrait',
            'brand' => 'Afnan Perfumes',
            'name' => 'Supremacy Not Only Intense Extrait De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 3200,
            'size_label' => '100ml',
            'swatch_hex' => '#166534',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Blackcurrant, Bergamot, Apple', 'Heart: Oakmoss, Patchouli, Lavender', 'Base: Ambergris, Musk, Saffron'],
            'inci_tags' => ['blackcurrant', 'oakmoss', 'ambergris'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'nishane-hacivat-clone-afnan-not-only-intense',
            'match_score' => 95,
            'summary' => 'Tart, juicy, smoky blackcurrant and pineapple supported by dense damp green oakmoss and salty ambergris.',
            'notes' => 'Extrait concentration that lasts 14+ hours even through sweltering Indian reception halls.'
        ]
    ],

    // 24. Mancera Red Tobacco vs Paris Corner Emir Wild and Tobacco
    [
        'orig' => [
            'slug' => 'mancera-red-tobacco-eau-de-parfum',
            'brand' => 'Mancera Paris',
            'name' => 'Red Tobacco Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 11000,
            'size_label' => '120ml',
            'swatch_hex' => '#991B1B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cinnamon, Agarwood (Oud), Incense, Saffron, Nutmeg, Green Apple, White Pear', 'Heart: Patchouli, Jasmine', 'Base: Tobacco, Madagascar Vanilla, Amber, Sandalwood, Guaiac Wood, White Musk, Haitian Vetiver'],
            'inci_tags' => ['cinnamon', 'incense', 'tobacco', 'madagascar-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'paris-corner-emir-wild-and-tobacco-edp',
            'brand' => 'Paris Corner',
            'name' => 'Emir Wild and Tobacco Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1850,
            'size_label' => '100ml',
            'swatch_hex' => '#7F1D1D',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cinnamon, Oud, Incense, Green Apple', 'Heart: Patchouli, Jasmine', 'Base: Rich Tobacco, Vanilla, Guaiac Wood, Amber'],
            'inci_tags' => ['tobacco', 'cinnamon', 'vanilla-oud'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mancera-red-tobacco-clone-wild-and-tobacco',
            'match_score' => 94,
            'summary' => 'The ultimate loud, aggressive, nuclear spicy-tobacco beast. Blends incense smoke, hot cinnamon, and dark sticky vanilla.',
            'notes' => 'Wild and Tobacco smoothens out Mancera’s harsh opening while maintaining 10+ hours projection for ₹1,850.'
        ]
    ],

    // 25. Carolina Herrera Good Girl vs Armaf Tag Her
    [
        'orig' => [
            'slug' => 'carolina-herrera-good-girl-edp',
            'brand' => 'Carolina Herrera',
            'name' => 'Good Girl Eau De Parfum (Stiletto Bottle)',
            'category' => 'perfume',
            'mrp_inr' => 8400,
            'size_label' => '80ml',
            'swatch_hex' => '#1E1B4B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Almond, Coffee, Bergamot, Lemon', 'Heart: Tuberose, Jasmine Sambac, Orange Blossom, Orris', 'Base: Tonka Bean, Cacao, Vanilla, Praline, Sandalwood, Musk, Amber, Cashmere Wood, Cinnamon'],
            'inci_tags' => ['tuberose', 'roasted-coffee', 'cacao', 'tonka'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'armaf-tag-her-eau-de-parfum',
            'brand' => 'Armaf',
            'name' => 'Tag-Her Pour Femme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1550,
            'size_label' => '100ml',
            'swatch_hex' => '#312E81',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Pink Pepper, Neroli', 'Heart: Honeysuckle, Jasmine, Orange Blossom, Rose, Iris', 'Base: Caramel, Vanilla, Musk, Labdanum'],
            'inci_tags' => ['orange-blossom', 'caramel', 'vanilla-musk'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'ch-good-girl-clone-armaf-tag-her',
            'match_score' => 93,
            'summary' => 'Sensual duality of light white tuberose floral against dark roasted coffee, bittersweet cacao, and warm praline.',
            'notes' => 'Armaf Tag Her lasts 8 hours on shawls and dresses, saving ₹6,850.'
        ]
    ],

    // 26. Paco Rabanne 1 Million Lucky vs Lattafa Ishq Al Shuyukh Silver
    [
        'orig' => [
            'slug' => 'paco-rabanne-1-million-lucky-edt',
            'brand' => 'Paco Rabanne',
            'name' => '1 Million Lucky Eau De Toilette',
            'category' => 'perfume',
            'mrp_inr' => 7500,
            'size_label' => '100ml',
            'swatch_hex' => '#EAB308',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Plum, Ozonic Notes, Grapefruit, Bergamot', 'Heart: Hazelnut, Honey, Cedar, Cashmere Wood, Jasmine, Orange Blossom', 'Base: Amberwood, Patchouli, Oakmoss, Vetiver'],
            'inci_tags' => ['tart-plum', 'roasted-hazelnut', 'honey', 'amberwood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-ishq-al-shuyukh-silver-edp',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Ishq Al Shuyukh Silver Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1850,
            'size_label' => '100ml',
            'swatch_hex' => '#CA8A04',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lemon, Bergamot', 'Heart: Black Pepper, Pineapple', 'Base: Amberwood, Cedarwood, Vanilla, Patchouli'],
            'inci_tags' => ['hazelnut-accords', 'pineapple', 'amberwood', 'vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => '1-million-lucky-clone-ishq-shuyukh-silver',
            'match_score' => 95,
            'summary' => 'Nutty roasted hazelnut, juicy tart green plum, golden honey, and creamy cashmeran wood.',
            'notes' => 'Now that 1 Million Lucky is discontinued and sells for ₹12,000+ among collectors, Lattafa is the premier accessible alternative.'
        ]
    ],

    // 27. Xerjoff Naxos 1861 vs Paris Corner Voux Elegante
    [
        'orig' => [
            'slug' => 'xerjoff-xjt-1861-naxos-edp',
            'brand' => 'Xerjoff',
            'name' => 'XJ 1861 Naxos Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 22500,
            'size_label' => '100ml',
            'swatch_hex' => '#F59E0B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lavender, Bergamot, Lemon', 'Heart: Honey, Cinnamon, Cashmeran, Jasmine Sambac', 'Base: Tobacco Leaf, Tonka Bean, Vanilla'],
            'inci_tags' => ['raw-honey', 'tobacco-leaf', 'cinnamon', 'vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'paris-corner-voux-elegante-edp',
            'brand' => 'Paris Corner',
            'name' => 'Voux Elegante Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1950,
            'size_label' => '100ml',
            'swatch_hex' => '#D97706',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Lemon, Lavender', 'Heart: Honey, Cinnamon, Jasmine Sambac, Cashmeran', 'Base: Tobacco Leaf, Tonka Bean, Vanilla'],
            'inci_tags' => ['honey', 'cinnamon', 'tobacco', 'tonka'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'xerjoff-naxos-clone-voux-elegante',
            'match_score' => 96,
            'summary' => 'Regal Sicilian citrus bathed in sweet dripping raw honey, spicy cinnamon bark, soothing lavender, and blonde tobacco leaves.',
            'notes' => 'Voux Elegante delivers 95% of Naxos’s aristocratic luxury for ₹1,950 vs Xerjoff ₹22,500 (Save ₹20,550).'
        ]
    ],

    // 28. Dior Sauvage Elixir vs Lattafa Asad Bourbon / Black
    [
        'orig' => [
            'slug' => 'dior-sauvage-elixir-parfum',
            'brand' => 'Dior',
            'name' => 'Sauvage Elixir Concentrated Parfum',
            'category' => 'perfume',
            'mrp_inr' => 15500,
            'size_label' => '60ml',
            'swatch_hex' => '#1E1B4B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Nutmeg, Cinnamon, Cardamom, Grapefruit', 'Heart: Lavender Essence', 'Base: Licorice, Sandalwood, Amber, Patchouli, Haitian Vetiver'],
            'inci_tags' => ['nutmeg', 'cardamom', 'licorice', 'lavender', 'sandalwood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-asad-elixir-eau-de-parfum',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Asad Black Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1750,
            'size_label' => '100ml',
            'swatch_hex' => '#0F172A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Black Pepper, Pineapple, Tobacco', 'Heart: Coffee, Patchouli, Iris', 'Base: Amber, Vanilla, Dry Woods, Benzoin'],
            'inci_tags' => ['spices', 'licorice-amber', 'coffee-wood'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dior-sauvage-elixir-clone-lattafa-asad',
            'match_score' => 95,
            'summary' => 'Dark, hyper-masculine spicy elixir. Packed with intense freshly grated nutmeg, green cardamom, sweet black licorice, and rich woods.',
            'notes' => 'Lattafa Asad delivers the exact spicy-licorice nuclear DNA of Sauvage Elixir for ₹1,750 vs Dior ₹15,500.'
        ]
    ],

    // 29. Creed Silver Mountain Water vs Armaf Club De Nuit Sillage
    [
        'orig' => [
            'slug' => 'creed-silver-mountain-water-edp',
            'brand' => 'Creed',
            'name' => 'Silver Mountain Water Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 28000,
            'size_label' => '100ml',
            'swatch_hex' => '#E0F2FE',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Mandarin Orange', 'Heart: Green Tea, Blackcurrant', 'Base: Musk, Petitgrain, Sandalwood, Galbanum'],
            'inci_tags' => ['green-tea', 'blackcurrant', 'mountain-musk'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'armaf-club-de-nuit-sillage-edp',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit Sillage Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2100,
            'size_label' => '105ml',
            'swatch_hex' => '#BAE6FD',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Blackcurrant, Lemon, Lime, Violet Leaf, Ginger', 'Heart: Rose, Iris, Jasmine', 'Base: Ambroxan, Musk, Sandalwood, Cedar'],
            'inci_tags' => ['metallic-musk', 'green-tea', 'blackcurrant'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'creed-smw-clone-armaf-cdn-sillage',
            'match_score' => 97,
            'summary' => 'Crisp, icy, alpine mountain stream water. Cool green tea leaves, tart blackcurrant, and crisp metallic white musk.',
            'notes' => 'Armaf Sillage lasts 10-12 hours in hot weather and saves you an astounding ₹25,900 over Creed.'
        ]
    ],

    // 30. Jo Malone Wood Sage & Sea Salt vs Jenny Glow Wood & Sage
    [
        'orig' => [
            'slug' => 'jo-malone-wood-sage-and-sea-salt-cologne',
            'brand' => 'Jo Malone London',
            'name' => 'Wood Sage & Sea Salt Cologne',
            'category' => 'perfume',
            'mrp_inr' => 11500,
            'size_label' => '100ml',
            'swatch_hex' => '#94A3B8',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Ambrette Seeds', 'Heart: Sea Salt', 'Base: Sage, Red Algae, Grapefruit'],
            'inci_tags' => ['sea-salt', 'sage', 'ambrette'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'jenny-glow-wood-and-sage-edp',
            'brand' => 'Jenny Glow',
            'name' => 'Wood & Sage Pour Femme & Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1595,
            'size_label' => '100ml',
            'swatch_hex' => '#64748B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lemon, Sea Salt', 'Heart: Sage, Fig', 'Base: Cedarwood, Ambergris, Musk'],
            'inci_tags' => ['sea-salt', 'sage', 'cedarwood'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'jo-malone-wood-sage-clone-jenny-glow',
            'match_score' => 95,
            'summary' => 'Airy, breezy, mineral cliffside aroma. Ocean sea spray, crushed herbal clary sage, and clean driftwood.',
            'notes' => 'Jenny Glow is formulated in EDP strength (lasting 6-8 hours) compared to Jo Malone’s fleeting 2-3 hour cologne concentration.'
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

    // 2. Clone
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

    // 3. Dupe / Clone Record
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

echo "✅ Successfully seeded Batch 4: {$count} winter & wedding perfume clone pairs (" . ($count * 2) . " total products)!\n";

