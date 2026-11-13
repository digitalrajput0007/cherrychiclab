<?php
declare(strict_types=1);
/** @var array $perfumesList */
/** @var string $searchQuery */

$pageTitle = 'Indian Perfume Clone Finder 2026 | Beast-Mode Armaf & Lattafa Niche Dupe Index';
$pageDescription = 'Discover 10+ hour beast-mode fragrance clones for Creed Aventus, Baccarat Rouge 540, and Tom Ford. Tested for Indian heat and high humidity.';
$currentRoute = '/perfumes';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner (Luxury Dark Fragrance Vault) -->
<section class="py-14 bg-lab-obsidian text-white border-b border-[#262422]" style="background: radial-gradient(circle at 50% 0%, rgba(217, 119, 6, 0.08), transparent 70%), #141413;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-[#2E2B27] text-amber-300 text-[11px] font-mono tracking-widest uppercase mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                <span>BEAST-MODE OLFACTORY VAULT</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-semibold tracking-tight text-white">
                Indian Perfume Clone Finder
            </h1>
            <p class="text-xs sm:text-sm text-stone-400 mt-3 leading-relaxed font-sans max-w-2xl">
                Why spend ₹35,000+ on Creed, MFK, or Tom Ford? Discover master Middle Eastern clone houses (Armaf, Lattafa, Maison Alhambra, Afnan) delivering 95% identical sillage and 10+ hour beast-mode longevity in Indian tropical humidity.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Clone Cards Section (Alpine.js) -->
