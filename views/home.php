<?php
declare(strict_types=1);
/** @var array $trendingDupes */
/** @var array $perfumeClones */
/** @var int $totalSavings */
/** @var int $totalDupesCount */

require_once __DIR__ . '/header.php';
?>

<!-- Editorial Vibrant Hero Section (Non-overlapping with fixed/sticky nav) -->
<section class="relative overflow-hidden bg-gradient-to-b from-rose-50/90 via-pink-50/40 to-[#FAF8F5] pt-24 pb-20 md:pt-32 md:pb-28 border-b border-rose-100" x-data="{ heroSearch: '' }">
    <!-- Soft Decorative radial glow -->
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-rose-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/3 -right-20 w-96 h-96 bg-amber-200/30 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-4xl mx-auto space-y-6">
            
            <!-- Top Vibrant Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-100 text-rose-700 border border-rose-200 text-sm font-semibold shadow-xs">
                <span>✨ India's #1 Beauty Dupe & Formulation Finder</span>
            </div>

            <!-- Main High-Impact Hero Headline -->
            <h1 class="font-serif text-4xl sm:text-6xl md:text-7xl font-extrabold tracking-tight text-slate-900 leading-[1.12]">
                Stop Overpaying for Luxury. <br>
                <span class="bg-gradient-to-r from-rose-600 via-pink-600 to-amber-500 bg-clip-text text-transparent italic font-normal">
                    Find Verified Indian Dupes.
                </span>
            </h1>

            <!-- High-Readability Subtitle (18px+) -->
            <p class="text-lg md:text-xl text-slate-600 max-w-3xl mx-auto mt-4 font-normal leading-relaxed font-sans">
                We deconstruct ₹10,000+ luxury skincare, viral lipsticks, and niche fragrances into clinically equivalent alternatives available in India — verified by chemical actives, undertones, and climate wear.
            </p>

            <!-- Tactile Command Search Bar -->
            <div class="max-w-2xl mx-auto pt-4">
                <form action="/dupes" method="GET" class="relative">
                    <div class="relative flex items-center bg-white rounded-2xl border-2 border-slate-900 shadow-md transition-all focus-within:ring-4 focus-within:ring-rose-500/15">
                        <div class="pl-5 pr-2 text-slate-500">
                            <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7" stroke-width="1.5"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35"></path>
                            </svg>
                        </div>
                        <input name="q" x-model="heroSearch" type="text" placeholder="Type a luxury lipstick, serum, or perfume... e.g. Pillow Talk, Snail Mucin, Baccarat" class="w-full h-16 py-4 pr-36 bg-transparent text-base text-slate-900 placeholder-slate-400 focus:outline-none font-sans font-medium">
                        <button type="submit" class="absolute right-2 px-6 py-3.5 bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 text-white rounded-xl text-sm font-bold shadow-md shadow-rose-600/20 transition-all duration-200">
                            Search Dupes
                        </button>
                    </div>
                </form>

                <!-- Quick-Try Search Chips -->
                <div class="flex flex-wrap items-center justify-center gap-2 mt-4 text-xs text-slate-600 font-mono">
                    <span class="uppercase tracking-wider text-slate-500 font-semibold">Trending searches:</span>
                    <button type="button" @click="heroSearch = 'Pillow Talk'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-3 py-1.5 rounded-lg bg-white border border-rose-200 text-slate-800 hover:border-rose-500 hover:text-rose-600 font-medium transition-colors shadow-xs">Pillow Talk</button>
                    <button type="button" @click="heroSearch = 'Black Honey'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-3 py-1.5 rounded-lg bg-white border border-rose-200 text-slate-800 hover:border-rose-500 hover:text-rose-600 font-medium transition-colors shadow-xs">Black Honey</button>
                    <button type="button" @click="heroSearch = 'Baccarat Rouge 540'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-3 py-1.5 rounded-lg bg-white border border-rose-200 text-slate-800 hover:border-rose-500 hover:text-rose-600 font-medium transition-colors shadow-xs">Baccarat Rouge 540</button>
                    <button type="button" @click="heroSearch = 'Snail Mucin'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-3 py-1.5 rounded-lg bg-white border border-rose-200 text-slate-800 hover:border-rose-500 hover:text-rose-600 font-medium transition-colors shadow-xs">Snail Mucin</button>
                    <button type="button" @click="heroSearch = 'Advanced Night Repair'; $nextTick(() => $el.closest('div').previousElementSibling.querySelector('form').submit())" class="px-3 py-1.5 rounded-lg bg-white border border-rose-200 text-slate-800 hover:border-rose-500 hover:text-rose-600 font-medium transition-colors shadow-xs">Estée Lauder ANR</button>
                </div>
            </div>

            <!-- Vibrant Metric Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5 pt-8 max-w-3xl mx-auto text-left">
                <div class="bg-white/95 p-4 rounded-2xl border border-rose-100 shadow-xs">
                    <span class="block text-2xl md:text-3xl font-extrabold text-rose-600"><?= format_inr($totalSavings ?? 184500) ?>+</span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500 block mt-1">Catalog Savings</span>
                </div>
                <div class="bg-white/95 p-4 rounded-2xl border border-rose-100 shadow-xs">
                    <span class="block text-2xl md:text-3xl font-extrabold text-slate-900">95%+</span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500 block mt-1">Formula Similarity</span>
                </div>
                <div class="bg-white/95 p-4 rounded-2xl border border-rose-100 shadow-xs">
                    <span class="block text-2xl md:text-3xl font-extrabold text-emerald-600">100% Free</span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500 block mt-1">Conflict Analyzer</span>
                </div>
                <div class="bg-white/95 p-4 rounded-2xl border border-rose-100 shadow-xs">
                    <span class="block text-2xl md:text-3xl font-extrabold text-slate-900">&lt; 2ms</span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500 block mt-1">SQLite Latency</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4 Core Lab Engines Cards -->
