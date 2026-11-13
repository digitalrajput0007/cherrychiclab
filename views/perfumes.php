<?php
declare(strict_types=1);
/** @var array $perfumesList */
/** @var string $searchQuery */

$pageTitle = 'Indian Perfume Clone Finder 2026 | Beast-Mode Armaf & Lattafa Niche Dupe Index';
$pageDescription = 'Discover 10+ hour beast-mode fragrance clones for Creed Aventus, Baccarat Rouge 540, and Tom Ford. Tested for Indian heat and high humidity.';
$currentRoute = '/perfumes';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-12 bg-gradient-to-r from-stone-900 via-stone-950 to-neutral-900 text-white border-b border-stone-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-900/60 text-amber-300 border border-amber-700/60 text-xs font-bold uppercase tracking-wider mb-3">
                <span>✨ Beast-Mode Olfactory Index</span>
            </span>
            <h1 class="font-serif text-3xl sm:text-5xl font-extrabold tracking-tight">
                Indian Perfume Clone Finder
            </h1>
            <p class="text-sm text-stone-300 mt-3 leading-relaxed">
                Why spend ₹35,000+ on Creed, MFK, or Tom Ford? Discover master Middle Eastern clone houses (Armaf, Lattafa, Maison Alhambra, Afnan) delivering 95% identical sillage and 10+ hour beast-mode longevity in Indian tropical humidity.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Clone Cards Section (Alpine.js) -->
