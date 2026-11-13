<?php
declare(strict_types=1);
/** @var array $ingredientRules */

$pageTitle = 'Skincare Active Clash & Fungal Acne Checker | CherryChic Lab';
$pageDescription = 'Test your skincare routine for chemical active clashes (Retinol, Vitamin C, AHA, BHA) and Malassezia fungal acne triggers in real-time.';
$currentRoute = '/routine-checker';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-12 bg-lab-alabaster border-b border-lab-border" style="background: radial-gradient(circle at 50% 0%, rgba(27, 67, 50, 0.05), transparent 70%), #FAF8F5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-lab-border text-lab-emerald text-[11px] font-mono tracking-widest uppercase shadow-xs mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-lab-emerald"></span>
                <span>BIOCHEMICAL CONFLICT & FOLLICULITIS PROTOCOL</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-semibold text-lab-obsidian tracking-tight">
                Skincare Conflict & Fungal Acne Analyzer
            </h1>
            <p class="text-xs sm:text-sm text-lab-graphite mt-3 leading-relaxed font-sans max-w-2xl">
                Layering the wrong actives can strip your lipid moisture barrier, trigger post-inflammatory hyperpigmentation (PIH), or fuel stubborn forehead fungal acne (Malassezia folliculitis). Pick your actives below for an instant clinical diagnosis.
            </p>
        </div>
    </div>
</section>

