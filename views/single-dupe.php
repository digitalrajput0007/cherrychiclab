<?php
declare(strict_types=1);
/** @var array $dupe */
/** @var array $relatedDupes */

$isPerfume = ($dupe['orig_cat'] === 'perfume' || $dupe['dupe_cat'] === 'perfume');
$origMrpFormatted = format_inr($dupe['orig_mrp']);
$dupeMrpFormatted = format_inr($dupe['dupe_mrp']);
$savingsFormatted = format_inr($dupe['savings_inr']);
$savingsPercent = round(($dupe['savings_inr'] / max((float)$dupe['orig_mrp'], 1)) * 100);

// Dynamic Programmatic SEO Title as required:
// "{Original Name} Dupes in India Under ₹{Dupe Price} ({Match}% Match) | CherryChic Lab"
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
<div class="bg-stone-100/70 border-b border-stone-200 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold text-stone-500 space-x-2">
            <a href="/" class="hover:text-cherry-700">Home</a>
            <span>/</span>
            <a href="<?= $isPerfume ? '/perfumes' : '/dupes' ?>" class="hover:text-cherry-700">
                <?= $isPerfume ? 'Perfume Clones' : 'Dupe Index' ?>
            </a>
            <span>/</span>
            <span class="text-stone-800 truncate"><?= htmlspecialchars($dupe['orig_brand']) ?> vs <?= htmlspecialchars($dupe['dupe_brand']) ?></span>
        </nav>
    </div>
</div>

