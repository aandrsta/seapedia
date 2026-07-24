<?php $__env->startSection('title', 'SEAPEDIA - Marketplace Multi-Peran'); ?>

<?php $__env->startSection('content'); ?>


<section class="relative w-full h-[calc(100vh-4rem)] bg-navy-950 overflow-hidden" id="hero-carousel">
    <div class="carousel-container w-full h-full overflow-hidden"
         x-data="{
            current: 0,
            totalSlides: 3,
            autoplayInterval: null,
            progress: 0,
            progressInterval: null,

            init() {
                this.startAutoplay();
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    this.stopAutoplay();
                }
            },

            next() {
                this.current = (this.current + 1) % this.totalSlides;
                this.resetProgress();
            },

            prev() {
                this.current = (this.current - 1 + this.totalSlides) % this.totalSlides;
                this.resetProgress();
            },

            goTo(index) {
                this.current = index;
                this.resetProgress();
            },

            startAutoplay() {
                this.autoplayInterval = setInterval(() => { this.next(); }, 5000);
                this.startProgress();
            },

            stopAutoplay() {
                clearInterval(this.autoplayInterval);
                clearInterval(this.progressInterval);
            },

            startProgress() {
                this.progress = 0;
                clearInterval(this.progressInterval);
                this.progressInterval = setInterval(() => {
                    this.progress += 2;
                    if (this.progress >= 100) this.progress = 100;
                }, 100);
            },

            resetProgress() {
                this.progress = 0;
                clearInterval(this.progressInterval);
                this.startProgress();
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = setInterval(() => { this.next(); }, 5000);
            }
         }"
         @mouseenter="stopAutoplay()"
         @mouseleave="startAutoplay()">

        <!-- Carousel Track -->
        <div class="carousel-track h-full" :style="'transform: translateX(-' + (current * 100) + '%)'">

            
            <div class="carousel-slide h-full">
                <div class="relative w-full h-full flex items-center bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo e(asset('images/hero1.png')); ?>');">
                    <!-- Overlay background -->
                    <div class="absolute inset-0 bg-black/60 z-0"></div>

                    
                    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center h-full">
                        <div class="max-w-2xl text-left animate-cinematic">
                            <span class="inline-flex items-center gap-1.5 py-1 px-3 bg-teal-500/20 text-teal-300 border border-teal-500/30 text-[9px] font-black uppercase tracking-widest mb-6">
                                SEA-TECH HARBOR / ED.2026
                            </span>
                            <h2 class="text-4xl sm:text-6xl font-black tracking-tighter text-white leading-none mb-6">
                                PROMO PUNCAK<br>
                                <span class="text-teal-400 italic font-extrabold">MARKETPLACE PRIME</span>
                            </h2>
                            <p class="text-sand-300 mb-10 max-w-md font-medium text-xs sm:text-sm leading-relaxed">
                                Temukan ribuan produk pilihan dari berbagai merchant terpercaya. Nikmati kemudahan bertransaksi dengan dompet terintegrasi.
                            </p>
                            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary btn-lg shadow-lg hover:-translate-y-0.5 transition-transform text-xs font-black tracking-widest">
                                SHOP COLLECTION
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="carousel-slide h-full">
                <div class="relative w-full h-full flex items-center bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo e(asset('images/hero2.png')); ?>');">
                    <!-- Overlay background -->
                    <div class="absolute inset-0 bg-black/60 z-0"></div>

                    
                    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center h-full">
                        <div class="max-w-2xl text-left animate-cinematic">
                            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 bg-coral-500/20 text-coral-300 border border-coral-500/30 text-[9px] font-black uppercase tracking-widest mb-6">
                                SPECIAL COLLECTION / DIVE GEAR
                            </span>
                            <h2 class="text-4xl sm:text-6xl font-black tracking-tighter text-white leading-none mb-6">
                                PERALATAN LAUT<br>
                                <span class="text-coral-400 font-extrabold">PILIHAN PROFESIONAL</span>
                            </h2>
                            <p class="text-sand-300 mb-10 max-w-md font-medium text-xs sm:text-sm leading-relaxed">
                                Lengkapi kebutuhan eksplorasi bawah laut dengan kualitas terbaik dari brand internasional.
                            </p>
                            <a href="<?php echo e(route('products.index')); ?>" class="btn bg-white hover:bg-sand-100 text-navy-950 btn-lg shadow-lg hover:-translate-y-0.5 transition-transform text-xs font-black tracking-widest">
                                EXPLORE PRODUCTS
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="carousel-slide h-full">
                <div class="relative w-full h-full flex items-center bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo e(asset('images/hero3.png')); ?>');">
                    <!-- Overlay background -->
                    <div class="absolute inset-0 bg-black/60 z-0"></div>

                    
                    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center h-full">
                        <div class="max-w-2xl text-left animate-cinematic">
                            <span class="inline-flex items-center gap-1.5 py-1 px-3 bg-teal-500/20 text-teal-300 border border-teal-500/30 text-[9px] font-black uppercase tracking-widest mb-6">
                                FREIGHT LOGISTICS / PROMO
                            </span>
                            <h2 class="text-4xl sm:text-6xl font-black tracking-tighter text-white leading-none mb-6">
                                BEBAS ONGKOS KIRIM<br>
                                <span class="text-teal-400 font-extrabold">KE SELURUH INDONESIA</span>
                            </h2>
                            <p class="text-sand-300 mb-10 max-w-md font-medium text-xs sm:text-sm leading-relaxed">
                                Pengiriman logistik kelautan cepat ke berbagai kepulauan tanpa khawatir biaya pengiriman.
                            </p>
                            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary btn-lg shadow-lg hover:-translate-y-0.5 transition-transform text-xs font-black tracking-widest">
                                GET CODE NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        
        <button @click="prev()" class="carousel-arrow prev bg-navy-900/50 border-teal-500/20 text-white" aria-label="Previous slide">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button @click="next()" class="carousel-arrow next bg-navy-900/50 border-teal-500/20 text-white" aria-label="Next slide">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
        </button>

        
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 z-10 flex items-center gap-2">
            <template x-for="i in totalSlides" :key="i">
                <button @click="goTo(i - 1)"
                        class="carousel-dot"
                        :class="{ 'active': current === (i - 1) }"
                        :aria-label="'Go to slide ' + i"></button>
            </template>
        </div>

        
        <div class="carousel-progress-bar">
            <div class="carousel-progress-fill" :style="'width: ' + progress + '%'"></div>
        </div>
    </div>