<!-- Interactive Routine Builder Tool (Alpine.js) -->
<section class="py-10 bg-lab-alabaster min-h-[800px]" x-data="{
    rules: <?= htmlspecialchars(json_encode($ingredientRules)) ?>,
    selectedSlugs: ['retinol', 'glycolic-acid'],
    presets: {
        clashDanger: ['retinol', 'glycolic-acid', 'benzoyl-peroxide'],
        fungalDanger: ['galactomyces-ferment', 'polysorbate-20', 'coconut-oil', 'isopropyl-myristate'],
        safeGlassSkin: ['hyaluronic-acid', 'ceramide-np', 'centella-asiatica', 'niacinamide']
    },
    toggleIngredient(slug) {
        if (this.selectedSlugs.includes(slug)) {
            this.selectedSlugs = this.selectedSlugs.filter(s => s !== slug);
        } else {
            this.selectedSlugs.push(slug);
        }
    },
    loadPreset(presetName) {
        if (this.presets[presetName]) {
            this.selectedSlugs = [...this.presets[presetName]];
        }
    },
    clearAll() {
        this.selectedSlugs = [];
    },
    get selectedRules() {
        return this.rules.filter(r => this.selectedSlugs.includes(r.slug));
    },
    get detectedClashes() {
        const clashes = [];
        const checkedPairs = new Set();
        
        for (const itemA of this.selectedRules) {
            let clashSlugs = [];
            try {
                clashSlugs = JSON.parse(itemA.clashes_with_slugs || '[]');
            } catch(e) {}

            for (const itemB of this.selectedRules) {
                if (itemA.slug === itemB.slug) continue;
                const pairKey = [itemA.slug, itemB.slug].sort().join(':');
                if (checkedPairs.has(pairKey)) continue;

                if (clashSlugs.includes(itemB.slug)) {
                    checkedPairs.add(pairKey);
                    clashes.push({
                        itemA: itemA.name,
                        itemB: itemB.name,
                        explanation: itemA.clash_explanation || itemB.clash_explanation || 'Incompatible mechanism of action.'
                    });
                }
            }
        }
        return clashes;
    },
    get fungalTriggers() {
        return this.selectedRules.filter(r => Number(r.is_fungal_acne_trigger) === 1);
    },
    get maxComedogenicScore() {
        if (this.selectedRules.length === 0) return 0;
        return Math.max(...this.selectedRules.map(r => Number(r.comedogenic_score) || 0));
    },
    get clashFreeRecommendations() {
        const recs = [];
        const slugs = this.selectedSlugs;

        if (slugs.includes('retinol') || slugs.includes('tretinoin')) {
            recs.push({
                title: 'Barrier-Repair Ceramide Seal (Safe with Retinoids)',
                brand: 'Minimalist',
                name: 'Ceramides 0.3% + Madecassoside Moisturizer',
                price: '₹599',
                why: 'Replenishes essential lipids and stops retinoid peeling.',
                nykaa_q: 'Minimalist Ceramides Madecassoside Moisturizer',
                amazon_q: 'Minimalist Ceramides 0.3% Cream'
            });
        }
        if (slugs.includes('glycolic-acid') || slugs.includes('salicylic-acid') || slugs.includes('lactic-acid')) {
            recs.push({
                title: 'Soothing Centella Calming Serum (Safe with Chemical Acids)',
                brand: 'The Derma Co',
                name: '2% Cica-Glow Daily Face Serum',
                price: '₹499',
                why: 'Cools acid-induced stinging and prevents post-inflammatory redness.',
                nykaa_q: 'The Derma Co 2% Cica Glow Daily Serum',
                amazon_q: 'Derma Co Cica Glow Face Serum'
            });
        }
        if (slugs.includes('pure-vitamin-c') || slugs.includes('ethyl-ascorbic-acid')) {
            recs.push({
                title: 'Broad-Spectrum Lightweight Sunscreen (AM Pair with Vitamin C)',
                brand: 'Aqualogica',
                name: 'Glow+ Dewy Sunscreen SPF 50+ PA++++',
                price: '₹399',
                why: 'Pairs with Vitamin C for 2x photoprotection with zero white cast.',
                nykaa_q: 'Aqualogica Glow Dewy Sunscreen SPF 50',
                amazon_q: 'Aqualogica Glow Dewy Sunscreen'
            });
        }
        if (this.fungalTriggers.length > 0) {
            recs.push({
                title: '100% Malassezia Fungal-Acne Safe Water Gel',
                brand: 'Pond\'s',
                name: 'Super Light Gel with Hyaluronic Acid & Vitamin E',
                price: '₹299',
                why: 'Contains zero fatty acid esters or fermented broths; 100% fungal acne safe.',
                nykaa_q: 'Ponds Super Light Gel Hyaluronic Acid',
                amazon_q: 'Ponds Super Light Gel'
            });
        }
        if (recs.length === 0) {
            recs.push({
                title: 'Universal Hydration Buffer',
                brand: 'Minimalist',
                name: 'Hyaluronic Acid 2% + B5 Hydrating Serum',
                price: '₹599',
                why: 'Universally synergistic with all actives, acids, and retinoids with 0 conflict.',
                nykaa_q: 'Minimalist Hyaluronic Acid 2% B5 Serum',
                amazon_q: 'Minimalist Hyaluronic Acid Serum'
            });
        }
        return recs;
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Column: Chemical Vials Picker & Shelf Builder -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Preset Buttons -->
                <div class="bg-white p-5 rounded-2xl border border-lab-border shadow-xs">
                    <span class="text-[11px] font-mono uppercase tracking-wider text-lab-graphite block mb-2.5">
                        Test Clinical Regimen Scenarios:
                    </span>
                    <div class="flex flex-wrap gap-2">
                        <button @click="loadPreset('clashDanger')" type="button" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider bg-lab-cherry-subtle hover:bg-lab-cherry/10 text-lab-cherry border border-lab-cherry/20 transition-colors">
                            Barrier Damage (Retinol + AHA)
                        </button>
                        <button @click="loadPreset('fungalDanger')" type="button" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider bg-lab-amber-subtle hover:bg-lab-amber/10 text-lab-amber border border-lab-amber/20 transition-colors">
                            Fungal Flare (Ferment + Esters)
                        </button>
                        <button @click="loadPreset('safeGlassSkin')" type="button" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider bg-lab-emerald-subtle hover:bg-lab-emerald/10 text-lab-emerald border border-lab-emerald/20 transition-colors">
                            Synergistic Barrier Glow
                        </button>
                    </div>
                </div>

                <!-- Actives Multi-Select Grid -->
                <div class="bg-white p-6 rounded-2xl border border-lab-border shadow-xs">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-lab-border">
                        <div>
                            <h3 class="font-serif text-lg font-semibold text-lab-obsidian">Select Actives from Your Vanity</h3>
                            <span class="text-xs text-lab-graphite">Click any ingredient vial to toggle in/out of routine</span>
                        </div>
                        <button @click="clearAll" type="button" class="text-xs font-mono uppercase tracking-wider text-lab-cherry hover:text-lab-obsidian transition-colors">
                            Clear Shelf
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 max-h-[520px] overflow-y-auto pr-1">
                        <template x-for="rule in rules" :key="rule.slug">
                            <button @click="toggleIngredient(rule.slug)" type="button" :class="selectedSlugs.includes(rule.slug) ? 'bg-lab-cherry-subtle border-lab-cherry text-lab-obsidian shadow-xs' : 'bg-lab-alabaster border-lab-border text-lab-graphite hover:border-stone-400 hover:text-lab-obsidian'" class="text-left p-3 rounded-xl border transition-all flex items-start gap-2.5 group">
                                <span class="w-4 h-4 mt-0.5 rounded flex items-center justify-center text-[10px] font-mono border transition-colors flex-shrink-0" :class="selectedSlugs.includes(rule.slug) ? 'bg-lab-cherry text-white border-lab-cherry' : 'bg-white border-lab-border text-transparent'">
                                    ✓
                                </span>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center justify-between gap-1">
                                        <span class="block text-xs font-semibold truncate group-hover:text-lab-obsidian" x-text="rule.name"></span>
                                        <template x-if="Number(rule.is_fungal_acne_trigger) === 1">
                                            <span class="px-1.5 py-0.2 rounded text-[9px] font-mono bg-lab-amber-subtle text-lab-amber border border-lab-amber/30">FA</span>
                                        </template>
                                    </div>
                                    <span class="block text-[10px] font-mono text-lab-graphite truncate mt-0.5" x-text="rule.category"></span>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Right Column: Live Clinical Diagnostic & Recommendations -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Status Report Card -->
                <div class="bg-white p-6 rounded-2xl border border-lab-border shadow-xs space-y-6">
                    <div class="flex items-center justify-between pb-4 border-b border-lab-border">
                        <div>
                            <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block">DIAGNOSTIC REPORT</span>
                            <h3 class="font-serif text-xl font-semibold text-lab-obsidian mt-0.5">Molecular Compatibility</h3>
                        </div>
                        <span class="text-xs font-mono uppercase tracking-wider px-3 py-1.5 rounded-lg border" :class="detectedClashes.length > 0 ? 'bg-lab-cherry-subtle text-lab-cherry border-lab-cherry/30' : (fungalTriggers.length > 0 ? 'bg-lab-amber-subtle text-lab-amber border-lab-amber/30' : 'bg-lab-emerald-subtle text-lab-emerald border-lab-emerald/30')">
                            <span x-text="detectedClashes.length > 0 ? 'Chemical Conflict' : (fungalTriggers.length > 0 ? 'Fungal Acne Alert' : '100% Synergistic')"></span>
                        </span>
                    </div>

                    <!-- Selected Actives Chip Summary -->
                    <div class="text-xs text-lab-graphite">
                        Analyzing <strong class="text-lab-obsidian font-mono" x-text="selectedSlugs.length"></strong> active ingredient(s):
                        <div class="flex flex-wrap gap-1.5 mt-2">
                            <template x-for="r in selectedRules" :key="r.slug">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono bg-lab-alabaster border border-lab-border text-lab-obsidian">
                                    <span x-text="r.name"></span>
                                </span>
                            </template>
                        </div>
                    </div>

                    <!-- 1. Clashes Warning Box with AM/PM Timetable -->
                    <template x-if="detectedClashes.length > 0">
                        <div class="space-y-3">
                            <h4 class="text-xs font-mono uppercase tracking-wider text-lab-cherry flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-lab-cherry" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <span>Severe Chemical Conflicts Detected (<span x-text="detectedClashes.length"></span>)</span>
                            </h4>
                            <div class="space-y-3">
                                <template x-for="(clash, idx) in detectedClashes" :key="idx">
                                    <div class="bg-lab-cherry-subtle border border-lab-cherry/20 rounded-xl p-4 text-xs space-y-2">
                                        <div class="font-mono text-xs font-bold text-lab-cherry flex items-center gap-2">
                                            <span x-text="clash.itemA"></span>
                                            <span class="text-lab-cherry/70">✕</span>
                                            <span x-text="clash.itemB"></span>
                                        </div>
                                        <p class="text-lab-obsidian text-xs leading-relaxed" x-text="clash.explanation"></p>
                                        
                                        <!-- AM / PM Timetable Solution -->
                                        <div class="pt-2 border-t border-lab-cherry/10 grid grid-cols-2 gap-2 text-[11px]">
                                            <div class="bg-white/80 p-2 rounded-lg border border-lab-cherry/10 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="4" stroke-width="1.5"></circle>
                                                    <path stroke-linecap="round" stroke-width="1.5" d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41m14.14-14.14l-1.41 1.41"></path>
                                                </svg>
                                                <div>
                                                    <strong class="block font-mono text-[9px] uppercase text-stone-500">Morning (AM)</strong>
                                                    <span class="font-semibold text-stone-800" x-text="clash.itemA"></span>
                                                </div>
                                            </div>
                                            <div class="bg-white/80 p-2 rounded-lg border border-lab-cherry/10 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-indigo-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                                </svg>
                                                <div>
                                                    <strong class="block font-mono text-[9px] uppercase text-stone-500">Evening (PM)</strong>
                                                    <span class="font-semibold text-stone-800" x-text="clash.itemB"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- 2. Fungal Acne Alert Box -->
                    <template x-if="fungalTriggers.length > 0">
                        <div class="space-y-3">
                            <h4 class="text-xs font-mono uppercase tracking-wider text-lab-amber flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-lab-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <span>Malassezia Fungal Acne (Folliculitis) Triggers (<span x-text="fungalTriggers.length"></span>)</span>
                            </h4>
                            <div class="space-y-2">
                                <template x-for="f in fungalTriggers" :key="f.slug">
                                    <div class="bg-lab-amber-subtle border border-lab-amber/20 rounded-xl p-3.5 text-xs space-y-1">
                                        <div class="font-mono text-xs font-bold text-lab-amber" x-text="f.name"></div>
                                        <p class="text-lab-obsidian text-[11px] leading-relaxed" x-text="f.clash_explanation"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- 3. Comedogenic Rating & Pore-Clogging Meter -->
                    <div class="bg-lab-alabaster rounded-xl p-4 border border-lab-border flex items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold text-lab-obsidian block">Pore-Clogging (Comedogenic) Index</span>
                            <span class="text-[11px] text-lab-graphite">Highest score among selected active ingredients</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-20 bg-stone-200 rounded-full h-2 overflow-hidden">
                                <div class="h-2 rounded-full transition-all duration-500" :class="maxComedogenicScore >= 3 ? 'bg-lab-cherry' : 'bg-lab-emerald'" :style="'width: ' + ((maxComedogenicScore / 5) * 100) + '%'"></div>
                            </div>
                            <span class="text-base font-mono font-bold" :class="maxComedogenicScore >= 3 ? 'text-lab-cherry' : 'text-lab-emerald'" x-text="maxComedogenicScore + ' / 5'"></span>
                        </div>
                    </div>

                    <!-- 4. Safe Routine Affirmation -->
                    <template x-if="detectedClashes.length === 0 && fungalTriggers.length === 0 && selectedSlugs.length > 0">
                        <div class="bg-lab-emerald-subtle border border-lab-emerald/20 rounded-xl p-4 text-xs text-lab-emerald space-y-1">
                            <div class="font-mono font-bold flex items-center gap-1.5 text-lab-emerald">
                                <svg class="w-4 h-4 text-lab-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                <span>100% Synergistic Routine Confirmed</span>
                            </div>
                            <p class="text-lab-obsidian text-[11px] leading-relaxed">
                                None of your selected ingredients chemically degrade each other or feed fungal acne yeasts. This regimen is clinically safe to apply together.
                            </p>
                        </div>
                    </template>

                    <!-- 5. Recommended Clash-Free Indian Products -->
                    <div class="pt-5 border-t border-lab-border space-y-3">
                        <h4 class="text-xs font-mono uppercase tracking-wider text-lab-obsidian">
                            Recommended Clash-Free Indian Formulations
                        </h4>
                        <div class="space-y-3">
                            <template x-for="(prod, idx) in clashFreeRecommendations" :key="idx">
                                <div class="bg-lab-alabaster p-4 rounded-xl border border-lab-border flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div class="min-w-0">
                                        <span class="text-[10px] font-mono uppercase tracking-wider text-lab-cherry block font-medium" x-text="prod.title"></span>
                                        <h5 class="text-xs font-semibold text-lab-obsidian truncate mt-0.5" x-text="prod.brand + ' ' + prod.name"></h5>
                                        <p class="text-[11px] text-lab-graphite mt-0.5" x-text="prod.why"></p>
                                    </div>
                                    <div class="flex items-center gap-2 flex-shrink-0">
                                        <span class="text-xs font-mono font-bold text-lab-obsidian mr-1" x-text="prod.price"></span>
                                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(prod.amazon_q)" 
                                           target="_blank" rel="nofollow sponsored noopener" 
                                           class="px-3 py-1.5 text-xs font-mono uppercase tracking-wider rounded-xl bg-lab-obsidian hover:bg-lab-cherry text-white transition-colors">
                                            Amazon
                                        </a>
                                        <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(prod.nykaa_q)" 
                                           target="_blank" rel="nofollow sponsored noopener" 
                                           class="px-3 py-1.5 text-xs font-mono uppercase tracking-wider rounded-xl bg-white hover:bg-lab-silk text-lab-graphite hover:text-lab-obsidian border border-lab-border transition-colors">
                                            Nykaa
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
