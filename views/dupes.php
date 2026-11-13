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
<section class="py-12 bg-lab-alabaster border-b border-lab-border" style="background: radial-gradient(circle at 50% 0%, rgba(158, 27, 50, 0.04), transparent 70%), #FAF8F5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-lab-border text-lab-obsidian text-[11px] font-mono tracking-widest uppercase shadow-xs mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-lab-cherry"></span>
                <span>CHEMICAL & SWATCH MATCH ARCHIVE</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-semibold text-lab-obsidian tracking-tight">
                Skincare & Makeup Dupe Directory
            </h1>
            <p class="text-xs sm:text-sm text-lab-graphite mt-3 leading-relaxed font-sans max-w-2xl">
                Deconstructed INCI formulas, active concentrations, and color pigments. Compare luxury staples from Charlotte Tilbury, MAC, Clinique, Paula's Choice, and COSRX against lab-verified Indian alternatives on Nykaa, Tira & Amazon.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Dupe Cards Section (Alpine.js) -->
<section class="py-10 bg-lab-alabaster min-h-[800px]" x-data="{
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
        <div class="bg-white p-5 rounded-2xl border border-lab-border shadow-xs space-y-4 mb-8">
            <!-- Instant Search Input -->
            <div class="relative w-full">
                <div class="absolute left-4 top-3.5 pointer-events-none text-lab-graphite">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="1.5"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <input x-model="search" type="text" placeholder="Type a luxury lipstick, serum, or sunscreen... e.g., Pillow Talk, Black Honey, Snail Mucin, BHA" class="w-full pl-12 pr-10 py-3 rounded-xl border border-lab-border text-sm text-lab-obsidian placeholder-lab-graphite/60 focus:outline-none focus:border-lab-obsidian transition-colors font-sans bg-lab-alabaster/40">
                <button x-show="search.length > 0" @click="search = ''" class="absolute right-3.5 top-3.5 text-lab-graphite hover:text-lab-obsidian text-xs font-mono p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Category Pills Bar -->
            <div class="flex flex-wrap items-center justify-between gap-3 pt-1">
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="filterCategory = 'all'" :class="filterCategory === 'all' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        All Dupes (<?= count($dupesList) ?>)
                    </button>
                    <button @click="filterCategory = 'makeup'" :class="filterCategory === 'makeup' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Lipsticks & Makeup
                    </button>
                    <button @click="filterCategory = 'serum-active'" :class="filterCategory === 'serum-active' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Serums & Actives
                    </button>
                    <button @click="filterCategory = 'sunscreen-moisturizer'" :class="filterCategory === 'sunscreen-moisturizer' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Sunscreens & Moistures
                    </button>
                </div>

                <div class="text-xs font-mono text-lab-graphite">
                    Showing <span class="text-lab-obsidian font-bold" x-text="filteredDupes.length"></span> matches
                </div>
            </div>
        </div>

        <!-- Split-Ticket Dupe Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredDupes" :key="item.slug">
                <div class="bg-white rounded-2xl border border-lab-border p-6 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Header match & savings -->
                        <div class="flex items-center justify-between gap-2 pb-4 border-b border-lab-border">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-lab-emerald-subtle text-lab-emerald border border-lab-emerald/20">
                                <span x-text="item.match_score"></span>% MATCH
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-lab-cherry-subtle text-lab-cherry border border-lab-cherry/20">
                                SAVE ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. The Splurge (Benchmark Luxury) -->
                        <div class="mt-5 p-3.5 rounded-xl bg-lab-alabaster border border-lab-border/80">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 pt-0.5">
                                    <template x-if="item.orig_swatch">
                                        <div class="w-7 h-7 rounded-full shadow-inner ring-1 ring-black/10 swatch-droplet" :style="'background-color: ' + item.orig_swatch"></div>
                                    </template>
                                    <template x-if="!item.orig_swatch">
                                        <div class="w-7 h-7 rounded-full bg-stone-200/70 border border-lab-border flex items-center justify-center text-lab-graphite">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-[9px] uppercase font-mono tracking-wider text-lab-graphite block">THE SPLURGE</span>
                                    <h3 class="text-xs font-semibold text-lab-obsidian truncate" x-text="item.orig_brand"></h3>
                                    <p class="text-[11px] text-lab-graphite truncate" x-text="item.orig_name"></p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-xs font-mono line-through text-stone-400">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-[10px] font-mono text-lab-graphite/70" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Divider Indicator -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-white border border-lab-border text-lab-graphite text-[9px] font-mono uppercase tracking-wider">
                                VERIFIED FORMULATION DUPE
                            </span>
                        </div>

                        <!-- 2. The Indian Dupe -->
                        <div class="p-3.5 rounded-xl bg-white border-2 border-lab-border group-hover:border-lab-cherry/30 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 pt-0.5">
                                    <template x-if="item.dupe_swatch">
                                        <div class="w-7 h-7 rounded-full shadow-inner ring-1 ring-black/10 swatch-droplet" :style="'background-color: ' + item.dupe_swatch"></div>
                                    </template>
                                    <template x-if="!item.dupe_swatch">
                                        <div class="w-7 h-7 rounded-full bg-lab-emerald-subtle border border-lab-emerald/30 flex items-center justify-center text-lab-emerald">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-[9px] uppercase font-mono tracking-wider text-lab-cherry block font-medium">VERIFIED INDIAN DUPE</span>
                                    <h4 class="text-xs font-bold text-lab-obsidian truncate" x-text="item.dupe_brand"></h4>
                                    <p class="text-[11px] text-lab-graphite truncate" x-text="item.dupe_name"></p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-sm font-mono font-bold text-lab-obsidian">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-[10px] font-mono text-lab-graphite/70" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Summary -->
                        <p class="mt-4 text-xs text-lab-graphite line-clamp-2 leading-relaxed" x-text="item.comparison_summary"></p>
                    </div>

                    <!-- Direct Merchant Actions -->
                    <div class="mt-6 pt-4 border-t border-lab-border space-y-2">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="flex items-center justify-center gap-2 w-full py-2.5 px-3 rounded-xl text-xs font-mono uppercase tracking-wider bg-lab-obsidian hover:bg-lab-cherry text-white transition-colors duration-200 shadow-xs">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Check Lowest Price on Amazon</span>
                        </a>

                        <!-- Secondary Retailer & Details Links -->
                        <div class="flex items-center justify-between gap-2">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="flex-1 text-center py-2 px-3 rounded-xl text-xs font-mono text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                                View on Nykaa
                            </a>
                            <a :href="'/dupe/' + encodeURIComponent(item.slug)" 
                               class="text-xs font-mono text-lab-cherry hover:text-lab-obsidian py-2 px-3 inline-flex items-center gap-1 transition-colors">
                                <span>INCI Breakdown</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Zero Results State: User Request Box (AJAX submission) -->
        <div x-show="filteredDupes.length === 0" x-cloak class="mt-12 bg-white rounded-3xl border border-lab-border p-8 sm:p-12 text-center max-w-xl mx-auto shadow-xs space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-lab-alabaster border border-lab-border text-lab-obsidian flex items-center justify-center mx-auto">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h3 class="font-serif text-2xl font-semibold text-lab-obsidian">Formulation Not Yet Indexed</h3>
            <p class="text-xs sm:text-sm text-lab-graphite max-w-md mx-auto leading-relaxed">
                We haven't indexed a verified Indian dupe for "<strong class="text-lab-obsidian font-mono" x-text="search"></strong>" yet. Submit this product and our formulation team will evaluate Indian alternatives on Nykaa & Amazon.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingProduct" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter product name & brand" class="flex-1 px-4 py-2.5 rounded-xl border border-lab-border text-xs text-lab-obsidian placeholder-lab-graphite/60 focus:border-lab-obsidian focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-2.5 text-xs font-mono uppercase tracking-wider text-white bg-lab-obsidian hover:bg-lab-cherry rounded-xl transition-all shadow-xs disabled:opacity-50">
                        <span x-show="!requestLoading">Request Dupe</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-lab-emerald-subtle rounded-xl border border-lab-emerald/20 text-xs text-lab-emerald font-mono">
                    ✓ Request Queued. Our cosmetic chemists will evaluate this item in our next testing batch.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-xs text-lab-cherry font-mono" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