<section class="py-16 sm:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 pb-6 border-b border-slate-200/80">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-rose-600 block mb-1">01 / DIAGNOSTIC PROTOCOLS</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-slate-900">Clinical Formulation Engines</h2>
            </div>
            <p class="text-sm md:text-base text-slate-600 max-w-md font-sans">
                Engineered for Indian warm-olive undertones, high tropical humidity, and smart wallet decisions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Tool 1: Skincare & Makeup Dupes -->
            <div class="bg-rose-50/40 rounded-2xl p-6 border border-rose-100 hover:border-rose-300 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-600 text-white flex items-center justify-center shadow-md shadow-rose-500/20 mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-mono font-bold uppercase tracking-wider text-rose-600">MODULE 01</span>
                    <h3 class="font-serif text-2xl font-bold text-slate-900 mt-1">Dupe Directory</h3>
                    <p class="text-[15px] text-slate-600 mt-2 leading-relaxed">
                        Benchmark ₹4,000+ luxury serums and lipsticks against verified Indian equivalents with up to 90% savings.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-rose-100">
                    <a href="/dupes" class="inline-flex items-center text-sm font-bold text-rose-600 group-hover:text-rose-800 transition-colors">
                        <span>Access Directory</span>
                        <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tool 2: Perfume Clone Finder -->
            <div class="bg-amber-50/40 rounded-2xl p-6 border border-amber-100 hover:border-amber-300 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 text-white flex items-center justify-center shadow-md shadow-amber-500/20 mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 5h6a1 1 0 011 1v2a1 1 0 01-1 1H9a1 1 0 01-1-1V6a1 1 0 011-1zm-3 6h12a2 2 0 012 2v7a3 3 0 01-3 3H7a3 3 0 01-3-3v-7a2 2 0 012-2z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-mono font-bold uppercase tracking-wider text-amber-700">MODULE 02</span>
                    <h3 class="font-serif text-2xl font-bold text-slate-900 mt-1">Fragrance Vault</h3>
                    <p class="text-[15px] text-slate-600 mt-2 leading-relaxed">
                        Discover 10+ hour beast-mode Middle Eastern clones reproducing ₹35,000+ niche perfumes like Baccarat Rouge and Aventus.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-amber-100">
                    <a href="/perfumes" class="inline-flex items-center text-sm font-bold text-amber-700 group-hover:text-amber-900 transition-colors">
                        <span>Explore Vault</span>
                        <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tool 3: Active Clash & Fungal Acne Checker -->
            <div class="bg-emerald-50/40 rounded-2xl p-6 border border-emerald-100 hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center shadow-md shadow-emerald-500/20 mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-mono font-bold uppercase tracking-wider text-emerald-700">MODULE 03</span>
                    <h3 class="font-serif text-2xl font-bold text-slate-900 mt-1">Routine Clash Checker</h3>
                    <p class="text-[15px] text-slate-600 mt-2 leading-relaxed">
                        Instant algorithmic check for chemical active clashes (Retinol + AHA) and Malassezia yeast (fungal acne) triggers.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-emerald-100">
                    <a href="/routine-checker" class="inline-flex items-center text-sm font-bold text-emerald-700 group-hover:text-emerald-900 transition-colors">
                        <span>Analyze Routine</span>
                        <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tool 4: Cross-Brand Indian Foundation & Lipstick Shade Matcher -->
            <div class="bg-pink-50/40 rounded-2xl p-6 border border-pink-100 hover:border-pink-300 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-md">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-500 to-purple-600 text-white flex items-center justify-center shadow-md shadow-pink-500/20 mb-5 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.5"></circle>
                            <circle cx="9" cy="10" r="1.5" fill="currentColor"></circle>
                            <circle cx="15" cy="10" r="1.5" fill="currentColor"></circle>
                            <circle cx="12" cy="15" r="1.5" fill="currentColor"></circle>
                        </svg>
                    </div>
                    <span class="text-xs font-mono font-bold uppercase tracking-wider text-pink-700">MODULE 04</span>
                    <h3 class="font-serif text-2xl font-bold text-slate-900 mt-1">Indian Shade Matcher</h3>
                    <p class="text-[15px] text-slate-600 mt-2 leading-relaxed">
                        Convert your MAC shade (NC30, NC35, NC42) to Maybelline, Kay Beauty, and Fenty without grey ashy cast.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-pink-100">
                    <a href="/shade-finder" class="inline-flex items-center text-sm font-bold text-pink-700 group-hover:text-pink-900 transition-colors">
                        <span>Match Foundation</span>
                        <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Trending Skincare & Makeup Dupes Grid (Split-Ticket Architecture) -->