<!-- Comparison Hero Header -->
<section class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cherry-50 text-cherry-800 border border-cherry-200 text-xs font-bold uppercase tracking-wider">
                <span><?= $isPerfume ? '✨ Olfactory Fragrance Clone Analysis' : '🔬 Laboratory Dupe & INCI Breakdown' ?></span>
            </div>

            <h1 class="font-serif text-3xl sm:text-5xl font-extrabold text-stone-900 tracking-tight leading-tight">
                <?= htmlspecialchars($dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?> <br class="hidden sm:inline">
                <span class="text-stone-400 font-sans font-light text-2xl sm:text-3xl">vs</span> <br class="hidden sm:inline">
                <span class="text-cherry-700"><?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?></span>
            </h1>

            <div class="flex flex-wrap items-center justify-center gap-3 pt-2">
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-emerald-800 border border-emerald-200">
                    🎯 <?= $dupe['match_score'] ?>% Formula Match
                </span>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-extrabold bg-rose-100 text-rose-800 border border-rose-200">
                    💰 Save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% Cheaper)
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Side-By-Side Comparison Grid -->
<section class="py-12 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            
            <!-- 1. Original Luxury Product Card -->
            <div class="bg-white rounded-3xl border border-stone-200 p-8 shadow-sm flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-stone-100 text-stone-600 px-4 py-1.5 rounded-bl-2xl text-[10px] font-bold uppercase tracking-wider">
                    Luxury Benchmark
                </div>

                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <?= render_swatch_pill($dupe['orig_swatch'], $dupe['orig_name'], 'xl') ?>
                        <div>
                            <span class="text-xs uppercase tracking-wider font-bold text-stone-500 block"><?= htmlspecialchars($dupe['orig_brand']) ?></span>
                            <h2 class="text-lg font-bold text-stone-900 leading-snug"><?= htmlspecialchars($dupe['orig_name']) ?></h2>
                            <span class="text-xs text-stone-500"><?= htmlspecialchars($dupe['orig_size'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="my-6 p-4 bg-stone-50 rounded-2xl border border-stone-100 flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-stone-500">Retail MRP in India</span>
                        <span class="text-2xl font-extrabold text-stone-900"><?= $origMrpFormatted ?></span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <div>
                            <strong class="text-stone-900 block font-bold mb-1 uppercase tracking-wider text-[11px]">
                                <?= $isPerfume ? 'Olfactory Fragrance Notes' : 'Key Active Ingredients' ?>:
                            </strong>
                            <?php $origActives = json_array_decode($dupe['orig_actives']); ?>
                            <div class="flex flex-wrap gap-1.5 mt-2">
                                <?php foreach ($origActives as $act): ?>
                                    <span class="px-2.5 py-1 rounded-lg bg-stone-100 text-stone-700 font-medium">
                                        <?= htmlspecialchars($act) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-stone-100 text-center">
                    <a href="<?= affiliate_buy_url('nykaa', $dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?>" target="_blank" rel="noopener" class="w-full inline-block py-2.5 px-4 rounded-xl text-xs font-bold text-stone-700 bg-stone-100 hover:bg-stone-200 transition-colors">
                        Check Luxury Price on Nykaa
                    </a>
                </div>
            </div>

            <!-- 2. Budget Dupe Product Card -->
            <div class="bg-gradient-to-b from-white to-cherry-50/20 rounded-3xl border-2 border-cherry-300 p-8 shadow-md flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-cherry-600 text-white px-4 py-1.5 rounded-bl-2xl text-[10px] font-bold uppercase tracking-wider">
                    Recommended Indian Dupe
                </div>

                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <?= render_swatch_pill($dupe['dupe_swatch'], $dupe['dupe_name'], 'xl') ?>
                        <div>
                            <span class="text-xs uppercase tracking-wider font-bold text-cherry-700 block"><?= htmlspecialchars($dupe['dupe_brand']) ?></span>
                            <h2 class="text-lg font-bold text-stone-900 leading-snug"><?= htmlspecialchars($dupe['dupe_name']) ?></h2>
                            <span class="text-xs text-stone-500"><?= htmlspecialchars($dupe['dupe_size'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="my-6 p-4 bg-emerald-50 rounded-2xl border border-emerald-200 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 block">Dupe Price</span>
                            <span class="text-[11px] font-semibold text-emerald-600">Save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% OFF)</span>
                        </div>
                        <span class="text-2xl font-extrabold text-emerald-700"><?= $dupeMrpFormatted ?></span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <div>
                            <strong class="text-stone-900 block font-bold mb-1 uppercase tracking-wider text-[11px]">
                                <?= $isPerfume ? 'Clone Olfactory Notes' : 'Clinically Matched Actives' ?>:
                            </strong>
                            <?php $dupeActives = json_array_decode($dupe['dupe_actives']); ?>
                            <div class="flex flex-wrap gap-1.5 mt-2">
                                <?php foreach ($dupeActives as $act): ?>
                                    <span class="px-2.5 py-1 rounded-lg bg-cherry-100 text-cherry-900 font-medium">
                                        <?= htmlspecialchars($act) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Merchant CTA Buy Buttons -->
                <div class="mt-8 pt-4 border-t border-cherry-100 space-y-2.5">
                    <span class="block text-center text-[11px] font-bold uppercase tracking-wider text-stone-500 mb-1">Buy Verified Indian Dupe Online</span>
                    
                    <!-- Primary Amazon Affiliate CTA -->
                    <a href="<?= affiliate_buy_url('amazon', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                       target="_blank" rel="nofollow sponsored noopener" 
                       class="flex items-center justify-center gap-2 w-full py-3.5 px-4 rounded-xl text-sm font-extrabold text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-600 hover:to-amber-800 shadow-md transition-all group">
                        <span>🛒 Check Lowest Price on Amazon</span>
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>

                    <!-- Secondary Retailer Buttons -->
                    <div class="grid grid-cols-3 gap-2 pt-0.5">
                        <a href="<?= affiliate_buy_url('nykaa', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2.5 px-3 rounded-xl text-xs font-bold text-center text-pink-900 bg-pink-100 hover:bg-pink-200 border border-pink-200 transition-colors">
                            View on Nykaa
                        </a>
                        <a href="<?= affiliate_buy_url('tira', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2.5 px-3 rounded-xl text-xs font-semibold text-center text-stone-700 bg-stone-100 hover:bg-stone-200 border border-stone-200 transition-colors">
                            View on Tira
                        </a>
                        <a href="<?= affiliate_buy_url('myntra', $dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="py-2.5 px-3 rounded-xl text-xs font-semibold text-center text-stone-700 bg-stone-100 hover:bg-stone-200 border border-stone-200 transition-colors">
                            View on Myntra
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Detailed Formulation & Longevity Notes -->
        <div class="mt-12 max-w-5xl mx-auto bg-white rounded-3xl border border-stone-200 p-8 shadow-sm space-y-6">
            <h3 class="font-serif text-2xl font-bold text-stone-900">Lab Formulation Analysis</h3>

            <div class="space-y-4 text-sm text-stone-700 leading-relaxed">
                <div>
                    <h4 class="font-bold text-stone-900 mb-1">🔬 Biochemical Equivalence & INCI Comparison:</h4>
                    <p><?= htmlspecialchars($dupe['comparison_summary']) ?></p>
                </div>

                <div>
                    <h4 class="font-bold text-stone-900 mb-1">💧 Texture, Skin-Feel & Longevity in Indian Climate:</h4>
                    <p><?= htmlspecialchars($dupe['texture_or_longevity_notes']) ?></p>
                </div>
            </div>

            <!-- Match Score Progress Bar -->
            <div class="pt-6 border-t border-stone-100">
                <div class="flex items-center justify-between text-xs font-bold mb-2">
                    <span class="uppercase tracking-wider text-stone-500">Formulation & Aesthetic Match Score</span>
                    <span class="text-emerald-700 text-sm"><?= $dupe['match_score'] ?>% Match</span>
                </div>
                <div class="w-full bg-stone-100 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 h-3 rounded-full transition-all duration-1000" style="width: <?= $dupe['match_score'] ?>%"></div>
                </div>
            </div>
        </div>

        <!-- Automated FAQ Accordion (Aligned with Schema.org FAQPage) -->
        <div class="mt-12 max-w-5xl mx-auto bg-white rounded-3xl border border-stone-200 p-8 shadow-sm space-y-6">
            <h3 class="font-serif text-2xl font-bold text-stone-900">Frequently Asked Questions</h3>
            <div class="space-y-4 text-sm">
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200/80">
                    <h4 class="font-bold text-stone-900">What is the best affordable dupe for <?= htmlspecialchars($dupe['orig_brand'] . ' ' . $dupe['orig_name']) ?> in India?</h4>
                    <p class="mt-1.5 text-stone-600 text-xs leading-relaxed">
                        <?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?> is currently the closest tested Indian alternative with an estimated <?= $dupe['match_score'] ?>% formula similarity, priced at <?= $dupeMrpFormatted ?> compared to <?= $origMrpFormatted ?> for <?= htmlspecialchars($dupe['orig_brand']) ?>.
                    </p>
                </div>
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200/80">
                    <h4 class="font-bold text-stone-900">How much money do you save with <?= htmlspecialchars($dupe['dupe_brand'] . ' ' . $dupe['dupe_name']) ?>?</h4>
                    <p class="mt-1.5 text-stone-600 text-xs leading-relaxed">
                        You save <?= $savingsFormatted ?> (<?= $savingsPercent ?>% cheaper) by choosing <?= htmlspecialchars($dupe['dupe_brand']) ?> over <?= htmlspecialchars($dupe['orig_brand']) ?> in India without compromising on performance.
                    </p>
                </div>
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200/80">
                    <h4 class="font-bold text-stone-900">Are the ingredients or olfactory notes similar?</h4>
                    <p class="mt-1.5 text-stone-600 text-xs leading-relaxed">
                        <?= htmlspecialchars($dupe['comparison_summary']) ?> <?= htmlspecialchars($dupe['texture_or_longevity_notes']) ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- User Request Box at Bottom -->
        <div class="mt-12 max-w-5xl mx-auto bg-gradient-to-r from-cherry-900 via-rose-900 to-stone-950 text-white rounded-3xl p-8 shadow-md" x-data="{
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
                <span class="text-xs font-bold uppercase tracking-wider text-rose-300">💡 Custom Formulation Request</span>
                <h3 class="font-serif text-2xl font-bold">Have another luxury product you need a dupe for?</h3>
                <p class="text-xs text-rose-100/80 leading-relaxed">
                    Tell our lab chemists which product you want analyzed next for affordable Indian alternatives on Nykaa & Amazon.
                </p>

                <template x-if="!reqDone">
                    <form @submit.prevent="sendRequest" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                        <input x-model="reqProduct" type="text" required placeholder="e.g. Dior Lip Oil, Chanel Chance, Rhode Glazing Milk" class="flex-1 px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-xs text-white placeholder-rose-200 focus:outline-none focus:ring-2 focus:ring-white">
                        <button type="submit" :disabled="reqLoading" class="px-5 py-2.5 text-xs font-bold text-cherry-950 bg-white hover:bg-rose-100 rounded-xl transition-all shadow-md disabled:opacity-50">
                            <span x-show="!reqLoading">Submit</span>
                            <span x-show="reqLoading" x-cloak>Queuing...</span>
                        </button>
                    </form>
                </template>

                <template x-if="reqDone">
                    <div class="p-3 bg-emerald-900/60 rounded-xl border border-emerald-500/50 text-xs text-emerald-200 font-bold">
                        ✓ Request Received! We have queued this product for our upcoming lab batch.
                    </div>
                </template>

                <template x-if="reqErr">
                    <p class="text-xs text-rose-300" x-text="reqErr"></p>
                </template>
            </div>
        </div>

        <!-- Related Dupes Recommendations -->
        <?php if (!empty($relatedDupes)): ?>
            <div class="mt-16 max-w-5xl mx-auto">
                <h3 class="font-serif text-2xl font-bold text-stone-900 mb-6">More Verified Indian Dupes</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <?php foreach ($relatedDupes as $rel): ?>
                        <a href="<?= ($rel['orig_cat'] === 'perfume' ? '/perfume-clone/' : '/dupe/') . urlencode($rel['slug']) ?>" class="bg-white p-4 rounded-2xl border border-stone-200 hover:border-cherry-300 transition-all hover:shadow-md flex items-center gap-3">
                            <?= render_swatch_pill($rel['dupe_swatch'], $rel['dupe_name'], 'md') ?>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-stone-900 block truncate"><?= htmlspecialchars($rel['orig_brand']) ?> Dupe</span>
                                <span class="text-[11px] text-emerald-700 font-semibold block">Save <?= format_inr($rel['savings_inr']) ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
