<?php
declare(strict_types=1);
/** @var array $shadeMatches */

$pageTitle = 'Indian Foundation & Lipstick Shade Matcher | Cross-Brand MAC Dupes | CherryChic Lab';
$pageDescription = 'Match your MAC foundation shade (NC25, NC30, NC35, NC40, NC42, NC44) to Maybelline Fit Me, Kay Beauty, Nykaa, PAC, and Mamaearth without ashy grey cast.';
$currentRoute = '/shade-finder';

require_once __DIR__ . '/header.php';
?>

<!-- Header Banner -->
<section class="py-12 bg-lab-alabaster border-b border-lab-border" style="background: radial-gradient(circle at 50% 0%, rgba(158, 27, 50, 0.04), transparent 70%), #FAF8F5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-lab-border text-lab-cherry text-[11px] font-mono tracking-widest uppercase shadow-xs mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-lab-cherry"></span>
                <span>MELANIN & UNDERTONE INTELLIGENCE</span>
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-semibold text-lab-obsidian tracking-tight">
                Cross-Brand Indian Shade Matcher
            </h1>
            <p class="text-xs sm:text-sm text-lab-graphite mt-3 leading-relaxed font-sans max-w-2xl">
                Foundations often oxidize orange or turn ashy grey under Indian lighting when western formulations lack rich golden and olive pigments. Select your reference shade or skin depth to find exact matches across Maybelline, Kay Beauty, Nykaa & PAC.
            </p>
        </div>
    </div>
</section>