<section class="py-10 bg-[#0E0D0C] text-stone-200 min-h-[800px]" x-data="{
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
            if (this.selectedBudget === 'under-600' && mrp > 600) return false;
            if (this.selectedBudget === 'under-1500' && mrp > 1500) return false;
            if (this.selectedBudget === 'under-2500' && mrp > 2500) return false;
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
        <div class="bg-[#171614] p-6 rounded-2xl border border-[#2E2B27] shadow-lg space-y-5 mb-10">
            <!-- Search Input -->
            <div class="relative w-full">
                <div class="absolute left-4 top-3.5 pointer-events-none text-stone-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="1.5"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <input x-model="search" type="text" placeholder="Search by Designer Perfume, Scent Note (Vanilla, Oud, Citrus, Rose, Coffee), or Clone brand..." class="w-full pl-12 pr-10 py-3 rounded-xl bg-[#0F0E0D] border border-[#33302B] text-sm text-white placeholder-stone-500 focus:outline-none focus:border-amber-500 transition-colors font-sans">
                <button x-show="search.length > 0" @click="search = ''" class="absolute right-3.5 top-3.5 text-stone-500 hover:text-white text-xs font-mono p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Scent Note Pills -->
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-[11px] font-mono uppercase tracking-wider text-amber-400">Olfactory Note Filter:</span>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="selectedNote = 'all'" :class="selectedNote === 'all' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        All Notes
                    </button>
                    <button @click="selectedNote = 'vanilla'" :class="selectedNote === 'vanilla' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Vanilla & Tonka
                    </button>
                    <button @click="selectedNote = 'oud'" :class="selectedNote === 'oud' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Oud & Woody
                    </button>
                    <button @click="selectedNote = 'citrus'" :class="selectedNote === 'citrus' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Citrus & Aquatic
                    </button>
                    <button @click="selectedNote = 'rose'" :class="selectedNote === 'rose' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Rose & Floral
                    </button>
                    <button @click="selectedNote = 'coffee'" :class="selectedNote === 'coffee' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Coffee & Gourmand
                    </button>
                    <button @click="selectedNote = 'amber'" :class="selectedNote === 'amber' ? 'bg-amber-500 text-stone-950 font-bold border-amber-500' : 'bg-[#1C1A18] text-stone-300 hover:text-white border-[#2E2B27]'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Boozy Amber
                    </button>
                </div>
            </div>

            <!-- Budget Filter Pills -->
            <div class="pt-3 border-t border-[#262422] flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-[11px] font-mono uppercase tracking-wider text-stone-400 mr-1">Price Range:</span>
                    <button @click="selectedBudget = 'all'" :class="selectedBudget === 'all' ? 'bg-stone-700 text-white' : 'bg-[#0F0E0D] text-stone-400 hover:text-white border border-[#2E2B27]'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        All
                    </button>
                    <button @click="selectedBudget = 'under-600'" :class="selectedBudget === 'under-600' ? 'bg-stone-700 text-white' : 'bg-[#0F0E0D] text-stone-400 hover:text-white border border-[#2E2B27]'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        Under ₹600
                    </button>
                    <button @click="selectedBudget = 'under-1500'" :class="selectedBudget === 'under-1500' ? 'bg-stone-700 text-white' : 'bg-[#0F0E0D] text-stone-400 hover:text-white border border-[#2E2B27]'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        Under ₹1,500
                    </button>
                    <button @click="selectedBudget = 'middle-eastern'" :class="selectedBudget === 'middle-eastern' ? 'bg-amber-600 text-stone-950 font-semibold' : 'bg-[#0F0E0D] text-stone-400 hover:text-white border border-[#2E2B27]'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        Middle Eastern Clones (Armaf/Lattafa)
                    </button>
                </div>

                <div class="text-xs font-mono text-stone-400">
                    <span class="text-amber-400 font-bold" x-text="filteredClones.length"></span> fragrances match
                </div>
            </div>
        </div>

        <!-- Clones Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredClones" :key="item.slug">
                <div class="bg-[#171614] rounded-2xl border border-[#2E2B27] p-6 flex flex-col justify-between hover:border-amber-500/50 transition-all duration-300 shadow-md group">
                    <div>
                        <!-- Header Badges -->
                        <div class="flex items-center justify-between pb-4 border-b border-[#262422]">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-amber-950/60 text-amber-300 border border-amber-800/60">
                                <span x-text="item.match_score"></span>% OLFACTORY MATCH
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-emerald-950/60 text-emerald-400 border border-emerald-800/60">
                                SAVE ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. Original Luxury Niche -->
                        <div class="mt-5 p-3.5 rounded-xl bg-[#0E0D0C] border border-[#262422]">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="w-7 h-7 rounded-full border border-stone-700 shadow-inner ring-1 ring-stone-800 swatch-droplet" :style="'background-color: ' + (item.orig_swatch || '#D97706')"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-[9px] uppercase font-mono tracking-wider text-stone-500 block">NICHE BENCHMARK</span>
                                    <h3 class="text-xs font-semibold text-stone-300 truncate" x-text="item.orig_brand"></h3>
                                    <p class="text-[11px] text-stone-400 truncate" x-text="item.orig_name"></p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-xs font-mono line-through text-stone-500">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-[10px] font-mono text-stone-500" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Center Divider -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-[#141413] border border-[#2E2B27] text-stone-500 text-[9px] font-mono uppercase tracking-wider">
                                BEAST-MODE CLONE
                            </span>
                        </div>

                        <!-- 2. Budget Dupe Clone -->
                        <div class="p-3.5 rounded-xl bg-[#1D1B19] border border-amber-500/30 group-hover:border-amber-500/60 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="w-7 h-7 rounded-full border border-amber-500/50 shadow-inner ring-1 ring-stone-800 swatch-droplet" :style="'background-color: ' + (item.dupe_swatch || '#B45309')"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-[9px] uppercase font-mono tracking-wider text-amber-400 block font-medium">REPLICATED BY</span>
                                    <h4 class="text-xs font-serif font-bold text-white truncate" x-text="item.dupe_brand"></h4>
                                    <p class="text-[11px] text-stone-300 truncate" x-text="item.dupe_name"></p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-sm font-mono font-bold text-amber-400">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-[10px] font-mono text-stone-400" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Olfactory Scent Pyramid Pills -->
                        <div class="mt-4 p-3 rounded-xl bg-[#0F0E0D] border border-[#262422] space-y-1.5">
                            <div class="flex items-center justify-between text-[10px] font-mono text-amber-400">
                                <span class="uppercase tracking-wider">OLFACTORY PROFILE</span>
                                <span class="text-stone-400">EDP / EXTRAIT</span>
                            </div>
                            <p class="text-[11px] text-stone-300 leading-relaxed line-clamp-2" x-text="item.comparison_summary"></p>
                        </div>

                        <!-- Longevity & Projection Meter -->
                        <div class="mt-3 p-3 rounded-xl bg-[#0F0E0D] border border-[#262422] space-y-1 text-xs">
                            <div class="flex items-center justify-between text-[10px] font-mono text-stone-400">
                                <span class="uppercase tracking-wider">CLIMATE LONGEVITY:</span>
                                <span class="text-emerald-400 font-bold">10+ HOURS</span>
                            </div>
                            <span class="text-[11px] text-stone-300 line-clamp-2" x-text="item.texture_or_longevity_notes"></span>
                        </div>
                    </div>

                    <!-- Direct Buy CTAs -->
                    <div class="mt-6 pt-4 border-t border-[#262422] space-y-2">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="flex items-center justify-center gap-2 w-full py-2.5 px-3 rounded-xl text-xs font-mono uppercase tracking-wider bg-amber-500 hover:bg-amber-400 text-stone-950 font-semibold transition-colors duration-200 shadow-md">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Lowest Price on Amazon</span>
                        </a>

                        <!-- Secondary Retailer & Notes Links -->
                        <div class="grid grid-cols-3 gap-2 pt-0.5">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-1.5 px-2 rounded-xl text-[10px] font-mono uppercase text-stone-300 hover:text-white bg-[#1C1A18] hover:bg-[#25221F] border border-[#2E2B27] transition-colors">
                                Nykaa
                            </a>
                            <a :href="'/buy.php?store=myntra&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-1.5 px-2 rounded-xl text-[10px] font-mono uppercase text-stone-300 hover:text-white bg-[#1C1A18] hover:bg-[#25221F] border border-[#2E2B27] transition-colors">
                                Myntra
                            </a>
                            <a :href="'/perfume-clone/' + encodeURIComponent(item.slug)" 
                               class="text-center py-1.5 px-2 rounded-xl text-[10px] font-mono uppercase text-amber-400 hover:text-amber-300 bg-[#1C1A18] hover:bg-[#25221F] border border-[#2E2B27] transition-colors truncate">
                                Notes →
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Missing Fragrance Request Box -->
        <div x-show="filteredClones.length === 0" x-cloak class="mt-12 bg-[#171614] rounded-3xl border border-[#2E2B27] p-8 sm:p-12 text-center max-w-xl mx-auto shadow-md space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-[#0E0D0C] border border-[#2E2B27] text-amber-400 flex items-center justify-center mx-auto">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 5h6a1 1 0 011 1v2a1 1 0 01-1 1H9a1 1 0 01-1-1V6a1 1 0 011-1zm-3 6h12a2 2 0 012 2v7a3 3 0 01-3 3H7a3 3 0 01-3-3v-7a2 2 0 012-2z"></path>
                </svg>
            </div>
            <h3 class="font-serif text-2xl font-semibold text-white">Niche Perfume Not Yet Cloned</h3>
            <p class="text-xs sm:text-sm text-stone-400 max-w-md mx-auto leading-relaxed">
                We haven't indexed a beast-mode clone for "<strong class="text-white font-mono" x-text="search"></strong>" yet. Submit this fragrance and our olfactory specialists will test Middle Eastern alternatives.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingFragrance" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter perfume name & house" class="flex-1 px-4 py-2.5 rounded-xl bg-[#0E0D0C] border border-[#33302B] text-xs text-white placeholder-stone-500 focus:border-amber-400 focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-2.5 text-xs font-mono uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 rounded-xl transition-all shadow-md disabled:opacity-50 font-bold">
                        <span x-show="!requestLoading">Request Clone</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-emerald-950/60 rounded-xl border border-emerald-700/60 text-xs text-emerald-300 font-mono">
                    ✓ Request Queued. Our olfactory specialists will evaluate this DNA in our next testing batch.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-xs text-rose-400 font-mono" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
