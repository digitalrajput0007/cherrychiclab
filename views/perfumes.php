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
<section class="py-12 bg-gradient-to-b from-amber-50/80 via-orange-50/30 to-[#FAF8F5] border-b border-amber-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-100 text-amber-800 border border-amber-200 text-sm font-semibold shadow-xs mb-3">
                <span>✨ Beast-Mode Olfactory Index</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Indian Perfume Clone Finder
            </h1>
            <p class="text-base text-slate-600 mt-3 leading-relaxed font-sans max-w-2xl">
                Why spend ₹35,000+ on Creed, MFK, or Tom Ford? Discover master Middle Eastern clone houses (Armaf, Lattafa, Maison Alhambra, Afnan) delivering 95%+ identical sillage and 10+ hour beast-mode longevity in Indian tropical humidity.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Clone Cards Section (Alpine.js) -->
<section class="py-10 bg-[#FAF8F5] min-h-[800px]" x-data="{
    search: '<?= htmlspecialchars($searchQuery ?? '') ?>',
    selectedNote: 'all',
    selectedBudget: 'all',
    allClones: <?= htmlspecialchars(json_encode($perfumesList)) ?>,
    requestName: '',
    requestLoading: false,
    requestSuccess: false,
    requestError: '',

    parseNotes(notesJson) {
        if (!notesJson) return { top: [], heart: [], base: [] };
        let list = [];
        try {
            list = typeof notesJson === 'string' ? JSON.parse(notesJson) : notesJson;
        } catch(e) {
            return { top: [], heart: [], base: [] };
        }
        if (!Array.isArray(list)) return { top: [], heart: [], base: [] };
        const res = { top: [], heart: [], base: [] };
        for (const item of list) {
            const str = String(item).trim();
            if (str.toLowerCase().startsWith('top:')) {
                res.top = str.replace(/^top:\s*/i, '').split(',').map(s => s.trim()).filter(Boolean);
            } else if (str.toLowerCase().startsWith('heart:')) {
                res.heart = str.replace(/^heart:\s*/i, '').split(',').map(s => s.trim()).filter(Boolean);
            } else if (str.toLowerCase().startsWith('base:')) {
                res.base = str.replace(/^base:\s*/i, '').split(',').map(s => s.trim()).filter(Boolean);
            } else {
                res.heart.push(str);
            }
        }
        return res;
    },

    getLongevityScore(text) {
        const t = (text || '').toLowerCase();
        if (t.includes('12+') || t.includes('14') || t.includes('beast')) return 5;
        if (t.includes('10+') || t.includes('10') || t.includes('12')) return 4;
        if (t.includes('8+') || t.includes('8') || t.includes('long-lasting')) return 3;
        return 3;
    },

    getProjectionLabel(text) {
        const t = (text || '').toLowerCase();
        if (t.includes('beast-mode') || t.includes('heavy') || t.includes('monstrous') || t.includes('room')) {
            return 'Room-Filler (Beast-Mode)';
        }
        if (t.includes('strong') || t.includes('great') || t.includes('arm')) {
            return 'Arm\'s Length (Strong)';
        }
        return 'Moderate Sillage';
    },

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
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm space-y-5 mb-8">
            <!-- Search Input (Lens with clean non-overlapping spacing) -->
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-4.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="2"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <input x-model="search" type="text" placeholder="Search by Designer Perfume, Scent Note (Vanilla, Oud, Citrus, Rose, Coffee), or Clone house..." class="w-full pl-12 pr-12 py-3.5 rounded-2xl border border-slate-200 text-base text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 transition-colors font-sans bg-slate-50/50 shadow-xs">
                <button x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-700 text-sm font-bold p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Scent Note Accord Pills -->
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-bold uppercase tracking-wider text-amber-800">Filter by Olfactory Accord:</span>
                </div>
                <div class="flex flex-wrap items-center gap-2.5">
                    <button @click="selectedNote = 'all'" :class="selectedNote === 'all' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        All Accords
                    </button>
                    <button @click="selectedNote = 'vanilla'" :class="selectedNote === 'vanilla' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Vanilla & Tonka
                    </button>
                    <button @click="selectedNote = 'oud'" :class="selectedNote === 'oud' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Oud & Woody
                    </button>
                    <button @click="selectedNote = 'citrus'" :class="selectedNote === 'citrus' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Citrus & Aquatic
                    </button>
                    <button @click="selectedNote = 'rose'" :class="selectedNote === 'rose' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Rose & Floral
                    </button>
                    <button @click="selectedNote = 'coffee'" :class="selectedNote === 'coffee' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Coffee & Gourmand
                    </button>
                    <button @click="selectedNote = 'amber'" :class="selectedNote === 'amber' ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-md shadow-amber-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                        Boozy Amber
                    </button>
                </div>
            </div>

            <!-- Budget & Origin Filter Pills -->
            <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="text-sm font-bold uppercase tracking-wider text-slate-500 mr-1">Price & Origin:</span>
                    <button @click="selectedBudget = 'all'" :class="selectedBudget === 'all' ? 'bg-slate-900 text-white font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-1.5 rounded-xl text-sm font-semibold transition-all">
                        All Budgets
                    </button>
                    <button @click="selectedBudget = 'under-600'" :class="selectedBudget === 'under-600' ? 'bg-slate-900 text-white font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-1.5 rounded-xl text-sm font-semibold transition-all">
                        Under ₹600
                    </button>
                    <button @click="selectedBudget = 'under-1500'" :class="selectedBudget === 'under-1500' ? 'bg-slate-900 text-white font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-1.5 rounded-xl text-sm font-semibold transition-all">
                        Under ₹1,500
                    </button>
                    <button @click="selectedBudget = 'middle-eastern'" :class="selectedBudget === 'middle-eastern' ? 'bg-amber-600 text-white font-bold' : 'bg-white text-amber-800 hover:text-amber-950 border border-amber-200'" class="px-4 py-1.5 rounded-xl text-sm font-semibold transition-all">
                        Middle Eastern Clones (Armaf, Lattafa, Afnan)
                    </button>
                </div>

                <div class="text-sm font-semibold text-slate-500">
                    Showing <span class="text-amber-800 font-extrabold" x-text="filteredClones.length"></span> fragrance matches
                </div>
            </div>
        </div>

        <!-- Clones Cards Grid (Architectural Split-Ticket + Olfactory Note Pyramid) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredClones" :key="item.slug">
                <div class="bg-white rounded-3xl border border-slate-200/90 p-6 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Header Match & Savings Badges -->
                        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-sm font-bold bg-amber-50 text-amber-800 border border-amber-200">
                                🌟 <span x-text="item.match_score"></span>% DNA ACCORD
                            </span>
                            <span class="inline-flex items-center gap-1 px-3.5 py-1 rounded-full text-sm font-extrabold bg-emerald-500 text-white shadow-sm">
                                SAVE ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. The Splurge (Niche Designer Benchmark) -->
                        <div class="mt-5 p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                            <div class="flex items-start gap-3.5">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-700 text-white flex items-center justify-center shadow-inner">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="7" y="8" width="10" height="13" rx="2" stroke-width="1.5"></rect>
                                            <path stroke-linecap="round" stroke-width="1.5" d="M10 8V5a1 1 0 011-1h2a1 1 0 011 1v3M9 3h6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs uppercase font-bold tracking-wider text-slate-500 block">NICHE BENCHMARK</span>
                                    <h3 class="text-base md:text-lg font-bold text-slate-900 leading-snug truncate" x-text="item.orig_brand"></h3>
                                    <p class="text-base font-medium text-slate-700 leading-snug line-clamp-2 mt-0.5" x-text="item.orig_name"></p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-lg font-semibold line-through text-slate-400">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-xs font-semibold text-slate-500" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Center Divider -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-3 py-1 rounded-full bg-white border border-slate-200 text-slate-600 text-xs font-bold uppercase tracking-wider shadow-xs">
                                BEAST-MODE REPLICA
                            </span>
                        </div>

                        <!-- 2. The Beast-Mode Dupe Clone -->
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-amber-50/70 via-orange-50/30 to-white border-2 border-amber-500/40 shadow-sm">
                            <div class="flex items-start gap-3.5">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-600 to-indigo-600 text-white flex items-center justify-center shadow-inner">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="7" y="8" width="10" height="13" rx="2" stroke-width="1.5"></rect>
                                            <path stroke-linecap="round" stroke-width="1.5" d="M10 8V5a1 1 0 011-1h2a1 1 0 011 1v3M9 3h6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs uppercase font-extrabold tracking-wider text-amber-800 block">✓ VERIFIED CLONE HOUSE</span>
                                    <h4 class="text-base md:text-lg font-bold text-slate-900 leading-snug truncate" x-text="item.dupe_brand"></h4>
                                    <p class="text-base font-medium text-slate-700 leading-snug line-clamp-2 mt-0.5" x-text="item.dupe_name"></p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-2xl md:text-3xl font-extrabold text-emerald-700">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-xs font-semibold text-slate-500" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. REAL Visual Olfactory Note Pyramid (Top / Heart / Base) -->
                        <div class="mt-4 p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                            <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-amber-800 border-b border-slate-200 pb-2">
                                <span>OLFACTORY PYRAMID ACCORD</span>
                                <span class="text-slate-500 font-semibold">EDP / EXTRAIT</span>
                            </div>

                            <div class="space-y-2 text-sm">
                                <!-- Top Notes -->
                                <div class="flex items-start gap-2" x-show="parseNotes(item.dupe_actives).top.length > 0">
                                    <span class="text-xs font-bold uppercase tracking-wider text-amber-800 bg-amber-100 px-2 py-0.5 rounded-md border border-amber-200 flex-shrink-0 mt-0.5">TOP</span>
                                    <div class="flex flex-wrap gap-1.5 min-w-0">
                                        <template x-for="n in parseNotes(item.dupe_actives).top" :key="n">
                                            <span class="text-xs font-medium text-slate-700 bg-white px-2 py-0.5 rounded-md border border-slate-200" x-text="n"></span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Heart Notes -->
                                <div class="flex items-start gap-2" x-show="parseNotes(item.dupe_actives).heart.length > 0">
                                    <span class="text-xs font-bold uppercase tracking-wider text-rose-800 bg-rose-100 px-2 py-0.5 rounded-md border border-rose-200 flex-shrink-0 mt-0.5">HEART</span>
                                    <div class="flex flex-wrap gap-1.5 min-w-0">
                                        <template x-for="n in parseNotes(item.dupe_actives).heart" :key="n">
                                            <span class="text-xs font-medium text-slate-700 bg-white px-2 py-0.5 rounded-md border border-slate-200" x-text="n"></span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Base Notes -->
                                <div class="flex items-start gap-2" x-show="parseNotes(item.dupe_actives).base.length > 0">
                                    <span class="text-xs font-bold uppercase tracking-wider text-slate-800 bg-slate-200 px-2 py-0.5 rounded-md border border-slate-300 flex-shrink-0 mt-0.5">BASE</span>
                                    <div class="flex flex-wrap gap-1.5 min-w-0">
                                        <template x-for="n in parseNotes(item.dupe_actives).base" :key="n">
                                            <span class="text-xs font-medium text-slate-700 bg-white px-2 py-0.5 rounded-md border border-slate-200" x-text="n"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Visual Segmented Longevity & Projection Meters -->
                        <div class="mt-3.5 p-4 rounded-2xl bg-white border border-slate-200 space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Longevity Meter:</span>
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center gap-1">
                                        <div class="h-2 w-5 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 1 ? 'bg-amber-600' : 'bg-slate-200'"></div>
                                        <div class="h-2 w-5 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 2 ? 'bg-amber-600' : 'bg-slate-200'"></div>
                                        <div class="h-2 w-5 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 3 ? 'bg-amber-600' : 'bg-slate-200'"></div>
                                        <div class="h-2 w-5 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 4 ? 'bg-amber-600' : 'bg-slate-200'"></div>
                                        <div class="h-2 w-5 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 5 ? 'bg-amber-600' : 'bg-slate-200'"></div>
                                    </div>
                                    <span class="text-xs font-bold text-amber-800 ml-1">10–12+ Hrs</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-1 border-t border-slate-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Projection:</span>
                                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200" x-text="getProjectionLabel(item.texture_or_longevity_notes)"></span>
                            </div>
                        </div>

                    </div>

                    <!-- Direct Buy CTAs -->
                    <div class="mt-6 pt-4 border-t border-slate-100 space-y-2.5">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-bold text-base py-3.5 px-5 rounded-xl shadow-md shadow-amber-600/15 w-full flex items-center justify-center gap-2 transition-all transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Check Lowest Price on Amazon</span>
                        </a>

                        <!-- Secondary Retailer & Notes Links -->
                        <div class="grid grid-cols-3 gap-2 pt-0.5">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-2 px-2 rounded-xl text-xs font-semibold text-slate-700 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors">
                                Nykaa
                            </a>
                            <a :href="'/buy.php?store=myntra&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-2 px-2 rounded-xl text-xs font-semibold text-slate-700 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors">
                                Myntra
                            </a>
                            <a :href="'/perfume-clone/' + encodeURIComponent(item.slug)" 
                               class="text-center py-2 px-2 rounded-xl text-xs font-bold text-amber-800 hover:text-amber-950 bg-amber-50 hover:bg-amber-100 border border-amber-200 transition-colors truncate">
                                Notes →
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Missing Fragrance Request Box -->
        <div x-show="filteredClones.length === 0" x-cloak class="mt-12 bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 text-center max-w-xl mx-auto shadow-sm space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800 flex items-center justify-center mx-auto">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="7" y="8" width="10" height="13" rx="2" stroke-width="1.5"></rect>
                    <path stroke-linecap="round" stroke-width="1.5" d="M10 8V5a1 1 0 011-1h2a1 1 0 011 1v3M9 3h6"></path>
                </svg>
            </div>
            <h3 class="font-serif text-2xl font-bold text-slate-900">Niche Perfume Not Yet Cloned</h3>
            <p class="text-base text-slate-600 max-w-md mx-auto leading-relaxed">
                We haven't indexed a beast-mode clone for "<strong class="text-slate-900" x-text="search"></strong>" yet. Submit this fragrance and our olfactory specialists will test Middle Eastern alternatives.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingFragrance" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter perfume name & house" class="flex-1 px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-900 placeholder-slate-400 focus:border-amber-500 focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-3 text-sm font-bold text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 rounded-xl transition-all shadow-md disabled:opacity-50">
                        <span x-show="!requestLoading">Request Clone</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-200 text-sm text-emerald-800 font-bold">
                    ✓ Request Queued. Our olfactory specialists will evaluate this fragrance in our next batch.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-sm text-rose-600 font-bold" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
