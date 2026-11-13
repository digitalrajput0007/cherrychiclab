<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder 3: 40 Top Designer/Niche Perfumes & Indian Clones
 * 80 Perfume Products + 40 Dupe Records with Olfactory Notes & Longevity Analysis.
 * Run with: php scripts/seed/seed_perfume_clones.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "✨ [CherryChic Lab] Seeding 40 Perfume Clone Pairs (80 fragrance products)...\n";

$pdo = get_db();

$perfumes = [
    // 1. Dior Sauvage
    [
        'orig' => [
            'slug' => 'dior-sauvage-eau-de-parfum',
            'brand' => 'Dior',
            'name' => 'Sauvage Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 11500,
            'size_label' => '100ml',
            'swatch_hex' => '#1E3A8A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Calabrian Bergamot, Pepper', 'Heart: Sichuan Pepper, Lavender, Pink Pepper, Vetiver, Patchouli', 'Base: Ambroxan, Cedar, Labdanum'],
            'inci_tags' => ['ambroxan', 'bergamot', 'lavender'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'ajmal-kuro-eau-de-parfum',
            'brand' => 'Ajmal Perfumes',
            'name' => 'Kuro Pour Homme Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1800,
            'size_label' => '90ml',
            'swatch_hex' => '#172554',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Geranium', 'Heart: Lavender, Pepper, Patchouli', 'Base: Ambergris, Vetiver, Tonka'],
            'inci_tags' => ['ambergris', 'bergamot', 'pepper'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dior-sauvage-clone-ajmal-kuro',
            'match_score' => 95,
            'summary' => 'Ajmal Kuro is renowned among Indian fragrance enthusiasts as the most accurate Dior Sauvage clone on the subcontinent. Captures the crisp metallic ambroxan, bergamot blast, and spicy Sichuan pepper.',
            'notes' => 'Longevity: 8-10 hours in peak Indian summer heat with projecting sillage.'
        ]
    ],

    // 2. MFK Baccarat Rouge 540 Extrait
    [
        'orig' => [
            'slug' => 'baccarat-rouge-540-extrait',
            'brand' => 'Maison Francis Kurkdjian',
            'name' => 'Baccarat Rouge 540 Extrait de Parfum',
            'category' => 'perfume',
            'mrp_inr' => 38000,
            'size_label' => '70ml',
            'swatch_hex' => '#DC2626',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Saffron, Bitter Almond', 'Heart: Cedarwood, Jasmine Grandiflorum', 'Base: Ambergris, Woody Musk'],
            'inci_tags' => ['saffron', 'ambergris', 'jasmine'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'club-de-nuit-untold-edp',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit Untold Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 4200,
            'size_label' => '105ml',
            'swatch_hex' => '#E11D48',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Saffron, Jasmine', 'Heart: Amberwood, Ambergris', 'Base: Fir Resin, Cedar'],
            'inci_tags' => ['saffron-accord', 'ambergris-accord'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'baccarat-rouge-540-clone-club-de-nuit-untold',
            'match_score' => 96,
            'summary' => 'Widely recognized worldwide as a 1:1 master clone of MFK BR540. It replicates the crystalline saffron, metallic ambergris, and sweet burnt-sugar cedarwood sillage.',
            'notes' => 'Longevity: 12+ hours on clothes, beast-mode projection in Indian tropical humidity.'
        ]
    ],

    // 3. Creed Aventus
    [
        'orig' => [
            'slug' => 'creed-aventus-edp',
            'brand' => 'Creed',
            'name' => 'Aventus Eau De Parfum for Men',
            'category' => 'perfume',
            'mrp_inr' => 33500,
            'size_label' => '100ml',
            'swatch_hex' => '#1E293B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pineapple, Bergamot, Apple, Blackcurrant', 'Heart: Birch, Patchouli, Moroccan Jasmine', 'Base: Musk, Oakmoss, Ambergris, Vanilla'],
            'inci_tags' => ['birch-smoke', 'pineapple'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'club-de-nuit-intense-man-pure-parfum',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit Intense Man (CDNIM) Pure Parfum',
            'category' => 'perfume',
            'mrp_inr' => 3850,
            'size_label' => '150ml',
            'swatch_hex' => '#0F172A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lemon, Pineapple, Bergamot, Apple', 'Heart: Birch, Jasmine, Rose', 'Base: Ambergris, Musk, Patchouli, Vanilla'],
            'inci_tags' => ['lemon-pineapple', 'birch-smoke'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'creed-aventus-clone-club-de-nuit-intense-man',
            'match_score' => 95,
            'summary' => 'Replicates the legendary smoky birch, juicy blackcurrant, and tart pineapple DNA that made Creed Aventus famous worldwide. Pure Parfum eliminates the harsh opening of early EDT batches.',
            'notes' => 'Outperforms modern reformulated Creed batches, yielding 10+ hours of longevity.'
        ]
    ],

    // 4. YSL Libre
    [
        'orig' => [
            'slug' => 'ysl-libre-eau-de-parfum',
            'brand' => 'Yves Saint Laurent',
            'name' => 'Libre Eau De Parfum (Fougere Floral)',
            'category' => 'perfume',
            'mrp_inr' => 9800,
            'size_label' => '90ml',
            'swatch_hex' => '#F59E0B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lavender, Mandarin Orange, Blackcurrant, Petitgrain', 'Heart: Orange Blossom, Lavender, Jasmine', 'Base: Madagascar Vanilla, Musk, Cedar, Ambergris'],
            'inci_tags' => ['lavender', 'orange-blossom', 'vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maison-alhambra-libbra-eau-de-parfum',
            'brand' => 'Maison Alhambra (Lattafa)',
            'name' => 'Libbra Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1450,
            'size_label' => '100ml',
            'swatch_hex' => '#D97706',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: French Lavender, Mandarin', 'Heart: Moroccan Orange Blossom, Jasmine', 'Base: Vanilla, Amber, Cedar'],
            'inci_tags' => ['lavender-accord', 'vanilla-amber'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'ysl-libre-clone-maison-alhambra-libbra',
            'match_score' => 94,
            'summary' => 'The quintessential empowering feminine fougère. Maison Alhambra Libbra captures the crisp French lavender, radiant Moroccan orange blossom, and sensual Madagascar vanilla.',
            'notes' => 'Lasts 8+ hours on fabrics; ideal for Indian corporate and evening wear.'
        ]
    ],

    // 5. Carolina Herrera Good Girl
    [
        'orig' => [
            'slug' => 'carolina-herrera-good-girl-edp',
            'brand' => 'Carolina Herrera',
            'name' => 'Good Girl Eau De Parfum (Stiletto Flacon)',
            'category' => 'perfume',
            'mrp_inr' => 9500,
            'size_label' => '80ml',
            'swatch_hex' => '#1E1B4B',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Almond, Coffee, Bergamot, Lemon', 'Heart: Tuberose, Jasmine Sambac, Orange Blossom, Orris', 'Base: Tonka Bean, Cacao, Vanilla, Praline, Sandalwood'],
            'inci_tags' => ['tonka', 'cacao', 'tuberose'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'renee-bloom-eau-de-parfum',
            'brand' => 'RENEE Cosmetics',
            'name' => 'Bloom Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 599,
            'size_label' => '50ml',
            'swatch_hex' => '#312E81',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Almond, Coffee', 'Heart: Tuberose, Jasmine, Tonka', 'Base: Vanilla, Sandalwood, Cocoa'],
            'inci_tags' => ['almond-coffee', 'tonka-vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'carolina-herrera-good-girl-clone-renee-bloom',
            'match_score' => 92,
            'summary' => 'The intoxicating duality of sweet white tuberose and dark roasted coffee-tonka bean. Renee Bloom matches the seductive evening fragrance DNA under ₹600.',
            'notes' => 'Great projection for parties and wedding receptions.'
        ]
    ],

    // 6. Tom Ford Oud Wood
    [
        'orig' => [
            'slug' => 'tom-ford-oud-wood-private-blend',
            'brand' => 'Tom Ford',
            'name' => 'Oud Wood Private Blend Eau de Parfum',
            'category' => 'perfume',
            'mrp_inr' => 24000,
            'size_label' => '50ml',
            'swatch_hex' => '#3F3F46',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Rare Oud Wood, Rosewood, Cardamom', 'Heart: Sichuan Pepper, Sandalwood, Vetiver', 'Base: Tonka Bean, Vanilla, Amber'],
            'inci_tags' => ['oud-wood', 'cardamom', 'sandalwood'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maison-alhambra-woody-oud-edp',
            'brand' => 'Maison Alhambra (Lattafa)',
            'name' => 'Woody Oud Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1650,
            'size_label' => '80ml',
            'swatch_hex' => '#27272A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Agarwood (Oud), Cardamom, Rosewood', 'Heart: Sandalwood, Sichuan Pepper, Vetiver', 'Base: Amber, Tonka Bean, Vanilla'],
            'inci_tags' => ['agarwood-accord', 'cardamom-pepper'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tom-ford-oud-wood-clone-woody-oud',
            'match_score' => 95,
            'summary' => 'Smoky, sophisticated, and regal. Woody Oud captures Tom Ford’s signature clean cardamom-spiced agarwood and creamy Mysore sandalwood drydown.',
            'notes' => 'Lasts 8+ hours on wool suits and sherwanis during Indian winter weddings.'
        ]
    ],

    // 7. Kilian Angels' Share
    [
        'orig' => [
            'slug' => 'kilian-angels-share-edp',
            'brand' => 'Kilian Paris',
            'name' => "Angels' Share Eau De Parfum (The Liquors)",
            'category' => 'perfume',
            'mrp_inr' => 22000,
            'size_label' => '50ml',
            'swatch_hex' => '#B45309',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cognac Accord', 'Heart: Cinnamon, Tonka Bean, Oak Wood', 'Base: Praline, Vanilla, Sandalwood'],
            'inci_tags' => ['cognac', 'cinnamon', 'praline'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lattafa-khamrah-edp',
            'brand' => 'Lattafa Perfumes',
            'name' => 'Khamrah Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2600,
            'size_label' => '100ml',
            'swatch_hex' => '#D97706',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Cognac, Cinnamon, Nutmeg, Bergamot', 'Heart: Dates, Praline, Tuberose', 'Base: Vanilla, Tonka, Benzoin, Myrrh'],
            'inci_tags' => ['dates-praline', 'cinnamon-vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'kilian-angels-share-clone-lattafa-khamrah',
            'match_score' => 93,
            'summary' => 'Boozy warm French cognac poured over spiced cinnamon dates and roasted sweet pralines. Khamrah is widely regarded as even more decadent than the original.',
            'notes' => 'Phenomenal 12+ hour stamina with enormous projection in cooler weather.'
        ]
    ],

    // 8. Paco Rabanne 1 Million
    [
        'orig' => [
            'slug' => 'paco-rabanne-1-million-edt',
            'brand' => 'Paco Rabanne',
            'name' => '1 Million Eau De Toilette (Gold Bar)',
            'category' => 'perfume',
            'mrp_inr' => 8200,
            'size_label' => '100ml',
            'swatch_hex' => '#EAB308',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Blood Mandarin, Grapefruit, Mint', 'Heart: Cinnamon, Spicy Notes, Rose', 'Base: Amber, Leather, Woody Notes, Indian Patchouli'],
            'inci_tags' => ['mandarin', 'cinnamon', 'leather'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'armaf-tag-him-prestige-edp',
            'brand' => 'Armaf',
            'name' => 'Tag-Him Prestige Edition Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1450,
            'size_label' => '100ml',
            'swatch_hex' => '#CA8A04',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Grapefruit, Mint, Bergamot', 'Heart: Blood Orange, Cinnamon, Pepper, Lavender', 'Base: Amber, Vanilla, Leather, Patchouli'],
            'inci_tags' => ['cinnamon-amber', 'leather-accord'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'paco-rabanne-1-million-clone-tag-him-prestige',
            'match_score' => 94,
            'summary' => 'The ultimate party and clubbing fragrance. Armaf Tag-Him Prestige replicates the spicy cinnamon, sweet blood mandarin, and rich amber leather DNA.',
            'notes' => 'Beast-mode longevity that cuts through loud nightlife venues and smoky clubs.'
        ]
    ],

    // 9. Bleu de Chanel
    [
        'orig' => [
            'slug' => 'bleu-de-chanel-eau-de-parfum',
            'brand' => 'Chanel',
            'name' => 'Bleu de Chanel Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 12800,
            'size_label' => '100ml',
            'swatch_hex' => '#0F172A',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Grapefruit, Lemon, Mint, Pink Pepper', 'Heart: Ginger, Nutmeg, Jasmine, Iso E Super', 'Base: Incense, Vetiver, Cedar, Sandalwood, Patchouli, Labdanum'],
            'inci_tags' => ['grapefruit', 'incense', 'cedar'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'armaf-club-de-nuit-iconic-edp',
            'brand' => 'Armaf',
            'name' => 'Club De Nuit Blue Iconic Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 3600,
            'size_label' => '105ml',
            'swatch_hex' => '#0284C7',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Grapefruit, Mint, Lemon, Pink Pepper', 'Heart: Ginger, Nutmeg, Melon, Jasmine', 'Base: Incense, Amber, Cedar, Sandalwood, Patchouli'],
            'inci_tags' => ['grapefruit-ginger', 'incense-cedar'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'bleu-de-chanel-clone-club-de-nuit-iconic',
            'match_score' => 95,
            'summary' => 'The benchmark blue fragrance: sparkling tart grapefruit opening merging with smoky church incense and creamy amber cedarwood.',
            'notes' => 'Armaf Blue Iconic gives 10+ hours of longevity; perfect for Indian office boardrooms.'
        ]
    ],

    // 10. Davidoff Cool Water
    [
        'orig' => [
            'slug' => 'davidoff-cool-water-for-men',
            'brand' => 'Davidoff',
            'name' => 'Cool Water Eau De Toilette',
            'category' => 'perfume',
            'mrp_inr' => 4800,
            'size_label' => '125ml',
            'swatch_hex' => '#0284C7',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Sea water, Mint, Green Notes, Lavender, Coriander', 'Heart: Sandalwood, Jasmine, Neroli, Geranium', 'Base: Musk, Oakmoss, Cedar, Tobacco, Amber'],
            'inci_tags' => ['aquatic', 'mint', 'lavender'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'beardo-godfather-perfume-edp',
            'brand' => 'Beardo',
            'name' => 'Godfather Eau De Parfum (Aquatic Aromatic)',
            'category' => 'perfume',
            'mrp_inr' => 399,
            'size_label' => '50ml',
            'swatch_hex' => '#0369A1',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Lemon, Mint, Sea Water', 'Heart: Geranium, Basil', 'Base: Vetiver, Musk, Cedar'],
            'inci_tags' => ['mint-sea', 'vetiver-cedar'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'davidoff-cool-water-clone-beardo-godfather',
            'match_score' => 91,
            'summary' => 'The legendary refreshing oceanic breeze. Beardo Godfather delivers that crisp minty-marine aquatic burst that keeps you smelling shower-fresh in 40°C heat.',
            'notes' => 'At under ₹400, it is an unbeatable everyday gym and college cologne in India.'
        ]
    ],

    // 11. Gucci Flora Gorgeous Gardenia
    [
        'orig' => [
            'slug' => 'gucci-flora-gorgeous-gardenia-edp',
            'brand' => 'Gucci',
            'name' => 'Flora Gorgeous Gardenia Eau de Parfum',
            'category' => 'perfume',
            'mrp_inr' => 10500,
            'size_label' => '100ml',
            'swatch_hex' => '#F472B6',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pear Blossom, Red Berries, Italian Mandarin', 'Heart: White Gardenia, Jasmine, Frangipani', 'Base: Brown Sugar, Patchouli'],
            'inci_tags' => ['gardenia', 'pear-blossom', 'brown-sugar'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'zara-applejuice-eau-de-toilette',
            'brand' => 'Zara',
            'name' => 'Applejuice Eau De Toilette',
            'category' => 'perfume',
            'mrp_inr' => 990,
            'size_label' => '90ml',
            'swatch_hex' => '#F9A8D4',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Apple, Grapefruit, Orange', 'Heart: Rose, Jasmine, Violet, Peony', 'Base: Cedar, Sandalwood, Musk'],
            'inci_tags' => ['apple-citrus', 'peony-jasmine'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'gucci-flora-clone-zara-applejuice',
            'match_score' => 92,
            'summary' => 'A sweet, playful, solar floral bouquet with juicy fruits and delicate gardenia petals. Zara Applejuice is widely celebrated by Indian college students as a fresh everyday sister scent.',
            'notes' => 'Light, sparkling, and completely non-cloying in humid conditions.'
        ]
    ],

    // 12. Victoria's Secret Bombshell
    [
        'orig' => [
            'slug' => 'victorias-secret-bombshell-edp',
            'brand' => "Victoria's Secret",
            'name' => 'Bombshell Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 6500,
            'size_label' => '100ml',
            'swatch_hex' => '#EC4899',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Passionfruit, Grapefruit, Pineapple, Tangerine, Big Strawberry', 'Heart: Peony, Vanilla Orchid, Red Berries, Jasmine, Lily-of-the-Valley', 'Base: Musk, Woody Notes, Oakmoss'],
            'inci_tags' => ['passionfruit', 'peony', 'musk'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'zara-orchid-eau-de-parfum',
            'brand' => 'Zara',
            'name' => 'Orchid Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 990,
            'size_label' => '90ml',
            'swatch_hex' => '#DB2777',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Bergamot, Rose', 'Heart: Orchid, Peach', 'Base: Cedar, Vanilla'],
            'inci_tags' => ['orchid', 'peach', 'vanilla'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'victorias-secret-bombshell-clone-zara-orchid',
            'match_score' => 95,
            'summary' => 'Zara Orchid is a verified 95% olfactory twin to Victoria’s Secret Bombshell. Bursts with mouthwatering exotic fruits, fresh peony petals, and cheerful sunshine.',
            'notes' => 'Lasts 6-7 hours on clothes and costs under ₹1,000 in Zara India stores.'
        ]
    ],

    // 13. Tom Ford Tobacco Vanille
    [
        'orig' => [
            'slug' => 'tom-ford-tobacco-vanille',
            'brand' => 'Tom Ford',
            'name' => 'Tobacco Vanille Private Blend Eau de Parfum',
            'category' => 'perfume',
            'mrp_inr' => 24000,
            'size_label' => '50ml',
            'swatch_hex' => '#78350F',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Tobacco Leaf, Spicy Notes', 'Heart: Tonka Bean, Vanilla, Cacao, Tobacco Blossom', 'Base: Dried Fruits, Woody Notes'],
            'inci_tags' => ['tobacco-leaf', 'madagascar-vanilla'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maison-alhambra-tobacco-touch',
            'brand' => 'Maison Alhambra (Lattafa)',
            'name' => 'Tobacco Touch Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 2100,
            'size_label' => '80ml',
            'swatch_hex' => '#92400E',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Tobacco Leaf, Oriental Spices', 'Heart: Vanilla, Tonka, Cacao', 'Base: Dried Fruits, Wood Accord'],
            'inci_tags' => ['tobacco-accord', 'vanilla-tonka'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tom-ford-tobacco-vanille-clone-tobacco-touch',
            'match_score' => 94,
            'summary' => 'Recreates Tom Ford\'s opulent blend of moist aromatic tobacco leaves, spiced tonka bean, rich cocoa, and sweet Madagascar vanilla pods.',
            'notes' => 'Perfect for Indian winters and festive evenings; 8+ hours of cozy projection.'
        ]
    ],

    // 14. YSL Black Opium
    [
        'orig' => [
            'slug' => 'ysl-black-opium-edp',
            'brand' => 'Yves Saint Laurent',
            'name' => 'Black Opium Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 11500,
            'size_label' => '90ml',
            'swatch_hex' => '#4C1D95',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Pear, Pink Pepper, Orange Blossom', 'Heart: Black Coffee, Jasmine, Bitter Almond, Licorice', 'Base: Vanilla, Patchouli, Cashmere Wood, Cedar'],
            'inci_tags' => ['coffee', 'vanilla', 'orange-blossom'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'zara-gardenia-eau-de-parfum',
            'brand' => 'Zara',
            'name' => 'Gardenia Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1290,
            'size_label' => '90ml',
            'swatch_hex' => '#581C87',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Orange Blossom', 'Heart: Coffee, White Floral', 'Base: Vanilla, Cashmere Wood'],
            'inci_tags' => ['coffee-accord', 'vanilla-floral'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'ysl-black-opium-clone-zara-gardenia',
            'match_score' => 91,
            'summary' => 'Zara Gardenia is famous worldwide as the most affordable direct dupe to YSL Black Opium. Features the same warm roasted black coffee and creamy vanilla white floral base.',
            'notes' => 'Great sillage for evening dinners and date nights in India.'
        ]
    ],

    // 15. Versace Eros
    [
        'orig' => [
            'slug' => 'versace-eros-eau-de-toilette',
            'brand' => 'Versace',
            'name' => 'Eros Eau De Toilette',
            'category' => 'perfume',
            'mrp_inr' => 8500,
            'size_label' => '100ml',
            'swatch_hex' => '#065F46',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Mint, Green Apple, Lemon', 'Heart: Tonka Bean, Ambroxan, Geranium', 'Base: Madagascar Vanilla, Virginian Cedar, Atlas Cedar, Vetiver, Oakmoss'],
            'inci_tags' => ['mint', 'green-apple', 'tonka'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'armaf-aura-fresh-eau-de-parfum',
            'brand' => 'Armaf',
            'name' => 'Aura Fresh Eau De Parfum',
            'category' => 'perfume',
            'mrp_inr' => 1650,
            'size_label' => '100ml',
            'swatch_hex' => '#047857',
            'undertone' => null,
            'key_actives_or_notes' => ['Top: Crisp Mint, Lemon, Green Apple', 'Heart: Tonka Bean, Geranium, Ambroxan', 'Base: Vanilla, Cedar, Oakmoss'],
            'inci_tags' => ['crisp-mint', 'vanilla-tonka'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'versace-eros-clone-armaf-aura-fresh',
            'match_score' => 93,
            'summary' => 'Fresh, masculine, and seductive. Vibrant crunchy green apple with zesty mint leaves and sweet vanilla tonka bean.',
            'notes' => 'Armaf Aura Fresh delivers 8+ hours of projection in Indian party settings.'
        ]
    ]
];

// Let's add remaining 25 fragrance pairs programmatically to reach 40 pairs total!
$additionalPerfumes = [
    // 16. Acqua Di Gio
    ['armani-acqua-di-gio-edt', 'Giorgio Armani', 'Acqua Di Gio Eau De Toilette', 9200, '100ml', '#38BDF8', 'paris-corner-allusion-eau-fraiche', 'Paris Corner', 'Pendora Allusion Eau Fraiche', 1550, '100ml', '#0284C7', 'acqua-di-gio-clone-paris-corner', 94, 'The timeless aquatic citrus classic. Sparkling sea breeze, Calabrian bergamot, and sun-warmed cedar.', 'Paris Corner performs with better longevity in humid Indian coastal areas.'],

    // 17. Tom Ford Lost Cherry
    ['tom-ford-lost-cherry', 'Tom Ford', 'Lost Cherry Private Blend Eau de Parfum', 32000, '50ml', '#881337', 'maison-alhambra-lovely-cherie', 'Maison Alhambra (Lattafa)', 'Lovely Chèrie Eau De Parfum', 1650, '80ml', '#9F1239', 'tom-ford-lost-cherry-clone-lovely-cherie', 95, 'Lush ripe black cherries dripping in sweet cherry liqueur with a heart of bitter almond, Turkish rose, and Peru balsam.', 'Maison Alhambra replicates the photorealistic boozy cherry note at 1/20th the price.'],

    // 18. Kilian Black Phantom
    ['kilian-black-phantom-memento-mori', 'Kilian Paris', 'Black Phantom Memento Mori', 26000, '50ml', '#18181B', 'fragrance-world-spectre-ghost', 'Fragrance World', 'Spectre Ghost Eau De Parfum', 1850, '80ml', '#09090B', 'kilian-black-phantom-clone-spectre-ghost', 92, 'Dark roasted coffee, Martinique rum, bitter almond, and molten dark chocolate over cane sugar.', 'Rich, opulent gourmand sillage perfect for sherwani wedding attire.'],

    // 19. Le Labo Santal 33
    ['le-labo-santal-33-edp', 'Le Labo', 'Santal 33 Eau De Parfum', 28000, '100ml', '#A16207', 'lattafa-qaaed-al-shabaab', 'Lattafa Perfumes', 'Qaa\'ed Al Shabaab Eau De Parfum', 1650, '100ml', '#854D0E', 'le-labo-santal-33-clone-qaaed', 91, 'Hypnotic smoky Australian sandalwood, spicy cardamom, iris, and leather violet notes.', 'Lattafa delivers an intoxicating woody aroma that lasts 10+ hours.'],

    // 20. Parfums de Marly Delina
    ['parfums-de-marly-delina-edp', 'Parfums de Marly', 'Delina Royal Essence Eau de Parfum', 29000, '75ml', '#F472B6', 'armaf-club-de-nuit-white-imperiale', 'Armaf', 'Club De Nuit White Imperiale Extrait', 3800, '105ml', '#EC4899', 'pdm-delina-clone-cdn-white-imperiale', 96, 'Sensual Turkish damascena rose, tart juicy lychee, rhubarb, and creamy cashmeran vanilla.', 'Armaf White Imperiale has nuclear sillage and lasts 14+ hours on fabrics.'],

    // 21. Bvlgari Man in Black
    ['bvlgari-man-in-black-edp', 'Bvlgari', 'Man In Black Eau De Parfum', 9800, '100ml', '#451A03', 'armaf-radical-brown-edp', 'Armaf', 'Radical Brown Pour Homme Eau De Parfum', 1650, '100ml', '#290E02', 'bvlgari-man-in-black-clone-radical-brown', 93, 'A spicy oriental amber with boozy rum, warm leather, tuberose, and guaiac wood.', 'Armaf Radical Brown is a winter powerhouse that smells rich and masculine.'],

    // 22. Giorgio Armani Si
    ['giorgio-armani-si-edp', 'Giorgio Armani', 'Sì Eau De Parfum', 9800, '100ml', '#F43F5E', 'zara-femme-eau-de-toilette', 'Zara', 'Femme Eau De Toilette', 990, '90ml', '#FB7185', 'armani-si-clone-zara-femme', 91, 'Blackcurrant nectar, airy rose de mai, freesia, and warm musky blond wood patchouli.', 'Zara Femme captures the sophisticated feminine sweet chypre aura.'],

    // 23. Chanel Coco Mademoiselle
    ['chanel-coco-mademoiselle-edp', 'Chanel', 'Coco Mademoiselle Eau De Parfum', 13500, '100ml', '#FB7185', 'armaf-club-de-nuit-woman-edp', 'Armaf', 'Club De Nuit Woman Eau De Parfum', 2100, '105ml', '#F43F5E', 'chanel-coco-mademoiselle-clone-cdn-woman', 95, 'Sparkling orange blossom, rose, jasmine, Indonesian patchouli, and clean vetiver.', 'Armaf CDN Woman is universally praised as an exact 95% dupe for Coco Mademoiselle.'],

    // 24. Maison Margiela Jazz Club
    ['maison-margiela-replica-jazz-club', 'Maison Margiela', 'Replica Jazz Club Eau De Toilette', 12500, '100ml', '#B45309', 'zara-rich-warm-addictive', 'Zara', 'Tobacco Collection: Rich Warm Addictive', 1290, '100ml', '#92400E', 'maison-margiela-jazz-club-clone-zara', 93, 'Heady pink pepper, rum absolute, tobacco leaf, vanilla bean, and styrax resin.', 'Zara Rich Warm Addictive is one of the most viral sweet-rum tobacco scents in India.'],

    // 25. Maison Margiela By the Fireplace
    ['maison-margiela-replica-by-the-fireplace', 'Maison Margiela', 'Replica By the Fireplace', 12500, '100ml', '#78350F', 'lattafa-ameer-al-oudh-intense-oud', 'Lattafa Perfumes', 'Ameer Al Oudh Intense Oud Eau De Parfum', 1650, '100ml', '#451A03', 'by-the-fireplace-clone-ameer-al-oudh', 94, 'Roasting sweet chestnuts, smoky burning wood, clove oil, and cozy warm vanilla.', 'Lattafa Ameer Al Oudh Intense gives beast-mode 12+ hour warm campfire performance.'],

    // 26. Parfums de Marly Layton
    ['pdm-layton-royal-essence', 'Parfums de Marly', 'Layton Royal Essence Eau de Parfum', 28000, '125ml', '#1E3A8A', 'al-haramain-detour-noir-edp', 'Al Haramain', 'Detour Noir Eau De Parfum', 2200, '100ml', '#172554', 'pdm-layton-clone-detour-noir', 96, 'Crisp green apple, lavender, bergamot, cardamom, and delicious warm vanilla sandalwood.', 'Al Haramain Detour Noir is the undisputed king clone of Layton in global fragrance communities.'],

    // 27. Nishane Ani
    ['nishane-ani-extrait-de-parfum', 'Nishane', 'Ani Extrait De Parfum (No Boundaries)', 24000, '100ml', '#F59E0B', 'lattafa-nasheet-eau-de-parfum', 'Lattafa Perfumes', 'Nasheet Eau De Parfum', 1650, '80ml', '#D97706', 'nishane-ani-clone-lattafa-nasheet', 93, 'Zesty ginger, bergamot, pink pepper, cardamom, and rich velvety bourbon vanilla.', 'Lattafa Nasheet replicates the spicy warm ginger-vanilla drydown effortlessly.'],

    // 28. Terre d'Hermes
    ['terre-d-hermes-eau-de-toilette', 'Hermes', 'Terre d\'Hermes Eau De Toilette', 9500, '100ml', '#EA580C', 'armaf-derby-club-house-gold', 'Armaf', 'Derby Club House Gold Pour Homme', 1550, '100ml', '#C2410C', 'terre-d-hermes-clone-derby-gold', 92, 'Bitter earthy orange, flint, pink pepper, geranium, cedarwood, and smoky vetiver.', 'Armaf Derby Gold provides exceptional all-day performance in hot Indian weather.'],

    // 29. Jean Paul Gaultier Ultra Male
    ['jpg-ultra-male-intense-edt', 'Jean Paul Gaultier', 'Ultra Male Eau de Toilette Intense', 8800, '125ml', '#1D4ED8', 'afnan-9-pm-eau-de-parfum', 'Afnan Perfumes', '9 PM Eau De Parfum for Men', 2400, '100ml', '#1E40AF', 'jpg-ultra-male-clone-afnan-9pm', 97, 'Sweet juicy black pear, lavender, mint, cinnamon, vanilla, and amber woods.', 'Afnan 9 PM is a legendary clubbing fragrance in India that outperforms Ultra Male batches.'],

    // 30. JPG Le Male Le Parfum
    ['jpg-le-male-le-parfum', 'Jean Paul Gaultier', 'Le Male Le Parfum Eau De Parfum Intense', 9200, '125ml', '#0F172A', 'maison-alhambra-glacier-le-noir', 'Maison Alhambra (Lattafa)', 'Glacier Le Noir Eau De Parfum', 1450, '100ml', '#020617', 'jpg-le-male-le-parfum-clone-glacier-noir', 94, 'Cardamom burst, iris heart, lavender, and rich vanilla oriental wood base.', 'Sophisticated, smooth, and deeply attractive for formal dinners.'],

    // 31. Prada L'Homme
    ['prada-l-homme-eau-de-toilette', 'Prada', 'Prada L\'Homme Eau De Toilette', 9800, '100ml', '#64748B', 'armaf-evoke-gold-edition-edp', 'Armaf', 'Evoke Gold Edition For Men', 1850, '90ml', '#475569', 'prada-l-homme-clone-armaf-evoke-gold', 94, 'The ultimate luxurious freshly pressed white shirt scent: powdery iris, neroli, amber, and cedar.', 'Armaf Evoke Gold captures the refined soapy clean Italian tailoring vibe.'],

    // 32. Montblanc Explorer
    ['montblanc-explorer-edp', 'Montblanc', 'Explorer Eau De Parfum', 7500, '100ml', '#334155', 'armaf-ventana-pour-homme', 'Armaf', 'Ventana Pour Homme Eau De Parfum', 1550, '100ml', '#1E293B', 'montblanc-explorer-clone-armaf-ventana', 93, 'Italian bergamot, clary sage, pink pepper, Haitian vetiver, and Akigalawood patchouli.', 'Armaf Ventana cuts through sweat and project for 8+ hours.'],

    // 33. Jo Malone Wood Sage & Sea Salt
    ['jo-malone-wood-sage-sea-salt-cologne', 'Jo Malone London', 'Wood Sage & Sea Salt Cologne', 11000, '100ml', '#E2E8F0', 'jenny-glow-wood-and-sage-edp', 'Jenny Glow', 'Wood & Sage Eau De Parfum', 1450, '80ml', '#CBD5E1', 'jo-malone-wood-sage-clone-jenny-glow', 95, 'Crashing sea salt spray, mineral coastal cliff air, and earthy woody sage.', 'Jenny Glow is formulated as an EDP, outlasting Jo Malone\'s weak EDC longevity.'],

    // 34. Jo Malone English Pear & Freesia
    ['jo-malone-english-pear-freesia-cologne', 'Jo Malone London', 'English Pear & Freesia Cologne', 11000, '100ml', '#FEF08A', 'jenny-glow-english-pear-edp', 'Jenny Glow', 'English Pear Eau De Parfum', 1450, '80ml', '#FDE047', 'jo-malone-english-pear-clone-jenny-glow', 95, 'King William pear, white freesia flowers, amber, and patchouli.', 'Jenny Glow gives 6-8 hours of crisp autumn orchard freshness.'],

    // 35. Diptyque Philosykos
    ['diptyque-philosykos-eau-de-parfum', 'Diptyque', 'Philosykos Eau De Parfum (Fig Tree)', 15000, '75ml', '#15803D', 'zara-fig-eau-de-parfum', 'Zara', 'Ancestral Papyrus / Fig Eau De Parfum', 1290, '100ml', '#166534', 'diptyque-philosykos-clone-zara-fig', 91, 'Green fig leaves, creamy coconut fig milk, white cedar, and sun-drenched bark.', 'Captures the lush Mediterranean and Indian botanical green serenity.'],

    // 36. Narciso Rodriguez For Her
    ['narciso-rodriguez-for-her-edp', 'Narciso Rodriguez', 'For Her Eau De Parfum', 8800, '100ml', '#F43F5E', 'zara-bright-rose-edp', 'Zara', 'Bright Rose Eau De Parfum', 990, '90ml', '#FB7185', 'narciso-rodriguez-for-her-clone-zara', 92, 'Sensual Egyptian musk heart surrounded by rose petals, peach pulp, and patchouli amber.', 'Zara Bright Rose is an airy, skin-hugging musk for ₹990.'],

    // 37. Dolce & Gabbana Light Blue
    ['dolce-gabbana-light-blue-pour-femme', 'Dolce & Gabbana', 'Light Blue Eau De Toilette', 7800, '100ml', '#38BDF8', 'bella-vita-skai-aquatic-unisex', 'Bella Vita Organic', 'Skai Aquatic Unisex Eau De Cologne', 599, '100ml', '#0284C7', 'dg-light-blue-clone-bella-vita-skai', 90, 'Sicilian lemon, crisp Granny Smith apple, bluebell, bamboo, and cedar musk.', 'Bella Vita Skai is a budget citrus splash for hot Indian afternoon refreshes.'],

    // 38. Mancera Cedrat Boise
    ['mancera-cedrat-boise-edp', 'Mancera', 'Cedrat Boise Eau De Parfum', 14000, '120ml', '#FCD34D', 'armaf-club-de-nuit-milestone', 'Armaf', 'Club De Nuit Milestone Eau De Parfum', 3400, '105ml', '#FBBF24', 'mancera-cedrat-boise-clone-cdn-milestone', 92, 'Sparkling Sicilian lemon, blackcurrant, spicy wood notes, leather, and oakmoss.', 'Milestone performs with high longevity in intense tropical humidity.'],

    // 39. Creed Millesime Imperial
    ['creed-millesime-imperial-edp', 'Creed', 'Millesime Imperial Eau De Parfum', 32000, '100ml', '#F59E0B', 'armaf-club-de-nuit-milestone-gold', 'Armaf', 'Club De Nuit Milestone (Gold Flacon)', 3400, '105ml', '#D97706', 'creed-millesime-imperial-clone-cdn-milestone', 96, 'Sun-drenched fruit, sea salt marine notes, Sicilian lemon, bergamot, iris, and musk.', 'Armaf Milestone is legendary as the definitive clone that beats modern Creed longevity.'],

    // 40. Creed Green Irish Tweed
    ['creed-green-irish-tweed-edp', 'Creed', 'Green Irish Tweed Eau De Parfum', 31000, '100ml', '#15803D', 'armaf-tres-nuit-pour-homme-edp', 'Armaf', 'Tres Nuit Pour Homme Eau De Parfum', 1750, '100ml', '#166534', 'creed-green-irish-tweed-clone-armaf-tres-nuit', 95, 'Lush green verbena, iris, violet leaves, sandalwood, and ambergris.', 'Armaf Tres Nuit captures the crisp pastoral green gentlemen aura at less than 1/15th the price.']
];

foreach ($additionalPerfumes as $ap) {
    $perfumes[] = [
        'orig' => [
            'slug' => $ap[0],
            'brand' => $ap[1],
            'name' => $ap[2],
            'category' => 'perfume',
            'mrp_inr' => $ap[3],
            'size_label' => $ap[4],
            'swatch_hex' => $ap[5],
            'undertone' => null,
            'key_actives_or_notes' => ['Luxury Designer / Niche Olfactory Masterpiece'],
            'inci_tags' => ['niche-accord'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => $ap[6],
            'brand' => $ap[7],
            'name' => $ap[8],
            'category' => 'perfume',
            'mrp_inr' => $ap[9],
            'size_label' => $ap[10],
            'swatch_hex' => $ap[11],
            'undertone' => null,
            'key_actives_or_notes' => ['Tested Middle Eastern & Indian Beast-Mode Clone'],
            'inci_tags' => ['clone-accord'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => $ap[12],
            'match_score' => $ap[13],
            'summary' => $ap[14],
            'notes' => $ap[15]
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
$clonesCount = 0;

foreach ($perfumes as $item) {
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

    // 2. Upsert Clone
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

    // 3. Upsert Dupe / Clone Record
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
    $clonesCount++;
}

$pdo->commit();

echo "✅ Successfully seeded {$clonesCount} luxury perfume vs. clone pairs (" . ($clonesCount * 2) . " total products)!\n";

