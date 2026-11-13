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

    <!-- Floating Glassmorphism Header -->
    <header class="sticky top-0 z-40 backdrop-blur-md bg-lab-alabaster/90 border-b border-lab-border transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Editorial Wordmark Logo -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2.5 group">
                        <span class="w-8 h-8 rounded-lg bg-lab-obsidian text-lab-alabaster flex items-center justify-center font-serif text-lg font-bold group-hover:bg-lab-burgundy transition-colors">
                            C
                        </span>
                        <div class="flex items-baseline gap-1">
                            <span class="font-serif text-2xl sm:text-3xl font-bold tracking-tight text-lab-obsidian group-hover:text-lab-burgundy transition-colors">
                                CHERRYCHIC
                            </span>
                            <span class="font-mono text-[10px] uppercase tracking-widest font-semibold px-1.5 py-0.5 rounded bg-lab-silk text-lab-graphite border border-lab-border">
                                LAB™
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Clean Pill Navigation -->
                <nav class="hidden md:flex items-center gap-1 bg-lab-silk/80 p-1 rounded-full border border-lab-border">
                    <a href="/dupes" class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide transition-all <?= $currentRoute === '/dupes' ? 'bg-lab-obsidian text-white shadow-sm' : 'text-lab-graphite hover:text-lab-obsidian hover:bg-white/60' ?>">
                        Dupe Index
                    </a>
                    <a href="/perfumes" class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide transition-all <?= $currentRoute === '/perfumes' ? 'bg-lab-obsidian text-white shadow-sm' : 'text-lab-graphite hover:text-lab-obsidian hover:bg-white/60' ?>">
                        Fragrance Vault
                    </a>
                    <a href="/routine-checker" class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide transition-all <?= $currentRoute === '/routine-checker' ? 'bg-lab-obsidian text-white shadow-sm' : 'text-lab-graphite hover:text-lab-obsidian hover:bg-white/60' ?>">
                        Routine Clash Lab
                    </a>
                    <a href="/shade-finder" class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide transition-all <?= $currentRoute === '/shade-finder' ? 'bg-lab-obsidian text-white shadow-sm' : 'text-lab-graphite hover:text-lab-obsidian hover:bg-white/60' ?>">
                        Shade Matrix
                    </a>
                </nav>

                <!-- Right Action Bar: Quick Search + Submit Button -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="/dupes" class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono text-lab-graphite bg-white border border-lab-border hover:border-lab-obsidian hover:text-lab-obsidian transition-all shadow-xs">
                        <svg class="w-3.5 h-3.5 text-lab-graphite" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                        <span>Search Database</span>
                        <kbd class="text-[10px] px-1 py-0.5 rounded bg-lab-silk text-lab-muted border border-lab-border">⌘K</kbd>
                    </a>

                    <button @click="requestModalOpen = true" type="button" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-semibold bg-lab-obsidian hover:bg-lab-burgundy text-white transition-all shadow-xs">
                        <span>Submit Product</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center gap-2">
                    <button @click="requestModalOpen = true" type="button" class="px-3 py-1.5 rounded-full text-xs font-semibold bg-lab-obsidian text-white">
                        Submit
                    </button>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg text-lab-obsidian hover:bg-lab-silk transition-colors" aria-label="Toggle Navigation Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-b border-lab-border bg-lab-alabaster px-4 pt-3 pb-6 space-y-2">
            <a href="/dupes" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-lab-obsidian hover:bg-lab-silk <?= $currentRoute === '/dupes' ? 'bg-lab-silk font-bold' : '' ?>">
                Dupe Index (Skincare & Makeup)
            </a>
            <a href="/perfumes" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-lab-obsidian hover:bg-lab-silk <?= $currentRoute === '/perfumes' ? 'bg-lab-silk font-bold' : '' ?>">
                Fragrance Vault (Perfume Clones)
            </a>
            <a href="/routine-checker" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-lab-obsidian hover:bg-lab-silk <?= $currentRoute === '/routine-checker' ? 'bg-lab-silk font-bold' : '' ?>">
                Routine Clash Lab (Active Conflict & Fungal Acne)
            </a>
            <a href="/shade-finder" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-lab-obsidian hover:bg-lab-silk <?= $currentRoute === '/shade-finder' ? 'bg-lab-silk font-bold' : '' ?>">
                Shade Matrix (Indian Complexions)
            </a>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-1">