</section>



<section class="bg-sand-100 py-12" id="categories-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-10 animate-cinematic delay-100 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-2">
            <div>
                <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-1">CATEGORIES & GEAR</span>
                <h2 class="text-3xl font-black text-navy-900 tracking-tight leading-none">JELAJAHI KATEGORI</h2>
            </div>
            <a href="<?php echo e(route('categories.index')); ?>" class="text-xs font-black text-navy-800 uppercase tracking-widest hover:text-teal-600 transition-colors flex items-center gap-1">
                Jelajahi Semua 
            </a>
        </div>

        <!-- Asymmetric Showcase Grid (Compact version: Left h-[280px], Right h-[128px] each) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-cinematic delay-200">
            <?php if($categories->count() > 0): ?>
                <?php $firstCategory = $categories->first(); ?>
                <!-- Left Column: Big Card (height: 280px) -->
                <div class="md:col-span-2">
                    <a href="<?php echo e(route('products.index', ['search' => $firstCategory->name])); ?>" 
                       class="collection-card group bg-navy-900 relative block overflow-hidden rounded-[16px] h-[280px] shadow-sm">
                        
                        <img src="<?php echo e(asset($firstCategory->image)); ?>" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                             alt="<?php echo e($firstCategory->name); ?>" />
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/20 to-transparent transition-opacity duration-300 group-hover:from-navy-950/80 z-10"></div>

                        <!-- Content Container -->
                        <div class="collection-card-content text-left p-6">
                            <h3 class="text-2xl font-black text-white leading-none uppercase tracking-tight"><?php echo e($firstCategory->name); ?></h3>
                            
                            <!-- Hover-only Details -->
                            <p class="collection-card-description text-xs text-sand-300 font-medium leading-relaxed">
                                <?php echo e($firstCategory->description); ?>

                            </p>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <!-- Right Column: 2 Stacked Cards (Each height: 128px) -->
            <?php if($categories->count() > 1): ?>
                <div class="md:col-span-1 flex flex-col gap-6">
                    <?php $__currentLoopData = $categories->slice(1, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('products.index', ['search' => $category->name])); ?>" 
                           class="collection-card group bg-navy-900 relative block overflow-hidden rounded-[16px] h-[128px] shadow-sm">
                            
                            <img src="<?php echo e(asset($category->image)); ?>" 
                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                                 alt="<?php echo e($category->name); ?>" />
                            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/20 to-transparent transition-opacity duration-300 group-hover:from-navy-950/80 z-10"></div>
                            
                            <div class="collection-card-content text-left p-4">
                                <h3 class="text-lg font-black text-white leading-none uppercase tracking-tight"><?php echo e($category->name); ?></h3>
                                
                                <!-- Hover-only Details -->
                                <p class="collection-card-description text-[11px] text-sand-300 font-medium leading-normal">
                                    <?php echo e($category->description); ?>

                                </p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<section class="py-12 bg-sand-100" id="flash-sale-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        
        <div class="bg-navy-900 rounded-t-[16px] px-6 sm:px-8 py-5 border border-teal-500/10 animate-cinematic delay-200">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] bg-coral-500 text-navy-900 font-black uppercase px-2.5 py-1 rounded-[4px] tracking-widest animate-pulse">⚡ LIVE</span>
                        <h3 class="text-lg sm:text-xl font-black text-white tracking-tight">KILAT DEALS</h3>
                    </div>

                    
                    <div class="flex items-center gap-1"
                         x-data="{
                            hours: '00', minutes: '00', seconds: '00',
                            init() {
                                this.updateTimer();
                                setInterval(() => this.updateTimer(), 1000);
                            },
                            updateTimer() {
                                const now = new Date();
                                const midnight = new Date(now);
                                midnight.setHours(24, 0, 0, 0);
                                const diff = midnight - now;
                                const h = Math.floor(diff / 3600000);
                                const m = Math.floor((diff % 3600000) / 60000);
                                const s = Math.floor((diff % 60000) / 1000);
                                this.hours = String(h).padStart(2, '0');
                                this.minutes = String(m).padStart(2, '0');
                                this.seconds = String(s).padStart(2, '0');
                            }
                         }">
                        <span class="flash-sale-timer-digit bg-white/5 border border-white/10 rounded-[4px]" x-text="hours"></span>
                        <span class="flash-sale-separator">:</span>
                        <span class="flash-sale-timer-digit bg-white/5 border border-white/10 rounded-[4px]" x-text="minutes"></span>
                        <span class="flash-sale-separator">:</span>
                        <span class="flash-sale-timer-digit bg-white/5 border border-white/10 rounded-[4px]" x-text="seconds"></span>
                    </div>
                </div>

                <a href="<?php echo e(route('products.index')); ?>" class="text-xs font-bold text-white uppercase tracking-widest hover:text-teal-300 flex items-center gap-1 transition-colors shrink-0">
                    Lihat Semua 
                </a>
            </div>
        </div>

        
        <div class="bg-white rounded-b-[16px] border border-t-0 border-sand-200 p-5 shadow-[0_8px_24px_rgba(11,19,43,0.04)] animate-cinematic delay-300">
            <div class="scroll-container gap-4 animate-scroll">
                <?php $__empty_1 = true; $__currentLoopData = $products->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $locations = ['Kota Jakarta Utara', 'Kota Surabaya', 'Kota Makassar', 'Kota Ambon', 'Kota Medan'];
                        $storeLocation = $locations[$product->store->id % 5] ?? 'Indonesia';
                    ?>
                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="group block w-36 sm:w-40 flex-shrink-0">
                        <div class="flex flex-col h-full">
                            
                            <div class="relative aspect-square w-full rounded-[12px] bg-sand-200 overflow-hidden border border-sand-300/40 group-hover:shadow-warm-lg transition-all duration-300">
                                <?php if($product->image_url): ?>
                                    <img src="<?php echo e(\Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : (\Illuminate\Support\Str::startsWith($product->image_url, 'images/') ? asset($product->image_url) : asset('storage/' . $product->image_url))); ?>"
                                         alt="<?php echo e($product->name); ?>"
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103"
                                         loading="lazy">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sand-100 to-sand-200">
                                        <svg class="w-8 h-8 text-sand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                <?php endif; ?>

                                
                                <div class="absolute top-2 left-2">
                                    <span class="bg-coral-500 text-white text-[8px] font-black tracking-wider uppercase px-1.5 py-0.5 rounded-[3px]"><?php echo e([10, 15, 20, 25, 30, 35, 40, 50][$index % 8]); ?>% OFF</span>
                                </div>
                            </div>

                            
                            <div class="text-left flex flex-col flex-grow mt-3">
                                <h4 class="text-[11px] font-bold text-navy-900 leading-snug line-clamp-2 mb-1 group-hover:text-teal-600 transition-colors"><?php echo e($product->name); ?></h4>

                                
                                <div class="flex-grow"></div>

                                <div class="mt-2">
                                    
                                    <div class="flex items-center gap-1.5 mb-2 bg-sand-100/60 px-2 py-1 rounded-[6px] w-fit">
                                        <svg class="w-3.5 h-3.5 text-amber-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-xs font-extrabold text-navy-900"><?php echo e(number_format($product->rating, 1)); ?></span>
                                        <span class="text-xs text-sand-400">|</span>
                                        <span class="text-[11px] text-sand-600 font-semibold"><?php echo e(number_format($product->sold_count)); ?> terjual</span>
                                    </div>

                                    <?php
                                        $discountPercent = [10, 15, 20, 25, 30, 35, 40, 50][$index % 8];
                                        $discountedPrice = $product->price * (1 - $discountPercent / 100);
                                    ?>
                                    <div class="flex flex-col mb-2">
                                        <span class="text-[10px] text-sand-400 line-through leading-none">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
                                        <span class="text-xs font-black text-coral-500 mt-1 leading-none">Rp <?php echo e(number_format($discountedPrice, 0, ',', '.')); ?></span>
                                    </div>

                                    
                                    <div class="relative h-4 overflow-hidden text-[9px] text-sand-500 font-bold uppercase tracking-widest">
                                        <div class="absolute inset-0 transition-transform duration-300 transform group-hover:-translate-y-full flex items-center">
                                            <?php echo e($product->store->name); ?>

                                        </div>
                                        <div class="absolute inset-0 transition-transform duration-300 transform translate-y-full group-hover:translate-y-0 text-teal-600 flex items-center gap-0.5">
                                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <?php echo e($storeLocation); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="w-full py-8 text-center">
                        <p class="text-sand-500 text-sm font-medium">Belum ada produk flash sale.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>



