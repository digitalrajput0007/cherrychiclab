<?php
declare(strict_types=1);
/** @var array $shadeMatches */

$pageTitle = 'Indian Foundation & Lipstick Shade Matcher | Cross-Brand MAC Dupes | CherryChic Lab';
$pageDescription = 'Match your MAC foundation shade (NC25, NC30, NC35, NC40, NC42, NC44) to Maybelline Fit Me, Kay Beauty, Nykaa, PAC, and Mamaearth without ashy grey cast.';
$currentRoute = '/shade-finder';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-12 bg-gradient-to-b from-rose-50/80 via-pink-50/30 to-[#FAF8F5] border-b border-rose-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-100 text-rose-700 border border-rose-200 text-sm font-semibold shadow-xs mb-3">
                <span>🎨 Melanin & Undertone Intelligence</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Cross-Brand Indian Shade Matcher
            </h1>
            <p class="text-base text-slate-600 mt-3 leading-relaxed font-sans max-w-2xl">
                Foundations often oxidize orange or turn ashy grey under Indian lighting when western formulations lack rich golden and olive pigments. Select your reference shade or skin depth to find exact matches across Maybelline, Kay Beauty, Nykaa & PAC.
            </p>
        </div>
    </div>
</section>

<!-- Shade Matcher Filter & Cards Section (Alpine.js) -->
<section class="py-10 bg-[#FAF8F5] min-h-[800px]" x-data="{
    selectedReference: 'all',
    selectedDepth: 'all',
    selectedUndertone: 'all',
    matches: <?= htmlspecialchars(json_encode($shadeMatches)) ?>,
    filterMatch(m) {
        // Reference product filter
        if (this.selectedReference !== 'all' && m.src_name !== this.selectedReference) {
            return false;
        }

        // Depth filter
        if (this.selectedDepth !== 'all' && m.skin_depth !== this.selectedDepth) {
            return false;
        }

        // Undertone filter
        if (this.selectedUndertone !== 'all') {
            const ut = (m.src_undertone || '').toLowerCase();
            if (ut !== this.selectedUndertone) return false;
        }

        return true;
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Controls Box -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm mb-8 space-y-5">
            <!-- Row 1: Direct Reference Shade Dropdown -->
            <div>
                <label class="block text-sm font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Reference Foundation Shade Calibration:
                </label>
                <div class="relative w-full sm:w-[420px]">
                    <select x-model="selectedReference" class="w-full px-4 py-3 rounded-2xl border border-slate-200 text-sm font-bold text-slate-900 bg-slate-50/50 focus:outline-none focus:border-rose-500 appearance-none shadow-xs">
                        <option value="all">-- Show All Reference Shades --</option>
                        <option value="Studio Fix Fluid SPF 15 - NC25">MAC Studio Fix NC25 (Light-Medium Warm Golden)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC30">MAC Studio Fix NC30 (Wheatish Neutral-Warm)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC35">MAC Studio Fix NC35 (Wheatish Golden - Most Popular Indian Shade)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC40">MAC Studio Fix NC40 (Medium-Tan Warm Golden)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC42">MAC Studio Fix NC42 (Medium-Tan / Dusky Golden Caramel)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC44">MAC Studio Fix NC44 (Dusky Rich Bronze)</option>
                        <option value="Pro Filt'r Soft Matte Longwear Foundation - 290">Fenty Beauty 290 (Warm Olive Undertone)</option>
                    </select>
                    <div class="absolute right-4 top-3.5 pointer-events-none text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Row 2: Indian Skin Depth Pills -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-4 border-t border-slate-100">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2.5">Indian Skin Depth Spectrum:</span>
                    <div class="flex flex-wrap gap-2.5">
                        <button @click="selectedDepth = 'all'" :class="selectedDepth === 'all' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            All Depths
                        </button>
                        <button @click="selectedDepth = 'Light-Medium'" :class="selectedDepth === 'Light-Medium' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            Light-Medium (NC20-NC25)
                        </button>
                        <button @click="selectedDepth = 'Wheatish'" :class="selectedDepth === 'Wheatish' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            Wheatish (NC30-NC35)
                        </button>
                        <button @click="selectedDepth = 'Medium-Tan'" :class="selectedDepth === 'Medium-Tan' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            Medium-Tan (NC40-NC42)
                        </button>
                        <button @click="selectedDepth = 'Dusky'" :class="selectedDepth === 'Dusky' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            Dusky (NC44-NC45)
                        </button>
                    </div>
                </div>

                <!-- Undertone Pills -->
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2.5">Undertone Focus:</span>
                    <div class="flex flex-wrap gap-2.5">
                        <button @click="selectedUndertone = 'all'" :class="selectedUndertone === 'all' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            All Undertones
                        </button>
                        <button @click="selectedUndertone = 'warm'" :class="selectedUndertone === 'warm' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            Warm Golden
                        </button>
                        <button @click="selectedUndertone = 'olive'" :class="selectedUndertone === 'olive' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-slate-100 text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">
                            True Olive
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shade Match Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($shadeMatches as $match): ?>
                <div x-show="filterMatch(<?= htmlspecialchars(json_encode($match)) ?>)" class="bg-white rounded-3xl border border-slate-200/90 p-6 shadow-sm hover:shadow-xl hover:border-rose-300 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Header Tags -->
                        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-800">
                                <span><?= htmlspecialchars($match['skin_depth']) ?></span>
                                <span class="text-slate-400">•</span>
                                <span><?= htmlspecialchars($match['shade_family']) ?></span>
                            </span>
                            <span class="text-sm font-bold text-rose-600 uppercase tracking-wider">
                                <?= htmlspecialchars(ucfirst($match['src_undertone'] ?? 'warm')) ?> Undertone
                            </span>
                        </div>

                        <!-- Side by Side Swatches & Foundation Names -->
                        <div class="mt-5 grid grid-cols-2 gap-4">
                            <!-- Reference Foundation -->
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 flex flex-col items-center text-center">
                                <span class="text-xs uppercase font-bold tracking-wider text-slate-500 mb-2">LUXURY REFERENCE</span>
                                <div class="my-2">
                                    <?= render_swatch_pill($match['src_swatch'], $match['src_name'], 'xl') ?>
                                </div>
                                <span class="text-base font-bold text-slate-900 mt-2 block"><?= htmlspecialchars($match['src_brand']) ?></span>
                                <span class="text-sm font-medium text-slate-600 block line-clamp-2 mt-0.5"><?= htmlspecialchars($match['src_name']) ?></span>
                                <span class="text-base line-through text-slate-400 mt-1"><?= format_inr($match['src_mrp']) ?></span>
                            </div>

                            <!-- Matched Drugstore Foundation -->
                            <div class="bg-gradient-to-br from-emerald-50/70 via-teal-50/40 to-white p-4 rounded-2xl border-2 border-emerald-500/40 flex flex-col items-center text-center shadow-xs">
                                <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-700 mb-2">✓ DRUGSTORE MATCH</span>
                                <div class="my-2">
                                    <?= render_swatch_pill($match['tgt_swatch'], $match['tgt_name'], 'xl') ?>
                                </div>
                                <span class="text-base font-bold text-slate-900 mt-2 block"><?= htmlspecialchars($match['tgt_brand']) ?></span>
                                <span class="text-sm font-medium text-slate-600 block line-clamp-2 mt-0.5"><?= htmlspecialchars($match['tgt_name']) ?></span>
                                <span class="text-2xl font-extrabold text-emerald-700 mt-1"><?= format_inr($match['tgt_mrp']) ?></span>
                            </div>
                        </div>

                        <!-- Match Notes -->
                        <div class="mt-5 p-4 bg-slate-50 rounded-2xl border border-slate-200 text-sm text-slate-700 leading-relaxed">
                            <strong class="text-slate-900 block font-bold text-xs uppercase tracking-wider mb-1">Formulation & Undertone Analysis:</strong>
                            <p class="text-[15px]"><?= htmlspecialchars($match['match_notes']) ?></p>
                        </div>
                    </div>

                    <!-- Buy Matched Foundation CTA -->
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-base font-extrabold text-emerald-700">
                            Save <?= format_inr($match['src_mrp'] - $match['tgt_mrp']) ?>
                        </span>
                        <div class="flex items-center gap-2">
                            <a href="<?= affiliate_buy_url('amazon', $match['tgt_brand'] . ' ' . $match['tgt_name']) ?>" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="flex items-center gap-1.5 px-4 py-2.5 text-xs font-bold uppercase tracking-wider rounded-xl bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 text-white shadow-md shadow-rose-600/15 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>Amazon</span>
                            </a>
                            <a href="<?= affiliate_buy_url('nykaa', $match['tgt_brand'] . ' ' . $match['tgt_name']) ?>" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="px-3.5 py-2.5 text-xs font-semibold rounded-xl bg-pink-50 hover:bg-pink-100 text-pink-700 border border-pink-200 transition-colors">
                                Nykaa
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
