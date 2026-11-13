<?php
declare(strict_types=1);
/** @var array $dupesList */
/** @var string $selectedCategory */
/** @var string $searchQuery */

$pageTitle = 'Indian Skincare & Makeup Dupe Directory 2026 | Verified Beauty Lab Alternatives';
$pageDescription = 'Search 60+ verified Indian dupes for Clinique Black Honey, Charlotte Tilbury Pillow Talk, COSRX Snail Mucin, and Paula\'s Choice BHA with instant price comparison.';
$currentRoute = '/dupes';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-10 bg-gradient-to-b from-cherry-50/60 to-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-cherry-100 text-cherry-900 text-xs font-bold uppercase tracking-wider mb-3">
                <span>💄 Chemical & Swatch Match Index</span>
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-extrabold text-stone-900 tracking-tight">
                Skincare & Makeup Dupe Directory
            </h1>
            <p class="text-sm text-stone-600 mt-2 leading-relaxed">
                Deconstructed INCI formulas and pigment swatches. Compare Clinique, Charlotte Tilbury, MAC, Paula's Choice, and COSRX against verified Indian alternatives on Nykaa, Tira & Amazon.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Dupe Cards Section (Alpine.js) -->
<section class="py-8 bg-stone-50 min-h-[700px]" x-data="{
    filterCategory: 'all',
    search: '<?= htmlspecialchars($searchQuery ?? '') ?>',
    allDupes: <?= htmlspecialchars(json_encode($dupesList)) ?>,
    requestName: '',
    requestCat: 'makeup',
    requestLoading: false,
    requestSuccess: false,
    requestError: '',

    get filteredDupes() {
        const q = this.search.trim().toLowerCase();
        return this.allDupes.filter(dupe => {
            // Category match
            let catMatch = true;
            if (this.filterCategory === 'makeup') {
                catMatch = dupe.sub_category === 'makeup';
            } else if (this.filterCategory === 'serum-active') {
                catMatch = dupe.sub_category === 'serum-active';
            } else if (this.filterCategory === 'sunscreen-moisturizer') {
                catMatch = dupe.sub_category === 'sunscreen-moisturizer';
            }

            if (!catMatch) return false;

            // Search query match
            if (!q) return true;
            const corpus = (dupe.orig_brand + ' ' + dupe.orig_name + ' ' + dupe.dupe_brand + ' ' + dupe.dupe_name + ' ' + dupe.comparison_summary + ' ' + (dupe.orig_actives || '') + ' ' + (dupe.dupe_actives || '')).toLowerCase();
            return corpus.includes(q);
        });
    },

    async submitMissingProduct() {
        if (!this.search.trim() && !this.requestName.trim()) return;
        const nameToSubmit = this.requestName.trim() || this.search.trim();
        this.requestLoading = true;
        this.requestError = '';
        try {
            const res = await fetch('/api/request-dupe', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ product_name: nameToSubmit, category: this.requestCat })
            });
            const data = await res.json();
            if (data.success) {
                this.requestSuccess = true;
            } else {
                this.requestError = data.message || 'Error submitting request.';
            }
        } catch (e) {
            this.requestError = 'Network error. Please try again.';
        } finally {
            this.requestLoading = false;
        }
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Controls: Sticky Instant Search & Category Filter Pills -->
        <div class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm space-y-4 mb-8">
            <!-- Instant Search Input -->
            <div class="relative w-full">
                <input x-model="search" type="text" placeholder="Type a luxury lipstick, serum, or sunscreen... e.g., Pillow Talk, Black Honey, Snail Mucin, BHA" class="w-full pl-11 pr-10 py-3.5 rounded-xl border border-stone-300 text-sm placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-cherry-500 focus:border-cherry-500 transition-all shadow-inner">
                <svg class="w-5 h-5 text-stone-400 absolute left-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <button x-show="search.length > 0" @click="search = ''" class="absolute right-3.5 top-3.5 text-stone-400 hover:text-stone-600 text-xs font-bold p-0.5">
                    ✕
                </button>
            </div>

            <!-- Category Pills Bar -->
            <div class="flex flex-wrap items-center justify-between gap-3 pt-1">
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="filterCategory = 'all'" :class="filterCategory === 'all' ? 'bg-cherry-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                        All Dupes (<?= count($dupesList) ?>)
                    </button>
                    <button @click="filterCategory = 'makeup'" :class="filterCategory === 'makeup' ? 'bg-cherry-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                        💄 Lipsticks & Makeup
                    </button>
                    <button @click="filterCategory = 'serum-active'" :class="filterCategory === 'serum-active' ? 'bg-cherry-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                        🧴 Serums & Actives
                    </button>
                    <button @click="filterCategory = 'sunscreen-moisturizer'" :class="filterCategory === 'sunscreen-moisturizer' ? 'bg-cherry-700 text-white shadow-sm' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                        ☀️ Sunscreens & Moisturizers
                    </button>
                </div>

                <div class="text-xs font-semibold text-stone-500">
                    Showing <span class="text-stone-900 font-bold" x-text="filteredDupes.length"></span> matches
                </div>
            </div>
        </div>

        <!-- Dupe Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredDupes" :key="item.slug">
                <div class="bg-white rounded-2xl border border-stone-200 hover:border-cherry-300 p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                    <div>
                        <!-- Header Badges -->
                        <div class="flex items-center justify-between gap-2 pb-3 border-b border-stone-100">
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                🎯 <span x-text="item.match_score"></span>% Formula Match
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                Save ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. Original Luxury Product -->
                        <div class="mt-4 flex items-start gap-3">
                            <div class="flex-shrink-0 pt-0.5">
                                <template x-if="item.orig_swatch">
                                    <div class="w-8 h-8 rounded-full shadow-inner ring-2 ring-white border border-stone-200 glossy-swatch" :style="'background-color: ' + item.orig_swatch"></div>
                                </template>
                                <template x-if="!item.orig_swatch">
                                    <div class="w-8 h-8 rounded-full bg-stone-100 border border-stone-300 flex items-center justify-center text-xs">🧪</div>
                                </template>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-stone-600 block">Benchmark Luxury</span>
                                <h3 class="text-sm font-bold text-stone-900 truncate" x-text="item.orig_brand"></h3>
                                <p class="text-xs text-stone-600 truncate" x-text="item.orig_name"></p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs line-through text-stone-600 font-medium">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                    <span class="text-[10px] text-stone-600" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- VS Divider -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-stone-100 border border-stone-200 text-stone-500 text-[10px] font-bold uppercase tracking-wider">
                                VERIFIED DUPE
                            </span>
                        </div>

                        <!-- 2. Budget Dupe Product -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 pt-0.5">
                                <template x-if="item.dupe_swatch">
                                    <div class="w-8 h-8 rounded-full shadow-inner ring-2 ring-white border border-stone-200 glossy-swatch" :style="'background-color: ' + item.dupe_swatch"></div>
                                </template>
                                <template x-if="!item.dupe_swatch">
                                    <div class="w-8 h-8 rounded-full bg-emerald-50 border border-emerald-300 flex items-center justify-center text-xs">✨</div>
                                </template>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-emerald-600 block">Indian Budget Hero</span>
                                <h4 class="text-sm font-bold text-stone-900 truncate" x-text="item.dupe_brand"></h4>
                                <p class="text-xs text-stone-600 truncate" x-text="item.dupe_name"></p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-base font-extrabold text-emerald-700">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                    <span class="text-[10px] text-stone-600" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Summary -->
                        <p class="mt-3 text-xs text-stone-600 line-clamp-2 leading-relaxed" x-text="item.comparison_summary"></p>
                    </div>

                    <!-- Direct CTA buttons -->
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
                                INCI Breakdown →
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Zero Results State: User Request Box (AJAX submission) -->
        <div x-show="filteredDupes.length === 0" x-cloak class="mt-12 bg-white rounded-3xl border border-stone-200 p-8 sm:p-12 text-center max-w-xl mx-auto shadow-sm space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-cherry-50 text-cherry-700 flex items-center justify-center text-3xl mx-auto font-bold">
                💡
            </div>
            <h3 class="font-serif text-2xl font-bold text-stone-900">Can't Find Your Product?</h3>
            <p class="text-xs sm:text-sm text-stone-500 max-w-md mx-auto leading-relaxed">
                We haven't indexed a verified dupe for "<strong class="text-stone-800" x-text="search"></strong>" yet. Submit this product and our formulation team will test and compare Indian alternatives on Nykaa & Amazon.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingProduct" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter product name & brand" class="flex-1 px-4 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-cherry-500 focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-2.5 text-xs font-bold text-white bg-cherry-700 hover:bg-cherry-800 rounded-xl transition-all shadow-md disabled:opacity-50">
                        <span x-show="!requestLoading">Request Dupe</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-200 text-xs text-emerald-800 font-bold">
                    ✓ Request Queued! Our chemists will evaluate this item in our next batch.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-xs text-rose-600" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
