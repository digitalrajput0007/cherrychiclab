<?php
declare(strict_types=1);
/** @var string $pageTitle */
/** @var string $pageDescription */
/** @var string $currentRoute */

$pageTitle = $pageTitle ?? 'CherryChic Lab | Independent Indian Formulation & Fragrance Index';
$pageDescription = $pageDescription ?? 'Science-backed luxury beauty dupes, Middle Eastern perfume clones, and cross-brand Indian foundation matches. 100% unsponsored lab formulations.';
$currentRoute = $currentRoute ?? '/';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth bg-[#FAF8F5]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="canonical" href="https://cherrychic.in<?= htmlspecialchars($currentRoute) ?>">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- OpenGraph / Social Sharing -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta property="og:url" content="https://cherrychic.in<?= htmlspecialchars($currentRoute) ?>">
    <meta property="og:site_name" content="CherryChic Beauty Lab">

    <!-- High-Fashion Editorial Typography (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600;1,700&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        lab: {
                            alabaster: '#FAF8F5',
                            silk: '#F3EFEA',
                            ivory: '#FFFFFF',
                            border: '#E8E3DC',
                            borderDark: '#D8D1C7',
                            obsidian: '#141413',
                            graphite: '#5C5852',
                            muted: '#8C877E',
                            burgundy: '#9E1B32',
                            burgundyDark: '#7A1324',
                            burgundyLight: '#FBEBEF',
                            emeraldText: '#1B4332',
                            emeraldBg: '#E8F3EE',
                            amberText: '#9A3412',
                            amberBg: '#FEF3C7',
                        }
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', '"Instrument Serif"', 'Georgia', 'serif'],
                        display: ['"Instrument Serif"', '"Cormorant Garamond"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace'],
                    },
                    boxShadow: {
                        'lab': '0 12px 32px -12px rgba(20, 20, 19, 0.05)',
                        'lab-hover': '0 20px 40px -16px rgba(20, 20, 19, 0.1)',
                        'swatch': 'inset 0 -3px 6px rgba(0,0,0,0.25), 0 4px 10px rgba(20,20,19,0.08)'
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        
        /* Realistic 3D Cosmetic Smear / Droplet */
        .swatch-droplet {
            position: relative;
            box-shadow: inset 0 -3px 6px rgba(0,0,0,0.25), 0 4px 12px rgba(20,20,19,0.08);
            border: 1px solid rgba(232, 227, 220, 0.9);
        }
        .swatch-droplet::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(circle at 30% 28%, rgba(255,255,255,0.55), transparent 52%);
            pointer-events: none;
        }

        /* Subtle Architectural Grid Texture */
        .lab-pattern {
            background-image: radial-gradient(#E8E3DC 0.75px, transparent 0.75px);
            background-size: 20px 20px;
        }

        /* Custom selection highlight */
        ::selection {
            background-color: #9E1B32;
            color: #FFFFFF;
        }
    </style>
</head>
<body class="bg-lab-alabaster text-lab-obsidian font-sans antialiased min-h-screen flex flex-col selection:bg-lab-burgundy selection:text-white" x-data="{ mobileMenuOpen: false, requestModalOpen: false }">

    <!-- Top Announcement Micro-Bar -->
    <div class="bg-lab-obsidian text-[#FAF8F5] text-[11px] py-2 px-4 text-center font-mono uppercase tracking-wider border-b border-black">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <span class="hidden md:inline-block text-lab-muted">COSMETIC FORMULATION LAB · INDEPENDENT TESTING</span>
            <span class="mx-auto md:mx-0">
                INDIA'S INDEPENDENT FORMULATION & CLONE INDEX — 100% UNSPONSORED LAB DATA
            </span>
            <span class="hidden md:inline-flex items-center gap-1.5 text-stone-300 font-sans normal-case text-xs">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>200+ Verified Matches</span>
            </span>
        </div>
    </div>

    <!-- Floating Glassmorphism Header (Sticky, Non-overlapping) -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-white/95 border-b border-rose-100/80 shadow-xs transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Editorial Wordmark Logo -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2.5 group">
                        <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-rose-600 to-pink-600 text-white flex items-center justify-center font-serif text-xl font-bold shadow-md shadow-rose-500/20 group-hover:scale-105 transition-transform">
                            C
                        </span>
                        <div class="flex items-baseline gap-1.5">
                            <span class="font-serif text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 group-hover:text-rose-600 transition-colors">
                                CHERRYCHIC
                            </span>
                            <span class="font-mono text-[11px] uppercase tracking-widest font-bold px-2 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200">
                                LAB™
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Clean Pill Navigation with Vibrant Active Gradient -->
                <nav class="hidden md:flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-full border border-slate-200/80">
                    <a href="/dupes" class="px-5 py-2 rounded-full text-sm font-semibold tracking-wide transition-all <?= $currentRoute === '/dupes' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-white/80' ?>">
                        Dupe Index
                    </a>
                    <a href="/perfumes" class="px-5 py-2 rounded-full text-sm font-semibold tracking-wide transition-all <?= $currentRoute === '/perfumes' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-white/80' ?>">
                        Fragrance Vault
                    </a>
                    <a href="/routine-checker" class="px-5 py-2 rounded-full text-sm font-semibold tracking-wide transition-all <?= $currentRoute === '/routine-checker' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-white/80' ?>">
                        Routine Clash Lab
                    </a>
                    <a href="/shade-finder" class="px-5 py-2 rounded-full text-sm font-semibold tracking-wide transition-all <?= $currentRoute === '/shade-finder' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-md shadow-rose-500/20 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-white/80' ?>">
                        Shade Matrix
                    </a>
                </nav>

                <!-- Right Action Bar: Sleek Header Search Bar + Submit Button -->
                <div class="hidden md:flex items-center gap-3">
                    <!-- Inline Header Search Input (Lens cleanly positioned with zero text overlap) -->
                    <form action="/dupes" method="GET" class="relative w-44 lg:w-52 xl:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                            </svg>
                        </div>
                        <input name="q" type="text" placeholder="Search dupes, actives..." class="w-full pl-10 pr-8 py-2 text-xs font-medium rounded-full border border-slate-200 bg-slate-50/90 focus:bg-white focus:border-rose-500 focus:ring-2 focus:ring-rose-500/15 focus:outline-none transition-all placeholder-slate-400 text-slate-800">
                        <span class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none text-[10px] font-mono text-slate-400 font-semibold">⌘K</span>
                    </form>

                    <button @click="requestModalOpen = true" type="button" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-bold bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 text-white transition-all shadow-md shadow-rose-600/15 whitespace-nowrap">
                        <span>Submit Product</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center gap-2">
                    <button @click="requestModalOpen = true" type="button" class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-xs">
                        Submit
                    </button>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-xl text-slate-700 hover:bg-slate-100 transition-colors" aria-label="Toggle Navigation Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Drawer Navigation with Integrated Search Bar -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-b border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3">
            <!-- Mobile Search Bar -->
            <form action="/dupes" method="GET" class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                    </svg>
                </div>
                <input name="q" type="text" placeholder="Search luxury dupes, perfumes..." class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-rose-500 focus:outline-none transition-colors text-slate-800">
            </form>

            <a href="/dupes" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-sm font-semibold transition-all <?= $currentRoute === '/dupes' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white font-bold shadow-sm' : 'text-slate-800 hover:bg-slate-100' ?>">
                Dupe Index (Skincare & Makeup)
            </a>
            <a href="/perfumes" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-sm font-semibold transition-all <?= $currentRoute === '/perfumes' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white font-bold shadow-sm' : 'text-slate-800 hover:bg-slate-100' ?>">
                Fragrance Vault (Perfume Clones)
            </a>
            <a href="/routine-checker" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-sm font-semibold transition-all <?= $currentRoute === '/routine-checker' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white font-bold shadow-sm' : 'text-slate-800 hover:bg-slate-100' ?>">
                Routine Clash Lab (Active Conflict & Fungal Acne)
            </a>
            <a href="/shade-finder" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-sm font-semibold transition-all <?= $currentRoute === '/shade-finder' ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white font-bold shadow-sm' : 'text-slate-800 hover:bg-slate-100' ?>">
                Shade Matrix (Indian Complexions)
            </a>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-1">
