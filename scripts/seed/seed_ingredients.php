<?php
declare(strict_types=1);

/**
 * CherryChic Lab - Seeder 1: 45+ Skincare Actives & Fungal Acne Rules
 * Run with: php scripts/seed/seed_ingredients.php
 */

require_once __DIR__ . '/../../src/db.php';

echo "🧪 [CherryChic Lab] Seeding 45+ Skincare Actives & Fungal Acne Rules...\n";

$pdo = get_db();

$ingredients = [
    // --- Retinoids & Cell Renewal ---
    [
        'slug' => 'retinol',
        'name' => 'Retinol (Vitamin A)',
        'category' => 'Cell Turnover & Anti-Aging Active',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['glycolic-acid', 'lactic-acid', 'salicylic-acid', 'pure-vitamin-c', 'benzoyl-peroxide', 'copper-peptides']),
        'clash_explanation' => 'Simultaneous layering with direct exfoliating acids (AHAs/BHAs) or Benzoyl Peroxide causes severe lipid barrier stripping, burning, flaking, and reactive erythema. Copper peptides are degraded by retinoids. Use on alternate nights or separate AM/PM.',
        'benefit_summary' => 'Gold-standard anti-aging active that accelerates cellular renewal, unclogs pores, and stimulates dermal collagen synthesis.'
    ],
    [
        'slug' => 'tretinoin',
        'name' => 'Tretinoin (Retin-A / All-Trans Retinoic Acid)',
        'category' => 'Prescription Retinoid',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['glycolic-acid', 'lactic-acid', 'salicylic-acid', 'pure-vitamin-c', 'benzoyl-peroxide', 'copper-peptides']),
        'clash_explanation' => 'Extremely potent prescription retinoid. Never combine in the same routine with direct chemical peels or exfoliating toners. Keep skin buffered with ceramides.',
        'benefit_summary' => 'Directly binds to retinoic acid nuclear receptors (RARs) to reverse photoaging, deep wrinkles, and severe cystic acne.'
    ],
    [
        'slug' => 'retinaldehyde',
        'name' => 'Retinaldehyde (Retinal)',
        'category' => 'Next-Gen Fast-Acting Retinoid',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['glycolic-acid', 'lactic-acid', 'salicylic-acid', 'pure-vitamin-c', 'benzoyl-peroxide', 'copper-peptides']),
        'clash_explanation' => 'One metabolic conversion step away from retinoic acid (11x faster than retinol). Avoid layering directly with high-strength AHAs or pure ascorbic acid to prevent dermatitis.',
        'benefit_summary' => 'Provides faster skin smoothing and collagen induction than retinol with direct antibacterial action against Cutibacterium acnes.'
    ],
    [
        'slug' => 'adapalene',
        'name' => 'Adapalene (Differin)',
        'category' => '3rd Generation Topical Retinoid',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['glycolic-acid', 'salicylic-acid', 'pure-vitamin-c', 'benzoyl-peroxide']),
        'clash_explanation' => 'Targeted synthetic retinoid for acne. Although chemically more photostable than retinol, combining with direct leave-on chemical exfoliants leads to intense peeling in Indian weather.',
        'benefit_summary' => 'Selectively targets RAR-beta and RAR-gamma in follicular infundibulum to normalize keratinization and dissolve microcomedones.'
    ],

    // --- Chemical Exfoliating Acids (AHAs / BHAs / PHAs) ---
    [
        'slug' => 'glycolic-acid',
        'name' => 'Glycolic Acid (Alpha Hydroxy Acid - AHA)',
        'category' => 'Chemical Exfoliant (Small Molecule AHA)',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['retinol', 'tretinoin', 'retinaldehyde', 'salicylic-acid', 'pure-vitamin-c', 'copper-peptides']),
        'clash_explanation' => 'Small molecular size allows rapid, deep penetration. Stacking with retinoids or other strong acids causes acute stinging, acid burns, and post-inflammatory hyperpigmentation (PIH) in Indian skin.',
        'benefit_summary' => 'Dissolves desmosomes holding dead surface keratinocytes together, unveiling radiant glass skin and fading stubborn tan.'
    ],
    [
        'slug' => 'lactic-acid',
        'name' => 'Lactic Acid (AHA Humectant)',
        'category' => 'Gentle Chemical Exfoliant',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['retinol', 'tretinoin', 'pure-vitamin-c', 'copper-peptides']),
        'clash_explanation' => 'Do not combine simultaneously with retinoids or copper peptides. Lactic acid has a low pH that breaks peptide bonds and causes barrier overload when paired with retinoids.',
        'benefit_summary' => 'Larger molecular AHA that gently sloughs away dead surface cells while naturally boosting natural moisturizing factors (NMF) in the stratum corneum.'
    ],
    [
        'slug' => 'mandelic-acid',
        'name' => 'Mandelic Acid (Gentle Bitter Almond AHA)',
        'category' => 'Melanin-Safe AHA Exfoliant',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['retinol', 'tretinoin', 'copper-peptides']),
        'clash_explanation' => 'Avoid simultaneous PM application with high-potency retinoids. Best used as a gentle bi-weekly exfoliant.',
        'benefit_summary' => 'Largest molecule AHA that penetrates slowly and evenly, making it the safest chemical peel for darker Indian complexions prone to PIH.'
    ],
    [
        'slug' => 'salicylic-acid',
        'name' => 'Salicylic Acid (Beta Hydroxy Acid - BHA)',
        'category' => 'Lipophilic Pore Cleanser',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['retinol', 'tretinoin', 'glycolic-acid', 'benzoyl-peroxide', 'copper-peptides']),
        'clash_explanation' => 'Lipophilic nature penetrates oily pores. Combining with Retinol, Benzoyl Peroxide, or high-strength AHAs strips essential lipids, leading to rebound oiliness and flaking.',
        'benefit_summary' => 'Dissolves trapped oxidized sebum inside follicles, clearing blackheads, whiteheads, and reducing inflammatory acne flare-ups.'
    ],

    // --- Antioxidants & Brighteners ---
    [
        'slug' => 'pure-vitamin-c',
        'name' => 'Pure Vitamin C (L-Ascorbic Acid)',
        'category' => 'Potent Direct Antioxidant & Brightener',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['retinol', 'tretinoin', 'benzoyl-peroxide', 'glycolic-acid', 'copper-peptides']),
        'clash_explanation' => 'Requires a very low acidic pH (< 3.5) to penetrate. Benzoyl Peroxide oxidizes L-Ascorbic Acid instantly, neutralizing both. Retinol plus low-pH Vitamin C causes irritation. Copper peptides chelate ascorbic acid.',
        'benefit_summary' => 'Neutralizes UV-induced reactive oxygen species (ROS), suppresses tyrosinase enzyme activity, and boosts endogenous collagen synthesis.'
    ],
    [
        'slug' => 'ethyl-ascorbic-acid',
        'name' => '3-O-Ethyl Ascorbic Acid (Stable Vitamin C)',
        'category' => 'Stabilized Vitamin C Ether',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['benzoyl-peroxide']),
        'clash_explanation' => 'Much more stable against oxidation than pure L-Ascorbic Acid, functioning at skin-neutral pH (5.0-6.5). Avoid direct pairing with strong oxidizing agents like Benzoyl Peroxide.',
        'benefit_summary' => 'Does not oxidize rapidly in humid Indian climates, delivering steady brightening, collagen support, and dark spot reduction.'
    ],
    [
        'slug' => 'azelaic-acid',
        'name' => 'Azelaic Acid (Dicarboxylic Acid)',
        'category' => 'Anti-Inflammatory & Rosacea / PIH Target',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Remarkably safe and versatile. Can be combined with Niacinamide and Hyaluronic Acid. Separate from high-strength chemical peels to avoid transient tingling.',
        'benefit_summary' => 'Selectively inhibits hyperactive melanocytes (ideal for melasma and acne marks) and normalizes follicular hyperkeratinization without bacterial resistance.'
    ],
    [
        'slug' => 'kojic-acid',
        'name' => 'Kojic Acid (Fermented Mushroom Chelate)',
        'category' => 'Targeted Depigmenting Agent',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['benzoyl-peroxide', 'glycolic-acid']),
        'clash_explanation' => 'Avoid combining with strong oxidizers or high-percentage chemical exfoliants to prevent contact dermatitis.',
        'benefit_summary' => 'Potently chelates the copper atom in the active center of tyrosinase, effectively preventing melanin synthesis and fading dark sun spots.'
    ],
    [
        'slug' => 'alpha-arbutin',
        'name' => 'Alpha Arbutin (Biosynthetic Glycoside)',
        'category' => 'Safe Pigment Lightener',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Highly stable and gentle. Synergistic with Vitamin C, Niacinamide, and Hyaluronic Acid without chemical clashes.',
        'benefit_summary' => 'Slowly releases hydroquinone precursors to block tyrosinase activity safely, evening out uneven hyperpigmentation on Indian skin.'
    ],
    [
        'slug' => 'tranexamic-acid',
        'name' => 'Tranexamic Acid (TXA)',
        'category' => 'Anti-Melasma & Vascular Redness Inhibitor',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'No active chemical clashes. Exceptionally well tolerated across all Fitzpatrick skin types.',
        'benefit_summary' => 'Blocks the interaction between melanocytes and keratinocytes by inhibiting plasminogen, making it the #1 active for stubborn hormonal melasma.'
    ],
    [
        'slug' => 'benzoyl-peroxide',
        'name' => 'Benzoyl Peroxide (BPO)',
        'category' => 'Direct Antibacterial Acne Agent',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['retinol', 'tretinoin', 'pure-vitamin-c', 'salicylic-acid', 'copper-peptides']),
        'clash_explanation' => 'BPO is a powerful organic peroxide oxidizer. Pairing directly with Retinol degrades both molecules. Pairing with Vitamin C oxidizes the ascorbic acid into brown dehydroascorbic acid.',
        'benefit_summary' => 'Releases free-radical oxygen into sebaceous follicles, destroying anaerobic C. acnes bacteria without creating antibiotic resistance.'
    ],

    // --- Peptides & Growth Factors ---
    [
        'slug' => 'copper-peptides',
        'name' => 'Copper Tripeptide-1 (GHK-Cu)',
        'category' => 'Regenerative Dermal Peptide',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['pure-vitamin-c', 'glycolic-acid', 'lactic-acid', 'salicylic-acid', 'retinol']),
        'clash_explanation' => 'CRITICAL CLASH: Direct acidic actives (pH < 4.5) like L-Ascorbic Acid and AHA/BHA break the coordinate bonds of the copper ion, deactivating both the peptide and the acid.',
        'benefit_summary' => 'Stimulates collagen, elastin, and glycosaminoglycan synthesis; promotes scar remodeling and micro-wound dermal repair.'
    ],
    [
        'slug' => 'matrixyl-3000',
        'name' => 'Matrixyl 3000 (Palmitoyl Tripeptide-1 & 7)',
        'category' => 'Matrikine Messenger Peptide',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['pure-vitamin-c']),
        'clash_explanation' => 'Avoid combining with strong low-pH L-Ascorbic acid which can hydrolyze peptide chains. Pairs perfectly with Hyaluronic Acid and Niacinamide.',
        'benefit_summary' => 'Restores cutaneous matrix by activating fibroblasts to synthesize new type I collagen and fibronectin.'
    ],
    [
        'slug' => 'argireline',
        'name' => 'Argireline (Acetyl Hexapeptide-8)',
        'category' => 'Neuro-Peptide (Botox Alternative)',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['pure-vitamin-c']),
        'clash_explanation' => 'Best used on clean skin at physiological pH. Strong exfoliating acids can degrade peptide integrity.',
        'benefit_summary' => 'Attenuates muscle contractions by destabilizing the SNARE complex, visibly smoothing dynamic expression lines around forehead and crow\'s feet.'
    ],

    // --- Barrier Restorers, Humectants & Soothing Agents ---
    [
        'slug' => 'niacinamide',
        'name' => 'Niacinamide (Vitamin B3)',
        'category' => 'Barrier Support & Sebum Balancer',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Universally compatible active (2-5% concentration). Can be safely combined with Retinol, Salicylic Acid, Hyaluronic Acid, and Ceramides.',
        'benefit_summary' => 'Stimulates epidermal ceramide synthesis, regulates sebaceous oil production, fades hyperpigmentation, and reinforces barrier resilience.'
    ],
    [
        'slug' => 'hyaluronic-acid',
        'name' => 'Hyaluronic Acid & Sodium Hyaluronate',
        'category' => 'Multi-Depth Humectant',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Universal synergy. Never clashes with any active, acid, retinoid, or peptide.',
        'benefit_summary' => 'Capable of holding up to 1,000 times its molecular weight in water to plump dehydrated epidermis and reinforce stratum corneum hydration.'
    ],
    [
        'slug' => 'panthenol',
        'name' => 'Panthenol (Pro-Vitamin B5)',
        'category' => 'Pro-Vitamin Barrier Healer',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Completely non-irritating and biocompatible. Synergistic with every active.',
        'benefit_summary' => 'Penetrates deep into dermis where it converts to pantothenic acid, speeding epithelialization and relieving itching and redness.'
    ],
    [
        'slug' => 'ceramide-np',
        'name' => 'Ceramides (NP, AP, EOP) & Phytosphingosine',
        'category' => 'Intercellular Lipid Matrix',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Zero clash. Essential buffer active when undergoing retinoid therapy or chemical peeling.',
        'benefit_summary' => 'Constitutes 50% of the skin’s extracellular matrix, repairing cracked barriers, preventing transepidermal water loss (TEWL).'
    ],
    [
        'slug' => 'centella-asiatica',
        'name' => 'Centella Asiatica (Cica / Madecassoside)',
        'category' => 'Botanical Triterpenoid Soother',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Universal soothing herb. Pairs safely with any active regimen.',
        'benefit_summary' => 'Downregulates pro-inflammatory cytokines (IL-1beta, TNF-alpha) and accelerates micro-vascular circulation in irritated skin.'
    ],
    [
        'slug' => 'snail-secretion-filtrate',
        'name' => 'Snail Secretion Filtrate (Snail Mucin)',
        'category' => 'Glycoprotein Complex',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'No active chemical clashes. Safe with exfoliants and retinoids.',
        'benefit_summary' => 'Naturally rich in allantoin, glycolic acid, collagen, and elastin for intense barrier hydration and deep scar repair.'
    ],
    [
        'slug' => 'allantoin',
        'name' => 'Allantoin',
        'category' => 'Keratolytic Soothing Agent',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Completely safe and non-reactive with all active skincare ingredients.',
        'benefit_summary' => 'Promotes cell proliferation and stimulates healthy tissue formation while calming sensitized, stinging skin.'
    ],
    [
        'slug' => 'squalane',
        'name' => 'Plant-Derived Squalane (Olive/Sugarcane)',
        'category' => 'Biocompatible Saturated Hydrocarbon',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0, // Squalane is saturated and CANNOT be metabolized by Malassezia!
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Zero clash. Squalane is a fully saturated lipid (unlike squalene) and is 100% safe for fungal acne.',
        'benefit_summary' => 'Mimics the skin\'s natural sebum without clogging pores or oxidizing, sealing in moisture with a featherlight finish.'
    ],
    [
        'slug' => 'zinc-pca',
        'name' => 'Zinc PCA (Pyrrolidone Carboxylic Acid)',
        'category' => 'Physiological Astringent & Sebum Regulator',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Pairs exceptionally well with Niacinamide and Salicylic Acid for oily, acne-prone Indian skin.',
        'benefit_summary' => 'Inhibits 5-alpha reductase enzyme to curb excess sebum while exerting targeted antimicrobial action against acne bacteria.'
    ],
    [
        'slug' => 'bakuchiol',
        'name' => 'Bakuchiol (Psoralea Corylifolia Seed Extract)',
        'category' => 'Meroterpene Botanical Retinol Alternative',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Unlike retinol, Bakuchiol is non-photosensitizing and does not clash with Vitamin C or direct acids.',
        'benefit_summary' => 'Upregulates type I and IV collagen genes without the flaking, burning, or photo-toxicity associated with classic retinoids.'
    ],
    [
        'slug' => 'resveratrol',
        'name' => 'Resveratrol',
        'category' => 'Polyphenolic Phytoalexin Antioxidant',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode(['benzoyl-peroxide']),
        'clash_explanation' => 'Do not pair with strong oxidizing agents like Benzoyl Peroxide which deactivate polyphenols.',
        'benefit_summary' => 'Stimulates sirtuin enzymes (SIRT1) to protect cutaneous cells from UV oxidative stress and blue light.'
    ],
    [
        'slug' => 'ferulic-acid',
        'name' => 'Ferulic Acid',
        'category' => 'Hydroxycinnamic Acid Antioxidant',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Synergistic stabilizer. Often paired with pure Vitamin C and Vitamin E to double photo-protection.',
        'benefit_summary' => 'Neutralizes free radicals and chemically stabilizes L-Ascorbic Acid against premature degradation.'
    ],
    [
        'slug' => 'licorice-root-extract',
        'name' => 'Licorice Root Extract (Glabridin)',
        'category' => 'Phyto-Brightener & Anti-Erythema Active',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Gentle and compatible with all brightening and anti-aging regimens.',
        'benefit_summary' => 'Glabridin inhibits tyrosinase activity and disperses melanin pigment while liquiritin calms UV-induced erythema.'
    ],
    [
        'slug' => 'green-tea-extract',
        'name' => 'Green Tea Extract (EGCG)',
        'category' => 'Catechin Antioxidant & Sebum Reducer',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Safe antioxidant suitable for morning and evening routines.',
        'benefit_summary' => 'Epigallocatechin gallate (EGCG) calms inflammation, protects cellular DNA from UV rays, and reduces sebocyte sebum output.'
    ],
    [
        'slug' => 'mugwort-extract',
        'name' => 'Mugwort Extract (Artemisia Princeps)',
        'category' => 'Traditional Herbal Anti-Inflammatory',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Safe calming active, pairs seamlessly with all actives.',
        'benefit_summary' => 'Rich in vitamins A and C to soothe sensitized barriers, cool overheated skin, and eliminate redness.'
    ],
    [
        'slug' => 'propolis-extract',
        'name' => 'Propolis Extract (Honey Bee Resin)',
        'category' => 'Antibacterial & Wound Healing Resin',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Safe and gentle natural antibacterial shield.',
        'benefit_summary' => 'Contains pinocembrin and caffeic acid phenethyl ester (CAPE) to fight bacterial infection and impart glossy hydration.'
    ],
    [
        'slug' => 'ectoin',
        'name' => 'Ectoin',
        'category' => 'Extremolyte Cellular Stress Shield',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 0,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'Protective extremolyte with zero active conflicts.',
        'benefit_summary' => 'Forms water-structure hydration shields around cellular membranes, guarding against extreme pollution, UV damage, and chemical irritation.'
    ],

    // --- Fungal Acne Triggers (Malassezia folliculitis) & High Comedogenic Esters/Oils ---
    [
        'slug' => 'polysorbate-20',
        'name' => 'Polysorbate 20',
        'category' => 'Fatty Acid Ester Emulsifier',
        'comedogenic_score' => 1,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'FUNGAL ACNE TRIGGER: Formulated with lauric acid esters that Malassezia yeasts hydrolyze as a direct carbon food source, triggering itchy pustules.',
        'benefit_summary' => 'Non-ionic cosmetic surfactant used to disperse fragrance and essential oils in watery toners and essences.'
    ],
    [
        'slug' => 'polysorbate-80',
        'name' => 'Polysorbate 80',
        'category' => 'Oleic Acid Ester Emulsifier',
        'comedogenic_score' => 1,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'FUNGAL ACNE TRIGGER: Contains oleic acid chains (C18) which are the primary lipid fuel for Malassezia globosa fungal flare-ups.',
        'benefit_summary' => 'Emulsifier that stabilizes heavier oil-in-water cosmetic formulations.'
    ],
    [
        'slug' => 'galactomyces-ferment',
        'name' => 'Galactomyces Ferment Filtrate',
        'category' => 'Fermented Yeast Nutrient Broth',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'FUNGAL ACNE ALERT: Fermented filtrates contain amino acids and metabolites that trigger explosive Malassezia folliculitis in predisposed individuals.',
        'benefit_summary' => 'Imparts instant glossy radiance, enhances skin elasticity, and refines uneven surface texture in non-fungal acne prone skin.'
    ],
    [
        'slug' => 'bifida-ferment',
        'name' => 'Bifida Ferment Lysate',
        'category' => 'Probiotic Bacterial Lysate',
        'comedogenic_score' => 0,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'FUNGAL ACNE RISK: While great for normal barrier repair, ferment lysates can alter skin microflora and provoke fungal folliculitis in high humidity.',
        'benefit_summary' => 'Supports enzymatic cellular repair pathways and bolsters skin microbiome diversity.'
    ],
    [
        'slug' => 'isopropyl-myristate',
        'name' => 'Isopropyl Myristate',
        'category' => 'Synthetic Ester Emollient',
        'comedogenic_score' => 5,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'MAXIMUM PORE CLOGGER (5/5) & FUNGAL TRIGGER: Penetrates and glues sebum into hair follicles, creating deep comedones while feeding yeast.',
        'benefit_summary' => 'Provides instant silky skin-feel and enhances cutaneous transdermal absorption of thick creams.'
    ],
    [
        'slug' => 'isopropyl-palmitate',
        'name' => 'Isopropyl Palmitate',
        'category' => 'Fatty Acid Ester',
        'comedogenic_score' => 4,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'HIGH PORE CLOGGER (4/5) & FUNGAL FOOD: Readily metabolized by Malassezia yeasts; highly comedogenic for acne-prone skin.',
        'benefit_summary' => 'Emollient solvent that imparts rich conditioning and slip to foundations and body lotions.'
    ],
    [
        'slug' => 'coconut-oil',
        'name' => 'Cocos Nucifera (Virgin Coconut Oil)',
        'category' => 'Natural Saturated Triglyceride Oil',
        'comedogenic_score' => 4,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'HIGH COMEDOGENIC (4/5) & FUNGAL FEEDER: Lauric, myristic, and palmitic fatty acids cause severe closed comedones and fungal bumps on facial skin.',
        'benefit_summary' => 'Fantastic for scalp and dry body skin, forming a thick occlusive barrier that prevents moisture evaporation.'
    ],
    [
        'slug' => 'shea-butter',
        'name' => 'Butyrospermum Parkii (Shea Butter)',
        'category' => 'Vegetable Lipid Butter',
        'comedogenic_score' => 2,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'FUNGAL ACNE TRIGGER: High in oleic and stearic fatty acids (C18) which feed Malassezia yeasts. Not recommended for fungal acne on face.',
        'benefit_summary' => 'Rich in cinnamic acid esters and vitamins A and E, providing deep nourishment for severely chapped lips and dry body skin.'
    ],
    [
        'slug' => 'cocoa-butter',
        'name' => 'Theobroma Cacao (Cocoa Seed Butter)',
        'category' => 'Solid Vegetable Fat',
        'comedogenic_score' => 4,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'HEAVY PORE CLOGGER (4/5): High melting point saturated lipid that forms stubborn plugs inside pores; contraindicated for facial acne.',
        'benefit_summary' => 'Melts at body temperature, creating a velvety protective layer on lips and dry cracked elbows.'
    ],
    [
        'slug' => 'ethylhexyl-palmitate',
        'name' => 'Ethylhexyl Palmitate (Octyl Palmitate)',
        'category' => 'Branched Ester Emollient',
        'comedogenic_score' => 4,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'HIGH PORE CLOG RISK (4/5) & FUNGAL CONTRAINDICATION: Palmitate ester chain feeds fungal yeast and exacerbates acne conglobata.',
        'benefit_summary' => 'Synthetic replacement for mineral oil that softens skin and disperses makeup pigments smoothly.'
    ],
    [
        'slug' => 'olive-oil',
        'name' => 'Olea Europaea (Olive Fruit Oil)',
        'category' => 'High-Oleic Botanical Oil',
        'comedogenic_score' => 2,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'SEVERE FUNGAL RISK: Contains over 70% oleic acid, the single most potent chemical stimulus for Malassezia yeast growth and barrier disruption.',
        'benefit_summary' => 'Contains squalene and polyphenols, ideal for dry brittle hair cuticle nourishment.'
    ],
    [
        'slug' => 'glyceryl-stearate',
        'name' => 'Glyceryl Stearate (GMS)',
        'category' => 'Glycerol Ester Emulsifier',
        'comedogenic_score' => 2,
        'is_fungal_acne_trigger' => 1,
        'clashes_with_slugs' => json_encode([]),
        'clash_explanation' => 'FUNGAL ACNE CONTRAINDICATION: Monoester of glycerin and stearic acid that breaks down into free fatty acids feeding Malassezia.',
        'benefit_summary' => 'Stabilizes emulsions and acts as a mild skin barrier conditioning lubricant.'
    ]
];

$stmt = $pdo->prepare("
    INSERT INTO ingredient_rules (slug, name, category, comedogenic_score, is_fungal_acne_trigger, clashes_with_slugs, clash_explanation, benefit_summary)
    VALUES (:slug, :name, :category, :comedogenic_score, :is_fungal_acne_trigger, :clashes_with_slugs, :clash_explanation, :benefit_summary)
    ON CONFLICT(slug) DO UPDATE SET
        name = excluded.name,
        category = excluded.category,
        comedogenic_score = excluded.comedogenic_score,
        is_fungal_acne_trigger = excluded.is_fungal_acne_trigger,
        clashes_with_slugs = excluded.clashes_with_slugs,
        clash_explanation = excluded.clash_explanation,
        benefit_summary = excluded.benefit_summary
");

$pdo->beginTransaction();
$count = 0;
foreach ($ingredients as $ing) {
    $stmt->execute($ing);
    $count++;
}
$pdo->commit();

echo "✅ Successfully seeded {$count} cosmetic ingredient actives and fungal acne rules!\n";

