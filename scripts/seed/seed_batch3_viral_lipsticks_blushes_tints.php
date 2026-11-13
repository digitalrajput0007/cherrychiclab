<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder Batch 3: 35 Viral Lipsticks, Lip Oils, Blushes & Tints
 * Adds 35 pairs (70 products + 35 dupes records) with Hex Swatch pills.
 * Run with: php C:\CherryChicLab\scripts\seed\seed_batch3_viral_lipsticks_blushes_tints.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "💄 [CherryChic Lab] Seeding Batch 3: 35 Viral Lipsticks, Blushes & Tints (70 products)...\n";

$pdo = get_db();

$pairs = [
    // 1. Dior Addict Lip Glow Oil 001 Pink vs Swiss Beauty Plump-Up Lip Oil
    [
        'orig' => [
            'slug' => 'dior-addict-lip-glow-oil-001-pink',
            'brand' => 'Dior',
            'name' => 'Addict Lip Glow Oil - 001 Pink',
            'category' => 'makeup',
            'mrp_inr' => 3900,
            'size_label' => '6ml',
            'swatch_hex' => '#F472B6',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Cherry Oil', 'Color Reviver Technology', 'Glossy Film Protect'],
            'inci_tags' => ['cherry-oil', 'high-shine-polymers'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-plump-up-glossy-lip-oil-muted-pink',
            'brand' => 'Swiss Beauty',
            'name' => 'Plump-Up Glossy Lip Oil - 01 Muted Pink',
            'category' => 'makeup',
            'mrp_inr' => 299,
            'size_label' => '4ml',
            'swatch_hex' => '#F26EAE',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Vitamin E', 'Rosehip Seed Oil', 'Glassy Mirror Shine'],
            'inci_tags' => ['vitamin-e', 'rosehip-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dior-lip-glow-oil-pink-dupe-swiss-beauty-lip-oil',
            'match_score' => 96,
            'summary' => 'Both give that juicy, ultra-glossy glass lip reflection with a subtle pH-adjusting pink tint that looks natural on pigmented lips.',
            'notes' => 'Swiss Beauty provides that cushiony non-sticky luxury oil feel for ₹299 vs Dior ₹3,900 (Save ₹3,601).'
        ]
    ],

    // 2. Clarins Lip Comfort Oil Red Berry vs Blue Heaven Lip Oil Glaze
    [
        'orig' => [
            'slug' => 'clarins-lip-comfort-oil-03-red-berry',
            'brand' => 'Clarins',
            'name' => 'Lip Comfort Oil - 03 Red Berry',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '7ml',
            'swatch_hex' => '#BE123C',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Organic Jojoba Oil', 'Hazelnut Oil', 'Organic Sweetbriar Rose Oil'],
            'inci_tags' => ['jojoba-oil', 'rose-oil'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'blue-heaven-lip-oil-glaze-berry-punch',
            'brand' => 'Blue Heaven',
            'name' => 'Lip Oil Glaze - Berry Punch',
            'category' => 'makeup',
            'mrp_inr' => 199,
            'size_label' => '5ml',
            'swatch_hex' => '#B91C1C',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Jojoba Oil', 'Almond Oil', 'Berry Pigment Infusion'],
            'inci_tags' => ['jojoba-oil', 'almond-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'clarins-lip-oil-red-berry-dupe-blue-heaven-berry',
            'match_score' => 93,
            'summary' => 'Deep berry jelly tints that cushion dry, chapped lips with nourishing plant botanical oils.',
            'notes' => 'Blue Heaven is an affordable Indian everyday handbag staple with an identical juicy sheer red-berry wash.'
        ]
    ],

    // 3. Fenty Beauty Gloss Bomb Fenty Glow vs Maybelline Lifter Gloss Topaz
    [
        'orig' => [
            'slug' => 'fenty-beauty-gloss-bomb-fenty-glow',
            'brand' => 'Fenty Beauty',
            'name' => 'Gloss Bomb Universal Lip Luminizer - Fenty Glow',
            'category' => 'makeup',
            'mrp_inr' => 2150,
            'size_label' => '9ml',
            'swatch_hex' => '#C07D67',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Shea Butter', 'Peach Vanilla Scent', 'Micro-fine Rose Gold Shimmer'],
            'inci_tags' => ['shea-butter', 'vanilla-fragrance'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-lifter-gloss-008-topaz',
            'brand' => 'Maybelline New York',
            'name' => 'Lifter Gloss with Hyaluronic Acid - 008 Topaz',
            'category' => 'makeup',
            'mrp_inr' => 699,
            'size_label' => '5.4ml',
            'swatch_hex' => '#BF7A64',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Hyaluronic Acid', 'XL Wand Applicator', 'Bronzed Shimmer Glaze'],
            'inci_tags' => ['hyaluronic-acid', 'emollient-polymers'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'fenty-glow-gloss-bomb-dupe-maybelline-topaz',
            'match_score' => 97,
            'summary' => 'Universally celebrated as the #1 exact color and glitter match for Rihanna’s iconic rose-nude Fenty Glow gloss.',
            'notes' => 'Maybelline adds topical Hyaluronic Acid which visibly plumps lip volume and smooths fine lip lines.'
        ]
    ],

    // 4. Fenty Beauty Gloss Bomb Fu$$y vs Swiss Beauty Holographic Gloss Rosy
    [
        'orig' => [
            'slug' => 'fenty-beauty-gloss-bomb-fussy',
            'brand' => 'Fenty Beauty',
            'name' => 'Gloss Bomb Universal Lip Luminizer - Fu$$y',
            'category' => 'makeup',
            'mrp_inr' => 2150,
            'size_label' => '9ml',
            'swatch_hex' => '#E0859F',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Shea Butter', 'Soft Romantic Pink Shimmer', 'Volumizing Shine'],
            'inci_tags' => ['shea-butter', 'mineral-shimmer'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-holographic-lip-gloss-rosy-sheen',
            'brand' => 'Swiss Beauty',
            'name' => 'Holographic Lip Gloss - Rosy Sheen',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '6ml',
            'swatch_hex' => '#DF839C',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Vitamin E', 'Reflective Pink Pearl', 'Jojoba Oil'],
            'inci_tags' => ['vitamin-e', 'jojoba-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'fenty-fussy-gloss-dupe-swiss-beauty-rosy-sheen',
            'match_score' => 94,
            'summary' => 'Soft dusty-rose glosses packed with micro-fine light-reflecting pearls that create fuller-looking lips without grittiness.',
            'notes' => 'Swiss Beauty delivers the exact same fairy-pink dazzle for ₹249 vs Fenty ₹2,150 (Save ₹1,901).'
        ]
    ],

    // 5. Benefit Benetint Rose Tint vs Etude House Dear Darling Water Tint
    [
        'orig' => [
            'slug' => 'benefit-cosmetics-benetint-lip-and-cheek-stain',
            'brand' => 'Benefit Cosmetics',
            'name' => 'Benetint Rose Tinted Lip & Cheek Stain',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '6ml',
            'swatch_hex' => '#D8294E',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Natural Rose Petal Water', 'Smudge-Proof Watercolor Formula'],
            'inci_tags' => ['rose-water', 'water-stain'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'etude-house-dear-darling-water-tint-cherry-ade',
            'brand' => 'Etude House',
            'name' => 'Dear Darling Water Tint - 02 Cherry Ade',
            'category' => 'makeup',
            'mrp_inr' => 450,
            'size_label' => '9g',
            'swatch_hex' => '#D6274B',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Pomegranate Extract', 'Grapefruit Extract', 'Weightless Water Base'],
            'inci_tags' => ['botanical-extracts', 'water-stain'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'benefit-benetint-dupe-etude-dear-darling-cherry',
            'match_score' => 96,
            'summary' => 'The quintessential natural flushed tint. Absorbs into skin instantly, creating a kiss-proof, non-transferable cherry-rose stain.',
            'notes' => 'Etude House gives 9g of pigment for ₹450 that lasts through spicy Indian meals without fading.'
        ]
    ],

    // 6. Benefit Gogotint Bright Cherry vs Insight Cosmetics Lip & Cheek Tint
    [
        'orig' => [
            'slug' => 'benefit-cosmetics-gogotint-bright-cherry-stain',
            'brand' => 'Benefit Cosmetics',
            'name' => 'Gogotint Bright Cherry Lip & Cheek Stain',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '6ml',
            'swatch_hex' => '#F43F5E',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Bright Coral Cherry Pigments', 'Longwear Liquid-Gel Stain'],
            'inci_tags' => ['liquid-stain'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'insight-cosmetics-lip-and-cheek-tint-cherry-crush',
            'brand' => 'Insight Cosmetics',
            'name' => 'Lip & Cheek Tint - 01 Cherry Crush',
            'category' => 'makeup',
            'mrp_inr' => 140,
            'size_label' => '5g',
            'swatch_hex' => '#F23B5A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Sweet Almond Oil', 'Buildable Sheer-to-Bold Tint'],
            'inci_tags' => ['vitamin-e', 'almond-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'benefit-gogotint-dupe-insight-cherry-crush',
            'match_score' => 92,
            'summary' => 'Vibrant warm poppy-cherry stains that bring instant life and brightness to wheatish and medium-tan Indian complexions.',
            'notes' => 'Insight Cosmetics costs an unbelievable ₹140 (Save ₹2,260 over Benefit).'
        ]
    ],

    // 7. Rhode Peptide Lip Tint Espresso vs Mars Tinted Lip Balm Hazelnut
    [
        'orig' => [
            'slug' => 'rhode-peptide-lip-tint-espresso',
            'brand' => 'Rhode Skin by Hailey Bieber',
            'name' => 'Peptide Lip Tint - Espresso (Rich Brown Glaze)',
            'category' => 'makeup',
            'mrp_inr' => 2600,
            'size_label' => '10ml',
            'swatch_hex' => '#5C382C',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Shea Butter', 'Peptides', 'Cupuacu Butter', 'Babassu Oil'],
            'inci_tags' => ['peptides', 'shea-butter'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-tinted-lip-balm-hazelnut-drizzle',
            'brand' => 'Mars Cosmetics',
            'name' => 'Glaze Butter Tinted Lip Balm - Hazelnut Drizzle',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '8g',
            'swatch_hex' => '#5A362A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Castor Seed Oil', 'Vitamin E', 'Cocoa Butter', 'Moisture Glaze'],
            'inci_tags' => ['castor-oil', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rhode-espresso-lip-tint-dupe-mars-hazelnut',
            'match_score' => 95,
            'summary' => 'The viral 90s brownie-glazed lip look. Both coat lips in a sheer, decadent warm espresso-chocolate tint with glossy shine.',
            'notes' => 'Mars replicates Hailey Bieber’s viral lip glaze at less than one-tenth of the imported reseller price.'
        ]
    ],

    // 8. Rhode Peptide Lip Tint Toast vs Dot & Key Gloss Boss Caramel Glaze
    [
        'orig' => [
            'slug' => 'rhode-peptide-lip-tint-toast',
            'brand' => 'Rhode Skin by Hailey Bieber',
            'name' => 'Peptide Lip Tint - Toast (Rose Taupe)',
            'category' => 'makeup',
            'mrp_inr' => 2600,
            'size_label' => '10ml',
            'swatch_hex' => '#9B6B61',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Shea Butter', 'Peptides', 'Cupuacu', 'Toasted Nude Glaze'],
            'inci_tags' => ['peptides', 'shea-butter'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-gloss-boss-caramel-glaze',
            'brand' => 'Dot & Key',
            'name' => 'Gloss Boss Tinted Lip Balm SPF 30 - Caramel Glaze',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '12g',
            'swatch_hex' => '#98685E',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin C + E', 'Shea Butter', 'SPF 30 UV Protection'],
            'inci_tags' => ['shea-butter', 'vitamin-c', 'sunscreen-filters'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rhode-toast-lip-tint-dupe-dot-and-key-caramel',
            'match_score' => 94,
            'summary' => 'Chic toasted warm caramel nude tints that look sophisticated on Indian skin tones for daily college or office wear.',
            'notes' => 'Dot & Key adds broad-spectrum SPF 30 sun protection to prevent lip tanning, saving you ₹2,351.'
        ]
    ],

    // 9. Rhode Peptide Lip Tint Ribbon vs Hyphen Glazing Lip Balm Bubblegum
    [
        'orig' => [
            'slug' => 'rhode-peptide-lip-tint-ribbon',
            'brand' => 'Rhode Skin by Hailey Bieber',
            'name' => 'Peptide Lip Tint - Ribbon (Sheer Ballet Pink)',
            'category' => 'makeup',
            'mrp_inr' => 2600,
            'size_label' => '10ml',
            'swatch_hex' => '#F4A5B8',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Shea Butter', 'Peptides', 'Babassu', 'Glassy Sheer Pink Pigment'],
            'inci_tags' => ['peptides', 'shea-butter'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'hyphen-glazing-lip-balm-bubblegum-pink',
            'brand' => 'Hyphen',
            'name' => 'All I Need Glazing Lip Balm - Bubblegum Pink',
            'category' => 'makeup',
            'mrp_inr' => 349,
            'size_label' => '10g',
            'swatch_hex' => '#F2A2B5',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['1% Vitamin E', 'Shea Butter', 'Peptides', 'Avocado Oil'],
            'inci_tags' => ['peptides', 'shea-butter', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rhode-ribbon-lip-tint-dupe-hyphen-bubblegum',
            'match_score' => 96,
            'summary' => 'Translucent milky ballet-slipper pink balms that give lips a pillowy cushion effect.',
            'notes' => 'Hyphen formulation includes identical signal peptides and buttery emollients at ₹349.'
        ]
    ],

    // 10. Huda Beauty Power Bullet Interview vs Mars Matte Box Nude Mood
    [
        'orig' => [
            'slug' => 'huda-beauty-power-bullet-interview',
            'brand' => 'Huda Beauty',
            'name' => 'Power Bullet Matte Lipstick - Interview (Warm Peachy Nude)',
            'category' => 'makeup',
            'mrp_inr' => 2200,
            'size_label' => '3g',
            'swatch_hex' => '#B36D61',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Custom Diamond Shaped Bullet', 'Plush Velvet Matte Pigment', 'Sweet Almond Oil'],
            'inci_tags' => ['dimethicone', 'matte-waxes'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-matte-box-crayon-nude-mood',
            'brand' => 'Mars Cosmetics',
            'name' => 'Matte Box Lipstick Crayon - 03 Nude Mood',
            'category' => 'makeup',
            'mrp_inr' => 229,
            'size_label' => '3.5g',
            'swatch_hex' => '#B16B5F',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Microcrystalline Wax', 'One-Swipe Velvet Matte'],
            'inci_tags' => ['vitamin-e', 'emollient-wax'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'huda-interview-dupe-mars-nude-mood',
            'match_score' => 95,
            'summary' => 'The quintessential Indian bridal warm peachy nude. Never washes out wheatish complexions.',
            'notes' => 'Mars delivers one-swipe full coverage matte payoff for ₹229 vs Huda Beauty ₹2,200 (Save ₹1,971).'
        ]
    ],

    // 11. Huda Beauty Power Bullet Graduation Day vs Swiss Beauty HD Matte Cute Nude
    [
        'orig' => [
            'slug' => 'huda-beauty-power-bullet-graduation-day',
            'brand' => 'Huda Beauty',
            'name' => 'Power Bullet Matte Lipstick - Graduation Day (Warm Dusty Rose)',
            'category' => 'makeup',
            'mrp_inr' => 2200,
            'size_label' => '3g',
            'swatch_hex' => '#A35A62',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['High-Impact Pigment', 'Velvet Matte Cushion Matrix'],
            'inci_tags' => ['dimethicone', 'matte-waxes'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-hd-matte-cute-nude',
            'brand' => 'Swiss Beauty',
            'name' => 'HD Matte Lipstick - Cute Nude',
            'category' => 'makeup',
            'mrp_inr' => 299,
            'size_label' => '3.5g',
            'swatch_hex' => '#A15860',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin E', 'Hydrating Candelilla Wax', 'Transfer-Resistant Matte'],
            'inci_tags' => ['vitamin-e', 'candelilla-wax'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'huda-graduation-day-dupe-swiss-beauty-cute-nude',
            'match_score' => 96,
            'summary' => 'Sophisticated dusty rose-mauve matte lipsticks that pair effortlessly with smokey brown eye makeup.',
            'notes' => 'Swiss Beauty feels creamy upon initial glide and sets into a non-flaking comfortable HD matte finish.'
        ]
    ],

    // 12. Too Faced Better Than Sex Mascara vs Mars Double Trouble Mascara
    [
        'orig' => [
            'slug' => 'too-faced-better-than-sex-volumizing-mascara',
            'brand' => 'Too Faced',
            'name' => 'Better Than Sex Volumizing Mascara',
            'category' => 'makeup',
            'mrp_inr' => 2450,
            'size_label' => '8ml',
            'swatch_hex' => '#111827',
            'undertone' => null,
            'key_actives_or_notes' => ['Hourglass-shaped Brush', 'Film-Forming Polymers', 'Senegal Acacia Tree Extract', 'Deep Carbon Black'],
            'inci_tags' => ['acacia-gum', 'carbon-black'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-double-trouble-dual-wand-mascara',
            'brand' => 'Mars Cosmetics',
            'name' => 'Double Trouble Dual Wand Mascara (Length + Volume)',
            'category' => 'makeup',
            'mrp_inr' => 299,
            'size_label' => '12ml',
            'swatch_hex' => '#0F172A',
            'undertone' => null,
            'key_actives_or_notes' => ['Dual-chamber Brush', 'Carnauba Wax', 'Smudge-Proof Curling Fiber'],
            'inci_tags' => ['carnauba-wax', 'carbon-black'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'too-faced-better-than-sex-dupe-mars-double-trouble',
            'match_score' => 93,
            'summary' => 'Delivers dramatic falsies-like volume, extreme lash curl, and carbon-black intensity without clumps.',
            'notes' => 'Mars features a dual-applicator system allowing you to dial up either daytime length or dramatic bridal volume for ₹299.'
        ]
    ],

    // 13. Maybelline Sky High Mascara vs Swiss Beauty Bold & Black Craze Mascara
    [
        'orig' => [
            'slug' => 'maybelline-lash-sensational-sky-high-mascara',
            'brand' => 'Maybelline New York',
            'name' => 'Lash Sensational Sky High Waterproof Mascara',
            'category' => 'makeup',
            'mrp_inr' => 799,
            'size_label' => '6ml',
            'swatch_hex' => '#09090B',
            'undertone' => null,
            'key_actives_or_notes' => ['Flex Tower Brush', 'Bamboo Extract & Fibers', 'Waterproof Polymer'],
            'inci_tags' => ['bamboo-extract', 'film-polymers'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-bold-black-craze-mascara',
            'brand' => 'Swiss Beauty',
            'name' => 'Craze Bold & Black Lengthening Mascara',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '8.5ml',
            'swatch_hex' => '#09090B',
            'undertone' => null,
            'key_actives_or_notes' => ['Silicone Flex Wand', 'Lengthening Micro-Fibers', 'Sweat-Resistant Film'],
            'inci_tags' => ['silicone-brush', 'micro-fibers'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'maybelline-sky-high-dupe-swiss-beauty-craze',
            'match_score' => 92,
            'summary' => 'Flexible silicone comb brushes that coat every individual lash from root to tip, creating sky-scraping elongation.',
            'notes' => 'Swiss Beauty gives identical lash separation without any flaking throughout 12-hour Indian workdays.'
        ]
    ],

    // 14. Smashbox Always On Bawse vs Maybelline Superstay Matte Ink Pioneer
    [
        'orig' => [
            'slug' => 'smashbox-always-on-liquid-lipstick-bawse',
            'brand' => 'Smashbox',
            'name' => 'Always On Liquid Lipstick - Bawse (Lilly Singh Classic Deep Red)',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '4ml',
            'swatch_hex' => '#991B1B',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Advanced Polymer Complex', 'Jojoba, Apricot & Sunflower Oils', '8H Matte Lock'],
            'inci_tags' => ['silicone-resin', 'jojoba-oil'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-superstay-matte-ink-20-pioneer',
            'brand' => 'Maybelline New York',
            'name' => 'Superstay Matte Ink Liquid Lipstick - 20 Pioneer',
            'category' => 'makeup',
            'mrp_inr' => 699,
            'size_label' => '5ml',
            'swatch_hex' => '#971919',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Elastic Ink Formula', 'Arrow Applicator Tip', '16-Hour Transfer-Proof'],
            'inci_tags' => ['elastic-polymers', 'carbon-waxes'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'smashbox-bawse-dupe-maybelline-pioneer',
            'match_score' => 97,
            'summary' => 'The ultimate power red lip. Both feature blue undertones that make Indian smiles look noticeably whiter on camera.',
            'notes' => 'Maybelline Pioneer is bulletproof through oily biryani and wedding feasts without transferring to glasses or forks.'
        ]
    ],

    // 15. Smashbox Always On Driver's Seat vs Sugar Smudge Me Not Brink of Pink
    [
        'orig' => [
            'slug' => 'smashbox-always-on-drivers-seat',
            'brand' => 'Smashbox',
            'name' => "Always On Liquid Lipstick - Driver's Seat (Warm Pink Nude)",
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '4ml',
            'swatch_hex' => '#BD6B63',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Matte Primer Oil Complex', 'Precision Tear-drop Tip'],
            'inci_tags' => ['dimethicone', 'plant-oils'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'sugar-smudge-me-not-02-brink-of-pink',
            'brand' => 'SUGAR Cosmetics',
            'name' => 'Smudge Me Not Liquid Lipstick - 02 Brink of Pink (Plum Rose)',
            'category' => 'makeup',
            'mrp_inr' => 499,
            'size_label' => '4.5ml',
            'swatch_hex' => '#BB6860',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Full Matte Opaque Pigment', 'Zero-Transfer Film'],
            'inci_tags' => ['vitamin-e', 'matte-waxes'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'smashbox-drivers-seat-dupe-sugar-brink-of-pink',
            'match_score' => 95,
            'summary' => 'Gorgeous terracotta-pink nude shades formulated to flatter olive and warm undertones without turning washed out.',
            'notes' => 'SUGAR Cosmetics dries completely transfer-proof for ₹499 vs Smashbox ₹2,400 (Save ₹1,901).'
        ]
    ],

    // 16. Bobbi Brown Crushed Lip Cranberry vs Lakme 9to5 Mousse Plum Feather
    [
        'orig' => [
            'slug' => 'bobbi-brown-crushed-lip-color-cranberry',
            'brand' => 'Bobbi Brown',
            'name' => 'Crushed Lip Color - Cranberry (Medium Rich Berry Nude)',
            'category' => 'makeup',
            'mrp_inr' => 2600,
            'size_label' => '3.4g',
            'swatch_hex' => '#8E3F4C',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Castor Seed Oil', 'Vitamin C & E', 'Crushed Pigment Stain Look'],
            'inci_tags' => ['castor-oil', 'vitamin-e'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lakme-9to5-weightless-matte-mousse-plum-feather',
            'brand' => 'Lakmé',
            'name' => '9to5 Weightless Matte Mousse Lip & Cheek - Plum Feather',
            'category' => 'makeup',
            'mrp_inr' => 550,
            'size_label' => '9g',
            'swatch_hex' => '#8C3D4A',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Featherlight Mousse Texture', 'Powdery Stain Finish', 'Multi-Use Lip & Cheek'],
            'inci_tags' => ['silicone-elastomers', 'matte-pigments'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'bobbi-brown-cranberry-dupe-lakme-plum-feather',
            'match_score' => 94,
            'summary' => 'Gives that effortless French-girl just-bitten berry popsicle mouth that looks lived-in and flattering on all Indian skin tones.',
            'notes' => 'Lakme provides a whipped airy mousse formula that doubles as a blush for ₹550.'
        ]
    ],

    // 17. Bobbi Brown Crushed Lip Ruby vs Insight Matte Lip Ink Deep Ruby
    [
        'orig' => [
            'slug' => 'bobbi-brown-crushed-lip-color-ruby',
            'brand' => 'Bobbi Brown',
            'name' => 'Crushed Lip Color - Ruby (Midtone Rich Ruby)',
            'category' => 'makeup',
            'mrp_inr' => 2600,
            'size_label' => '3.4g',
            'swatch_hex' => '#9B2335',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Vitamins C & E', 'Beeswax Matrix', 'Featherproof Lip Stain'],
            'inci_tags' => ['beeswax', 'vitamin-c'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'insight-matte-lip-ink-deep-ruby',
            'brand' => 'Insight Cosmetics',
            'name' => 'Matte Lip Ink - 12 Deep Ruby',
            'category' => 'makeup',
            'mrp_inr' => 120,
            'size_label' => '3ml',
            'swatch_hex' => '#992133',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Castor Oil', 'Vitamin E', 'Weightless Liquid Stain'],
            'inci_tags' => ['castor-oil', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'bobbi-brown-ruby-dupe-insight-deep-ruby',
            'match_score' => 92,
            'summary' => 'Deep stained ruby-crimson shades that provide classic bridal drama without looking garish or overly harsh.',
            'notes' => 'Insight costs a tiny fraction (₹120) and provides shocking longevity through all-day Indian festivities.'
        ]
    ],

    // 18. Peripera Ink Mood Glowy 03 Rose In Mind vs Blue Heaven Silk Gloss Tint
    [
        'orig' => [
            'slug' => 'peripera-ink-mood-glowy-tint-03-rose-in-mind',
            'brand' => 'Peripera',
            'name' => 'Ink Mood Glowy Tint - 03 Rose In Mind',
            'category' => 'makeup',
            'mrp_inr' => 850,
            'size_label' => '4g',
            'swatch_hex' => '#C46274',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Triple Moisture Layer', 'Lily & Witch Hazel Extracts', 'Glass Bead Finish'],
            'inci_tags' => ['botanical-extracts', 'glowy-polymers'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'blue-heaven-silk-and-stain-gloss-tint-soft-rose',
            'brand' => 'Blue Heaven',
            'name' => 'Silk & Stain Gloss Lip Tint - Soft Rose',
            'category' => 'makeup',
            'mrp_inr' => 220,
            'size_label' => '5ml',
            'swatch_hex' => '#C26072',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Aloe Vera', 'Vitamin E', 'Syrupy Dewy Shine'],
            'inci_tags' => ['aloe-vera', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'peripera-rose-in-mind-dupe-blue-heaven-soft-rose',
            'match_score' => 95,
            'summary' => 'Syrupy tanghulu glass-coated lip stains that tint the lips in a romantic neutral rose and reflect light like crystal.',
            'notes' => 'Blue Heaven replicates the popular K-Beauty glassy lip look for ₹220.'
        ]
    ],

    // 19. Peripera Ink Velvet 17 Rosy Nude vs Mars Creamy Matte Rosy Affair
    [
        'orig' => [
            'slug' => 'peripera-ink-velvet-lip-tint-17-rosy-nude',
            'brand' => 'Peripera',
            'name' => 'Ink Velvet Lip Tint - 17 Rosy Nude',
            'category' => 'makeup',
            'mrp_inr' => 690,
            'size_label' => '4g',
            'swatch_hex' => '#B86F76',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Whipped Cloud Texture', 'Jojoba Oil', 'Marine Collagen', 'Blurring Velvet Film'],
            'inci_tags' => ['dimethicone-crosspolymer', 'jojoba-oil'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-creamy-matte-lip-crayon-rosy-affair',
            'brand' => 'Mars Cosmetics',
            'name' => 'Creamy Matte Lip Crayon - Rosy Affair',
            'category' => 'makeup',
            'mrp_inr' => 199,
            'size_label' => '3.5g',
            'swatch_hex' => '#B66D74',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Shea Butter', 'Vitamin E', 'Pore-Blurring Velvet Crayon'],
            'inci_tags' => ['shea-butter', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'peripera-rosy-nude-dupe-mars-rosy-affair',
            'match_score' => 94,
            'summary' => 'Fluffy, air-whipped velvet lip formulas that blur lip lines and impart a soft-focus rosy nude finish.',
            'notes' => 'Mars gives an identical blurred cloud finish in a convenient sharpening crayon format.'
        ]
    ],

    // 20. Rare Beauty Soft Pinch Liquid Blush Hope vs Swiss Beauty Cream It Up Peach Rose
    [
        'orig' => [
            'slug' => 'rare-beauty-soft-pinch-liquid-blush-hope',
            'brand' => 'Rare Beauty by Selena Gomez',
            'name' => 'Soft Pinch Liquid Blush - Hope (Dewy Nude Mauve Rose)',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '7.5ml',
            'swatch_hex' => '#DC828F',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Botanical Blend of Lotus, Gardenia, White Water Lily', 'Hyper-pigmented Dewy Liquid'],
            'inci_tags' => ['botanical-extracts', 'liquid-blush-polymers'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-cream-it-up-blush-peach-rose',
            'brand' => 'Swiss Beauty',
            'name' => 'Cream It Up Cream Blush - 02 Peach Rose',
            'category' => 'makeup',
            'mrp_inr' => 299,
            'size_label' => '10g',
            'swatch_hex' => '#DA808D',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Mica', 'Hydrating Shea Butter', 'Dewy Cheek Glow'],
            'inci_tags' => ['vitamin-e', 'shea-butter'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rare-beauty-hope-blush-dupe-swiss-beauty-peach-rose',
            'match_score' => 96,
            'summary' => 'The viral clean-girl dewy blush shade. Blends seamlessly into skin without disturbing base foundation or powder.',
            'notes' => 'Swiss Beauty replicates Selena Gomez’s signature radiant cheek glow at ₹299 vs Rare Beauty ₹2,400 (Save ₹2,101).'
        ]
    ],

    // 21. Rare Beauty Soft Pinch Encourage vs Blue Heaven Pop & Glow Plum
    [
        'orig' => [
            'slug' => 'rare-beauty-soft-pinch-liquid-blush-encourage',
            'brand' => 'Rare Beauty by Selena Gomez',
            'name' => 'Soft Pinch Liquid Blush - Encourage (Soft Neutral Mauve)',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '7.5ml',
            'swatch_hex' => '#B8657B',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Lotus & Gardenia Extracts', 'Featherweight Breathable Pigments'],
            'inci_tags' => ['botanical-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'blue-heaven-pop-and-glow-cheek-tint-dusky-plum',
            'brand' => 'Blue Heaven',
            'name' => 'Pop & Glow Cheek Tint - Dusky Plum',
            'category' => 'makeup',
            'mrp_inr' => 175,
            'size_label' => '6ml',
            'swatch_hex' => '#B66379',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin E', 'Avocado Oil', 'Seamless Dewy Flush'],
            'inci_tags' => ['vitamin-e', 'avocado-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rare-beauty-encourage-blush-dupe-blue-heaven-plum',
            'match_score' => 94,
            'summary' => 'Deep mauve-berry blushes that appear naturally sun-draped on dusky and wheatish Indian complexions without turning muddy.',
            'notes' => 'Blue Heaven delivers intense buildable pigment for ₹175.'
        ]
    ],

    // 22. Rare Beauty Soft Pinch Joy vs Insight Cream Blush Peachy Beach
    [
        'orig' => [
            'slug' => 'rare-beauty-soft-pinch-liquid-blush-joy',
            'brand' => 'Rare Beauty by Selena Gomez',
            'name' => 'Soft Pinch Liquid Blush - Joy (Dewy Muted Peach)',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '7.5ml',
            'swatch_hex' => '#E87D60',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Dewy Liquid Formula', 'White Water Lily Complex'],
            'inci_tags' => ['botanical-extracts'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'insight-cosmetics-cream-blush-peachy-beach',
            'brand' => 'Insight Cosmetics',
            'name' => 'Cream Blush - 03 Peachy Beach',
            'category' => 'makeup',
            'mrp_inr' => 120,
            'size_label' => '3.5g',
            'swatch_hex' => '#E67B5E',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Castor Oil', 'Melt-in-Skin Gel Cream'],
            'inci_tags' => ['vitamin-e', 'castor-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rare-beauty-joy-blush-dupe-insight-peachy-beach',
            'match_score' => 93,
            'summary' => 'Fresh, energetic warm peach tones that instantly cancel fatigue and make Indian skin look awake and healthy.',
            'notes' => 'Insight melts upon finger touch into cheeks with zero stickiness for ₹120.'
        ]
    ],

    // 23. Charlotte Tilbury Pinkgasm vs Swiss Beauty Liquid Drop Highlighter Rose Gold
    [
        'orig' => [
            'slug' => 'charlotte-tilbury-beauty-light-wand-pinkgasm',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Beauty Light Wand - Pinkgasm (Glowing Pearlescent Pink)',
            'category' => 'makeup',
            'mrp_inr' => 3800,
            'size_label' => '12ml',
            'swatch_hex' => '#E58A99',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Glow Gel Technology', 'Velvety Silica', 'Sensorial Oleo-Gel', 'Radiant Rose Pearls'],
            'inci_tags' => ['silica', 'light-reflecting-pearls'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-liquid-drop-highlighter-rose-gold',
            'brand' => 'Swiss Beauty',
            'name' => 'Drop & Glow Liquid Highlighter - 02 Rose Gold',
            'category' => 'makeup',
            'mrp_inr' => 349,
            'size_label' => '18ml',
            'swatch_hex' => '#E38897',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Concentrated Pearlescent Fluid', 'Chamomilla Flower', 'Micro-fine Shimmer'],
            'inci_tags' => ['mineral-pearls', 'botanical-extracts'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'charlotte-tilbury-pinkgasm-dupe-swiss-beauty-rose-gold',
            'match_score' => 95,
            'summary' => 'Provides that celebrity Hollywood red-carpet candlelit cheek glow with a wash of translucent pearlescent pink.',
            'notes' => 'Swiss Beauty gives 18ml (50% more product than Charlotte Tilbury) at ₹349 vs CT ₹3,800 (Save ₹3,451).'
        ]
    ],

    // 24. Charlotte Tilbury Flawless Filter vs elf Halo Glow Liquid Filter
    [
        'orig' => [
            'slug' => 'charlotte-tilbury-hollywood-flawless-filter',
            'brand' => 'Charlotte Tilbury',
            'name' => 'Hollywood Flawless Filter Complexion Booster',
            'category' => 'makeup',
            'mrp_inr' => 4500,
            'size_label' => '30ml',
            'swatch_hex' => '#D8A07A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Smoothing Polymers', 'Finely Milled Powders', 'Glossy Oil Complex'],
            'inci_tags' => ['silica', 'squalane'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'elf-cosmetics-halo-glow-liquid-filter',
            'brand' => 'e.l.f. Cosmetics',
            'name' => 'Halo Glow Liquid Filter Glow Booster',
            'category' => 'makeup',
            'mrp_inr' => 1550,
            'size_label' => '31.5ml',
            'swatch_hex' => '#D69E78',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Squalane', 'Hyaluronic Acid', 'Finely Milled Powder Film'],
            'inci_tags' => ['squalane', 'hyaluronic-acid'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'charlotte-tilbury-flawless-filter-dupe-elf-halo-glow',
            'match_score' => 97,
            'summary' => 'Recognized worldwide as the twin dupe of Hollywood Flawless Filter. Blurs pores, adds a lit-from-within glow under or over foundation.',
            'notes' => 'elf includes moisturizing squalane and provides an identical luminous dewy base at a ₹2,950 savings.'
        ]
    ],

    // 25. NARS Powder Blush Orgasm vs Mars Flush of Love 02 Golden Peach
    [
        'orig' => [
            'slug' => 'nars-powder-blush-orgasm',
            'brand' => 'NARS',
            'name' => 'Powder Blush - Orgasm (Peachy Pink with Golden Shimmer)',
            'category' => 'makeup',
            'mrp_inr' => 3600,
            'size_label' => '4.8g',
            'swatch_hex' => '#F48E88',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Micronized Powder', 'Iconic Golden Pearl Sheen'],
            'inci_tags' => ['mica', 'talc', 'gold-pearls'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-flush-of-love-baked-blusher-02-golden-peach',
            'brand' => 'Mars Cosmetics',
            'name' => 'Flush of Love Baked Blusher - 02 Golden Peach',
            'category' => 'makeup',
            'mrp_inr' => 299,
            'size_label' => '8g',
            'swatch_hex' => '#F28C86',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Italian Baked Formula', 'Gold Iridescent Pigments', 'Silky Touch'],
            'inci_tags' => ['baked-mica', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'nars-orgasm-blush-dupe-mars-golden-peach',
            'match_score' => 96,
            'summary' => 'The most iconic blush shade in beauty history. Warm peachy-pink infused with multidimensional golden shimmer that doubles as a highlighter.',
            'notes' => 'Mars baked formula prevents powdery fallout and lasts 8+ hours on Indian cheekbones for ₹299.'
        ]
    ],

    // 26. MAC Retro Matte Velvet Teddy vs Swiss Beauty Matte Crayon Choco Nude
    [
        'orig' => [
            'slug' => 'mac-retro-matte-lipstick-velvet-teddy',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Matte Lipstick - Velvet Teddy (Deep Neutral Nude)',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#AC7266',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Signature Vanilla Aroma', 'Comfort Matte Finish', 'Non-feathering'],
            'inci_tags' => ['matte-waxes', 'vanillin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-soft-matte-lip-crayon-09-choco-nude',
            'brand' => 'Swiss Beauty',
            'name' => 'Soft Matte Lip Crayon - 09 Choco Nude',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '3.8g',
            'swatch_hex' => '#AA7064',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin E', 'Carnauba Wax', 'Creamy Non-Drying Matte'],
            'inci_tags' => ['carnauba-wax', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mac-velvet-teddy-dupe-swiss-beauty-choco-nude',
            'match_score' => 96,
            'summary' => 'The definitive 90s supermodel beige-brown nude. Blends seamlessly with deeper Indian lip borders when lined with brown pencil.',
            'notes' => 'Swiss Beauty provides rich pigmentation that never tugs or dries into crusty lines for ₹249.'
        ]
    ],

    // 27. MAC Matte Lipstick Mehr vs Lakme 9to5 Rosy Sunday
    [
        'orig' => [
            'slug' => 'mac-matte-lipstick-mehr',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Matte Lipstick - Mehr (Dirty Blue Pink created for Mickey Contractor)',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#9C5868',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Custom Indian Melanin Undertone', 'Full Matte Opacity'],
            'inci_tags' => ['matte-waxes', 'vanillin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lakme-9to5-primer-matte-rosy-sunday',
            'brand' => 'Lakmé',
            'name' => '9to5 Primer + Matte Lipstick - Rosy Sunday',
            'category' => 'makeup',
            'mrp_inr' => 450,
            'size_label' => '3.6g',
            'swatch_hex' => '#9A5666',
            'undertone' => 'cool',
            'key_actives_or_notes' => ['Built-in Primer Gel', '12H Longwear Pigment', 'Cushion Matte'],
            'inci_tags' => ['primer-polymers', 'matte-pigments'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mac-mehr-dupe-lakme-rosy-sunday',
            'match_score' => 97,
            'summary' => 'Custom-engineered specifically for South Asian complexions. The blue-pink dirty rose tone brightens without looking neon.',
            'notes' => 'Lakme Rosy Sunday includes built-in primer that prevents lip lines from showing for ₹450 (Save ₹1,850).'
        ]
    ],

    // 28. MAC Matte Chili vs Maybelline Creamy Matte Chilli Nude
    [
        'orig' => [
            'slug' => 'mac-matte-lipstick-chili',
            'brand' => 'M.A.C Cosmetics',
            'name' => 'Matte Lipstick - Chili (Warm Brick Red with Orange Undertone)',
            'category' => 'makeup',
            'mrp_inr' => 2300,
            'size_label' => '3g',
            'swatch_hex' => '#A33425',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Rich Brick Terracotta Pigments', 'Signature Matte Texture'],
            'inci_tags' => ['matte-waxes', 'vanillin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'maybelline-creamy-matte-chilli-nude',
            'brand' => 'Maybelline New York',
            'name' => 'Color Sensational Creamy Matte - Chilli Nude',
            'category' => 'makeup',
            'mrp_inr' => 329,
            'size_label' => '3.9g',
            'swatch_hex' => '#A13223',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Precious Honey Nectar', 'Shea Butter', 'Non-drying Velvet Matte'],
            'inci_tags' => ['honey-extract', 'shea-butter'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'mac-chili-dupe-maybelline-chilli-nude',
            'match_score' => 96,
            'summary' => 'A cult-favorite warm toasted brick red that enhances warm Indian olive undertones like no other red lipstick.',
            'notes' => 'Maybelline feels noticeably creamier and more comfortable on dry lips than MAC’s traditional dry matte.'
        ]
    ],

    // 29. Rare Beauty Lip Souffle Courage vs Mars Lip Crayon Spiced Cinnamon
    [
        'orig' => [
            'slug' => 'rare-beauty-lip-souffle-matte-cream-courage',
            'brand' => 'Rare Beauty by Selena Gomez',
            'name' => 'Lip Soufflé Matte Lip Cream - Courage (Deep Mauve Nude)',
            'category' => 'makeup',
            'mrp_inr' => 2200,
            'size_label' => '3.9ml',
            'swatch_hex' => '#8F5758',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Whipped Botanical Lotus Blend', 'Airy Mousse Texture', 'Velvety Soft Matte'],
            'inci_tags' => ['botanical-extracts', 'silicone-elastomers'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-wont-fudge-lip-crayon-spiced-cinnamon',
            'brand' => 'Mars Cosmetics',
            'name' => "Won't Fudge Won't Budge Crayon - 06 Spiced Cinnamon",
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '3.5g',
            'swatch_hex' => '#8D5556',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Castor Seed Oil', 'Vitamin E', 'Transfer-Proof Whipped Matte'],
            'inci_tags' => ['castor-oil', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'rare-beauty-courage-dupe-mars-spiced-cinnamon',
            'match_score' => 94,
            'summary' => 'Soft cloud-like velvety mauves that make lips look plush and blurred without bleeding outside lip edges.',
            'notes' => 'Mars costs ₹249 and locks into a transfer-resistant matte that survives snacks and coffee.'
        ]
    ],

    // 30. Glossier Cloud Paint Dusk vs Swiss Beauty Cheek A Boo Cinnamon Warm
    [
        'orig' => [
            'slug' => 'glossier-cloud-paint-gel-cream-blush-dusk',
            'brand' => 'Glossier',
            'name' => 'Cloud Paint Seamless Cheek Color - Dusk (Warm Brownish Nude)',
            'category' => 'makeup',
            'mrp_inr' => 2600,
            'size_label' => '10ml',
            'swatch_hex' => '#C48171',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Collagen Hydration Matrix', 'Sheer-to-Buildable Gel-Cream'],
            'inci_tags' => ['gel-polymers', 'collagen'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'swiss-beauty-cheek-a-boo-cinnamon-warm',
            'brand' => 'Swiss Beauty',
            'name' => 'Cheek-A-Boo Face Palette Cream Blush - Cinnamon Warm',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '8g',
            'swatch_hex' => '#C27F6F',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Jojoba Oil', 'Vitamin E', 'Melt-in Sun-Kissed Bronzed Blush'],
            'inci_tags' => ['jojoba-oil', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'glossier-cloud-paint-dusk-dupe-swiss-beauty-cinnamon',
            'match_score' => 93,
            'summary' => 'A pillowy bronzy-nude cheek tint that sculpts cheekbones while giving a sun-baked warm glow.',
            'notes' => 'Swiss Beauty replicates that effortless watercolor flush without any patchiness on unpowdered skin.'
        ]
    ],

    // 31. Tower 28 ShineOn Jelly Gloss Pistachio vs Insight Lip Gloss Nude Toffee
    [
        'orig' => [
            'slug' => 'tower-28-shineon-jelly-lip-gloss-pistachio',
            'brand' => 'Tower 28 Beauty',
            'name' => 'ShineOn Jelly Lip Gloss - Pistachio (Semi-Sheer Nude Pink)',
            'category' => 'makeup',
            'mrp_inr' => 1900,
            'size_label' => '3.9ml',
            'swatch_hex' => '#D88E91',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Apricot Kernel Oil', 'Raspberry Seed Oil', 'Rosehip Oil', 'Zero-Stickiness Jelly'],
            'inci_tags' => ['plant-oils', 'jelly-gloss-matrix'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'insight-lip-gloss-high-shine-nude-toffee',
            'brand' => 'Insight Cosmetics',
            'name' => 'High Shine Non-Sticky Lip Gloss - 04 Nude Toffee',
            'category' => 'makeup',
            'mrp_inr' => 145,
            'size_label' => '4ml',
            'swatch_hex' => '#D68C8F',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Vitamin E', 'Almond Oil', 'Lightweight Jelly Glaze'],
            'inci_tags' => ['vitamin-e', 'almond-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'tower-28-pistachio-dupe-insight-nude-toffee',
            'match_score' => 94,
            'summary' => 'Jelly-textured lip glosses that offer glass-like cushion and high moisture without hair sticking to lips in windy weather.',
            'notes' => 'Insight delivers luscious shine for just ₹145 vs Tower 28 ₹1,900.'
        ]
    ],

    // 32. Summer Fridays Lip Butter Balm Vanilla Beige vs Dot & Key Caramel Glaze
    [
        'orig' => [
            'slug' => 'summer-fridays-lip-butter-balm-vanilla-beige',
            'brand' => 'Summer Fridays',
            'name' => 'Lip Butter Balm - Vanilla Beige (Warm Nude Tint)',
            'category' => 'makeup',
            'mrp_inr' => 2800,
            'size_label' => '15g',
            'swatch_hex' => '#A06E5C',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Shea & Murumuru Seed Butters', 'Vegan Waxes', 'Sweet Natural Vanilla'],
            'inci_tags' => ['shea-butter', 'murumuru-butter'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'dot-and-key-gloss-boss-vanilla-caramel',
            'brand' => 'Dot & Key',
            'name' => 'Gloss Boss Tinted Lip Balm - Caramel Glaze',
            'category' => 'makeup',
            'mrp_inr' => 249,
            'size_label' => '12g',
            'swatch_hex' => '#9E6C5A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Shea Butter', 'Vitamin C + E', 'SPF 30 UV Filters'],
            'inci_tags' => ['shea-butter', 'vitamin-c', 'sunscreen-filters'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'summer-fridays-vanilla-beige-dupe-dot-and-key',
            'match_score' => 95,
            'summary' => 'Thick, buttery, dessert-scented lip balms that instantly rescue parched lips and provide a sheer warm beige glaze.',
            'notes' => 'Dot & Key includes broad-spectrum SPF 30 sunscreen and costs ₹2,551 less.'
        ]
    ],

    // 33. Fenty Cheeks Out Fuego Flush vs Sugar Pop Lip & Cheek Coral Punch
    [
        'orig' => [
            'slug' => 'fenty-beauty-cheeks-out-cream-blush-fuego-flush',
            'brand' => 'Fenty Beauty',
            'name' => 'Cheeks Out Freestyle Cream Blush - Fuego Flush (Soft Tangerine Shimmer)',
            'category' => 'makeup',
            'mrp_inr' => 2400,
            'size_label' => '3g',
            'swatch_hex' => '#F97316',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Sweat-Resistant Cream', 'Subtle Golden Shimmer', 'Non-greasy Melt'],
            'inci_tags' => ['silicone-wax-matrix'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'sugar-pop-nourishing-lip-cheek-tint-coral-punch',
            'brand' => 'SUGAR POP',
            'name' => 'Nourishing Lip & Cheek Tint - 01 Coral Punch',
            'category' => 'makeup',
            'mrp_inr' => 199,
            'size_label' => '5g',
            'swatch_hex' => '#F86E12',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Castor Oil', 'Shea Butter', 'Golden Sun-Kissed Orange Coral'],
            'inci_tags' => ['shea-butter', 'castor-oil'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'fenty-fuego-flush-dupe-sugar-pop-coral-punch',
            'match_score' => 93,
            'summary' => 'Vibrant juicy tangerine corals that make warm Indian golden undertones look like they just spent a week in Goa.',
            'notes' => 'SUGAR POP packs 5g of creamy butter tint for ₹199 vs Fenty 3g for ₹2,400.'
        ]
    ],

    // 34. Dior Rouge Forever 999 vs Lakme Absolute Matte Melt Firestarter Red
    [
        'orig' => [
            'slug' => 'dior-rouge-forever-liquid-lipstick-999',
            'brand' => 'Dior',
            'name' => 'Rouge Dior Forever Liquid Lipstick - 999 Forever Dior',
            'category' => 'makeup',
            'mrp_inr' => 4100,
            'size_label' => '6ml',
            'swatch_hex' => '#DC2626',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Red Peony Extract', 'Bare-Lip Sensation', '12H Zero-Transfer Film'],
            'inci_tags' => ['botanical-extracts', 'silicone-resin'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'lakme-absolute-matte-melt-liquid-lip-firestarter-red',
            'brand' => 'Lakmé',
            'name' => 'Absolute Matte Melt Liquid Lip Color - Firestarter Red',
            'category' => 'makeup',
            'mrp_inr' => 450,
            'size_label' => '6ml',
            'swatch_hex' => '#DA2424',
            'undertone' => 'neutral',
            'key_actives_or_notes' => ['Rosehip Oil', 'Weightless Suede Finish', 'Velvet Pigment Matrix'],
            'inci_tags' => ['rosehip-oil', 'matte-waxes'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'dior-999-liquid-dupe-lakme-firestarter-red',
            'match_score' => 96,
            'summary' => 'The definitive couture red carpet red. Neither too warm nor too cool, providing flawless high-voltage sophistication.',
            'notes' => 'Lakme delivers the same weightless luxury suede feel and intense red pigment at a massive ₹3,650 savings.'
        ]
    ],

    // 35. Pat McGrath Labs MatteTrance Flesh 3 vs Mars Matte Toasted Almond
    [
        'orig' => [
            'slug' => 'pat-mcgrath-labs-mattetrance-flesh-3',
            'brand' => 'Pat McGrath Labs',
            'name' => 'MatteTrance Lipstick - Flesh 3 (Deep Warm Rose Nude)',
            'category' => 'makeup',
            'mrp_inr' => 3900,
            'size_label' => '4g',
            'swatch_hex' => '#7C3A3C',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Optical Diffusers', 'Spherical Polymers', 'Couture Powdery Matte Film'],
            'inci_tags' => ['optical-diffusers', 'matte-pigments'],
            'is_luxury' => 1
        ],
        'dupe' => [
            'slug' => 'mars-matte-crayon-toasted-almond',
            'brand' => 'Mars Cosmetics',
            'name' => 'Matte Lip Crayon - 07 Toasted Almond',
            'category' => 'makeup',
            'mrp_inr' => 229,
            'size_label' => '3.5g',
            'swatch_hex' => '#7A383A',
            'undertone' => 'warm',
            'key_actives_or_notes' => ['Vitamin E', 'Carnauba Wax', 'Powdery Velvet Glide'],
            'inci_tags' => ['carnauba-wax', 'vitamin-e'],
            'is_luxury' => 0
        ],
        'dupe_record' => [
            'slug' => 'pat-mcgrath-flesh-3-dupe-mars-toasted-almond',
            'match_score' => 95,
            'summary' => 'Legendary deep decadent rosewood nude that looks editorial and royal on medium-to-deep Indian skin tones.',
            'notes' => 'Mars mimics Pat McGrath’s couture powdery velvet texture and rich pigment for ₹229 vs PMG ₹3,900 (Save ₹3,671).'
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

echo "✅ Successfully seeded Batch 3: {$count} viral lipstick & blush dupe pairs (" . ($count * 2) . " total products)!\n";

