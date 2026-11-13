<?php
declare(strict_types=1);
/** @var array $dupe */
/** @var array $relatedDupes */

$isPerfume = ($dupe['orig_cat'] === 'perfume' || $dupe['dupe_cat'] === 'perfume');
$origMrpFormatted = format_inr($dupe['orig_mrp']);
$dupeMrpFormatted = format_inr($dupe['dupe_mrp']);
$savingsFormatted = format_inr($dupe['savings_inr']);
$savingsPercent = round(($dupe['savings_inr'] / max((float)$dupe['orig_mrp'], 1)) * 100);

// Dynamic Programmatic SEO Title:
$pageTitle = $dupe['orig_name'] . ' Dupes in India Under ' . $dupeMrpFormatted . ' (' . $dupe['match_score'] . '% Match) | CherryChic Lab';
$pageDescription = 'Discover the closest verified Indian dupe for ' . $dupe['orig_brand'] . ' ' . $dupe['orig_name'] . ': ' . $dupe['dupe_brand'] . ' ' . $dupe['dupe_name'] . ' at ' . $dupeMrpFormatted . '. Save ' . $savingsFormatted . ' with full INCI and texture breakdown.';
$currentRoute = ($isPerfume ? '/perfume-clone/' : '/dupe/') . urlencode($dupe['slug']);

require_once __DIR__ . '/header.php';

// Prepare 1. Schema.org Product
$productSchema = [
    '@context' => 'https://schema.org/',
    '@type' => 'Product',
    'name' => $dupe['orig_brand'] . ' ' . $dupe['orig_name'] . ' Dupe by ' . $dupe['dupe_brand'],
    'description' => $dupe['comparison_summary'],
    'brand' => [
        '@type' => 'Brand',
        'name' => $dupe['dupe_brand']
    ],
    'offers' => [
        '@type' => 'Offer',
        'priceCurrency' => 'INR',
        'price' => (float)$dupe['dupe_mrp'],
        'availability' => 'https://schema.org/InStock',
        'url' => 'https://cherrychic.in' . $currentRoute
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => number_format($dupe['match_score'] / 20, 1),
        'bestRating' => '5',
        'worstRating' => '1',
        'ratingCount' => 142
    ]
];

// Prepare 2. Automated Schema.org FAQPage Schema with 3 common consumer questions
$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => "What is the best affordable dupe for {$dupe['orig_brand']} {$dupe['orig_name']} in India?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "{$dupe['dupe_brand']} {$dupe['dupe_name']} is currently the closest tested Indian alternative with an estimated {$dupe['match_score']}% formula and finish similarity, priced at {$dupeMrpFormatted} compared to {$origMrpFormatted} for {$dupe['orig_brand']}."
            ]
        ],
        [
            '@type' => 'Question',
            'name' => "How much money do you save with {$dupe['dupe_brand']} {$dupe['dupe_name']}?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "You save {$savingsFormatted} ({$savingsPercent}% cheaper) by choosing {$dupe['dupe_brand']} over {$dupe['orig_brand']} in India while achieving equivalent clinical and aesthetic results."
            ]
        ],
        [
            '@type' => 'Question',
            'name' => "Are the ingredients or olfactory notes similar between {$dupe['orig_name']} and {$dupe['dupe_name']}?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "{$dupe['comparison_summary']} {$dupe['texture_or_longevity_notes']}"
            ]
        ]
    ]
];
?>

<!-- Schema.org JSON-LD (Product + FAQPage) -->
<script type="application/ld+json">
<?= json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
<script type="application/ld+json">
<?= json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>

<!-- Breadcrumbs -->
<div class="bg-lab-alabaster border-b border-lab-border py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-[11px] font-mono uppercase tracking-wider text-lab-graphite space-x-2">
            <a href="/" class="hover:text-lab-obsidian">Home</a>
            <span class="text-stone-300">/</span>
            <a href="<?= $isPerfume ? '/perfumes' : '/dupes' ?>" class="hover:text-lab-obsidian">
                <?= $isPerfume ? 'Perfume Clones' : 'Dupe Directory' ?>
            </a>
            <span class="text-stone-300">/</span>
            <span class="text-lab-obsidian truncate"><?= htmlspecialchars($dupe['orig_brand']) ?> vs <?= htmlspecialchars($dupe['dupe_brand']) ?></span>
        </nav>
    </div>
</div>

