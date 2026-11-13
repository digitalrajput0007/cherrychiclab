<?php
declare(strict_types=1);
/** @var array $trendingDupes */
/** @var array $perfumeClones */
/** @var int $totalSavings */
/** @var int $totalDupesCount */

require_once __DIR__ . '/header.php';
?>

<!-- Editorial Hero Section -->
<section class="relative overflow-hidden bg-lab-alabaster pt-14 pb-20 lg:pt-24 lg:pb-28 border-b border-lab-border" style="background: radial-gradient(circle at 50% 0%, rgba(158, 27, 50, 0.05), transparent 70%), #FAF8F5;" x-data="{ heroSearch: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-4xl mx-auto space-y-6">
            
            <!-- Clinical Formulation Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-lab-border text-lab-obsidian text-[11px] font-mono tracking-widest uppercase shadow-xs">
                <span class="w-2 h-2 rounded-full bg-lab-cherry animate-pulse"></span>
                <span>INDEPENDENT FORMULATION ANALYSIS</span>
                <span class="text-lab-border">•</span>
                <span class="text-lab-graphite">INDIAN BEAUTY LAB</span>
            </div>

            <!-- Editorial Headline -->
            <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-semibold text-lab-obsidian tracking-tight leading-[1.08]">
                Luxury formulations. <br>
                <span class="italic font-normal text-lab-cherry">Decoded</span> for Indian shelves.
            </h1>

            <p class="text-sm sm:text-base lg:text-lg text-lab-graphite max-w-2xl mx-auto leading-relaxed font-sans">
                We deconstruct ₹10,000+ luxury skincare, makeup, and niche fragrances into clinically equivalent alternatives available in India — verified by chemical actives, undertones, and climate wear.
            </p>

            <!-- Tactile Oversized Command Search Bar -->
            <div class="max-w-2xl mx-auto pt-3">
                <form action="/dupes" method="GET" class="relative">
                    <div class="relative flex items-center bg-white rounded-2xl border-2 border-lab-obsidian shadow-sm transition-all focus-within:ring-4 focus-within:ring-lab-cherry/10">
                        <div class="pl-5 pr-2 text-lab-graphite">
                            <svg class="w-5 h-5 text-lab-obsidian" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7" stroke-width="1.5"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35"></path>
                            </svg>
                        </div>
                        <input name="q" x-model="heroSearch" type="text" placeholder="Search a luxury product, active, or note... e.g. Pillow Talk, Snail Mucin, Baccarat" class="w-full h-16 py-4 pr-36 bg-transparent text-sm sm:text-base text-lab-obsidian placeholder-lab-graphite/60 focus:outline-none font-sans">
                        <button type="submit" class="absolute right-2 px-5 py-3 bg-lab-obsidian hover:bg-lab-cherry text-white rounded-xl text-xs font-mono uppercase tracking-wider transition-colors duration-200">
                            Analyze
                        </button>
                    </div>
                </form>

                <!-- Quick-Try Search Chips -->
                <div class="flex flex-wrap items-center justify-center gap-2 mt-4 text-[11px] text-lab-graphite font-mono">
                    <span class="uppercase tracking-wider text-lab-graphite/70">Trending searches:</span>
                    <button type="button" @click="heroSearch = 'Pillow Talk'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-2.5 py-1 rounded-md bg-white border border-lab-border hover:border-lab-cherry hover:text-lab-cherry transition-colors">Pillow Talk</button>
                    <button type="button" @click="heroSearch = 'Black Honey'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-2.5 py-1 rounded-md bg-white border border-lab-border hover:border-lab-cherry hover:text-lab-cherry transition-colors">Black Honey</button>
                    <button type="button" @click="heroSearch = 'Baccarat Rouge 540'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-2.5 py-1 rounded-md bg-white border border-lab-border hover:border-lab-cherry hover:text-lab-cherry transition-colors">Baccarat Rouge 540</button>
                    <button type="button" @click="heroSearch = 'Snail Mucin'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-2.5 py-1 rounded-md bg-white border border-lab-border hover:border-lab-cherry hover:text-lab-cherry transition-colors">Snail Mucin</button>
                    <button type="button" @click="heroSearch = 'Advanced Night Repair'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-2.5 py-1 rounded-md bg-white border border-lab-border hover:border-lab-cherry hover:text-lab-cherry transition-colors">Estée Lauder ANR</button>
                </div>
            </div>

            <!-- Minimalist Editorial Metric Cells -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-8 max-w-3xl mx-auto text-left">
                <div class="bg-white p-4 rounded-xl border border-lab-border shadow-xs">
                    <span class="block text-2xl font-mono font-medium text-lab-cherry"><?= format_inr($totalSavings ?? 184500) ?>+</span>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block mt-1">Catalog Savings</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-lab-border shadow-xs">
                    <span class="block text-2xl font-mono font-medium text-lab-obsidian">95%+</span>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block mt-1">Formula Similarity</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-lab-border shadow-xs">
                    <span class="block text-2xl font-mono font-medium text-lab-emerald">100% Free</span>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block mt-1">Conflict Analyzer</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-lab-border shadow-xs">
                    <span class="block text-2xl font-mono font-medium text-lab-obsidian">&lt; 2ms</span>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite block mt-1">SQLite Latency</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4 Core Lab Engines Cards -->
