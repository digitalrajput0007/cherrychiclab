<?php
declare(strict_types=1);
/** @var string $pageTitle */
/** @var string $pageDescription */
/** @var string $currentRoute */

$pageTitle = $pageTitle ?? 'CherryChic Beauty & Fragrance Lab | Indian Luxury Dupes & Clone Finder';
$pageDescription = $pageDescription ?? 'Discover tested Indian skincare dupes, viral makeup alternatives, beast-mode perfume clones, and cross-brand foundation shade matches for Indian skin tones.';
$currentRoute = $currentRoute ?? '/';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        cherry: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            200: '#fecdd3',
                            300: '#fda4af',
                            400: '#fb7185',
                            500: '#f43f5e',
                            600: '#e11d48',
                            700: '#be123c',
                            800: '#9f1239',
                            900: '#881337',
                            950: '#4c0519',
                        },
                        amberGold: '#d97706',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .glossy-swatch {
            position: relative;
            box-shadow: inset 0 2px 4px rgba(255,255,255,0.6), 0 4px 10px rgba(0,0,0,0.15);
        }
        .glossy-swatch::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 15%;
            width: 70%;
            height: 35%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.7), rgba(255,255,255,0.05));
            border-radius: 9999px;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-900 font-sans antialiased min-h-screen flex flex-col selection:bg-cherry-500 selection:text-white" x-data="{ mobileMenuOpen: false, requestModalOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-cherry-950 via-cherry-900 to-stone-950 text-cherry-100 text-xs py-2 px-4 text-center font-medium border-b border-cherry-800/40">
        <span class="inline-flex items-center gap-1.5">
            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>Indian Beauty Lab: <strong>Save ₹8,000+</strong> on viral luxury formulas with science-verified dupes & perfume clones.</span>
        </span>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-stone-200/80 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand Logo -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2 group">
                        <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-cherry-700 to-rose-500 flex items-center justify-center text-white text-lg font-bold shadow-md shadow-cherry-700/20 group-hover:scale-105 transition-transform">
                            🍒
                        </span>
                        <div class="flex flex-col">
                            <span class="font-serif text-xl sm:text-2xl font-bold tracking-tight text-stone-900 group-hover:text-cherry-800 transition-colors">
                                Cherry<span class="text-cherry-600">Chic</span>
                            </span>
                            <span class="text-[10px] tracking-widest uppercase font-semibold text-stone-600 -mt-1">
                                Beauty & Fragrance Lab
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2 text-sm font-semibold text-stone-600">
                    <a href="/dupes" class="px-3 py-2 rounded-lg transition-colors <?= $currentRoute === '/dupes' ? 'text-cherry-700 bg-cherry-50' : 'hover:text-cherry-700 hover:bg-stone-100' ?>">
                        💄 Dupe Finder
                    </a>
                    <a href="/perfumes" class="px-3 py-2 rounded-lg transition-colors <?= $currentRoute === '/perfumes' ? 'text-cherry-700 bg-cherry-50' : 'hover:text-cherry-700 hover:bg-stone-100' ?>">
                        ✨ Perfume Clones
                    </a>
                    <a href="/routine-checker" class="px-3 py-2 rounded-lg transition-colors <?= $currentRoute === '/routine-checker' ? 'text-cherry-700 bg-cherry-50' : 'hover:text-cherry-700 hover:bg-stone-100' ?>">
                        🧪 Routine & Fungal Acne
                    </a>
                    <a href="/shade-finder" class="px-3 py-2 rounded-lg transition-colors <?= $currentRoute === '/shade-finder' ? 'text-cherry-700 bg-cherry-50' : 'hover:text-cherry-700 hover:bg-stone-100' ?>">
                        🎨 Shade Matcher
                    </a>
                </nav>

                <!-- Actions: Request Dupe Button -->
                <div class="hidden sm:flex items-center gap-3">
                    <button @click="requestModalOpen = true" type="button" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold text-cherry-700 bg-cherry-50 hover:bg-cherry-100 border border-cherry-200/80 rounded-full transition-all hover:scale-102 shadow-sm">
                        <svg class="w-4 h-4 text-cherry-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Request a Dupe</span>
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-md text-stone-600 hover:text-cherry-700 hover:bg-stone-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-white border-b border-stone-200 px-4 pt-2 pb-4 space-y-1">
            <a href="/dupes" class="block px-3 py-2 rounded-md text-base font-semibold <?= $currentRoute === '/dupes' ? 'text-cherry-700 bg-cherry-50' : 'text-stone-700 hover:bg-stone-100' ?>">
                💄 Skincare & Makeup Dupes
            </a>
            <a href="/perfumes" class="block px-3 py-2 rounded-md text-base font-semibold <?= $currentRoute === '/perfumes' ? 'text-cherry-700 bg-cherry-50' : 'text-stone-700 hover:bg-stone-100' ?>">
                ✨ Perfume Clone Finder
            </a>
            <a href="/routine-checker" class="block px-3 py-2 rounded-md text-base font-semibold <?= $currentRoute === '/routine-checker' ? 'text-cherry-700 bg-cherry-50' : 'text-stone-700 hover:bg-stone-100' ?>">
                🧪 Routine & Fungal Acne Checker
            </a>
            <a href="/shade-finder" class="block px-3 py-2 rounded-md text-base font-semibold <?= $currentRoute === '/shade-finder' ? 'text-cherry-700 bg-cherry-50' : 'text-stone-700 hover:bg-stone-100' ?>">
                🎨 Indian Shade Matcher
            </a>
            <div class="pt-2 border-t border-stone-100">
                <button @click="requestModalOpen = true; mobileMenuOpen = false" class="w-full text-center px-4 py-2.5 rounded-lg text-sm font-bold bg-cherry-600 text-white shadow-sm">
                    + Request a Dupe / Product
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-grow pb-16 sm:pb-0">