<!-- Shade Matcher Filter & Cards Section (Alpine.js) -->
<section class="py-10 bg-lab-alabaster min-h-[800px]" x-data="{
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
        <div class="bg-white p-6 rounded-2xl border border-lab-border shadow-xs mb-8 space-y-5">
            <!-- Row 1: Direct Reference Shade Dropdown -->
            <div>
                <label class="block text-[11px] font-mono uppercase tracking-wider text-lab-graphite mb-2">
                    Reference Foundation Shade Calibration:
                </label>
                <div class="relative w-full sm:w-96">
                    <select x-model="selectedReference" class="w-full px-4 py-2.5 rounded-xl border border-lab-border text-xs font-mono text-lab-obsidian bg-lab-alabaster/40 focus:outline-none focus:border-lab-obsidian appearance-none">
                        <option value="all">-- Show All Reference Shades --</option>
                        <option value="Studio Fix Fluid SPF 15 - NC25">MAC Studio Fix NC25 (Light-Medium Warm Golden)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC30">MAC Studio Fix NC30 (Wheatish Neutral-Warm)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC35">MAC Studio Fix NC35 (Wheatish Golden - Most Popular Indian Shade)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC40">MAC Studio Fix NC40 (Medium-Tan Warm Golden)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC42">MAC Studio Fix NC42 (Medium-Tan / Dusky Golden Caramel)</option>
                        <option value="Studio Fix Fluid SPF 15 - NC44">MAC Studio Fix NC44 (Dusky Rich Bronze)</option>
                        <option value="Pro Filt'r Soft Matte Longwear Foundation - 290">Fenty Beauty 290 (Warm Olive Undertone)</option>
                    </select>
                    <div class="absolute right-3 top-3 pointer-events-none text-lab-graphite">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Row 2: Indian Skin Depth Pills -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-3 border-t border-lab-border">
                <div>
                    <span class="text-[11px] font-mono uppercase tracking-wider text-lab-graphite block mb-2">Indian Skin Depth Spectrum:</span>
                    <div class="flex flex-wrap gap-2">
                        <button @click="selectedDepth = 'all'" :class="selectedDepth === 'all' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            All Depths
                        </button>
                        <button @click="selectedDepth = 'Light-Medium'" :class="selectedDepth === 'Light-Medium' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            Light-Medium (NC20-NC25)
                        </button>
                        <button @click="selectedDepth = 'Wheatish'" :class="selectedDepth === 'Wheatish' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            Wheatish (NC30-NC35)
                        </button>
                        <button @click="selectedDepth = 'Medium-Tan'" :class="selectedDepth === 'Medium-Tan' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            Medium-Tan (NC40-NC42)
                        </button>
                        <button @click="selectedDepth = 'Dusky'" :class="selectedDepth === 'Dusky' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            Dusky (NC44-NC45)
                        </button>
                    </div>
                </div>

                <!-- Undertone Pills -->
                <div>
                    <span class="text-[11px] font-mono uppercase tracking-wider text-lab-graphite block mb-2">Undertone Focus:</span>
                    <div class="flex flex-wrap gap-2">
                        <button @click="selectedUndertone = 'all'" :class="selectedUndertone === 'all' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            All Undertones
                        </button>
                        <button @click="selectedUndertone = 'warm'" :class="selectedUndertone === 'warm' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            Warm Golden
                        </button>
                        <button @click="selectedUndertone = 'olive'" :class="selectedUndertone === 'olive' ? 'bg-lab-obsidian text-white border-lab-obsidian font-bold' : 'bg-lab-alabaster text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-3 py-1.5 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all">
                            True Olive
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shade Match Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($shadeMatches as $match): ?>
                <div x-show="filterMatch(<?= htmlspecialchars(json_encode($match)) ?>)" class="bg-white rounded-2xl border border-lab-border p-6 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Header Tags -->
                        <div class="flex items-center justify-between pb-4 border-b border-lab-border">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-mono font-medium bg-lab-alabaster text-lab-obsidian border border-lab-border">
                                <span><?= htmlspecialchars($match['skin_depth']) ?></span>
                                <span class="text-stone-300">•</span>
                                <span><?= htmlspecialchars($match['shade_family']) ?></span>
                            </span>
                            <span class="text-xs font-mono uppercase tracking-wider text-lab-cherry font-medium">
                                <?= htmlspecialchars(ucfirst($match['src_undertone'] ?? 'warm')) ?> Undertone
                            </span>
                        </div>

                        <!-- Side by Side Swatches & Foundation Names -->
                        <div class="mt-5 grid grid-cols-2 gap-4">
                            <!-- Reference Foundation -->
                            <div class="bg-lab-alabaster p-4 rounded-xl border border-lab-border flex flex-col items-center text-center">
                                <span class="text-[9px] font-mono uppercase tracking-wider text-lab-graphite mb-2">LUXURY REFERENCE</span>
                                <div class="my-2">
                                    <?= render_swatch_pill($match['src_swatch'], $match['src_name'], 'xl') ?>
                                </div>
                                <span class="text-xs font-bold text-lab-obsidian mt-2 block"><?= htmlspecialchars($match['src_brand']) ?></span>
                                <span class="text-[11px] text-lab-graphite block line-clamp-2 mt-0.5"><?= htmlspecialchars($match['src_name']) ?></span>
                                <span class="text-xs font-mono text-stone-400 line-through mt-1"><?= format_inr($match['src_mrp']) ?></span>
                            </div>

                            <!-- Matched Drugstore Foundation -->
                            <div class="bg-white p-4 rounded-xl border-2 border-lab-border group-hover:border-lab-cherry/30 flex flex-col items-center text-center transition-colors">
                                <span class="text-[9px] font-mono uppercase tracking-wider text-lab-cherry mb-2 font-medium">DRUGSTORE MATCH</span>
                                <div class="my-2">
                                    <?= render_swatch_pill($match['tgt_swatch'], $match['tgt_name'], 'xl') ?>
                                </div>
                                <span class="text-xs font-bold text-lab-obsidian mt-2 block"><?= htmlspecialchars($match['tgt_brand']) ?></span>
                                <span class="text-[11px] text-lab-graphite block line-clamp-2 mt-0.5"><?= htmlspecialchars($match['tgt_name']) ?></span>
                                <span class="text-xs font-mono font-bold text-lab-obsidian mt-1"><?= format_inr($match['tgt_mrp']) ?></span>
                            </div>
                        </div>

                        <!-- Match Notes -->
                        <div class="mt-4 p-4 bg-lab-alabaster rounded-xl border border-lab-border/80 text-xs text-lab-graphite leading-relaxed">
                            <strong class="text-lab-obsidian block font-mono text-[10px] uppercase tracking-wider mb-1">Formulation & Undertone Analysis:</strong>
                            <?= htmlspecialchars($match['match_notes']) ?>
                        </div>
                    </div>

                    <!-- Buy Matched Foundation CTA -->
                    <div class="mt-6 pt-4 border-t border-lab-border flex items-center justify-between">
                        <span class="text-xs font-mono font-medium text-lab-emerald">
                            Save <?= format_inr($match['src_mrp'] - $match['tgt_mrp']) ?>
                        </span>
                        <div class="flex items-center gap-2">
                            <a href="<?= affiliate_buy_url('amazon', $match['tgt_brand'] . ' ' . $match['tgt_name']) ?>" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-mono uppercase tracking-wider rounded-xl bg-lab-obsidian hover:bg-lab-cherry text-white transition-colors duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>Amazon</span>
                            </a>
                            <a href="<?= affiliate_buy_url('nykaa', $match['tgt_brand'] . ' ' . $match['tgt_name']) ?>" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="px-3.5 py-1.5 text-xs font-mono uppercase tracking-wider rounded-xl bg-lab-alabaster hover:bg-lab-silk text-lab-graphite hover:text-lab-obsidian border border-lab-border transition-colors">
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