<section class="py-16 sm:py-24 bg-white border-b border-lab-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 pb-6 border-b border-lab-border">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-lab-cherry block mb-1">01 / DIAGNOSTIC PROTOCOLS</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-semibold text-lab-obsidian">Clinical Formulation Engines</h2>
            </div>
            <p class="text-xs sm:text-sm text-lab-graphite max-w-md font-sans">
                Engineered for Indian warm-olive undertones, high tropical humidity, and smart wallet decisions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Tool 1: Skincare & Makeup Dupes -->
            <div class="bg-lab-alabaster rounded-2xl p-6 border border-lab-border hover:border-lab-cherry/40 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-white border border-lab-border flex items-center justify-center text-lab-cherry mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite">MODULE 01</span>
                    <h3 class="font-serif text-xl font-semibold text-lab-obsidian mt-1">Dupe Directory</h3>
                    <p class="text-xs text-lab-graphite mt-2 leading-relaxed">
                        Benchmark ₹4,000+ luxury serums and lipsticks against verified Indian equivalents with up to 90% savings.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-lab-border">
                    <a href="/dupes" class="inline-flex items-center text-xs font-mono uppercase tracking-wider text-lab-cherry group-hover:text-lab-obsidian transition-colors">
                        <span>Access Directory</span>
                        <svg class="w-3.5 h-3.5 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tool 2: Perfume Clone Finder -->
            <div class="bg-lab-alabaster rounded-2xl p-6 border border-lab-border hover:border-lab-amber/40 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-white border border-lab-border flex items-center justify-center text-lab-amber mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 5h6a1 1 0 011 1v2a1 1 0 01-1 1H9a1 1 0 01-1-1V6a1 1 0 011-1zm-3 6h12a2 2 0 012 2v7a3 3 0 01-3 3H7a3 3 0 01-3-3v-7a2 2 0 012-2z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite">MODULE 02</span>
                    <h3 class="font-serif text-xl font-semibold text-lab-obsidian mt-1">Fragrance Vault</h3>
                    <p class="text-xs text-lab-graphite mt-2 leading-relaxed">
                        Discover 10+ hour beast-mode Middle Eastern clones reproducing ₹35,000+ niche perfumes like Baccarat Rouge and Aventus.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-lab-border">
                    <a href="/perfumes" class="inline-flex items-center text-xs font-mono uppercase tracking-wider text-lab-amber group-hover:text-lab-obsidian transition-colors">
                        <span>Explore Vault</span>
                        <svg class="w-3.5 h-3.5 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tool 3: Active Clash & Fungal Acne Checker -->
            <div class="bg-lab-alabaster rounded-2xl p-6 border border-lab-border hover:border-lab-emerald/40 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-white border border-lab-border flex items-center justify-center text-lab-emerald mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite">MODULE 03</span>
                    <h3 class="font-serif text-xl font-semibold text-lab-obsidian mt-1">Routine Clash Checker</h3>
                    <p class="text-xs text-lab-graphite mt-2 leading-relaxed">
                        Instant algorithmic check for chemical active clashes (Retinol + AHA) and Malassezia yeast (fungal acne) triggers.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-lab-border">
                    <a href="/routine-checker" class="inline-flex items-center text-xs font-mono uppercase tracking-wider text-lab-emerald group-hover:text-lab-obsidian transition-colors">
                        <span>Analyze Routine</span>
                        <svg class="w-3.5 h-3.5 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tool 4: Cross-Brand Indian Foundation & Lipstick Shade Matcher -->
            <div class="bg-lab-alabaster rounded-2xl p-6 border border-lab-border hover:border-lab-cherry/40 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-white border border-lab-border flex items-center justify-center text-lab-cherry mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.5"></circle>
                            <circle cx="9" cy="10" r="1.5" fill="currentColor"></circle>
                            <circle cx="15" cy="10" r="1.5" fill="currentColor"></circle>
                            <circle cx="12" cy="15" r="1.5" fill="currentColor"></circle>
                        </svg>
                    </div>
                    <span class="text-[10px] font-mono uppercase tracking-wider text-lab-graphite">MODULE 04</span>
                    <h3 class="font-serif text-xl font-semibold text-lab-obsidian mt-1">Indian Shade Matcher</h3>
                    <p class="text-xs text-lab-graphite mt-2 leading-relaxed">
                        Convert your MAC shade (NC30, NC35, NC42) to Maybelline, Kay Beauty, and Fenty without grey ashy cast.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-lab-border">
                    <a href="/shade-finder" class="inline-flex items-center text-xs font-mono uppercase tracking-wider text-lab-cherry group-hover:text-lab-obsidian transition-colors">
                        <span>Match Foundation</span>
                        <svg class="w-3.5 h-3.5 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Trending Skincare & Makeup Dupes Grid (Split-Ticket Architecture) -->
