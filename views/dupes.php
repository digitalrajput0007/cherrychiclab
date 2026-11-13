<?php
declare(strict_types=1);
/** @var array $dupesList */
/** @var string $selectedCategory */
/** @var string $searchQuery */

$pageTitle = 'Indian Skincare & Makeup Dupe Directory 2026 | Verified Beauty Lab Alternatives';
$pageDescription = 'Search verified Indian dupes for Clinique Black Honey, Charlotte Tilbury Pillow Talk, COSRX Snail Mucin, and Paula\'s Choice BHA with instant price comparison.';
$currentRoute = '/dupes';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-12 bg-gradient-to-b from-rose-50/80 via-pink-50/30 to-[#FAF8F5] border-b border-rose-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-100 text-rose-700 border border-rose-200 text-sm font-semibold shadow-xs mb-3">
                <span>✨ Chemical & Swatch Match Index</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Skincare & Makeup Dupe Directory
            </h1>
            <p class="text-base text-slate-600 mt-3 leading-relaxed font-sans max-w-2xl">
                Deconstructed INCI formulas, active concentrations, and color pigments. Compare luxury staples from Charlotte Tilbury, MAC, Clinique, Paula's Choice, and COSRX against lab-verified Indian alternatives on Nykaa, Tira & Amazon.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Dupe Cards Section (Alpine.js) -->
<section class="py-10 bg-[#FAF8F5] min-h-[800px]" x-data="{
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
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm space-y-5 mb-8">
            <!-- Instant Search Input (Lens with clean non-overlapping spacing) -->
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-4.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="2"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <input x-model="search" type="text" placeholder="Type a luxury lipstick, serum, or sunscreen... e.g., Pillow Talk, Black Honey, Snail Mucin, BHA" class="w-full pl-12 pr-12 py-3.5 rounded-2xl border border-slate-200 text-base text-slate-900 placeholder-slate-400 focus:outline-none focus:border-rose-500 transition-colors font-sans bg-slate-50/50 shadow-xs">
                <button x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-700 text-sm font-bold p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Category Pills Bar with Vibrant Gradient Active States -->
            <div class="flex flex-wrap items-center justify-between gap-3 pt-1">
                <div class="flex flex-wrap items-center gap-2.5">
                    <button @click="filterCategory = 'all'" :class="filterCategory === 'all' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        All Dupes (<?= count($dupesList) ?>)
                    </button>
                    <button @click="filterCategory = 'makeup'" :class="filterCategory === 'makeup' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Lipsticks & Makeup
                    </button>
                    <button @click="filterCategory = 'serum-active'" :class="filterCategory === 'serum-active' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Serums & Actives
                    </button>
                    <button @click="filterCategory = 'sunscreen-moisturizer'" :class="filterCategory === 'sunscreen-moisturizer' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Sunscreens & Moisturizers
                    </button>
                </div>

                <div class="text-sm font-semibold text-slate-500">
                    Showing <span class="text-slate-900 font-extrabold" x-text="filteredDupes.length"></span> matches
                </div>
            </div>
        </div>

        <!-- Split-Ticket Dupe Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredDupes" :key="item.slug">
                <div class="bg-white rounded-3xl border border-slate-200/90 p-6 shadow-sm hover:shadow-xl hover:border-rose-300 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Header match & savings badges -->
                        <div class="flex items-center justify-between gap-2 pb-4 border-b border-slate-100">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-sm font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                🎯 <span x-text="item.match_score"></span>% MATCH
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-sm font-extrabold bg-emerald-500 text-white shadow-sm">
                                SAVE ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. The Splurge Box -->
                        <div class="mt-5 p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                            <div class="flex items-start gap-3.5">
                                <div class="flex-shrink-0 pt-0.5">
                                    <template x-if="item.orig_swatch">
                                        <div class="w-12 h-12 rounded-2xl shadow-inner ring-2 ring-white swatch-droplet" :style="'background-color: ' + item.orig_swatch"></div>
                                    </template>
                                    <template x-if="!item.orig_swatch">
                                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-400 to-slate-600 text-white flex items-center justify-center shadow-inner">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs uppercase font-bold tracking-wider text-slate-500 block">THE SPLURGE</span>
                                    <h3 class="text-base md:text-lg font-bold text-slate-900 leading-snug truncate" x-text="item.orig_brand"></h3>
                                    <p class="text-base font-medium text-slate-700 leading-snug line-clamp-2 mt-0.5" x-text="item.orig_name"></p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-lg font-semibold line-through text-slate-400">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-xs font-semibold text-slate-500" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Divider Indicator -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-3 py-1 rounded-full bg-white border border-slate-200 text-slate-600 text-xs font-bold uppercase tracking-wider shadow-xs">
                                VS INDIAN ALTERNATIVE
                            </span>
                        </div>

                        <!-- 2. The Indian Dupe Box (Vibrant Warm Highlight) -->
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-emerald-50/70 via-teal-50/40 to-white border-2 border-emerald-500/40 shadow-sm">
                            <div class="flex items-start gap-3.5">
                                <div class="flex-shrink-0 pt-0.5">
                                    <template x-if="item.dupe_swatch">
                                        <div class="w-12 h-12 rounded-2xl shadow-inner ring-2 ring-white swatch-droplet" :style="'background-color: ' + item.dupe_swatch"></div>
                                    </template>
                                    <template x-if="!item.dupe_swatch">
                                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center shadow-inner">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-700 block">✓ VERIFIED DUPE</span>
                                    <h4 class="text-base md:text-lg font-bold text-slate-900 leading-snug truncate" x-text="item.dupe_brand"></h4>
                                    <p class="text-base font-medium text-slate-700 leading-snug line-clamp-2 mt-0.5" x-text="item.dupe_name"></p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-2xl md:text-3xl font-extrabold text-emerald-700">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-xs font-semibold text-slate-500" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Summary (15px highly readable) -->
                        <p class="mt-4 text-[15px] text-slate-600 line-clamp-2 leading-relaxed" x-text="item.comparison_summary"></p>
                    </div>

                    <!-- Direct Merchant Actions -->
                    <div class="mt-6 pt-4 border-t border-slate-100 space-y-2.5">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 text-white font-bold text-base py-3.5 px-5 rounded-xl shadow-md shadow-rose-600/15 w-full flex items-center justify-center gap-2 transition-all transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Check Lowest Price on Amazon</span>
                        </a>

                        <!-- Secondary Retailer & Details Links -->
                        <div class="flex items-center justify-between gap-2.5">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="flex-1 text-center bg-pink-50 hover:bg-pink-100 text-pink-700 border border-pink-200 font-semibold text-sm py-2.5 px-4 rounded-xl transition-colors">
                                View on Nykaa
                            </a>
                            <a :href="'/dupe/' + encodeURIComponent(item.slug)" 
                               class="text-sm font-bold text-rose-600 hover:text-rose-800 py-2.5 px-3 inline-flex items-center gap-1 transition-colors">
                                <span>INCI Breakdown</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Zero Results State: User Request Box (AJAX submission) -->
        <div x-show="filteredDupes.length === 0" x-cloak class="mt-12 bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 text-center max-w-xl mx-auto shadow-sm space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-rose-50 border border-rose-200 text-rose-600 flex items-center justify-center mx-auto">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h3 class="font-serif text-2xl font-bold text-slate-900">Formulation Not Yet Indexed</h3>
            <p class="text-base text-slate-600 max-w-md mx-auto leading-relaxed">
                We haven't indexed a verified Indian dupe for "<strong class="text-slate-900" x-text="search"></strong>" yet. Submit this product and our formulation team will evaluate Indian alternatives on Nykaa & Amazon.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingProduct" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter product name & brand" class="flex-1 px-4 py-3 rounded-xl border border-slate-200 text-sm text-slate-900 placeholder-slate-400 focus:border-rose-500 focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-3 text-sm font-bold text-white bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 rounded-xl transition-all shadow-md disabled:opacity-50">
                        <span x-show="!requestLoading">Request Dupe</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-200 text-sm text-emerald-800 font-bold">
                    ✓ Request Queued. Our cosmetic chemists will evaluate this item in our next testing batch.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-sm text-rose-600 font-bold" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
