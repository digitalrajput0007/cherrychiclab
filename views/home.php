<?php
declare(strict_types=1);
/** @var array $trendingDupes */
/** @var array $perfumeClones */
/** @var int $totalSavings */
/** @var int $totalDupesCount */

require_once __DIR__ . '/header.php';
?>

<!-- Hero Section with Instant Search Bar -->
<section class="relative overflow-hidden bg-gradient-to-b from-cherry-50/50 via-white to-stone-50 pt-12 pb-16 lg:pt-20 lg:pb-24 border-b border-stone-200/60" x-data="{ heroSearch: '' }">
    <!-- Decorative background glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-cherry-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-24 w-96 h-96 bg-amber-100/50 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-3xl mx-auto space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cherry-100/80 text-cherry-900 border border-cherry-200 text-xs font-bold uppercase tracking-wider shadow-sm">
                <span>🍒 Indian Beauty & Fragrance Lab</span>
                <span class="w-1.5 h-1.5 rounded-full bg-cherry-600"></span>
                <span>Science-Backed Formulation Analysis</span>
            </div>

            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-extrabold text-stone-900 tracking-tight leading-[1.15]">
                Stop Overpaying for Luxury. <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cherry-700 via-rose-600 to-amber-700">
                    Find Verified Indian Dupes.
                </span>
            </h1>

            <p class="text-base sm:text-lg text-stone-600 max-w-2xl mx-auto leading-relaxed">
                Deconstruct viral ₹10,000+ luxury serums, lipsticks, and niche perfumes into clinically-equivalent Indian alternatives on Nykaa, Tira & Amazon with zero formula guesswork.
            </p>

            <!-- Instant Hero Search Bar -->
            <div class="max-w-xl mx-auto pt-2">
                <form action="/dupes" method="GET" class="relative">
                    <input name="q" x-model="heroSearch" type="text" placeholder="Type a luxury lipstick, serum, or sunscreen... e.g., Pillow Talk, Black Honey, Snail Mucin" class="w-full pl-12 pr-28 py-4 rounded-2xl border-2 border-stone-300 text-sm placeholder-stone-400 focus:outline-none focus:border-cherry-600 shadow-md transition-all">
                    <svg class="w-5 h-5 text-stone-400 absolute left-4 top-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <button type="submit" class="absolute right-2 top-2 px-5 py-2.5 bg-cherry-700 hover:bg-cherry-800 text-white rounded-xl text-xs font-bold transition-all shadow-sm">
                        Search Dupes
                    </button>
                </form>
            </div>

            <!-- Quick stats ticker -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 max-w-2xl mx-auto text-left">
                <div class="bg-white/80 backdrop-blur p-3.5 rounded-xl border border-stone-200 shadow-sm">
                    <span class="block text-xl font-extrabold text-cherry-700"><?= format_inr($totalSavings ?? 142000) ?>+</span>
                    <span class="text-[11px] font-semibold text-stone-500 uppercase tracking-wider">Catalog Savings</span>
                </div>
                <div class="bg-white/80 backdrop-blur p-3.5 rounded-xl border border-stone-200 shadow-sm">
                    <span class="block text-xl font-extrabold text-stone-900">95%+</span>
                    <span class="text-[11px] font-semibold text-stone-500 uppercase tracking-wider">Formula Match</span>
                </div>
                <div class="bg-white/80 backdrop-blur p-3.5 rounded-xl border border-stone-200 shadow-sm">
                    <span class="block text-xl font-extrabold text-emerald-600">100% Free</span>
                    <span class="text-[11px] font-semibold text-stone-500 uppercase tracking-wider">Fungal Acne Check</span>
                </div>
                <div class="bg-white/80 backdrop-blur p-3.5 rounded-xl border border-stone-200 shadow-sm">
                    <span class="block text-xl font-extrabold text-stone-900">&lt; 2ms</span>
                    <span class="text-[11px] font-semibold text-stone-500 uppercase tracking-wider">Server Latency</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 Core Lab Engines Cards -->
