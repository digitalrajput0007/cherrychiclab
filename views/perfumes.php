<?php
declare(strict_types=1);
/** @var array $perfumesList */
/** @var string $searchQuery */

$pageTitle = 'Indian Perfume Clone Finder 2026 | Beast-Mode Armaf & Lattafa Niche Dupe Index';
$pageDescription = 'Discover 10+ hour beast-mode fragrance clones for Creed Aventus, Baccarat Rouge 540, and Tom Ford. Tested for Indian heat and high humidity.';
$currentRoute = '/perfumes';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner (Editorial Haute Parfumerie) -->
<section class="py-14 bg-lab-alabaster border-b border-lab-border" style="background: radial-gradient(circle at 50% 0%, rgba(217, 119, 6, 0.07), transparent 70%), #FAF8F5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-lab-border text-amber-800 text-[11px] font-mono tracking-widest uppercase shadow-xs mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-600 animate-pulse"></span>
                <span>HAUTE PARFUMERIE • MIDDLE EASTERN CLONE VAULT</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-semibold tracking-tight text-lab-obsidian leading-[1.1]">
                Indian Perfume <br class="hidden sm:inline">
                <span class="italic font-normal text-amber-800">Clone Finder</span>
            </h1>
            <p class="text-xs sm:text-sm text-lab-graphite mt-3 leading-relaxed font-sans max-w-2xl">
                Why spend ₹35,000+ on Creed, MFK, or Tom Ford? Discover master Middle Eastern clone houses (Armaf, Lattafa, Maison Alhambra, Afnan) delivering 95%+ identical sillage and 10+ hour beast-mode longevity in Indian tropical humidity.
            </p>
        </div>
    </div>
</section>

