<?php
declare(strict_types=1);
/** @var array $ingredientRules */

$pageTitle = 'Skincare Active Clash & Fungal Acne Checker | CherryChic Lab';
$pageDescription = 'Test your skincare routine for chemical active clashes (Retinol, Vitamin C, AHA, BHA) and Malassezia fungal acne triggers in real-time.';
$currentRoute = '/routine-checker';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-10 bg-emerald-950 text-white border-b border-emerald-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-900 text-emerald-300 border border-emerald-700/60 text-xs font-bold uppercase tracking-wider mb-3">
                <span>🧪 Algorithmic Formulation Laboratory</span>
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-extrabold tracking-tight">
                Skincare Conflict & Fungal Acne Analyzer
            </h1>
            <p class="text-sm text-emerald-100/80 mt-2 leading-relaxed">
                Layering the wrong actives can strip your lipid moisture barrier, trigger post-inflammatory hyperpigmentation (PIH), or fuel stubborn forehead fungal acne (Malassezia folliculitis). Pick your actives below for an instant clinical diagnosis.
            </p>
        </div>
    </div>
</section>

<!-- Interactive Routine Builder Tool (Alpine.js) -->
<section class="py-10 bg-stone-50 min-h-[700px]" x-data="{
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
            
            <!-- Left Column: Actives Picker & Shelf Builder -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Preset Buttons -->
                <div class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-500 block mb-2.5">
                        Test 1-Click Routine Scenarios
                    </span>
                    <div class="flex flex-wrap gap-2">
                        <button @click="loadPreset('clashDanger')" type="button" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 transition-colors">
                            ⚠️ Barrier Damage Routine (Retinol + AHA + BPO)
                        </button>
                        <button @click="loadPreset('fungalDanger')" type="button" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-200 transition-colors">
                            🍄 Fungal Flare Routine (Ferment + Esters + Coconut)
                        </button>
                        <button @click="loadPreset('safeGlassSkin')" type="button" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 transition-colors">
                            ✨ Safe Barrier Glow (Cica + Ceramides + Niacinamide)
                        </button>
                    </div>
                </div>

                <!-- Actives Multi-Select Grid -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-base font-bold text-stone-900">Pick 2 to 5 Actives from Your Shelf</h3>
                            <span class="text-xs text-stone-500">Tap to toggle on/off</span>
                        </div>
                        <button @click="clearAll" type="button" class="text-xs text-rose-600 hover:text-rose-800 font-semibold">
                            Clear All
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 max-h-[500px] overflow-y-auto pr-1">
                        <template x-for="rule in rules" :key="rule.slug">
                            <button @click="toggleIngredient(rule.slug)" type="button" :class="selectedSlugs.includes(rule.slug) ? 'bg-cherry-50 border-cherry-500 text-cherry-950 ring-1 ring-cherry-500' : 'bg-stone-50 border-stone-200 text-stone-700 hover:bg-stone-100'" class="text-left p-3 rounded-xl border transition-all flex items-start gap-2.5">
                                <span class="w-4 h-4 mt-0.5 rounded flex items-center justify-center text-[10px] font-bold border transition-colors" :class="selectedSlugs.includes(rule.slug) ? 'bg-cherry-600 text-white border-cherry-600' : 'bg-white border-stone-300 text-transparent'">
                                    ✓
                                </span>
                                <div class="min-w-0">
                                    <span class="block text-xs font-bold truncate" x-text="rule.name"></span>
                                    <span class="block text-[10px] text-stone-500 truncate" x-text="rule.category"></span>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Right Column: Live Clinical Diagnostic & Recommendations -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Status Report Card -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm space-y-6">
                    <div class="flex items-center justify-between pb-4 border-b border-stone-100">
                        <h3 class="text-lg font-bold text-stone-900">Clinical Conflict Report</h3>
                        <span class="text-xs font-bold px-3 py-1 rounded-full" :class="detectedClashes.length > 0 ? 'bg-rose-100 text-rose-800' : (fungalTriggers.length > 0 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800')">
                            <span x-text="detectedClashes.length > 0 ? '🚨 Chemical Clash Warning' : (fungalTriggers.length > 0 ? '⚠️ Fungal Alert' : '✅ 100% Safe to Layer')"></span>
                        </span>
                    </div>

                    <!-- Selected Actives Chip Summary -->
                    <div class="text-xs text-stone-600">
                        Analyzing <strong class="text-stone-900" x-text="selectedSlugs.length"></strong> ingredient(s):
                        <div class="flex flex-wrap gap-1 mt-1.5">
                            <template x-for="r in selectedRules" :key="r.slug">
                                <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-stone-100 text-stone-700">
                                    <span x-text="r.name"></span>
                                </span>
                            </template>
                        </div>
                    </div>

                    <!-- 1. Clashes Warning Box -->
                    <template x-if="detectedClashes.length > 0">
                        <div class="space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-rose-700 flex items-center gap-1.5">
                                <span>🚨 Severe Chemical Conflicts Detected</span>
                                <span class="px-1.5 py-0.2 rounded bg-rose-200 text-rose-900 text-[10px]" x-text="detectedClashes.length"></span>
                            </h4>
                            <div class="space-y-3">
                                <template x-for="(clash, idx) in detectedClashes" :key="idx">
                                    <div class="bg-rose-50 border border-rose-200 rounded-xl p-4 text-xs space-y-1.5">
                                        <div class="font-bold text-rose-900 flex items-center gap-1.5">
                                            <span x-text="clash.itemA"></span>
                                            <span class="text-rose-500 font-extrabold">✕</span>
                                            <span x-text="clash.itemB"></span>
                                        </div>
                                        <p class="text-rose-800 leading-relaxed text-[11px]" x-text="clash.explanation"></p>
                                        <div class="pt-1 text-[11px] font-bold text-rose-950">
                                            💡 Recommended Split: Use one in the morning (AM) and the other in the evening (PM), or alternate nights!
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- 2. Fungal Acne Alert Box -->
                    <template x-if="fungalTriggers.length > 0">
                        <div class="space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-amber-700 flex items-center gap-1.5">
                                <span>🍄 Malassezia Fungal Acne (Folliculitis) Triggers</span>
                                <span class="px-1.5 py-0.2 rounded bg-amber-200 text-amber-900 text-[10px]" x-text="fungalTriggers.length"></span>
                            </h4>
                            <div class="space-y-2">
                                <template x-for="f in fungalTriggers" :key="f.slug">
                                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 text-xs space-y-1">
                                        <div class="font-bold text-amber-900" x-text="f.name"></div>
                                        <p class="text-amber-800 text-[11px] leading-relaxed" x-text="f.clash_explanation"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- 3. Comedogenic Rating -->
                    <div class="bg-stone-50 rounded-xl p-4 border border-stone-200 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold text-stone-900 block">Pore-Clogging (Comedogenic) Risk</span>
                            <span class="text-[11px] text-stone-500">Highest score among selected actives</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="text-lg font-extrabold" :class="maxComedogenicScore >= 3 ? 'text-rose-600' : 'text-emerald-600'" x-text="maxComedogenicScore + ' / 5'"></span>
                        </div>
                    </div>

                    <!-- 4. Safe Routine Affirmation -->
                    <template x-if="detectedClashes.length === 0 && fungalTriggers.length === 0 && selectedSlugs.length > 0">
                        <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 text-xs text-emerald-900 space-y-1">
                            <div class="font-bold flex items-center gap-1.5 text-emerald-800">
                                <span>✨ 100% Synergistic Routine</span>
                            </div>
                            <p class="text-emerald-700 leading-relaxed text-[11px]">
                                None of your selected ingredients chemically degrade each other or feed fungal acne yeasts. This regimen is clinically safe to apply together.
                            </p>
                        </div>
                    </template>

                    <!-- 5. Recommended Clash-Free Indian Products -->
                    <div class="pt-4 border-t border-stone-100 space-y-3">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-stone-800">
                            Recommended Clash-Free Indian Alternatives
                        </h4>
                        <div class="space-y-2.5">
                            <template x-for="(prod, idx) in clashFreeRecommendations" :key="idx">
                                <div class="bg-stone-50 p-3.5 rounded-xl border border-stone-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div class="min-w-0">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-cherry-700 block" x-text="prod.title"></span>
                                        <h5 class="text-xs font-bold text-stone-900 truncate" x-text="prod.brand + ' ' + prod.name"></h5>
                                        <p class="text-[11px] text-stone-500" x-text="prod.why"></p>
                                    </div>
                                    <div class="flex items-center gap-2 flex-shrink-0">
                                        <span class="text-xs font-extrabold text-stone-900" x-text="prod.price"></span>
                                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(prod.amazon_q)" 
                                           target="_blank" rel="nofollow sponsored noopener" 
                                           class="px-3 py-1.5 text-xs font-extrabold rounded-lg bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white shadow-xs transition-colors">
                                            🛒 Buy on Amazon
                                        </a>
                                        <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(prod.nykaa_q)" 
                                           target="_blank" rel="nofollow sponsored noopener" 
                                           class="px-2.5 py-1.5 text-xs font-bold rounded-lg bg-pink-50 hover:bg-pink-100 text-pink-700 border border-pink-200/80 transition-colors">
                                            View on Nykaa
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