<section class="py-16 sm:py-24 bg-lab-alabaster border-b border-lab-border" x-data="{
    tab: 'all',
    dupes: <?= htmlspecialchars(json_encode($trendingDupes)) ?>,
    get filteredList() {
        if (this.tab === 'all') return this.dupes.slice(0, 9);
        return this.dupes.filter(d => d.sub_category === this.tab).slice(0, 9);
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-lab-cherry block mb-1">02 / BENCHMARK ARCHIVE</span>
                <h3 class="font-serif text-3xl sm:text-4xl font-semibold text-lab-obsidian">Trending Formulations & Dupes</h3>
                <p class="text-xs sm:text-sm text-lab-graphite mt-1">Side-by-side INCI composition, pigment swatches, and verified INR pricing.</p>
            </div>
            <a href="/dupes" class="text-xs font-mono uppercase tracking-wider text-lab-cherry hover:text-lab-obsidian inline-flex items-center gap-1.5 transition-colors">
                <span>View Full Index (<?= $totalDupesCount ?? 200 ?>)</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <!-- Filter Pills -->
        <div class="flex flex-wrap items-center gap-2 mb-10">
            <button @click="tab = 'all'" :class="tab === 'all' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-white text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-4 py-2 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all shadow-xs">
                All Formulations
            </button>
            <button @click="tab = 'makeup'" :class="tab === 'makeup' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-white text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-4 py-2 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all shadow-xs">
                Lipsticks & Makeup
            </button>
            <button @click="tab = 'serum-active'" :class="tab === 'serum-active' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-white text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-4 py-2 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all shadow-xs">
                Serums & Actives
            </button>
            <button @click="tab = 'sunscreen-moisturizer'" :class="tab === 'sunscreen-moisturizer' ? 'bg-lab-obsidian text-white border-lab-obsidian' : 'bg-white text-lab-graphite hover:text-lab-obsidian border-lab-border'" class="px-4 py-2 rounded-xl text-xs font-mono uppercase tracking-wider border transition-all shadow-xs">
                Sunscreens & Moistures
            </button>
        </div>

        <!-- Split-Ticket Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredList" :key="item.slug">
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
                                    <h4 class="text-xs font-semibold text-lab-obsidian truncate" x-text="item.orig_brand"></h4>
                                    <p class="text-[11px] text-lab-graphite truncate" x-text="item.orig_name"></p>
                                    <span class="text-xs font-mono line-through text-stone-400 mt-0.5 block">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Center Divider Indicator -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-white border border-lab-border text-lab-graphite text-[9px] font-mono uppercase tracking-wider">
                                FORMULATION DUPE
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
                                    <span class="text-sm font-mono font-bold text-lab-obsidian mt-0.5 block">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Summary -->
                        <p class="mt-4 text-xs text-lab-graphite line-clamp-2 leading-relaxed" x-text="item.comparison_summary"></p>
                    </div>

                    <!-- Card Actions -->
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

    </div>
</section>

<!-- Beast-Mode Fragrance Clones Spotlight (Obsidian Luxury Vault) -->
<section class="py-16 sm:py-24 bg-lab-obsidian text-white border-b border-[#262422]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4 pb-6 border-b border-[#262422]">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-amber-400 block mb-1">03 / OLFACTORY VAULT</span>
                <h3 class="font-serif text-3xl sm:text-4xl font-semibold text-white">Beast-Mode Middle Eastern Clones</h3>
                <p class="text-xs sm:text-sm text-stone-400 mt-1">Tested for 10+ hour longevity in Indian tropical humidity and heat.</p>
            </div>
            <a href="/perfumes" class="text-xs font-mono uppercase tracking-wider text-amber-400 hover:text-amber-300 inline-flex items-center gap-1.5 transition-colors">
                <span>View Full Vault (40+ Clones)</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach (array_slice($perfumeClones, 0, 4) as $clone): ?>
                <div class="bg-[#1C1A18] rounded-2xl p-6 border border-[#2E2B27] flex flex-col justify-between hover:border-amber-500/40 transition-all duration-300 group">
                    <div>
                        <!-- Notes concentration pill -->
                        <div class="flex items-center justify-between pb-3 border-b border-[#2E2B27]">
                            <span class="px-2 py-0.5 rounded text-[10px] font-mono uppercase tracking-wider bg-amber-950/60 text-amber-300 border border-amber-800/60">
                                EDP / Extrait
                            </span>
                            <span class="text-xs font-mono font-medium text-emerald-400">
                                Save <?= format_inr($clone['savings_inr']) ?>
                            </span>
                        </div>

                        <div class="mt-4">
                            <span class="text-[9px] font-mono tracking-wider text-stone-400 uppercase block">NICHE BENCHMARK</span>
                            <h4 class="text-xs font-semibold text-stone-300 truncate"><?= htmlspecialchars($clone['orig_brand'] . ' ' . $clone['orig_name']) ?></h4>
                            <span class="text-xs font-mono line-through text-stone-500 mt-0.5 block"><?= format_inr($clone['orig_mrp']) ?></span>
                        </div>

                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2 py-0.5 rounded-full bg-[#141413] border border-[#2E2B27] text-stone-400 text-[8px] font-mono uppercase tracking-widest">
                                REPLICATED BY
                            </span>
                        </div>

                        <div>
                            <span class="text-[9px] font-mono tracking-wider text-amber-400 uppercase block font-medium">BEAST-MODE CLONE</span>
                            <h4 class="text-sm font-serif font-bold text-white truncate"><?= htmlspecialchars($clone['dupe_brand']) ?></h4>
                            <p class="text-xs text-stone-300 truncate"><?= htmlspecialchars($clone['dupe_name']) ?></p>
                            <span class="text-sm font-mono font-bold text-amber-400 mt-1 block"><?= format_inr($clone['dupe_mrp']) ?></span>
                        </div>

                        <!-- Notes list -->
                        <?php $notes = json_array_decode($clone['dupe_actives']); ?>
                        <?php if (!empty($notes)): ?>
                            <div class="mt-4 flex flex-wrap gap-1">
                                <?php foreach (array_slice($notes, 0, 2) as $n): ?>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-[#141413] text-stone-300 border border-[#2E2B27]">
                                        <?= htmlspecialchars($n) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-6 pt-4 border-t border-[#2E2B27] space-y-2">
                        <a href="<?= affiliate_buy_url('amazon', $clone['dupe_brand'] . ' ' . $clone['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="flex items-center justify-center gap-1.5 w-full py-2 px-3 text-xs font-mono uppercase tracking-wider rounded-xl bg-amber-500 hover:bg-amber-400 text-stone-950 font-semibold transition-colors duration-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Lowest Price on Amazon</span>
                        </a>
                        <a href="/perfume-clone/<?= urlencode($clone['slug']) ?>" class="block text-center text-xs font-mono text-stone-400 hover:text-white transition-colors py-1">
                            Olfactory Pyramid →
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Botanical Forest Section: Routine Conflict Diagnostic -->
<section class="py-16 sm:py-24 bg-[#0F241B] text-white relative overflow-hidden border-b border-[#1A382B]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-7 space-y-5">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-emerald-300 border border-white/15 text-[11px] font-mono uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>SAFETY LABORATORY</span>
                </span>
                
                <h3 class="font-serif text-3xl sm:text-5xl font-semibold leading-tight">
                    Are your active ingredients quietly clashing & stripping your barrier?
                </h3>
                
                <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed max-w-xl font-sans">
                    Layering Retinol with direct chemical acids or pure Vitamin C with Benzoyl Peroxide causes severe lipid barrier stripping. Identify chemical degradation and Malassezia fungal acne triggers in seconds.
                </p>
                
                <div class="pt-2">
                    <a href="/routine-checker" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl text-xs font-mono uppercase tracking-wider bg-white text-stone-950 hover:bg-emerald-50 transition-colors shadow-lg">
                        <span>Launch Routine Checker Free</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5 bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 space-y-3">
                <span class="text-xs font-mono uppercase tracking-wider text-emerald-300 block mb-2">Clinical Conflict Principles</span>
                
                <div class="bg-black/30 p-3.5 rounded-xl text-xs space-y-1 border border-white/5">
                    <div class="flex items-center gap-1.5 text-rose-300 font-mono text-[11px] font-semibold">
                        <svg class="w-3.5 h-3.5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span>RETINOL + GLYCOLIC ACID</span>
                    </div>
                    <p class="text-stone-300 text-[11px] leading-relaxed">Causes severe stratum corneum thinning and barrier erythema. Separate into AM/PM or alternate nights.</p>
                </div>

                <div class="bg-black/30 p-3.5 rounded-xl text-xs space-y-1 border border-white/5">
                    <div class="flex items-center gap-1.5 text-amber-300 font-mono text-[11px] font-semibold">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span>POLYSORBATES & FERMENT BROTHS</span>
                    </div>
                    <p class="text-stone-300 text-[11px] leading-relaxed">Direct lipid food source for Malassezia yeast folliculitis. Fuels stubborn forehead texture.</p>
                </div>

                <div class="bg-black/30 p-3.5 rounded-xl text-xs space-y-1 border border-white/5">
                    <div class="flex items-center gap-1.5 text-emerald-300 font-mono text-[11px] font-semibold">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                        <span>HYALURONIC ACID + CERAMIDES</span>
                    </div>
                    <p class="text-stone-300 text-[11px] leading-relaxed">Universal biomimetic barrier restoration. Safe to pair with all exfoliants and retinoids.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