<section class="bg-sand-50 py-16" id="products-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-10 animate-cinematic delay-300 gap-4">
            <div>
                <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-1">DISCOVER MORE</span>
                <h2 class="text-3xl font-black text-navy-900 tracking-tight leading-none">REKOMENDASI PRODUK</h2>
            </div>
            <a href="<?php echo e(route('products.index')); ?>" class="text-xs font-black text-navy-800 uppercase tracking-widest hover:text-teal-600 transition-colors flex items-center gap-1">
                Jelajahi Semua 
            </a>
        </div>

        <!-- Grid (Tokopedia style) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 gap-y-8 animate-cinematic delay-400">
            <?php $__empty_1 = true; $__currentLoopData = $products ?? collect(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $locations = ['Kota Jakarta Utara', 'Kota Surabaya', 'Kota Makassar', 'Kota Ambon', 'Kota Medan'];
                    $storeLocation = $locations[$product->store->id % 5] ?? 'Indonesia';
                ?>
                <a href="<?php echo e(route('products.show', $product->id)); ?>" class="group block" id="product-card-<?php echo e($product->id); ?>">
                    <div class="flex flex-col h-full ">
                        
                        <div class="relative aspect-square w-full bg-sand-200 rounded-[12px] overflow-hidden border border-sand-300/40 group-hover:shadow-warm-lg transition-all duration-300">
                            <?php if($product->image_url): ?>
                                <img src="<?php echo e(\Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : (\Illuminate\Support\Str::startsWith($product->image_url, 'images/') ? asset($product->image_url) : asset('storage/' . $product->image_url))); ?>"
                                     alt="<?php echo e($product->name); ?>"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103"
                                     loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sand-100 to-sand-200">
                                    <svg class="w-8 h-8 text-sand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            <?php endif; ?>

                            <?php if($product->stock == 0): ?>
                                <div class="absolute inset-0 bg-navy-900/60 flex items-center justify-center">
                                    <span class="bg-navy-900 text-white text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded-[4px] border border-sand-600">HABIS</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="text-left flex flex-col flex-grow mt-3">
                            <h3 class="text-xs font-bold text-navy-900 leading-snug mb-1 group-hover:text-teal-600 transition-colors line-clamp-2">
                                <?php echo e($product->name); ?>

                            </h3>

                            <div class="flex-grow"></div>

                            <div class="mt-2">
                                
                                <div class="flex items-center gap-1.5 mb-2 bg-sand-100/60 px-2 py-1 rounded-[6px] w-fit">
                                    <svg class="w-3.5 h-3.5 text-amber-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <span class="text-xs font-extrabold text-navy-900"><?php echo e(number_format($product->rating, 1)); ?></span>
                                    <span class="text-xs text-sand-400">|</span>
                                    <span class="text-[11px] text-sand-600 font-semibold"><?php echo e(number_format($product->sold_count)); ?> terjual</span>
                                </div>

                                <p class="text-xs font-black text-coral-500 mb-2">
                                    Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                                </p>

                                
                                <div class="relative h-4 overflow-hidden text-[9px] text-sand-500 font-bold uppercase tracking-widest">
                                    <div class="absolute inset-0 transition-transform duration-300 transform group-hover:-translate-y-full flex items-center">
                                        <?php echo e($product->store->name); ?>

                                    </div>
                                    <div class="absolute inset-0 transition-transform duration-300 transform translate-y-full group-hover:translate-y-0 text-teal-600 flex items-center gap-0.5">
                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <?php echo e($storeLocation); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full py-16 text-center">
                    <div class="mx-auto w-12 h-12 bg-sand-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <p class="text-sand-600 font-semibold text-sm">Belum ada produk yang tersedia saat ini.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if(($products ?? collect())->count() > 0): ?>
            <div class="text-center mt-14 animate-cinematic delay-500">
                <a href="<?php echo e(route('products.index')); ?>" id="load-more-btn" class="btn btn-outline hover:-translate-y-0.5 text-xs rounded-[8px]">
                    LIHAT SEMUA PRODUK
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>


<section class="bg-sand-200 py-16 border-t border-sand-300" id="reviews-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ showForm: false }">
        
        <!-- Split Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <!-- Left Column: Sticky Rating Summary & Call to Action -->
            <div class="lg:sticky lg:top-24 bg-white rounded-[24px] p-8 border border-sand-200 shadow-warm-lg flex flex-col justify-between gap-6 animate-cinematic">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-2">TESTIMONIALS</span>
                    <h2 class="text-3xl font-black text-navy-900 tracking-tight leading-tight mb-4">
                        Suara Pengguna SEAPEDIA
                    </h2>
                    <p class="text-xs text-sand-500 font-semibold leading-relaxed mb-6">
                        Ulasan nyata dari para pembeli dan penjual terverifikasi di ekosistem kemaritiman Seapedia.
                    </p>
                    
                    <!-- Review Stats Block -->
                    <div class="flex items-center gap-4 bg-sand-50 p-4 rounded-[16px] border border-sand-100">
                        <div class="text-4xl font-black text-navy-900 leading-none">4.9</div>
                        <div class="flex flex-col">
                            <div class="flex items-center text-amber-400 gap-0.5 mb-1">
                                <!-- 5 Stars -->
                                <?php for($i=0; $i<5; $i++): ?>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <?php endfor; ?>
                            </div>
                            <span class="text-[10px] text-sand-500 font-bold uppercase tracking-wider">Rating Rata-Rata</span>
                        </div>
                    </div>
                </div>

                <!-- Call To Action Button -->
                <button @click="showForm = true" 
                        class="group relative overflow-hidden btn btn-secondary w-full py-4 text-xs font-black tracking-widest rounded-[12px] flex items-center justify-center gap-2 hover:bg-teal-700 transition-all duration-300 shadow-md">
                    <!-- Icon -->
                    <svg class="w-4 h-4 text-teal-400 group-hover:text-white group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                    <span>BAGIKAN PENGALAMANMU</span>
                    
                    <!-- Decorative overlay pulse background -->
                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </button>
            </div>

            <!-- Right Column: Testimonial Grid -->
            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6 animate-cinematic delay-100">
                <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group relative card card-hover flex flex-col justify-between p-8 bg-white rounded-[20px] border border-sand-200 shadow-warm-md hover:border-teal-500/30 overflow-hidden">
                        <!-- Large quote background -->
                        <div class="absolute -right-4 -top-8 text-[120px] font-black text-teal-500/[0.04] select-none pointer-events-none group-hover:text-teal-500/[0.08] transition-colors duration-300 font-serif">
                            “
                        </div>

                        <div class="relative z-10">
                            <!-- Rating Stars -->
                            <div class="flex items-center gap-1.5 mb-4">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <svg class="w-3.5 h-3.5 <?php echo e($i <= $review->rating ? 'text-amber-400 fill-amber-400' : 'text-sand-300'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>

                            <!-- Comment -->
                            <p class="text-xs sm:text-sm text-navy-800 font-medium leading-relaxed mb-6 group-hover:text-navy-950 transition-colors">
                                "<?php echo e($review->comment); ?>"
                            </p>
                        </div>

                        <!-- Reviewer Info -->
                        <div class="relative z-10 flex items-center gap-3 border-t border-sand-100 pt-4">
                            <!-- Gradient Avatar -->
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-teal-600 to-teal-500 text-white flex items-center justify-center font-black text-xs uppercase shadow-inner">
                                <?php echo e(substr($review->reviewer_name, 0, 1)); ?>

                            </div>
                            <div>
                                <h4 class="text-[11px] font-black text-navy-900 uppercase tracking-widest"><?php echo e($review->reviewer_name); ?></h4>
                                <span class="inline-flex items-center gap-1 mt-0.5 text-[9px] text-teal-600 font-extrabold uppercase tracking-wider">
                                    <svg class="w-3 h-3 text-teal-500 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                                    Pengguna Terverifikasi
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-12 bg-white rounded-[20px] border border-sand-200 shadow-warm-sm">
                        <svg class="w-10 h-10 text-sand-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                        <p class="text-sand-500 text-sm font-medium">Belum ada review untuk ditampilkan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Custom Review Modal Window -->
        <div x-show="showForm" 
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;"
             aria-labelledby="modal-title" 
             role="dialog" 
             aria-modal="true"
             x-cloak>
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                
                <!-- Backdrop overlay -->
                <div x-show="showForm"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="showForm = false"
                     class="fixed inset-0 bg-navy-950/60 backdrop-blur-sm transition-opacity" 
                     aria-hidden="true"></div>

                <!-- Spacer to center modal on desktop -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal panel -->
                <div x-show="showForm"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative inline-block align-bottom bg-white rounded-[24px] px-6 pt-6 pb-6 text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-8 border border-sand-200">
                    
                    <!-- Close Button -->
                    <button @click="showForm = false" class="absolute top-4 right-4 p-2 rounded-full text-sand-400 hover:text-navy-900 hover:bg-sand-100 transition-colors focus:outline-none" aria-label="Tutup">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>

                    <div class="sm:flex sm:items-start">
                        <div class="w-full text-left">
                            <h3 class="text-xl font-black text-navy-900 uppercase tracking-tight mb-2" id="modal-title">
                                Bagikan Cerita Belanjamu
                            </h3>
                            <p class="text-xs text-sand-500 font-semibold mb-6">
                                Ulasan jujur Anda sangat membantu pengguna lain di Seapedia dan mendukung pengembangan mitra kami.
                            </p>
                            
                            <form action="<?php echo e(route('reviews.store')); ?>" method="POST" class="space-y-5">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <label for="reviewer_name" class="label">Nama Lengkap</label>
                                    <input type="text" name="reviewer_name" id="reviewer_name" required class="input" placeholder="Masukkan nama Anda (misal: Budi Santoso)">
                                </div>
                                
                                <!-- Interactive Star Rating Selector -->
                                <div x-data="{ rating: 5, hoverRating: 0 }">
                                    <label class="label">Rating Pengalaman Anda</label>
                                    <div class="flex items-center gap-3 mt-2 bg-sand-50 border border-sand-200/60 p-3 rounded-[12px]">
                                        <input type="hidden" name="rating" :value="rating" required>
                                        <div class="flex items-center gap-1.5">
                                            <template x-for="star in 5" :key="star">
                                                <button type="button" 
                                                        @click="rating = star"
                                                        @mouseenter="hoverRating = star"
                                                        @mouseleave="hoverRating = 0"
                                                        class="focus:outline-none transition-transform duration-100 hover:scale-125">
                                                    <svg class="w-8 h-8 transition-colors duration-200" 
                                                         :class="(hoverRating ? star <= hoverRating : star <= rating) ? 'text-amber-400 fill-amber-400' : 'text-sand-300 fill-none'"
                                                         stroke="currentColor" 
                                                         viewBox="0 0 24 24" 
                                                         stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.173-.436.802-.436.975 0l2.682 5.432 5.986.87c.594.086.83.814.398 1.233l-4.331 4.22 1.02 5.961c.1.587-.516 1.033-1.04.757L12 18.354l-5.32 2.798c-.524.276-1.139-.17-.101-.757L7.6 15.222l-4.33-4.22c-.432-.42-.196-1.147.398-1.233l5.986-.87 2.682-5.432Z" />
                                                    </svg>
                                                </button>
                                            </template>
                                        </div>
                                        <span class="text-xs font-black text-navy-800 ml-1 uppercase tracking-wider" 
                                              x-text="hoverRating ? 
                                                      ['Sangat Kecewa', 'Kurang Puas', 'Biasa Saja', 'Puas', 'Sangat Puas'][hoverRating - 1] : 
                                                      ['Sangat Kecewa', 'Kurang Puas', 'Biasa Saja', 'Puas', 'Sangat Puas'][rating - 1]">
                                        </span>
                                    </div>
                                </div>

                                <div>
                                    <label for="comment" class="label">Ulasan Detail</label>
                                    <textarea name="comment" id="comment" rows="4" required class="input" placeholder="Tuliskan ulasan jujur Anda tentang pelayanan, produk, atau transaksi..."></textarea>
                                </div>
                                <div class="pt-2 flex gap-3">
                                    <button type="button" @click="showForm = false" class="w-1/3 btn btn-outline py-3.5 text-xs font-black tracking-widest rounded-[10px]">BATAL</button>
                                    <button type="submit" class="w-2/3 btn btn-primary py-3.5 text-xs font-black tracking-widest rounded-[10px]">KIRIM ULASAN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/home.blade.php ENDPATH**/ ?>