<?php
declare(strict_types=1);
?>
    </main>

    <!-- Request Dupe Modal (Alpine.js) -->
    <div x-show="requestModalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="requestModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-stone-900/60 backdrop-blur-sm transition-opacity" @click="requestModalOpen = false" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="requestModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-stone-200 p-6 sm:p-8" x-data="{
                productName: '',
                category: 'skincare',
                submitted: false,
                loading: false,
                error: '',
                async submitRequest() {
                    if (!this.productName.trim()) return;
                    this.loading = true;
                    this.error = '';
                    try {
                        const res = await fetch('/api/request-dupe', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ product_name: this.productName, category: this.category })
                        });
                        const data = await res.json();
                        if (data.success) {
                            this.submitted = true;
                        } else {
                            this.error = data.message || 'Submission failed';
                        }
                    } catch (e) {
                        this.error = 'Network error. Please try again.';
                    } finally {
                        this.loading = false;
                    }
                }
            }">
                <div class="flex items-center justify-between pb-4 border-b border-stone-100">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-cherry-100 text-cherry-700 flex items-center justify-center font-bold">💡</span>
                        <h3 class="text-lg font-bold text-stone-900">Request a Dupe or Product</h3>
                    </div>
                    <button @click="requestModalOpen = false" class="text-stone-400 hover:text-stone-600 p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <template x-if="!submitted">
                    <form @submit.prevent="submitRequest" class="mt-4 space-y-4">
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Have an expensive luxury cream, viral lipstick, or niche perfume you want our lab chemists to test and find Indian budget dupes for? Submit below!
                        </p>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1">Product Name & Brand</label>
                            <input x-model="productName" type="text" required placeholder="e.g. Dior Lip Glow Oil, Clinique Black Honey" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-cherry-500 focus:border-cherry-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1">Category</label>
                            <select x-model="category" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-cherry-500 focus:border-cherry-500">
                                <option value="skincare">Skincare Active / Serum / Cream</option>
                                <option value="makeup">Makeup / Lipstick / Blush / Foundation</option>
                                <option value="perfume">Perfume / Cologne / Fragrance</option>
                            </select>
                        </div>

                        <template x-if="error">
                            <p class="text-xs text-rose-600 font-medium" x-text="error"></p>
                        </template>

                        <div class="pt-2 flex justify-end gap-2">
                            <button @click="requestModalOpen = false" type="button" class="px-4 py-2 text-sm font-semibold text-stone-600 hover:bg-stone-100 rounded-xl">Cancel</button>
                            <button type="submit" :disabled="loading" class="px-5 py-2 text-sm font-bold text-white bg-cherry-700 hover:bg-cherry-800 disabled:opacity-50 rounded-xl shadow-md transition-all">
                                <span x-show="!loading">Submit Request</span>
                                <span x-show="loading" x-cloak>Submitting...</span>
                            </button>
                        </div>
                    </form>
                </template>

                <template x-if="submitted">
                    <div class="mt-4 text-center py-6 space-y-3">
                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto text-xl">✓</div>
                        <h4 class="text-base font-bold text-stone-900">Request Received!</h4>
                        <p class="text-xs text-stone-500 max-w-sm mx-auto">
                            Our formulation team has queued this item. We will compare INCI ingredients and olfactory notes against top Indian alternatives on Nykaa, Tira, & Amazon.
                        </p>
                        <button @click="requestModalOpen = false; submitted = false; productName = ''" class="mt-2 px-4 py-2 text-xs font-bold bg-stone-100 hover:bg-stone-200 text-stone-700 rounded-lg">
                            Close
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="bg-stone-900 text-stone-300 border-t border-stone-800 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 lg:gap-12">
                <!-- Col 1: Brand & Mission -->
                <div class="space-y-4 md:col-span-1">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-tr from-cherry-700 to-rose-500 flex items-center justify-center text-white text-base font-bold">🍒</span>
                        <span class="font-serif text-xl font-bold text-white">Cherry<span class="text-cherry-400">Chic</span></span>
                    </div>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        India's dedicated programmatic beauty intelligence engine. We deconstruct luxury formulas to discover scientifically-matched skincare dupes, beast-mode Middle Eastern fragrance clones, and exact foundation shades for Indian undertones.
                    </p>
                    <div class="pt-2 text-[11px] text-stone-400">
                        Designed for 1GB RAM Ubuntu VPS • Ultra-Low Memory PHP 8 + SQLite WAL.
                    </div>
                </div>

                <!-- Col 2: Core Platform Tools -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Interactive Lab Tools</h4>
                    <ul class="space-y-2.5 text-xs text-stone-400">
                        <li><a href="/dupes" class="hover:text-cherry-400 transition-colors">💄 Skincare & Makeup Dupe Finder</a></li>
                        <li><a href="/perfumes" class="hover:text-cherry-400 transition-colors">✨ Indian Perfume Clone Index</a></li>
                        <li><a href="/routine-checker" class="hover:text-cherry-400 transition-colors">🧪 Active Clash & Fungal Acne Checker</a></li>
                        <li><a href="/shade-finder" class="hover:text-cherry-400 transition-colors">🎨 Cross-Brand Foundation Shade Matcher</a></li>
                        <li><a href="/sitemap.xml" class="hover:text-cherry-400 transition-colors">🗺️ Programmatic XML Sitemap</a></li>
                    </ul>
                </div>

                <!-- Col 3: Popular Dupe Breakdowns -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Top Indian Dupe Guides</h4>
                    <ul class="space-y-2.5 text-xs text-stone-400">
                        <li><a href="/dupe/estee-lauder-advanced-night-repair-dupe" class="hover:text-cherry-400 transition-colors">Estée Lauder ANR vs Minimalist (Save ₹8,801)</a></li>
                        <li><a href="/perfume-clone/baccarat-rouge-540-clone-club-de-nuit-untold" class="hover:text-cherry-400 transition-colors">MFK Baccarat Rouge 540 vs Armaf Untold</a></li>
                        <li><a href="/dupe/charlotte-tilbury-flawless-filter-dupe" class="hover:text-cherry-400 transition-colors">Charlotte Tilbury vs elf Halo Glow</a></li>
                        <li><a href="/perfume-clone/creed-aventus-clone-club-de-nuit-intense-man" class="hover:text-cherry-400 transition-colors">Creed Aventus vs Armaf CDNIM Pure Parfum</a></li>
                        <li><a href="/dupe/charlotte-tilbury-pillow-talk-dupe" class="hover:text-cherry-400 transition-colors">Pillow Talk vs Maybelline Touch of Spice</a></li>
                    </ul>
                </div>

                <!-- Col 4: Affiliate & Transparency Disclosure -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-2">Transparency & Affiliate Note</h4>
                    <p class="text-xs text-stone-300 leading-relaxed font-medium">
                        CherryChic.in is a participant in the Amazon Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to Amazon.in.
                    </p>
                    <p class="text-[11px] text-stone-400 leading-relaxed">
                        CherryChic also partners with Indian retailers including Nykaa, Tira Beauty, Purplle, and Myntra. All product comparisons, ingredient clash algorithms, and fungal acne evaluations are independent.
                    </p>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-stone-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-stone-400">
                <p>© <?= date('Y') ?> CherryChic Beauty & Fragrance Lab (cherrychic.in). All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <span class="inline-flex items-center gap-1 text-emerald-400">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>100% Client-Side Lightweight CSS/JS</span>
                    </span>
                    <span>•</span>
                    <a href="/routine-checker" class="hover:text-stone-300">Routine Safety</a>
                    <span>•</span>
                    <a href="/sitemap.xml" class="hover:text-stone-300">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile-First Sticky Bottom Navigation Bar -->
    <nav class="sm:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-stone-200 px-2 py-1 shadow-lg shadow-stone-900/10">
        <div class="grid grid-cols-5 items-center text-center">
            <a href="/dupes" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/dupes' ? 'text-cherry-600 font-bold' : 'text-stone-500 hover:text-stone-800' ?>">
                <span class="text-base">💄</span>
                <span class="text-[10px] tracking-tight">Dupes</span>
            </a>
            <a href="/perfumes" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/perfumes' ? 'text-cherry-600 font-bold' : 'text-stone-500 hover:text-stone-800' ?>">
                <span class="text-base">✨</span>
                <span class="text-[10px] tracking-tight">Clones</span>
            </a>
            <a href="/routine-checker" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/routine-checker' ? 'text-cherry-600 font-bold' : 'text-stone-500 hover:text-stone-800' ?>">
                <span class="text-base">🧪</span>
                <span class="text-[10px] tracking-tight">Routine</span>
            </a>
            <a href="/shade-finder" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/shade-finder' ? 'text-cherry-600 font-bold' : 'text-stone-500 hover:text-stone-800' ?>">
                <span class="text-base">🎨</span>
                <span class="text-[10px] tracking-tight">Shades</span>
            </a>
            <button @click="requestModalOpen = true" type="button" class="flex flex-col items-center py-1 text-cherry-600 hover:text-cherry-800 font-medium">
                <span class="text-base">💡</span>
                <span class="text-[10px] tracking-tight">Request</span>
            </button>
        </div>
    </nav>
</body>
</html>

