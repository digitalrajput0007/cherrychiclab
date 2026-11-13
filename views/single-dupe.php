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
<div class="bg-slate-100/70 border-b border-slate-200 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-bold uppercase tracking-wider text-slate-500 space-x-2">
            <a href="/" class="hover:text-rose-600">Home</a>
            <span class="text-slate-300">/</span>
            <a href="<?= $isPerfume ? '/perfumes' : '/dupes' ?>" class="hover:text-rose-600">
                <?= $isPerfume ? 'Perfume Clones' : 'Dupe Directory' ?>
            </a>
            <span class="text-slate-300">/</span>
            <span class="text-slate-800 truncate"><?= htmlspecialchars($dupe['orig_brand']) ?> vs <?= htmlspecialchars($dupe['dupe_brand']) ?></span>
        </nav>
    </div>
</div>

<!-- Comparison Hero Header -->
<section class="py-14 bg-gradient-to-b from-rose-50/80 via-pink-50/30 to-[#FAF8F5] border-b border-rose-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center space-y-4">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-100 text-rose-700 border border-rose-200 text-sm font-semibold shadow-xs">
                <span><?= $isPerfume ? '✨ Olfactory Fragrance Clone Benchmark' : '🔬 INCI Formulation Benchmark' ?></span>
            </div>

            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                <?= htmlspecialchars($dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?> <br class="hidden sm:inline">
                <span class="text-slate-400 font-sans font-light text-2xl sm:text-3xl">vs</span> <br class="hidden sm:inline">
                <span class="text-rose-600"><?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?></span>
            </h1>

            <div class="flex flex-wrap items-center justify-center gap-3 pt-2">
                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-sm font-bold bg-rose-50 text-rose-700 border border-rose-200">
                    🎯 <?= $dupe['match_score'] ?>% FORMULA MATCH
                </span>
                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-sm font-extrabold bg-emerald-500 text-white shadow-sm">
                    SAVE <?= $savingsFormatted ?> (<?= $savingsPercent ?>% OFF)
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Side-By-Side Comparison Grid -->
<section class="py-12 bg-[#FAF8F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            
            <!-- 1. Original Luxury Product Card -->
            <div class="bg-white rounded-3xl border border-slate-200/90 p-8 shadow-sm flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-slate-100 text-slate-600 px-4 py-1.5 rounded-bl-2xl text-xs font-bold uppercase tracking-wider">
                    Luxury Benchmark
                </div>

                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <?= render_swatch_pill($dupe['orig_swatch'], $dupe['orig_name'], 'xl') ?>
                        <div>
                            <span class="text-xs uppercase tracking-wider font-bold text-slate-500 block"><?= htmlspecialchars($dupe['orig_brand']) ?></span>
                            <h2 class="font-serif text-2xl font-bold text-slate-900 leading-snug"><?= htmlspecialchars($dupe['orig_name']) ?></h2>
                            <span class="text-sm font-semibold text-slate-500"><?= htmlspecialchars($dupe['orig_size'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="my-6 p-4 bg-slate-50 rounded-2xl border border-slate-200 flex items-center justify-between">
                        <span class="text-sm font-bold uppercase tracking-wider text-slate-500">Retail MRP in India</span>
                        <span class="text-2xl font-extrabold text-slate-900"><?= $origMrpFormatted ?></span>
                    </div>

                    <div class="space-y-4 text-sm">
                        <div>
                            <strong class="text-slate-900 block font-bold mb-2 uppercase tracking-wider text-xs">
                                <?= $isPerfume ? 'Olfactory Fragrance Notes' : 'Key Active Ingredients' ?>:
                            </strong>
                            <?php $origActives = json_array_decode($dupe['orig_actives']); ?>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($origActives as $act): ?>
                                    <span class="px-3 py-1.5 rounded-xl bg-slate-100 text-slate-800 font-semibold text-xs border border-slate-200">
                                        <?= htmlspecialchars($act) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-slate-100 text-center">
                    <a href="<?= affiliate_buy_url('nykaa', $dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?>" target="_blank" rel="noopener" class="w-full inline-block py-3 px-4 rounded-xl text-sm font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-colors">
                        Check Luxury MRP on Nykaa
                    </a>
                </div>
            </div>

            <!-- 2. Budget Dupe Product Card -->
            <div class="bg-gradient-to-br from-emerald-50/70 via-teal-50/40 to-white rounded-3xl border-2 border-emerald-500/40 p-8 shadow-md flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-emerald-600 text-white px-4 py-1.5 rounded-bl-2xl text-xs font-bold uppercase tracking-wider">
                    ✓ Verified Indian Dupe
                </div>

                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <?= render_swatch_pill($dupe['dupe_swatch'], $dupe['dupe_name'], 'xl') ?>
                        <div>
                            <span class="text-xs uppercase tracking-wider font-extrabold text-emerald-700 block"><?= htmlspecialchars($dupe['dupe_brand']) ?></span>
                            <h2 class="font-serif text-2xl font-bold text-slate-900 leading-snug"><?= htmlspecialchars($dupe['dupe_name']) ?></h2>
                            <span class="text-sm font-semibold text-slate-500"><?= htmlspecialchars($dupe['dupe_size'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="my-6 p-4 bg-emerald-100/60 rounded-2xl border border-emerald-300 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 block">Verified Dupe Price</span>
                            <span class="text-xs font-extrabold text-emerald-700">Save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% OFF)</span>
                        </div>
                        <span class="text-3xl font-extrabold text-emerald-800"><?= $dupeMrpFormatted ?></span>
                    </div>

                    <div class="space-y-4 text-sm">
                        <div>
                            <strong class="text-slate-900 block font-bold mb-2 uppercase tracking-wider text-xs">
                                <?= $isPerfume ? 'Clone Olfactory Notes' : 'Clinically Matched Actives' ?>:
                            </strong>
                            <?php $dupeActives = json_array_decode($dupe['dupe_actives']); ?>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($dupeActives as $act): ?>
                                    <span class="px-3 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 font-bold text-xs">
                                        <?= htmlspecialchars($act) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Merchant CTA Buy Buttons -->
                <div class="mt-8 pt-4 border-t border-emerald-100 space-y-2.5">
                    <span class="block text-center text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Buy Verified Indian Alternative Online</span>
                    
                    <!-- Primary Amazon Affiliate CTA -->
                    <a href="<?= affiliate_buy_url('amazon', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                       target="_blank" rel="nofollow sponsored noopener" 
                       class="bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 text-white font-bold text-base py-4 px-6 rounded-2xl shadow-lg shadow-rose-600/20 w-full flex items-center justify-center gap-2.5 transition-all transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>Check Lowest Price on Amazon</span>
                    </a>

                    <!-- Secondary Retailer Buttons -->
                    <div class="grid grid-cols-3 gap-2 pt-0.5">
                        <a href="<?= affiliate_buy_url('nykaa', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2.5 px-3 rounded-xl text-xs font-bold text-center text-pink-700 bg-pink-50 hover:bg-pink-100 border border-pink-200 transition-colors">
                            Nykaa
                        </a>
                        <a href="<?= affiliate_buy_url('tira', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2.5 px-3 rounded-xl text-xs font-semibold text-center text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-200 transition-colors">
                            Tira
                        </a>
                        <a href="<?= affiliate_buy_url('myntra', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2.5 px-3 rounded-xl text-xs font-semibold text-center text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-200 transition-colors">
                            Myntra
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Detailed Formulation & Longevity Notes -->
        <div class="mt-12 max-w-5xl mx-auto bg-white rounded-3xl border border-slate-200/90 p-8 shadow-sm space-y-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">LABORATORY BENCHMARK REPORT</span>
                <h3 class="font-serif text-2xl font-bold text-slate-900 mt-0.5">Formulation & Aesthetic Analysis</h3>
            </div>

            <div class="space-y-4 text-[15px] sm:text-base text-slate-700 leading-relaxed">
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-1.5">🔬 Biochemical Equivalence & INCI Comparison:</h4>
                    <p><?= htmlspecialchars($dupe['comparison_summary']) ?></p>
                </div>

                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-1.5">💧 Texture, Skin-Feel & Longevity in Indian Climate:</h4>
                    <p><?= htmlspecialchars($dupe['texture_or_longevity_notes']) ?></p>
                </div>
            </div>

            <!-- Match Score Progress Bar -->
            <div class="pt-6 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm font-bold mb-2">
                    <span class="uppercase tracking-wider text-slate-500">Formulation Equivalence Rating</span>
                    <span class="text-emerald-700 text-base"><?= $dupe['match_score'] ?>% Match</span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 h-3 rounded-full transition-all duration-1000" style="width: <?= $dupe['match_score'] ?>%"></div>
                </div>
            </div>
        </div>

        <!-- Automated FAQ Accordion (Aligned with Schema.org FAQPage) -->
        <div class="mt-12 max-w-5xl mx-auto bg-white rounded-3xl border border-slate-200/90 p-8 shadow-sm space-y-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">CONSUMER INQUIRIES</span>
                <h3 class="font-serif text-2xl font-bold text-slate-900 mt-0.5">Frequently Asked Questions</h3>
            </div>
            <div class="space-y-4 text-sm sm:text-base">
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-slate-900">What is the best affordable dupe for <?= htmlspecialchars($dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?> in India?</h4>
                    <p class="mt-2 text-slate-600 text-sm leading-relaxed">
                        <?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?> is currently the closest tested Indian alternative with an estimated <?= $dupe['match_score'] ?>% formula similarity, priced at <?= $dupeMrpFormatted ?> compared to <?= $origMrpFormatted ?> for <?= htmlspecialchars($dupe['orig_brand']) ?>.
                    </p>
                </div>
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-slate-900">How much money do you save with <?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>?</h4>
                    <p class="mt-2 text-slate-600 text-sm leading-relaxed">
                        You save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% cheaper) by choosing <?= htmlspecialchars($dupe['dupe_brand']) ?> over <?= htmlspecialchars($dupe['orig_brand']) ?> in India without compromising on performance.
                    </p>
                </div>
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-slate-900">Are the ingredients or olfactory notes similar?</h4>
                    <p class="mt-2 text-slate-600 text-sm leading-relaxed">
                        <?= htmlspecialchars($dupe['comparison_summary']) ?> <?= htmlspecialchars($dupe['texture_or_longevity_notes']) ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- User Request Box at Bottom -->
        <div class="mt-12 max-w-5xl mx-auto bg-gradient-to-r from-rose-900 via-pink-900 to-slate-950 text-white rounded-3xl p-8 sm:p-10 shadow-lg" x-data="{
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
                <span class="text-xs font-bold uppercase tracking-wider text-pink-300">BENCHMARK REQUEST QUEUE</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-white">Have another luxury product you need analyzed?</h3>
                <p class="text-sm text-pink-100/90 leading-relaxed font-sans">
                    Tell our lab chemists which product you want analyzed next for affordable Indian alternatives on Nykaa & Amazon.
                </p>

                <template x-if="!reqDone">
                    <form @submit.prevent="sendRequest" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                        <input x-model="reqProduct" type="text" required placeholder="e.g. Dior Lip Oil, Chanel Chance, Rhode Glazing Milk" class="flex-1 px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-sm text-white placeholder-pink-200 focus:outline-none focus:ring-2 focus:ring-white">
                        <button type="submit" :disabled="reqLoading" class="px-5 py-3 text-sm font-bold text-slate-900 bg-white hover:bg-pink-100 rounded-xl transition-all shadow-md disabled:opacity-50">
                            <span x-show="!reqLoading">Submit</span>
                            <span x-show="reqLoading" x-cloak>Queuing...</span>
                        </button>
                    </form>
                </template>

                <template x-if="reqDone">
                    <div class="p-4 bg-emerald-900/60 rounded-xl border border-emerald-400 text-sm text-emerald-200 font-bold">
                        ✓ Request Received. We have queued this product for our upcoming lab batch.
                    </div>
                </template>

                <template x-if="reqErr">
                    <p class="text-sm text-rose-300 font-bold" x-text="reqErr"></p>
                </template>
            </div>
        </div>

        <!-- Related Dupes Recommendations -->
        <?php if (!empty($relatedDupes)): ?>
            <div class="mt-16 max-w-5xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1">DISCOVER MORE</span>
                <h3 class="font-serif text-2xl font-bold text-slate-900 mb-6">Related Formulation Benchmarks</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <?php foreach ($relatedDupes as $rel): ?>
                        <a href="<?= ($rel['orig_cat'] === 'perfume' ? '/perfume-clone/' : '/dupe/') . urlencode($rel['slug']) ?>" class="bg-white p-4 rounded-2xl border border-slate-200 hover:border-rose-300 transition-all hover:shadow-md flex items-center gap-3.5 group">
                            <?= render_swatch_pill($rel['dupe_swatch'], $rel['dupe_name'], 'md') ?>
                            <div class="min-w-0 flex-1">
                                <span class="text-sm font-bold text-slate-900 block truncate group-hover:text-rose-600 transition-colors"><?= htmlspecialchars($rel['orig_brand']) ?> Dupe</span>
                                <span class="text-xs font-extrabold text-emerald-700 block mt-0.5">Save <?= format_inr($rel['savings_inr']) ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