<!-- Filter, Search & Clone Cards Section (Alpine.js) -->
<section class="py-10 bg-lab-alabaster min-h-[800px]" x-data="{
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
        <div class="bg-white p-6 rounded-2xl border border-lab-border shadow-xs space-y-5 mb-10">
            <!-- Search Input -->
            <div class="relative w-full">
                <div class="absolute left-4 top-3.5 pointer-events-none text-lab-graphite">
                    <svg class="w-5 h-5 text-lab-obsidian" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="1.5"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <input x-model="search" type="text" placeholder="Search by Designer Perfume, Scent Note (Vanilla, Oud, Citrus, Rose, Coffee), or Clone house..." class="w-full pl-12 pr-10 py-3 rounded-xl bg-lab-alabaster/40 border border-lab-border text-sm text-lab-obsidian placeholder-lab-graphite/60 focus:outline-none focus:border-lab-obsidian transition-colors font-sans">
                <button x-show="search.length > 0" @click="search = ''" class="absolute right-3.5 top-3.5 text-lab-graphite hover:text-lab-obsidian text-xs font-mono p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Scent Note Accord Pills -->
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-[11px] font-mono uppercase tracking-wider text-amber-800 font-semibold">Filter by Olfactory Accord:</span>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="selectedNote = 'all'" :class="selectedNote === 'all' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        All Accords
                    </button>
                    <button @click="selectedNote = 'vanilla'" :class="selectedNote === 'vanilla' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Vanilla & Tonka
                    </button>
                    <button @click="selectedNote = 'oud'" :class="selectedNote === 'oud' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Oud & Smoky Woods
                    </button>
                    <button @click="selectedNote = 'citrus'" :class="selectedNote === 'citrus' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Citrus & Aquatic
                    </button>
                    <button @click="selectedNote = 'rose'" :class="selectedNote === 'rose' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Rose & Floral
                    </button>
                    <button @click="selectedNote = 'coffee'" :class="selectedNote === 'coffee' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Coffee & Gourmand
                    </button>
                    <button @click="selectedNote = 'amber'" :class="selectedNote === 'amber' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3.5 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                        Boozy Amber
                    </button>
                </div>
            </div>

            <!-- Budget & Origin Filter Pills -->
            <div class="pt-3 border-t border-lab-border flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-[11px] font-mono uppercase tracking-wider text-lab-graphite mr-1">Price & Origin:</span>
                    <button @click="selectedBudget = 'all'" :class="selectedBudget === 'all' ? 'bg-stone-800 text-white font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border border-lab-border'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        All Budgets
                    </button>
                    <button @click="selectedBudget = 'under-600'" :class="selectedBudget === 'under-600' ? 'bg-stone-800 text-white font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border border-lab-border'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        Under ₹600
                    </button>
                    <button @click="selectedBudget = 'under-1500'" :class="selectedBudget === 'under-1500' ? 'bg-stone-800 text-white font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border border-lab-border'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        Under ₹1,500
                    </button>
                    <button @click="selectedBudget = 'middle-eastern'" :class="selectedBudget === 'middle-eastern' ? 'bg-amber-700 text-white font-bold' : 'bg-lab-alabaster text-amber-900 hover:text-amber-950 border border-amber-200'" class="px-3 py-1 rounded-lg text-xs font-mono uppercase tracking-wider transition-all">
                        Middle Eastern Clones (Armaf, Lattafa, Afnan)
                    </button>
                </div>

                <div class="text-xs font-mono text-lab-graphite">
                    Showing <span class="text-amber-800 font-bold" x-text="filteredClones.length"></span> fragrance matches
                </div>
            </div>
        </div>

        <!-- Clones Cards Grid (Architectural Split-Ticket + Olfactory Note Pyramid) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredClones" :key="item.slug">
                <div class="bg-white rounded-2xl border border-lab-border p-6 flex flex-col justify-between hover:border-amber-400/80 transition-all duration-300 shadow-xs hover:shadow-md group">
                    <div>
                        <!-- Header Match & Savings Badges -->
                        <div class="flex items-center justify-between pb-4 border-b border-lab-border">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-amber-50 text-amber-900 border border-amber-200">
                                <span x-text="item.match_score"></span>% DNA ACCORD
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-lab-cherry-subtle text-lab-cherry border border-lab-cherry/20">
                                SAVE ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. The Splurge (Niche Designer Benchmark) -->
                        <div class="mt-5 p-3.5 rounded-xl bg-lab-alabaster border border-lab-border/80">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="w-8 h-8 rounded-lg bg-stone-200/80 border border-lab-border flex items-center justify-center text-stone-600">
                                        <!-- Sleek perfume flacon bottle silhouette SVG -->
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="7" y="8" width="10" height="13" rx="2" stroke-width="1.5"></rect>
                                            <path stroke-linecap="round" stroke-width="1.5" d="M10 8V5a1 1 0 011-1h2a1 1 0 011 1v3M9 3h6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-[9px] uppercase font-mono tracking-wider text-lab-graphite block">NICHE BENCHMARK</span>
                                    <h3 class="text-xs font-semibold text-lab-obsidian truncate" x-text="item.orig_brand"></h3>
                                    <p class="text-[11px] text-lab-graphite truncate" x-text="item.orig_name"></p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-xs font-mono line-through text-stone-400">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-[10px] font-mono text-lab-graphite/70" x-text="'(' + (item.orig_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Center Divider -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-white border border-lab-border text-stone-500 text-[9px] font-mono uppercase tracking-wider">
                                BEAST-MODE REPLICA
                            </span>
                        </div>

                        <!-- 2. The Beast-Mode Dupe Clone -->
                        <div class="p-3.5 rounded-xl bg-amber-50/40 border-2 border-amber-200/70 group-hover:border-amber-400/90 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="w-8 h-8 rounded-lg bg-amber-100 border border-amber-300 flex items-center justify-center text-amber-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="7" y="8" width="10" height="13" rx="2" stroke-width="1.5"></rect>
                                            <path stroke-linecap="round" stroke-width="1.5" d="M10 8V5a1 1 0 011-1h2a1 1 0 011 1v3M9 3h6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-[9px] uppercase font-mono tracking-wider text-amber-800 block font-semibold">VERIFIED CLONE HOUSE</span>
                                    <h4 class="text-xs font-serif font-bold text-lab-obsidian truncate" x-text="item.dupe_brand"></h4>
                                    <p class="text-[11px] text-lab-graphite truncate" x-text="item.dupe_name"></p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-sm font-mono font-bold text-lab-obsidian">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                        <span class="text-[10px] font-mono text-stone-500" x-text="'(' + (item.dupe_size || '') + ')'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. REAL Visual Olfactory Note Pyramid (Top / Heart / Base) -->
                        <div class="mt-4 p-3.5 rounded-xl bg-lab-alabaster border border-lab-border/90 space-y-2.5">
                            <div class="flex items-center justify-between text-[10px] font-mono text-amber-900 border-b border-lab-border pb-1.5">
                                <span class="uppercase tracking-wider font-semibold">OLFACTORY PYRAMID ACCORD</span>
                                <span class="text-stone-500">EDP / EXTRAIT</span>
                            </div>

                            <div class="space-y-1.5 text-xs">
                                <!-- Top Notes -->
                                <div class="flex items-start gap-1.5" x-show="parseNotes(item.dupe_actives).top.length > 0">
                                    <span class="text-[9px] font-mono uppercase tracking-wider text-amber-800 bg-amber-100/70 px-1.5 py-0.5 rounded border border-amber-200 flex-shrink-0 mt-0.5">TOP</span>
                                    <div class="flex flex-wrap gap-1 min-w-0">
                                        <template x-for="n in parseNotes(item.dupe_actives).top" :key="n">
                                            <span class="text-[11px] text-stone-700 bg-white px-2 py-0.5 rounded border border-lab-border" x-text="n"></span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Heart Notes -->
                                <div class="flex items-start gap-1.5" x-show="parseNotes(item.dupe_actives).heart.length > 0">
                                    <span class="text-[9px] font-mono uppercase tracking-wider text-rose-800 bg-rose-100/70 px-1.5 py-0.5 rounded border border-rose-200 flex-shrink-0 mt-0.5">HEART</span>
                                    <div class="flex flex-wrap gap-1 min-w-0">
                                        <template x-for="n in parseNotes(item.dupe_actives).heart" :key="n">
                                            <span class="text-[11px] text-stone-700 bg-white px-2 py-0.5 rounded border border-lab-border" x-text="n"></span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Base Notes -->
                                <div class="flex items-start gap-1.5" x-show="parseNotes(item.dupe_actives).base.length > 0">
                                    <span class="text-[9px] font-mono uppercase tracking-wider text-stone-800 bg-stone-200 px-1.5 py-0.5 rounded border border-stone-300 flex-shrink-0 mt-0.5">BASE</span>
                                    <div class="flex flex-wrap gap-1 min-w-0">
                                        <template x-for="n in parseNotes(item.dupe_actives).base" :key="n">
                                            <span class="text-[11px] text-stone-700 bg-white px-2 py-0.5 rounded border border-lab-border" x-text="n"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Visual Segmented Longevity & Projection Meters -->
                        <div class="mt-3.5 p-3.5 rounded-xl bg-white border border-lab-border space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-mono uppercase tracking-wider text-stone-500">Longevity Meter:</span>
                                <div class="flex items-center gap-1.5">
                                    <div class="flex items-center gap-1">
                                        <div class="h-1.5 w-4 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 1 ? 'bg-amber-600' : 'bg-stone-200'"></div>
                                        <div class="h-1.5 w-4 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 2 ? 'bg-amber-600' : 'bg-stone-200'"></div>
                                        <div class="h-1.5 w-4 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 3 ? 'bg-amber-600' : 'bg-stone-200'"></div>
                                        <div class="h-1.5 w-4 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 4 ? 'bg-amber-600' : 'bg-stone-200'"></div>
                                        <div class="h-1.5 w-4 rounded-sm" :class="getLongevityScore(item.texture_or_longevity_notes) >= 5 ? 'bg-amber-600' : 'bg-stone-200'"></div>
                                    </div>
                                    <span class="text-[10px] font-mono font-bold text-amber-900 ml-1">10–12+ Hrs</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-1 border-t border-lab-border/60">
                                <span class="text-[10px] font-mono uppercase tracking-wider text-stone-500">Projection:</span>
                                <span class="text-[10px] font-mono px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 font-semibold" x-text="getProjectionLabel(item.texture_or_longevity_notes)"></span>
                            </div>
                        </div>

                    </div>

                    <!-- Direct Buy CTAs -->
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

                        <!-- Secondary Retailer & Notes Links -->
                        <div class="grid grid-cols-3 gap-2 pt-0.5">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-2 px-2 rounded-xl text-[10px] font-mono uppercase text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                                Nykaa
                            </a>
                            <a :href="'/buy.php?store=myntra&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="text-center py-2 px-2 rounded-xl text-[10px] font-mono uppercase text-lab-graphite hover:text-lab-obsidian bg-lab-alabaster hover:bg-lab-silk border border-lab-border transition-colors">
                                Myntra
                            </a>
                            <a :href="'/perfume-clone/' + encodeURIComponent(item.slug)" 
                               class="text-center py-2 px-2 rounded-xl text-[10px] font-mono uppercase text-amber-800 hover:text-amber-950 bg-amber-50 hover:bg-amber-100 border border-amber-200 transition-colors truncate">
                                Notes →
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Missing Fragrance Request Box -->
        <div x-show="filteredClones.length === 0" x-cloak class="mt-12 bg-white rounded-3xl border border-lab-border p-8 sm:p-12 text-center max-w-xl mx-auto shadow-xs space-y-4">
            <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800 flex items-center justify-center mx-auto">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="7" y="8" width="10" height="13" rx="2" stroke-width="1.5"></rect>
                    <path stroke-linecap="round" stroke-width="1.5" d="M10 8V5a1 1 0 011-1h2a1 1 0 011 1v3M9 3h6"></path>
                </svg>
            </div>
            <h3 class="font-serif text-2xl font-semibold text-lab-obsidian">Niche Perfume Not Yet Cloned</h3>
            <p class="text-xs sm:text-sm text-lab-graphite max-w-md mx-auto leading-relaxed">
                We haven't indexed a beast-mode clone for "<strong class="text-lab-obsidian font-mono" x-text="search"></strong>" yet. Submit this fragrance and our olfactory specialists will test Middle Eastern alternatives.
            </p>

            <template x-if="!requestSuccess">
                <form @submit.prevent="submitMissingFragrance" class="mt-4 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input x-model="search" type="text" required placeholder="Enter perfume name & house" class="flex-1 px-4 py-2.5 rounded-xl bg-lab-alabaster border border-lab-border text-xs text-lab-obsidian placeholder-lab-graphite/60 focus:border-lab-obsidian focus:outline-none">
                    <button type="submit" :disabled="requestLoading" class="px-5 py-2.5 text-xs font-mono uppercase tracking-wider text-white bg-lab-obsidian hover:bg-lab-cherry rounded-xl transition-all shadow-xs disabled:opacity-50">
                        <span x-show="!requestLoading">Request Clone</span>
                        <span x-show="requestLoading" x-cloak>Queuing...</span>
                    </button>
                </form>
            </template>

            <template x-if="requestSuccess">
                <div class="p-4 bg-lab-emerald-subtle rounded-xl border border-lab-emerald/20 text-xs text-lab-emerald font-mono">
                    ✓ Request Queued. Our olfactory specialists will evaluate this fragrance in our next batch.
                </div>
            </template>

            <template x-if="requestError">
                <p class="text-xs text-lab-cherry font-mono" x-text="requestError"></p>
            </template>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