<section class="py-14 sm:py-20 bg-white border-b border-stone-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xs font-bold uppercase tracking-widest text-cherry-700 mb-2">Engineered For Indian Shoppers</h2>
            <h3 class="font-serif text-3xl font-bold text-stone-900">4 Intelligent Beauty & Fragrance Tools</h3>
            <p class="text-xs sm:text-sm text-stone-500 mt-2">Built specifically for warm/olive Indian undertones, humid monsoon skin climates, and smart wallet decisions.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Tool 1: Skincare & Makeup Dupes -->
            <div class="bg-stone-50 rounded-2xl p-6 border border-stone-200 hover:border-cherry-300 transition-all hover:shadow-md flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-cherry-100 text-cherry-700 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                        💄
                    </div>
                    <h4 class="text-lg font-bold text-stone-900">Dupe Finder</h4>
                    <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                        Match luxury ₹4,000+ serums and lipsticks (Charlotte Tilbury, Estée Lauder, Paula's Choice) against affordable Indian equivalents with up to 90% savings.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-stone-200/60">
                    <a href="/dupes" class="inline-flex items-center text-xs font-bold text-cherry-700 group-hover:text-cherry-800">
                        Explore Dupes <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>

            <!-- Tool 2: Perfume Clone Finder -->
            <div class="bg-stone-50 rounded-2xl p-6 border border-stone-200 hover:border-amber-300 transition-all hover:shadow-md flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                        ✨
                    </div>
                    <h4 class="text-lg font-bold text-stone-900">Perfume Clone Finder</h4>
                    <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                        Discover beast-mode Middle Eastern clones (Armaf, Lattafa, Maison Alhambra) that replicate ₹30,000+ niche perfumes like Baccarat Rouge 540 and Creed Aventus.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-stone-200/60">
                    <a href="/perfumes" class="inline-flex items-center text-xs font-bold text-amber-700 group-hover:text-amber-800">
                        Discover Clones <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>

            <!-- Tool 3: Active Clash & Fungal Acne Checker -->
            <div class="bg-stone-50 rounded-2xl p-6 border border-stone-200 hover:border-emerald-300 transition-all hover:shadow-md flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                        🧪
                    </div>
                    <h4 class="text-lg font-bold text-stone-900">Routine Clash Checker</h4>
                    <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                        Instant algorithmic check for chemical clashes (Retinol + AHA, Vitamin C + BPO) and Malassezia folliculitis (fungal acne) triggers like polysorbates and ferments.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-stone-200/60">
                    <a href="/routine-checker" class="inline-flex items-center text-xs font-bold text-emerald-700 group-hover:text-emerald-800">
                        Analyze Routine <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>

            <!-- Tool 4: Cross-Brand Indian Foundation & Lipstick Shade Matcher -->
            <div class="bg-stone-50 rounded-2xl p-6 border border-stone-200 hover:border-rose-300 transition-all hover:shadow-md flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-rose-100 text-rose-700 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                        🎨
                    </div>
                    <h4 class="text-lg font-bold text-stone-900">Indian Shade Matcher</h4>
                    <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                        Know your MAC shade (NC35, NC42, NC25)? Find your exact match across Maybelline Fit Me, Kay Beauty, and Fenty without grey ashy cast.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-stone-200/60">
                    <a href="/shade-finder" class="inline-flex items-center text-xs font-bold text-rose-700 group-hover:text-rose-800">
                        Find My Shade <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trending Skincare & Makeup Dupes Grid (with Category Filter Pills) -->
<section class="py-16 bg-stone-50" x-data="{
    tab: 'all',
    dupes: <?= htmlspecialchars(json_encode($trendingDupes)) ?>,
    get filteredList() {
        if (this.tab === 'all') return this.dupes.slice(0, 9);
        return this.dupes.filter(d => d.sub_category === this.tab).slice(0, 9);
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-cherry-700">Editor's Lab Benchmarks</span>
                <h3 class="font-serif text-3xl font-bold text-stone-900 mt-1">Trending Skincare & Makeup Dupes</h3>
                <p class="text-xs sm:text-sm text-stone-500 mt-1">Side-by-side INCI composition analysis, texture notes, and verified price savings in INR.</p>
            </div>
            <a href="/dupes" class="text-xs sm:text-sm font-bold text-cherry-700 hover:text-cherry-900 inline-flex items-center gap-1">
                View All Dupes (<?= $totalDupesCount ?? 100 ?>) →
            </a>
        </div>

        <!-- Filter Pills -->
        <div class="flex flex-wrap items-center gap-2 mb-8">
            <button @click="tab = 'all'" :class="tab === 'all' ? 'bg-cherry-700 text-white font-bold' : 'bg-white text-stone-700 hover:bg-stone-100'" class="px-4 py-2 rounded-xl text-xs border border-stone-200 transition-all shadow-xs">
                All Trending
            </button>
            <button @click="tab = 'makeup'" :class="tab === 'makeup' ? 'bg-cherry-700 text-white font-bold' : 'bg-white text-stone-700 hover:bg-stone-100'" class="px-4 py-2 rounded-xl text-xs border border-stone-200 transition-all shadow-xs">
                💄 Lipsticks & Makeup
            </button>
            <button @click="tab = 'serum-active'" :class="tab === 'serum-active' ? 'bg-cherry-700 text-white font-bold' : 'bg-white text-stone-700 hover:bg-stone-100'" class="px-4 py-2 rounded-xl text-xs border border-stone-200 transition-all shadow-xs">
                🧴 Serums & Actives
            </button>
            <button @click="tab = 'sunscreen-moisturizer'" :class="tab === 'sunscreen-moisturizer' ? 'bg-cherry-700 text-white font-bold' : 'bg-white text-stone-700 hover:bg-stone-100'" class="px-4 py-2 rounded-xl text-xs border border-stone-200 transition-all shadow-xs">
                ☀️ Sunscreens & Moisturizers
            </button>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredList" :key="item.slug">
                <div class="bg-white rounded-2xl border border-stone-200 p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <!-- Header match & savings -->
                        <div class="flex items-center justify-between gap-2 pb-3 border-b border-stone-100">
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                🎯 <span x-text="item.match_score"></span>% Match
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                Save ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- Original Luxury Product -->
                        <div class="mt-4 flex items-start gap-3">
                            <div class="flex-shrink-0 pt-0.5">
                                <template x-if="item.orig_swatch">
                                    <div class="w-8 h-8 rounded-full border border-stone-200 shadow-inner ring-2 ring-white glossy-swatch" :style="'background-color: ' + item.orig_swatch"></div>
                                </template>
                                <template x-if="!item.orig_swatch">
                                    <div class="w-8 h-8 rounded-full bg-stone-100 border border-stone-300 flex items-center justify-center text-xs">🧪</div>
                                </template>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-stone-500 block">Luxury Benchmark</span>
                                <h4 class="text-sm font-bold text-stone-900 truncate" x-text="item.orig_brand"></h4>
                                <p class="text-xs text-stone-600 truncate" x-text="item.orig_name"></p>
                                <span class="text-xs line-through text-stone-500 font-medium">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                            </div>
                        </div>

                        <!-- VS Divider -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2 py-0.5 rounded-full bg-stone-100 text-stone-500 text-[10px] font-bold uppercase tracking-wider">VS DUPE</span>
                        </div>

                        <!-- Budget Dupe Alternative -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 pt-0.5">
                                <template x-if="item.dupe_swatch">
                                    <div class="w-8 h-8 rounded-full border border-stone-200 shadow-inner ring-2 ring-white glossy-swatch" :style="'background-color: ' + item.dupe_swatch"></div>
                                </template>
                                <template x-if="!item.dupe_swatch">
                                    <div class="w-8 h-8 rounded-full bg-emerald-50 border border-emerald-300 flex items-center justify-center text-xs">✨</div>
                                </template>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-emerald-600 block">Verified Indian Dupe</span>
                                <h4 class="text-sm font-bold text-stone-900 truncate" x-text="item.dupe_brand"></h4>
                                <p class="text-xs text-stone-600 truncate" x-text="item.dupe_name"></p>
                                <span class="text-sm font-extrabold text-emerald-700">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                            </div>
                        </div>

                        <p class="mt-3 text-xs text-stone-500 line-clamp-2 leading-relaxed" x-text="item.comparison_summary"></p>
                    </div>

                    <!-- Card Actions -->
                    <div class="mt-5 pt-3 border-t border-stone-100 space-y-2">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="flex items-center justify-center gap-1.5 w-full py-2.5 px-3 rounded-xl text-xs font-extrabold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white shadow-xs transition-all group">
                            <span>🛒 Check Lowest Price on Amazon</span>
                            <span class="group-hover:translate-x-0.5 transition-transform">→</span>
                        </a>

                        <!-- Secondary Retailer & Details Links -->
                        <div class="flex items-center justify-between gap-2">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="flex-1 text-center py-1.5 px-2.5 rounded-lg text-xs font-bold bg-pink-50 hover:bg-pink-100 text-pink-700 border border-pink-200/80 transition-colors">
                                View on Nykaa
                            </a>
                            <a :href="'/dupe/' + encodeURIComponent(item.slug)" 
                               class="text-xs font-bold text-cherry-700 hover:text-cherry-900 py-1.5 px-2">
                                Deep Dive →
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<!-- Beast-Mode Perfume Clones Spotlight -->
<section class="py-16 bg-stone-950 text-white border-b border-stone-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Olfactory Longevity & Sillage</span>
                <h3 class="font-serif text-3xl font-bold text-white mt-1">Beast-Mode Middle Eastern Clones</h3>
                <p class="text-xs sm:text-sm text-stone-400 mt-1">Niche DNA replicas tested for 10+ hour longevity in Indian tropical climate.</p>
            </div>
            <a href="/perfumes" class="text-xs sm:text-sm font-bold text-amber-400 hover:text-amber-300 inline-flex items-center gap-1">
                Explore All 40+ Fragrance Clones →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach (array_slice($perfumeClones, 0, 4) as $clone): ?>
                <div class="bg-gradient-to-b from-stone-900 to-stone-950 text-white rounded-2xl p-6 border border-stone-800 shadow-lg flex flex-col justify-between">
                    <div>
                        <!-- Notes concentration pill -->
                        <div class="flex items-center justify-between pb-3 border-b border-stone-800">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-900/40 text-amber-300 border border-amber-700/50">
                                EDP / Extrait
                            </span>
                            <span class="text-xs font-bold text-emerald-400">
                                Save <?= format_inr($clone['savings_inr']) ?>
                            </span>
                        </div>

                        <div class="mt-4">
                            <span class="text-[10px] font-semibold tracking-wider text-stone-400 uppercase">Original Niche</span>
                            <h4 class="text-sm font-bold text-stone-200 truncate"><?= htmlspecialchars($clone['orig_brand'] . ' ' . $clone['orig_name']) ?></h4>
                            <span class="text-xs line-through text-stone-500"><?= format_inr($clone['orig_mrp']) ?></span>
                        </div>

                        <div class="my-3 h-px bg-stone-800 relative">
                            <span class="absolute left-1/2 -top-2 -translate-x-1/2 bg-stone-900 px-2 text-[9px] font-bold text-stone-400">CLONED BY</span>
                        </div>

                        <div>
                            <span class="text-[10px] font-semibold tracking-wider text-amber-400 uppercase">Beast-Mode Clone</span>
                            <h4 class="text-base font-bold text-white truncate"><?= htmlspecialchars($clone['dupe_brand']) ?></h4>
                            <p class="text-xs text-stone-300 truncate"><?= htmlspecialchars($clone['dupe_name']) ?></p>
                            <span class="text-sm font-extrabold text-amber-400"><?= format_inr($clone['dupe_mrp']) ?></span>
                        </div>

                        <!-- Notes list -->
                        <?php $notes = json_array_decode($clone['dupe_actives']); ?>
                        <?php if (!empty($notes)): ?>
                            <div class="mt-4 space-y-1">
                                <?php foreach (array_slice($notes, 0, 2) as $n): ?>
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] bg-stone-800 text-stone-300 mr-1 mb-1">
                                        <?= htmlspecialchars($n) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-6 pt-3 border-t border-stone-800 flex items-center justify-between gap-2">
                        <a href="/perfume-clone/<?= urlencode($clone['slug']) ?>" class="text-xs font-bold text-amber-400 hover:text-amber-300">
                            Notes Breakdown →
                        </a>
                        <a href="<?= affiliate_buy_url('amazon', $clone['dupe_brand'] . ' ' . $clone['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="px-3.5 py-1.5 text-xs font-extrabold rounded-lg bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-stone-950 transition-colors shadow-xs">
                            🛒 Buy on Amazon
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Interactive Routine Conflict Teaser Banner -->
<section class="py-16 bg-gradient-to-r from-emerald-950 via-teal-900 to-stone-950 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 space-y-4">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-900/60 text-emerald-300 border border-emerald-700/60 text-xs font-bold uppercase tracking-wider">
                    🧪 Safety Laboratory
                </span>
                <h3 class="font-serif text-3xl sm:text-4xl font-bold leading-tight">
                    Are Your Active Ingredients Quietly Clashing & Damaging Your Skin?
                </h3>
                <p class="text-sm text-emerald-100/80 leading-relaxed max-w-xl">
                    Mixing Retinol with direct AHAs, or Pure Vitamin C with Benzoyl Peroxide causes chemical burns and moisture barrier damage. Check for Malassezia yeast (fungal acne) triggers like polysorbates and ferments in seconds.
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="/routine-checker" class="px-6 py-3 rounded-xl text-sm font-bold bg-emerald-400 text-stone-950 hover:bg-emerald-300 transition-colors shadow-lg">
                        Launch Routine Checker Free →
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10 space-y-3">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-300">Quick Clinical Conflict Rules</span>
                <div class="bg-black/30 p-3 rounded-xl text-xs space-y-1">
                    <strong class="text-rose-400">⚠️ Retinol + Glycolic Acid:</strong>
                    <p class="text-stone-300 text-[11px]">Causes severe lipid-barrier stripping and erythema. Never layer in the same PM routine.</p>
                </div>
                <div class="bg-black/30 p-3 rounded-xl text-xs space-y-1">
                    <strong class="text-amber-300">🍄 Polysorbates & Ferments:</strong>
                    <p class="text-stone-300 text-[11px]">Prime lipid and amino acid food source for Malassezia fungus. Causes forehead bumps.</p>
                </div>
                <div class="bg-black/30 p-3 rounded-xl text-xs space-y-1">
                    <strong class="text-emerald-300">✅ Hyaluronic Acid + Ceramides:</strong>
                    <p class="text-stone-300 text-[11px]">Universal synergistic barrier healing. Safe with all exfoliants.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
