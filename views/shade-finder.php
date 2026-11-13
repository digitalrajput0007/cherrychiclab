<?php
declare(strict_types=1);
/** @var array $shadeMatches */

$pageTitle = 'Indian Foundation & Lipstick Shade Matcher | Cross-Brand MAC Dupes | CherryChic Lab';
$pageDescription = 'Match your MAC foundation shade (NC25, NC30, NC35, NC40, NC42, NC44) to Maybelline Fit Me, Kay Beauty, Nykaa, PAC, and Mamaearth without ashy grey cast.';
$currentRoute = '/shade-finder';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-10 bg-gradient-to-r from-rose-950 via-stone-900 to-amber-950 text-white border-b border-stone-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-900/60 text-rose-300 border border-rose-700/60 text-xs font-bold uppercase tracking-wider mb-3">
                <span>🎨 Melanin & Undertone Intelligence</span>
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-extrabold tracking-tight">
                Cross-Brand Indian Shade Matcher
            </h1>
            <p class="text-sm text-stone-300 mt-2 leading-relaxed">
                Foundations often oxidize orange or turn ashy grey under Indian lighting when western formulations lack rich golden and olive pigments. Select your reference shade or skin depth to find exact matches across Maybelline, Kay Beauty, Nykaa & PAC.
            </p>
        </div>
    </div>
</section>