<section class="py-16 sm:py-24 bg-[#FAF8F5] border-b border-slate-200" x-data="{
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
                <span class="text-xs font-bold uppercase tracking-widest text-rose-600 block mb-1">02 / BENCHMARK ARCHIVE</span>
                <h3 class="font-serif text-3xl sm:text-4xl font-bold text-slate-900">Trending Formulations & Dupes</h3>
                <p class="text-[15px] text-slate-600 mt-1">Side-by-side INCI composition, pigment swatches, and verified INR pricing.</p>
            </div>
            <a href="/dupes" class="text-sm font-bold text-rose-600 hover:text-rose-800 inline-flex items-center gap-1.5 transition-colors">
                <span>View Full Index (<?= $totalDupesCount ?? 200 ?>)</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <!-- Vibrant Filter Pills -->
        <div class="flex flex-wrap items-center gap-2.5 mb-10">
            <button @click="tab = 'all'" :class="tab === 'all' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                All Formulations
            </button>
            <button @click="tab = 'makeup'" :class="tab === 'makeup' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                Lipsticks & Makeup
            </button>
            <button @click="tab = 'serum-active'" :class="tab === 'serum-active' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                Serums & Actives
            </button>
            <button @click="tab = 'sunscreen-moisturizer'" :class="tab === 'sunscreen-moisturizer' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'bg-white text-slate-700 hover:text-slate-900 border border-slate-200'" class="px-5 py-2.5 rounded-xl text-sm md:text-base font-semibold transition-all">
                Sunscreens & Moisturizers
            </button>
        </div>

        <!-- Split-Ticket Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredList" :key="item.slug">
                <div class="bg-white rounded-3xl border border-slate-200/90 p-6 shadow-sm hover:shadow-xl hover:border-rose-300 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Header match & savings badges -->
                        <div class="flex items-center justify-between gap-2 pb-4 border-b border-slate-100">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-sm font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                🎯 <span x-text="item.match_score"></span>% MATCH
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-sm font-extrabold bg-emerald-500 text-white shadow-sm">
                                SAVE ₹<span x-text="Number(item.savings_inr).toLocaleString('en-IN')"></span>
                            </span>
                        </div>

                        <!-- 1. The Splurge (Benchmark Luxury) Box -->
                        <div class="mt-5 p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                            <div class="flex items-start gap-3.5">
                                <div class="flex-shrink-0 pt-0.5">
                                    <template x-if="item.orig_swatch">
                                        <div class="w-12 h-12 rounded-2xl shadow-inner ring-2 ring-white swatch-droplet" :style="'background-color: ' + item.orig_swatch"></div>
                                    </template>
                                    <template x-if="!item.orig_swatch">
                                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-400 to-slate-600 text-white flex items-center justify-center shadow-inner">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs uppercase font-bold tracking-wider text-slate-500 block">THE SPLURGE</span>
                                    <h4 class="text-base md:text-lg font-bold text-slate-900 leading-snug truncate" x-text="item.orig_brand"></h4>
                                    <p class="text-base font-medium text-slate-700 leading-snug line-clamp-2 mt-0.5" x-text="item.orig_name"></p>
                                    <span class="text-lg font-semibold line-through text-slate-400 mt-1 block">₹<span x-text="Number(item.orig_mrp).toLocaleString('en-IN')"></span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Center Divider Indicator -->
                        <div class="my-3 flex items-center justify-center">
                            <span class="px-3 py-1 rounded-full bg-white border border-slate-200 text-slate-600 text-xs font-bold uppercase tracking-wider shadow-xs">
                                VS INDIAN ALTERNATIVE
                            </span>
                        </div>

                        <!-- 2. The Indian Dupe Box (Vibrant Warm Highlight) -->
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-emerald-50/70 via-teal-50/40 to-white border-2 border-emerald-500/40 shadow-sm">
                            <div class="flex items-start gap-3.5">
                                <div class="flex-shrink-0 pt-0.5">
                                    <template x-if="item.dupe_swatch">
                                        <div class="w-12 h-12 rounded-2xl shadow-inner ring-2 ring-white swatch-droplet" :style="'background-color: ' + item.dupe_swatch"></div>
                                    </template>
                                    <template x-if="!item.dupe_swatch">
                                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center shadow-inner">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-700 block">✓ VERIFIED DUPE</span>
                                    <h4 class="text-base md:text-lg font-bold text-slate-900 leading-snug truncate" x-text="item.dupe_brand"></h4>
                                    <p class="text-base font-medium text-slate-700 leading-snug line-clamp-2 mt-0.5" x-text="item.dupe_name"></p>
                                    <span class="text-2xl md:text-3xl font-extrabold text-emerald-700 mt-1 block">₹<span x-text="Number(item.dupe_mrp).toLocaleString('en-IN')"></span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Summary (15px highly readable) -->
                        <p class="mt-4 text-[15px] text-slate-600 line-clamp-2 leading-relaxed" x-text="item.comparison_summary"></p>
                    </div>

                    <!-- Card Actions (Upgraded High-Converting Buy Buttons) -->
                    <div class="mt-6 pt-4 border-t border-slate-100 space-y-2.5">
                        <!-- Primary Amazon Affiliate CTA -->
                        <a :href="'/buy.php?store=amazon&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 text-white font-bold text-base py-3.5 px-5 rounded-xl shadow-md shadow-rose-600/15 w-full flex items-center justify-center gap-2 transition-all transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Check Lowest Price on Amazon</span>
                        </a>

                        <!-- Secondary Retailer & Details Links -->
                        <div class="flex items-center justify-between gap-2.5">
                            <a :href="'/buy.php?store=nykaa&q=' + encodeURIComponent(item.dupe_brand + ' ' + item.dupe_name)" 
                               target="_blank" rel="nofollow sponsored noopener" 
                               class="flex-1 text-center bg-pink-50 hover:bg-pink-100 text-pink-700 border border-pink-200 font-semibold text-sm py-2.5 px-4 rounded-xl transition-colors">
                                View on Nykaa
                            </a>
                            <a :href="'/dupe/' + encodeURIComponent(item.slug)" 
                               class="text-sm font-bold text-rose-600 hover:text-rose-800 py-2.5 px-3 inline-flex items-center gap-1 transition-colors">
                                <span>INCI Breakdown</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
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
<section class="py-16 sm:py-24 bg-slate-950 text-white border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4 pb-6 border-b border-slate-800">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-amber-400 block mb-1">03 / OLFACTORY VAULT</span>
                <h3 class="font-serif text-3xl sm:text-4xl font-bold text-white">Beast-Mode Middle Eastern Clones</h3>
                <p class="text-base text-slate-400 mt-1">Tested for 10+ hour longevity in Indian tropical humidity and heat.</p>
            </div>
            <a href="/perfumes" class="text-sm font-bold text-amber-400 hover:text-amber-300 inline-flex items-center gap-1.5 transition-colors">
                <span>View Full Vault (40+ Clones)</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach (array_slice($perfumeClones, 0, 4) as $clone): ?>
                <div class="bg-slate-900 rounded-3xl p-6 border border-slate-800 flex flex-col justify-between hover:border-amber-400/50 transition-all duration-300 group shadow-lg">
                    <div>
                        <!-- Notes concentration pill -->
                        <div class="flex items-center justify-between pb-3.5 border-b border-slate-800">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-950 text-amber-300 border border-amber-800">
                                EDP / Extrait
                            </span>
                            <span class="text-sm font-extrabold text-emerald-400">
                                Save <?= format_inr($clone['savings_inr']) ?>
                            </span>
                        </div>

                        <div class="mt-4">
                            <span class="text-xs font-mono uppercase tracking-wider text-slate-400 block">NICHE BENCHMARK</span>
                            <h4 class="text-base font-bold text-slate-200 truncate mt-0.5"><?= htmlspecialchars($clone['orig_brand'] . ' ' . $clone['orig_name']) ?></h4>
                            <span class="text-base line-through text-slate-500 mt-0.5 block"><?= format_inr($clone['orig_mrp']) ?></span>
                        </div>

                        <div class="my-3 flex items-center justify-center">
                            <span class="px-2.5 py-0.5 rounded-full bg-slate-950 border border-slate-800 text-slate-400 text-xs font-bold uppercase tracking-wider">
                                REPLICATED BY
                            </span>
                        </div>

                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">BEAST-MODE CLONE</span>
                            <h4 class="text-lg font-serif font-bold text-white truncate mt-0.5"><?= htmlspecialchars($clone['dupe_brand']) ?></h4>
                            <p class="text-base text-slate-300 line-clamp-1 mt-0.5"><?= htmlspecialchars($clone['dupe_name']) ?></p>
                            <span class="text-2xl font-extrabold text-amber-400 mt-1 block"><?= format_inr($clone['dupe_mrp']) ?></span>
                        </div>

                        <!-- Notes list -->
                        <?php $notes = json_array_decode($clone['dupe_actives']); ?>
                        <?php if (!empty($notes)): ?>
                            <div class="mt-4 flex flex-wrap gap-1.5">
                                <?php foreach (array_slice($notes, 0, 2) as $n): ?>
                                    <span class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 text-slate-300 border border-slate-700">
                                        <?= htmlspecialchars($n) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-800 space-y-2">
                        <a href="<?= affiliate_buy_url('amazon', $clone['dupe_brand'] . ' ' . $clone['dupe_name']) ?>" 
                           target="_blank" rel="nofollow sponsored noopener" 
                           class="flex items-center justify-center gap-2 w-full py-3 px-4 text-sm font-bold uppercase tracking-wider rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 transition-colors duration-200 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Lowest Price on Amazon</span>
                        </a>
                        <a href="/perfume-clone/<?= urlencode($clone['slug']) ?>" class="block text-center text-xs font-semibold text-slate-400 hover:text-white transition-colors py-1">
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
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-emerald-300 border border-white/15 text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>SAFETY LABORATORY</span>
                </span>
                
                <h3 class="font-serif text-3xl sm:text-5xl font-bold leading-tight">
                    Are your active ingredients quietly clashing & stripping your barrier?
                </h3>
                
                <p class="text-base md:text-lg text-emerald-100/90 leading-relaxed max-w-xl font-sans">
                    Layering Retinol with direct chemical acids or pure Vitamin C with Benzoyl Peroxide causes severe lipid barrier stripping. Identify chemical degradation and Malassezia fungal acne triggers in seconds.
                </p>
                
                <div class="pt-2">
                    <a href="/routine-checker" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold bg-emerald-400 hover:bg-emerald-300 text-slate-950 transition-colors shadow-lg">
                        <span>Launch Routine Checker Free</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5 bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/15 space-y-3.5">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-300 block mb-2">Clinical Conflict Principles</span>
                
                <div class="bg-black/40 p-4 rounded-xl text-xs space-y-1 border border-white/10">
                    <div class="flex items-center gap-1.5 text-rose-300 font-bold text-sm">
                        <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span>RETINOL + GLYCOLIC ACID</span>
                    </div>
                    <p class="text-slate-300 text-[13px] leading-relaxed">Causes severe stratum corneum thinning and barrier erythema. Separate into AM/PM or alternate nights.</p>
                </div>

                <div class="bg-black/40 p-4 rounded-xl text-xs space-y-1 border border-white/10">
                    <div class="flex items-center gap-1.5 text-amber-300 font-bold text-sm">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span>POLYSORBATES & FERMENT BROTHS</span>
                    </div>
                    <p class="text-slate-300 text-[13px] leading-relaxed">Direct lipid food source for Malassezia yeast folliculitis. Fuels stubborn forehead texture.</p>
                </div>

                <div class="bg-black/40 p-4 rounded-xl text-xs space-y-1 border border-white/10">
                    <div class="flex items-center gap-1.5 text-emerald-300 font-bold text-sm">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>HYALURONIC ACID + CERAMIDES</span>
                    </div>
                    <p class="text-slate-300 text-[13px] leading-relaxed">Universal biomimetic barrier restoration. Safe to pair with all exfoliants and retinoids.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
