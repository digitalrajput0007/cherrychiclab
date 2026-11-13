<?php
declare(strict_types=1);
?>
    </main>

    <!-- Request Dupe Modal (Clinical Submission Console) -->
    <div x-show="requestModalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="requestModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-[#141413]/70 backdrop-blur-sm transition-opacity" @click="requestModalOpen = false" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="requestModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-lab-border p-6 sm:p-8" x-data="{
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
                <div class="flex items-center justify-between pb-4 border-b border-lab-border">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-lab-silk text-lab-obsidian flex items-center justify-center border border-lab-border">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        </span>
                        <div>
                            <h3 class="font-serif text-lg font-bold text-lab-obsidian">Submit Product for Lab Analysis</h3>
                            <span class="font-mono text-[10px] uppercase tracking-wider text-lab-muted block">UNSPONSORED QUEUE</span>
                        </div>
                    </div>
                    <button @click="requestModalOpen = false" class="text-lab-muted hover:text-lab-obsidian p-1 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <template x-if="!submitted">
                    <form @submit.prevent="submitRequest" class="mt-5 space-y-4">
                        <p class="text-xs text-lab-graphite leading-relaxed">
                            Have an imported luxury formula, niche fragrance, or viral lipstick you want tested for Indian market alternatives? Our cosmetic chemists verify matches against published INCI records.
                        </p>

                        <div>
                            <label class="block text-[11px] font-mono font-bold uppercase tracking-wider text-lab-graphite mb-1.5">Product Name & Brand</label>
                            <input x-model="productName" type="text" required placeholder="e.g. Dior Lip Glow Oil 001, Clinique Black Honey" class="w-full px-4 py-2.5 rounded-xl border border-lab-border text-sm bg-lab-alabaster/60 focus:bg-white focus:outline-none focus:ring-2 focus:ring-lab-obsidian focus:border-lab-obsidian transition-all">
                        </div>

                        <div>
                            <label class="block text-[11px] font-mono font-bold uppercase tracking-wider text-lab-graphite mb-1.5">Category</label>
                            <select x-model="category" class="w-full px-4 py-2.5 rounded-xl border border-lab-border text-sm bg-lab-alabaster/60 focus:bg-white focus:outline-none focus:ring-2 focus:ring-lab-obsidian focus:border-lab-obsidian transition-all">
                                <option value="skincare">Skincare Active / Serum / Moisturizer</option>
                                <option value="makeup">Makeup / Lipstick / Blush / Foundation</option>
                                <option value="perfume">Perfume / Cologne / Fragrance Extract</option>
                            </select>
                        </div>

                        <template x-if="error">
                            <p class="text-xs text-lab-burgundy font-medium" x-text="error"></p>
                        </template>

                        <div class="pt-3 flex items-center justify-end gap-2.5">
                            <button @click="requestModalOpen = false" type="button" class="px-4 py-2 text-xs font-semibold text-lab-graphite hover:text-lab-obsidian transition-colors">Cancel</button>
                            <button type="submit" :disabled="loading" class="px-5 py-2.5 text-xs font-bold text-white bg-lab-obsidian hover:bg-lab-burgundy disabled:opacity-50 rounded-xl transition-all shadow-xs">
                                <span x-show="!loading">Submit to Lab</span>
                                <span x-show="loading" x-cloak>Submitting...</span>
                            </button>
                        </div>
                    </form>
                </template>

                <template x-if="submitted">
                    <div class="mt-6 py-6 text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-lab-emeraldBg text-lab-emeraldText flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </div>
                        <h4 class="font-serif text-xl font-bold text-lab-obsidian">Formulation Request Logged</h4>
                        <p class="text-xs text-lab-graphite max-w-xs mx-auto leading-relaxed">
                            Thank you. Our formulation chemists have queued this product for INCI extraction and Indian market clone benchmarking.
                        </p>
                        <button @click="requestModalOpen = false; submitted = false; productName = '';" type="button" class="mt-2 px-5 py-2 text-xs font-bold text-lab-obsidian bg-lab-silk hover:bg-stone-200 rounded-xl transition-colors">
                            Close Window
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- Luxury Editorial Footer -->
    <footer class="bg-lab-obsidian text-[#FAF8F5] pt-16 pb-24 sm:pb-16 border-t border-black mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
                
                <!-- Col 1: Editorial Identity -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-baseline gap-2">
                        <span class="font-serif text-2xl font-bold text-white tracking-tight">CHERRYCHIC</span>
                        <span class="font-mono text-[10px] text-stone-400 uppercase tracking-widest px-1.5 py-0.5 rounded border border-stone-800">LAB™</span>
                    </div>
                    <p class="text-xs text-stone-400 leading-relaxed max-w-sm">
                        An independent Indian cosmetic intelligence index and formulation lab. We decode luxury skincare, makeup, and perfume benchmarks into clinically verified, accessible Indian alternatives.
                    </p>
                    <div class="pt-2 flex items-center gap-4 text-xs font-mono text-stone-400">
                        <span>EST. 2026</span>
                        <span>·</span>
                        <span>100% UNSPONSORED</span>
                        <span>·</span>
                        <span>PEER-REVIEWED INCI</span>
                    </div>
                </div>

                <!-- Col 2: Formulation Tools -->
                <div>
                    <h4 class="font-mono text-[11px] font-bold uppercase tracking-widest text-stone-400 mb-4">Laboratory Tools</h4>
                    <ul class="space-y-2.5 text-xs text-stone-300">
                        <li><a href="/dupes" class="hover:text-white transition-colors">Dupe Index</a></li>
                        <li><a href="/perfumes" class="hover:text-white transition-colors">Fragrance Clone Vault</a></li>
                        <li><a href="/routine-checker" class="hover:text-white transition-colors">Routine Clash Lab</a></li>
                        <li><a href="/shade-finder" class="hover:text-white transition-colors">Indian Shade Matrix</a></li>
                        <li><a href="/sitemap.xml" class="hover:text-white transition-colors">Programmatic XML Sitemap</a></li>
                    </ul>
                </div>

                <!-- Col 3: Curated Spec Sheets -->
                <div>
                    <h4 class="font-mono text-[11px] font-bold uppercase tracking-widest text-stone-400 mb-4">Curated Analyses</h4>
                    <ul class="space-y-2.5 text-xs text-stone-300">
                        <li><a href="/dupe/estee-lauder-advanced-night-repair-dupe" class="hover:text-white transition-colors truncate block">Estée Lauder ANR vs Minimalist</a></li>
                        <li><a href="/perfume-clone/baccarat-rouge-540-clone-club-de-nuit-untold" class="hover:text-white transition-colors truncate block">Baccarat Rouge vs Armaf Untold</a></li>
                        <li><a href="/dupe/clinique-black-honey-dupe-elf-ecstatic" class="hover:text-white transition-colors truncate block">Clinique Black Honey vs elf</a></li>
                        <li><a href="/perfume-clone/dior-sauvage-clone-ajmal-kuro" class="hover:text-white transition-colors truncate block">Dior Sauvage vs Ajmal Kuro</a></li>
                        <li><a href="/dupe/charlotte-tilbury-pillow-talk-dupe-nykaa-chai" class="hover:text-white transition-colors truncate block">Pillow Talk vs Nykaa Chai</a></li>
                    </ul>
                </div>

                <!-- Col 4: Mandatory Compliance Disclosure -->
                <div class="space-y-3">
                    <h4 class="font-mono text-[11px] font-bold uppercase tracking-widest text-stone-400 mb-2">Affiliate & Compliance</h4>
                    <p class="text-[11px] text-stone-300 leading-relaxed font-sans">
                        CherryChic.in is a participant in the Amazon Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to Amazon.in.
                    </p>
                    <p class="text-[11px] text-stone-500 leading-relaxed">
                        We also partner with Indian platforms (Nykaa, Tira Beauty, Purplle, Myntra). All chemical compatibility algorithms and dupe match scores are strictly independent and unsponsored.
                    </p>
                </div>

            </div>

            <!-- Bottom Sub-Bar -->
            <div class="mt-14 pt-8 border-t border-stone-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-stone-500">
                <p>© <?= date('Y') ?> CherryChic Beauty & Fragrance Lab (cherrychic.in). All rights reserved.</p>
                <div class="flex items-center gap-4 text-[11px] font-mono">
                    <span class="text-emerald-400">● 100% CLIENT-SIDE ALPINE.JS</span>
                    <span>·</span>
                    <a href="/routine-checker" class="hover:text-stone-300">SAFETY PROTOCOL</a>
                    <span>·</span>
                    <a href="/sitemap.xml" class="hover:text-stone-300">INDEX FEED</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile-First Sticky Bottom Navigation Bar (Ultra-Thin 1.5px SVG Icons) -->
    <nav class="sm:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-lab-border px-2 py-1.5 shadow-lg">
        <div class="grid grid-cols-5 items-center text-center">
            
            <!-- Dupes -->
            <a href="/dupes" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/dupes' ? 'text-lab-burgundy font-bold' : 'text-lab-graphite hover:text-lab-obsidian' ?>">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 1-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/></svg>
                <span class="text-[10px] tracking-tight">Dupes</span>
            </a>

            <!-- Clones -->
            <a href="/perfumes" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/perfumes' ? 'text-lab-burgundy font-bold' : 'text-lab-graphite hover:text-lab-obsidian' ?>">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <span class="text-[10px] tracking-tight">Clones</span>
            </a>

            <!-- Routine -->
            <a href="/routine-checker" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/routine-checker' ? 'text-lab-burgundy font-bold' : 'text-lab-graphite hover:text-lab-obsidian' ?>">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M12 18a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg>
                <span class="text-[10px] tracking-tight">Routine</span>
            </a>

            <!-- Shades -->
            <a href="/shade-finder" class="flex flex-col items-center py-1 <?= ($currentRoute ?? '') === '/shade-finder' ? 'text-lab-burgundy font-bold' : 'text-lab-graphite hover:text-lab-obsidian' ?>">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 0 0 5.304 0l6.401-6.402M6.75 21A3.75 3.75 0 0 1 3 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.74 3.74 0 0 0 2.652-.098l6.4-6.4"/></svg>
                <span class="text-[10px] tracking-tight">Shades</span>
            </a>

            <!-- Submit -->
            <button @click="requestModalOpen = true" type="button" class="flex flex-col items-center py-1 text-lab-burgundy hover:text-lab-burgundyDark">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <span class="text-[10px] tracking-tight font-semibold">Submit</span>
            </button>
        </div>
    </nav>
</body>
</html>