<!-- Shade Matcher Filter & Cards Section (Alpine.js) -->
<section class="py-10 bg-stone-50 min-h-[700px]" x-data="{
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
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm mb-8 space-y-5">
            <!-- Row 1: Direct Reference Shade Dropdown -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                    🎯 Quick Pick Your Current Reference Shade:
                </label>
                <select x-model="selectedReference" class="w-full sm:w-96 px-4 py-2.5 rounded-xl border border-stone-300 text-xs font-semibold text-stone-800 bg-white focus:outline-none focus:ring-2 focus:ring-cherry-500">
                    <option value="all">-- Show All Reference Shades --</option>
                    <option value="Studio Fix Fluid SPF 15 - NC25">MAC Studio Fix NC25 (Light-Medium Warm Golden)</option>
                    <option value="Studio Fix Fluid SPF 15 - NC30">MAC Studio Fix NC30 (Wheatish Neutral-Warm)</option>
                    <option value="Studio Fix Fluid SPF 15 - NC35">MAC Studio Fix NC35 (Wheatish Golden - Most Popular Indian Shade)</option>
                    <option value="Studio Fix Fluid SPF 15 - NC40">MAC Studio Fix NC40 (Medium-Tan Warm Golden)</option>
                    <option value="Studio Fix Fluid SPF 15 - NC42">MAC Studio Fix NC42 (Medium-Tan / Dusky Golden Caramel)</option>
                    <option value="Studio Fix Fluid SPF 15 - NC44">MAC Studio Fix NC44 (Dusky Rich Bronze)</option>
                    <option value="Pro Filt'r Soft Matte Longwear Foundation - 290">Fenty Beauty 290 (Warm Olive Undertone)</option>
                </select>
            </div>

            <!-- Row 2: Indian Skin Depth Pills -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-2 border-t border-stone-100">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-500 block mb-2">Indian Skin Depth:</span>
                    <div class="flex flex-wrap gap-2">
                        <button @click="selectedDepth = 'all'" :class="selectedDepth === 'all' ? 'bg-stone-900 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            All Depths
                        </button>
                        <button @click="selectedDepth = 'Light-Medium'" :class="selectedDepth === 'Light-Medium' ? 'bg-stone-900 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            Light-Medium (NC20-NC25)
                        </button>
                        <button @click="selectedDepth = 'Wheatish'" :class="selectedDepth === 'Wheatish' ? 'bg-stone-900 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            Wheatish (NC30-NC35)
                        </button>
                        <button @click="selectedDepth = 'Medium-Tan'" :class="selectedDepth === 'Medium-Tan' ? 'bg-stone-900 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            Medium-Tan (NC40-NC42)
                        </button>
                        <button @click="selectedDepth = 'Dusky'" :class="selectedDepth === 'Dusky' ? 'bg-stone-900 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            Dusky (NC44-NC45)
                        </button>
                    </div>
                </div>

                <!-- Undertone Pills -->
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-500 block mb-2">Undertone Focus:</span>
                    <div class="flex flex-wrap gap-2">
                        <button @click="selectedUndertone = 'all'" :class="selectedUndertone === 'all' ? 'bg-cherry-700 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            All Undertones
                        </button>
                        <button @click="selectedUndertone = 'warm'" :class="selectedUndertone === 'warm' ? 'bg-cherry-700 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            💛 Golden / Warm
                        </button>
                        <button @click="selectedUndertone = 'olive'" :class="selectedUndertone === 'olive' ? 'bg-cherry-700 text-white font-bold' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'" class="px-3 py-1.5 rounded-xl text-xs transition-colors">
                            🫒 True Olive
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shade Match Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($shadeMatches as $match): ?>
                <div x-show="filterMatch(<?= htmlspecialchars(json_encode($match)) ?>)" class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <!-- Header Tags -->
                        <div class="flex items-center justify-between pb-3 border-b border-stone-100">
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-stone-100 text-stone-800">
                                📍 <?= htmlspecialchars($match['skin_depth']) ?> • <?= htmlspecialchars($match['shade_family']) ?>
                            </span>
                            <span class="text-xs font-bold text-cherry-700 uppercase tracking-wider">
                                <?= htmlspecialchars(ucfirst($match['src_undertone'] ?? 'warm')) ?> Undertone
                            </span>
                        </div>

                        <!-- Side by Side Swatches & Foundation Names -->
                        <div class="mt-5 grid grid-cols-2 gap-4">
                            <!-- Reference Foundation -->
                            <div class="bg-stone-50 p-4 rounded-xl border border-stone-200 flex flex-col items-center text-center">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-stone-500 mb-2">Luxury Reference</span>
                                <div class="my-2">
                                    <?= render_swatch_pill($match['src_swatch'], $match['src_name'], 'xl') ?>
                                </div>
                                <span class="text-xs font-bold text-stone-900 mt-2 block"><?= htmlspecialchars($match['src_brand']) ?></span>
                                <span class="text-[11px] text-stone-600 block line-clamp-2"><?= htmlspecialchars($match['src_name']) ?></span>
                                <span class="text-xs font-semibold text-stone-500 mt-1"><?= format_inr($match['src_mrp']) ?></span>
                            </div>

                            <!-- Matched Drugstore Foundation -->
                            <div class="bg-emerald-50/50 p-4 rounded-xl border border-emerald-200 flex flex-col items-center text-center">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 mb-2">Drugstore Match</span>
                                <div class="my-2">
                                    <?= render_swatch_pill($match['tgt_swatch'], $match['tgt_name'], 'xl') ?>
                                </div>
                                <span class="text-xs font-bold text-stone-900 mt-2 block"><?= htmlspecialchars($match['tgt_brand']) ?></span>
                                <span class="text-[11px] text-stone-600 block line-clamp-2"><?= htmlspecialchars($match['tgt_name']) ?></span>
                                <span class="text-xs font-bold text-emerald-700 mt-1"><?= format_inr($match['tgt_mrp']) ?></span>
                            </div>
                        </div>

                        <!-- Match Notes -->
                        <div class="mt-4 p-3.5 bg-stone-50 rounded-xl text-xs text-stone-600 leading-relaxed">
                            <strong class="text-stone-900 block font-semibold mb-0.5">Formulation & Undertone Analysis:</strong>
                            <?= htmlspecialchars($match['match_notes']) ?>
                        </div>
                    </div>

                    <!-- Buy Matched Foundation CTA -->
                    <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                        <span class="text-xs font-bold text-emerald-700">
                            Save <?= format_inr($match['src_mrp'] - $match['tgt_mrp']) ?>
                        </span>
                        <div class="flex items-center gap-2">
                            <a href="<?= affiliate_buy_url('amazon', $match['tgt_brand'] . ' ' . $match['tgt_name']) ?>" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="px-3.5 py-1.5 text-xs font-extrabold rounded-lg bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white shadow-xs transition-colors">
                                🛒 Buy on Amazon
                            </a>
                            <a href="<?= affiliate_buy_url('nykaa', $match['tgt_brand'] . ' ' . $match['tgt_name']) ?>" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="px-3 py-1.5 text-xs font-bold rounded-lg bg-pink-50 hover:bg-pink-100 text-pink-700 border border-pink-200/80 transition-colors">
                                View on Nykaa
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