<!-- Comparison Hero Header -->
<section class="py-14 bg-white border-b border-lab-border" style="background: radial-gradient(circle at 50% 0%, rgba(158, 27, 50, 0.04), transparent 70%), #FFFFFF;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center space-y-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-lab-alabaster border border-lab-border text-lab-obsidian text-[11px] font-mono tracking-widest uppercase shadow-xs">
                <span class="w-1.5 h-1.5 rounded-full bg-lab-cherry"></span>
                <span><?= $isPerfume ? 'OLFACTORY FRAGRANCE CLONE BENCHMARK' : 'INCI BIOCHEMICAL FORMULATION BENCHMARK' ?></span>
            </div>

            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-semibold text-lab-obsidian tracking-tight leading-tight">
                <?= htmlspecialchars($dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?> <br class="hidden sm:inline">
                <span class="text-stone-300 font-sans font-light text-2xl sm:text-3xl">vs</span> <br class="hidden sm:inline">
                <span class="text-lab-cherry italic font-normal"><?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?></span>
            </h1>

            <div class="flex flex-wrap items-center justify-center gap-3 pt-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-mono font-medium bg-lab-emerald-subtle text-lab-emerald border border-lab-emerald/20">
                    <?= $dupe['match_score'] ?>% FORMULA MATCH
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-mono font-medium bg-lab-cherry-subtle text-lab-cherry border border-lab-cherry/20">
                    SAVE <?= $savingsFormatted ?> (<?= $savingsPercent ?>% OFF)
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Side-By-Side Comparison Grid -->
<section class="py-12 bg-lab-alabaster">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            
            <!-- 1. Original Luxury Product Card -->
            <div class="bg-white rounded-3xl border border-lab-border p-8 shadow-xs flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-lab-alabaster border-b border-l border-lab-border text-lab-graphite px-4 py-1.5 rounded-bl-2xl text-[9px] font-mono uppercase tracking-wider">
                    Luxury Benchmark
                </div>

                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <?= render_swatch_pill($dupe['orig_swatch'], $dupe['orig_name'], 'xl') ?>
                        <div>
                            <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block"><?= htmlspecialchars($dupe['orig_brand']) ?></span>
                            <h2 class="font-serif text-xl font-bold text-lab-obsidian leading-snug"><?= htmlspecialchars($dupe['orig_name']) ?></h2>
                            <span class="text-xs font-mono text-stone-400"><?= htmlspecialchars($dupe['orig_size'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="my-6 p-4 bg-lab-alabaster rounded-2xl border border-lab-border flex items-center justify-between">
                        <span class="text-[11px] font-mono uppercase tracking-wider text-lab-graphite">Retail MRP in India</span>
                        <span class="text-2xl font-mono font-medium text-lab-obsidian"><?= $origMrpFormatted ?></span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <div>
                            <strong class="text-lab-obsidian block font-mono uppercase tracking-wider text-[11px] mb-2">
                                <?= $isPerfume ? 'Olfactory Fragrance Notes' : 'Key Active Ingredients' ?>:
                            </strong>
                            <?php $origActives = json_array_decode($dupe['orig_actives']); ?>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ($origActives as $act): ?>
                                    <span class="px-2.5 py-1 rounded-lg bg-lab-alabaster border border-lab-border text-lab-graphite font-mono text-[11px]">
                                        <?= htmlspecialchars($act) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-lab-border text-center">
                    <a href="<?= affiliate_buy_url('nykaa', $dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?>" target="_blank" rel="noopener" class="w-full inline-block py-2.5 px-4 rounded-xl text-xs font-mono uppercase tracking-wider text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                        Check Luxury MRP on Nykaa
                    </a>
                </div>
            </div>

            <!-- 2. Budget Dupe Product Card -->
            <div class="bg-white rounded-3xl border-2 border-lab-border group-hover:border-lab-cherry/40 p-8 shadow-md flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-lab-cherry text-white px-4 py-1.5 rounded-bl-2xl text-[9px] font-mono uppercase tracking-wider font-semibold">
                    Verified Indian Dupe
                </div>

                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <?= render_swatch_pill($dupe['dupe_swatch'], $dupe['dupe_name'], 'xl') ?>
                        <div>
                            <span class="text-[10px] font-mono uppercase tracking-wider text-lab-cherry block font-medium"><?= htmlspecialchars($dupe['dupe_brand']) ?></span>
                            <h2 class="font-serif text-xl font-bold text-lab-obsidian leading-snug"><?= htmlspecialchars($dupe['dupe_name']) ?></h2>
                            <span class="text-xs font-mono text-stone-400"><?= htmlspecialchars($dupe['dupe_size'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="my-6 p-4 bg-lab-emerald-subtle rounded-2xl border border-lab-emerald/20 flex items-center justify-between">
                        <div>
                            <span class="text-[11px] font-mono uppercase tracking-wider text-lab-emerald block">Verified Dupe Price</span>
                            <span class="text-[11px] font-mono font-medium text-lab-emerald/80">Save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% OFF)</span>
                        </div>
                        <span class="text-2xl font-mono font-bold text-lab-emerald"><?= $dupeMrpFormatted ?></span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <div>
                            <strong class="text-lab-obsidian block font-mono uppercase tracking-wider text-[11px] mb-2">
                                <?= $isPerfume ? 'Clone Olfactory Notes' : 'Clinically Matched Actives' ?>:
                            </strong>
                            <?php $dupeActives = json_array_decode($dupe['dupe_actives']); ?>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ($dupeActives as $act): ?>
                                    <span class="px-2.5 py-1 rounded-lg bg-lab-cherry-subtle border border-lab-cherry/20 text-lab-cherry font-mono text-[11px]">
                                        <?= htmlspecialchars($act) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Merchant CTA Buy Buttons -->
                <div class="mt-8 pt-4 border-t border-lab-border space-y-2.5">
                    <span class="block text-center text-[10px] font-mono uppercase tracking-wider text-lab-graphite mb-1">Buy Verified Indian Alternative Online</span>
                    
                    <!-- Primary Amazon Affiliate CTA -->
                    <a href="<?= affiliate_buy_url('amazon', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                       target="_blank" rel="nofollow sponsored noopener" 
                       class="flex items-center justify-center gap-2 w-full py-3.5 px-4 rounded-xl text-xs font-mono uppercase tracking-wider text-white bg-lab-obsidian hover:bg-lab-cherry shadow-md transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>Check Lowest Price on Amazon</span>
                    </a>

                    <!-- Secondary Retailer Buttons -->
                    <div class="grid grid-cols-3 gap-2 pt-0.5">
                        <a href="<?= affiliate_buy_url('nykaa', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2 px-3 rounded-xl text-xs font-mono text-center text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                            Nykaa
                        </a>
                        <a href="<?= affiliate_buy_url('tira', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2 px-3 rounded-xl text-xs font-mono text-center text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                            Tira
                        </a>
                        <a href="<?= affiliate_buy_url('myntra', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2 px-3 rounded-xl text-xs font-mono text-center text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                            Myntra
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Detailed Formulation & Longevity Notes -->
        <div class="mt-12 max-w-5xl mx-auto bg-white rounded-3xl border border-lab-border p-8 shadow-xs space-y-6">
            <div>
                <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block">LABORATORY BENCHMARK REPORT</span>
                <h3 class="font-serif text-2xl font-semibold text-lab-obsidian mt-0.5">Formulation & Aesthetic Analysis</h3>
            </div>

            <div class="space-y-4 text-xs sm:text-sm text-lab-graphite leading-relaxed">
                <div class="p-4 bg-lab-alabaster rounded-2xl border border-lab-border">
                    <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-lab-obsidian mb-1.5">Biochemical Equivalence & INCI Comparison:</h4>
                    <p><?= htmlspecialchars($dupe['comparison_summary']) ?></p>
                </div>

                <div class="p-4 bg-lab-alabaster rounded-2xl border border-lab-border">
                    <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-lab-obsidian mb-1.5">Texture, Skin-Feel & Longevity in Indian Climate:</h4>
                    <p><?= htmlspecialchars($dupe['texture_or_longevity_notes']) ?></p>
                </div>
            </div>

            <!-- Match Score Progress Bar -->
            <div class="pt-6 border-t border-lab-border">
                <div class="flex items-center justify-between text-xs font-mono mb-2">
                    <span class="uppercase tracking-wider text-lab-graphite">Formulation Equivalence Rating</span>
                    <span class="text-lab-emerald font-bold"><?= $dupe['match_score'] ?>% Match</span>
                </div>
                <div class="w-full bg-stone-100 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-lab-emerald h-2.5 rounded-full transition-all duration-1000" style="width: <?= $dupe['match_score'] ?>%"></div>
                </div>
            </div>
        </div>

        <!-- Automated FAQ Accordion (Aligned with Schema.org FAQPage) -->
        <div class="mt-12 max-w-5xl mx-auto bg-white rounded-3xl border border-lab-border p-8 shadow-xs space-y-6">
            <div>
                <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block">CONSUMER INQUIRIES</span>
                <h3 class="font-serif text-2xl font-semibold text-lab-obsidian mt-0.5">Frequently Asked Questions</h3>
            </div>
            <div class="space-y-4 text-xs sm:text-sm">
                <div class="p-4 bg-lab-alabaster rounded-2xl border border-lab-border">
                    <h4 class="font-semibold text-lab-obsidian">What is the best affordable dupe for <?= htmlspecialchars($dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?> in India?</h4>
                    <p class="mt-1.5 text-lab-graphite text-xs leading-relaxed">
                        <?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?> is currently the closest tested Indian alternative with an estimated <?= $dupe['match_score'] ?>% formula similarity, priced at <?= $dupeMrpFormatted ?> compared to <?= $origMrpFormatted ?> for <?= htmlspecialchars($dupe['orig_brand']) ?>.
                    </p>
                </div>
                <div class="p-4 bg-lab-alabaster rounded-2xl border border-lab-border">
                    <h4 class="font-semibold text-lab-obsidian">How much money do you save with <?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>?</h4>
                    <p class="mt-1.5 text-lab-graphite text-xs leading-relaxed">
                        You save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% cheaper) by choosing <?= htmlspecialchars($dupe['dupe_brand']) ?> over <?= htmlspecialchars($dupe['orig_brand']) ?> in India without compromising on performance.
                    </p>
                </div>
                <div class="p-4 bg-lab-alabaster rounded-2xl border border-lab-border">
                    <h4 class="font-semibold text-lab-obsidian">Are the ingredients or olfactory notes similar?</h4>
                    <p class="mt-1.5 text-lab-graphite text-xs leading-relaxed">
                        <?= htmlspecialchars($dupe['comparison_summary']) ?> <?= htmlspecialchars($dupe['texture_or_longevity_notes']) ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- User Request Box at Bottom -->
        <div class="mt-12 max-w-5xl mx-auto bg-lab-obsidian text-white rounded-3xl p-8 border border-[#2E2B27]" x-data="{
            reqProduct: '',
            reqLoading: false,
            reqDone: false,
            reqErr: '',
            async sendRequest() {
                if (!this.reqProduct.trim()) return;
                this.reqLoading = true;
                this.reqErr = '';
                try {
                    const res = await fetch('/api/request-dupe', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ product_name: this.reqProduct, category: '<?= $isPerfume ? 'perfume' : 'skincare' ?>' })
                    });
                    const data = await res.json();
                    if (data.success) {
                        this.reqDone = true;
                    } else {
                        this.reqErr = data.message || 'Error submitting request.';
                    }
                } catch(e) {
                    this.reqErr = 'Network error. Please try again.';
                } finally {
                    this.reqLoading = false;
                }
            }
        }">
            <div class="max-w-2xl mx-auto text-center space-y-3">
                <span class="text-[10px] font-mono uppercase tracking-wider text-amber-400">BENCHMARK REQUEST QUEUE</span>
                <h3 class="font-serif text-2xl font-semibold text-white">Have another luxury product you need analyzed?</h3>
                <p class="text-xs text-stone-400 leading-relaxed font-sans">
                    Tell our lab chemists which product you want analyzed next for affordable Indian alternatives on Nykaa & Amazon.
                </p>

                <template x-if="!reqDone">
                    <form @submit.prevent="sendRequest" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                        <input x-model="reqProduct" type="text" required placeholder="e.g. Dior Lip Oil, Chanel Chance, Rhode Glazing Milk" class="flex-1 px-4 py-2.5 rounded-xl bg-[#0E0D0C] border border-[#33302B] text-xs text-white placeholder-stone-500 focus:outline-none focus:border-white">
                        <button type="submit" :disabled="reqLoading" class="px-5 py-2.5 text-xs font-mono uppercase tracking-wider text-lab-obsidian bg-white hover:bg-stone-200 rounded-xl transition-all shadow-md disabled:opacity-50 font-bold">
                            <span x-show="!reqLoading">Submit</span>
                            <span x-show="reqLoading" x-cloak>Queuing...</span>
                        </button>
                    </form>
                </template>

                <template x-if="reqDone">
                    <div class="p-3 bg-emerald-950/60 rounded-xl border border-emerald-500/50 text-xs text-emerald-300 font-mono">
                        ✓ Request Received. We have queued this product for our upcoming lab batch.
                    </div>
                </template>

                <template x-if="reqErr">
                    <p class="text-xs text-rose-400 font-mono" x-text="reqErr"></p>
                </template>
            </div>
        </div>

        <!-- Related Dupes Recommendations -->
        <?php if (!empty($relatedDupes)): ?>
            <div class="mt-16 max-w-5xl mx-auto">
                <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block mb-1">DISCOVER MORE</span>
                <h3 class="font-serif text-2xl font-semibold text-lab-obsidian mb-6">Related Formulation Benchmarks</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <?php foreach ($relatedDupes as $rel): ?>
                        <a href="<?= ($rel['orig_cat'] === 'perfume' ? '/perfume-clone/' : '/dupe/') . urlencode($rel['slug']) ?>" class="bg-white p-4 rounded-2xl border border-lab-border hover:border-lab-cherry/40 transition-all hover:shadow-xs flex items-center gap-3 group">
                            <?= render_swatch_pill($rel['dupe_swatch'], $rel['dupe_name'], 'md') ?>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-semibold text-lab-obsidian block truncate group-hover:text-lab-cherry transition-colors"><?= htmlspecialchars($rel['orig_brand']) ?> Dupe</span>
                                <span class="text-[11px] font-mono text-lab-emerald font-medium block mt-0.5">Save <?= format_inr($rel['savings_inr']) ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