<section class="py-8 bg-stone-950 text-stone-200 min-h-[700px]" x-data="{
    search: '<?= htmlspecialchars($searchQuery ?? '') ?>',
    selectedNote: 'all',
    selectedBudget: 'all',
    allClones: <?= htmlspecialchars(json_encode($perfumesList)) ?>,
    requestName: '',
    requestLoading: false,
    requestSuccess: false,
    requestError: '',

    get filteredClones() {
        const q = this.search.trim().toLowerCase();
        return this.allClones.filter(clone => {
            const corpus = (clone.orig_brand + ' ' + clone.orig_name + ' ' + clone.dupe_brand + ' ' + clone.dupe_name + ' ' + clone.comparison_summary + ' ' + (clone.orig_actives || '') + ' ' + (clone.dupe_actives || '')).toLowerCase();

            // Search query
            if (q && !corpus.includes(q)) return false;

            // Note filter
            if (this.selectedNote !== 'all') {
                if (!corpus.includes(this.selectedNote.toLowerCase())) return false;
            }

            // Budget filter
            const mrp = Number(clone.dupe_mrp);
            if (this.selectedBudget === 'under-500' && mrp > 600) return false;
            if (this.selectedBudget === 'under-1500' && mrp > 1500) return false;
            if (this.selectedBudget === 'under-2000' && mrp > 2000) return false;
            if (this.selectedBudget === 'middle-eastern') {
                const brand = clone.dupe_brand.toLowerCase();
                const isME = brand.includes('armaf') || brand.includes('lattafa') || brand.includes('alhambra') || brand.includes('afnan') || brand.includes('ajmal') || brand.includes('paris corner') || brand.includes('al haramain');
                if (!isME) return false;
            }

            return true;
        });
    },

    async submitMissingFragrance() {
        if (!this.search.trim() && !this.requestName.trim()) return;
        const nameToSubmit = this.requestName.trim() || this.search.trim();
        this.requestLoading = true;
        this.requestError = '';
        try {
            const res = await fetch('/api/request-dupe', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ product_name: nameToSubmit, category: 'perfume' })
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
        
        <!-- Controls Bar -->
        <div class="bg-stone-900 p-5 rounded-2xl border border-stone-800 shadow-md space-y-4 mb-8">
            <!-- Search Input -->
            <div class="relative w-full">
                <input x-model="search" type="text" placeholder="Search by Designer Perfume, Scent Note (Vanilla, Oud, Citrus, Rose, Coffee), or Clone brand..." class="w-full pl-11 pr-10 py-3.5 rounded-xl bg-stone-950 border border-stone-700 text-sm text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all shadow-inner">
                <svg class="w-5 h-5 text-stone-400 absolute left-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <button x-show="search.length > 0" @click="search = ''" class="absolute right-3.5 top-3.5 text-stone-400 hover:text-white text-xs font-bold p-0.5">
                    ✕
                </button>
            </div>

            <!-- Scent Note Pills -->
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Filter by Note:</span>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="selectedNote = 'all'" :class="selectedNote === 'all' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        All Notes
                    </button>
                    <button @click="selectedNote = 'vanilla'" :class="selectedNote === 'vanilla' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        🍦 Vanilla
                    </button>
                    <button @click="selectedNote = 'oud'" :class="selectedNote === 'oud' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        🪵 Oud / Woody
                    </button>
                    <button @click="selectedNote = 'citrus'" :class="selectedNote === 'citrus' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        🍋 Citrus / Fresh
                    </button>
                    <button @click="selectedNote = 'rose'" :class="selectedNote === 'rose' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        🌹 Rose / Floral
                    </button>
                    <button @click="selectedNote = 'coffee'" :class="selectedNote === 'coffee' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        ☕ Coffee / Gourmand
                    </button>
                    <button @click="selectedNote = 'amber'" :class="selectedNote === 'amber' ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-stone-800 text-stone-300 hover:bg-stone-700'" class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        🥃 Boozy Amber
                    </button>
                </div>
            </div>

            <!-- Budget Filter Pills -->
            <div class="pt-2 border-t border-stone-800 flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-400 mr-1">Budget:</span>
                    <button @click="selectedBudget = 'all'" :class="selectedBudget === 'all' ? 'bg-stone-700 text-white' : 'bg-stone-950 text-stone-400 hover:bg-stone-800'" class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        All Budgets
                    </button>
                    <button @click="selectedBudget = 'under-500'" :class="selectedBudget === 'under-500' ? 'bg-stone-700 text-white' : 'bg-stone-950 text-stone-400 hover:bg-stone-800'" class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        Under ₹600
                    </button>
                    <button @click="selectedBudget = 'under-1500'" :class="selectedBudget === 'under-1500' ? 'bg-stone-700 text-white' : 'bg-stone-950 text-stone-400 hover:bg-stone-800'" class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        Under ₹1,500
                    </button>
                    <button @click="selectedBudget = 'middle-eastern'" :class="selectedBudget === 'middle-eastern' ? 'bg-stone-700 text-white' : 'bg-stone-950 text-stone-400 hover:bg-stone-800'" class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        Middle Eastern Clones (Armaf/Lattafa)
                    </button>
                </div>

                <div class="text-xs text-stone-400">
                    <span class="text-white font-bold" x-text="filteredClones.length"></span> fragrances match
                </div>
            </div>
        </div>

        <!-- Clones Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredClones" :key="item.slug">
                <div class="bg-gradient-to-b from-stone-900 to-stone-950 rounded-2xl border border-stone-800 p-6 flex flex-col justify-between hover:border-amber-500/60 transition-all hover:shadow-xl group">
                    <div>
                        <!-- Header Badges -->
                        <div class="flex items-center justify-between pb-3 border-b border-stone-800">
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-950 text-amber-300 border border-amber-800">
                                🌟 <span x-text="item.match_score"></span>% Olfactory Match
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-950 text-emerald-400 border border-emerald-800">
                                Save ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- Original Luxury Niche -->
                        <div class="mt-4 flex items-start gap-3">
                            <div class="flex-shrink-0 pt-0.5">
                                <div class="w-8 h-8 rounded-full border border-stone-700 shadow-inner ring-2 ring-stone-800 glossy-swatch" :style="'background-color: ' + (item.orig_swatch || '#D97706')"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-stone-400 block">Original Designer / Niche</span>
                                <h3 class="text-sm font-bold text-white truncate" x-text="item.orig_brand"></h3>
                                <p class="text-xs text-stone-300 truncate" x-text="item.orig_name"></p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs line-through text-stone-500 font-medium">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                    <span class="text-[10px] text-stone-400" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-stone-900 border border-stone-800 text-stone-400 text-[10px] font-bold uppercase tracking-wider">
                                BEAST-MODE CLONE
                            </span>
                        </div>

                        <!-- Dupe Clone Alternative -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 pt-0.5">
                                <div class="w-8 h-8 rounded-full border border-amber-500/50 shadow-inner ring-2 ring-stone-800 glossy-swatch" :style="'background-color: ' + (item.dupe_swatch || '#B45309')"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-amber-400 block">Beast-Mode Clone</span>
                                <h4 class="text-base font-bold text-white truncate" x-text="item.dupe_brand"></h4>
                                <p class="text-xs text-stone-300 truncate" x-text="item.dupe_name"></p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-base font-extrabold text-amber-400">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                    <span class="text-[10px] text-stone-400" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Notes list / pyramid preview -->
                        <p class="mt-3 text-xs text-stone-300 leading-relaxed line-clamp-2" x-text="item.comparison_summary"></p>
                        
                        <div class="mt-3 p-2.5 rounded-xl bg-stone-950 border border-stone-800 text-[11px] text-stone-400">
                            <strong class="text-amber-400 block mb-0.5">⏱️ Longevity & Projection:</strong>
                            <span class="line-clamp-2" x-text="item.texture_or_longevity_notes"></span>
                        </div>
                    </div>

                    <!-- Direct Buy CTAs -->
                    <div class="mt-5 pt-3 border-t border-stone-800 space-y-2">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="flex items-center justify-center gap-1.5 w-full py-2.5 px-3 rounded-xl text-xs font-extrabold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-stone-950 shadow-md transition-all group">
                            <span>🛒 Check Lowest Price on Amazon</span>
                            <span class="group-hover:translate-x-0.5 transition-transform font-black">→</span>
                        </a>

                        <!-- Secondary Retailer & Notes Links -->
                        <div class="grid grid-cols-3 gap-2 pt-0.5">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-1.5 px-2 rounded-lg text-[11px] font-bold bg-stone-900 hover:bg-stone-800 text-pink-300 border border-stone-800 transition-colors">
                                View on Nykaa
                            </a>
                            <a :href="'/buy.php?store=myntra&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-1.5 px-2 rounded-lg text-[11px] font-bold bg-stone-900 hover:bg-stone-800 text-amber-300 border border-stone-800 transition-colors">
                                View on Myntra
                            </a>
                            <a :href="'/perfume-clone/' + encodeURIComponent(item.slug)" 
                               class="text-center py-1.5 px-2 rounded-lg text-[11px] font-semibold text-stone-400 hover:text-white bg-stone-900/60 border border-stone-800/80 transition-colors truncate">
                                Notes Breakdown →
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Zero Results State: User Request Box (AJAX submission) -->
        <div x-show="filteredClones.length === 0" x-cloak class="mt-12 bg-stone-900 rounded-3xl border border-stone-800 p-8 sm:p-12 text-center max-w-xl mx-auto shadow-sm space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-amber-950 text-amber-400 flex items-center justify-center text-3xl mx-auto font-bold border border-amber-800">
                ✨
            </div>
            <h3 class="font-serif text-2xl font-bold text-white">Can't Find Your Perfume?</h3>
            <p class="text-xs sm:text-sm text-stone-400 max-w-md mx-auto leading-relaxed">
                We haven't indexed a clone for "<strong class="text-amber-300" x-text="search"></strong>" yet. Submit this fragrance and our olfactory lab will map tested clones under ₹2,000.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingFragrance" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter perfume name & house" class="flex-1 px-4 py-2.5 rounded-xl bg-stone-950 border border-stone-700 text-xs text-white focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-2.5 text-xs font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 rounded-xl transition-all shadow-md disabled:opacity-50">
                        <span x-show="!requestLoading">Request Clone</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-emerald-950/80 rounded-xl border border-emerald-800 text-xs text-emerald-300 font-bold">
                    ✓ Request Queued! We will review Middle Eastern clone houses for this DNA.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-xs text-rose-400" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
