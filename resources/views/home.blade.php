@extends('layouts.app')

@section('title', 'SEAPEDIA - Marketplace Multi-Peran')

@section('content')

{{-- ═══════════════════════════════════════════════════
     SECTION 1: HERO CAROUSEL
     ═══════════════════════════════════════════════════ --}}
<section class="bg-sand-100 pt-6 pb-8" id="hero-carousel">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-cinematic">
        <div class="carousel-container shadow-warm-xl rounded-[16px] overflow-hidden"
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
            <div class="carousel-track" :style="'transform: translateX(-' + (current * 100) + '%)'">

                {{-- SLIDE 1 — Promo Puncak --}}
                <div class="carousel-slide">
                    <div class="relative bg-navy-900 min-h-[420px] flex items-center overflow-hidden">
                        {{-- Abstract modern visual graphics --}}
                        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-teal-900/40 via-navy-900 to-navy-900"></div>
                        <div class="absolute top-12 right-20 w-80 h-80 bg-teal-500/10 rounded-full blur-[90px] animate-pulse"></div>

                        {{-- Typographic Overlay --}}
                        <div class="relative z-10 px-8 sm:px-16 lg:px-24 py-16 max-w-2xl">
                            <span class="inline-flex items-center gap-1.5 py-1 px-3 bg-teal-500/10 text-teal-400 border border-teal-500/20 text-[9px] font-black uppercase tracking-widest mb-6">
                                SEA-TECH HARBOR / ED.2026
                            </span>
                            <h2 class="text-4xl sm:text-6xl font-black tracking-tighter text-white leading-none mb-6" style="text-wrap: balance;">
                                PROMO PUNCAK<br>
                                <span class="text-teal-400 italic">MARKETPLACE PRIME</span>
                            </h2>
                            <p class="text-sand-400 mb-10 max-w-md font-medium text-xs sm:text-sm leading-relaxed">
                                Temukan ribuan produk pilihan dari berbagai merchant terpercaya. Nikmati kemudahan bertransaksi dengan dompet terintegrasi.
                            </p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg shadow-lg hover:-translate-y-0.5 transition-transform text-xs font-black tracking-widest">
                                SHOP COLLECTION
                            </a>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 — Deep Collection --}}
                <div class="carousel-slide">
                    <div class="relative bg-navy-900 min-h-[420px] flex items-center overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-coral-900/30 via-navy-900 to-navy-900"></div>
                        <div class="absolute bottom-10 right-32 w-72 h-72 bg-coral-500/10 rounded-full blur-[80px]"></div>

                        <div class="relative z-10 px-8 sm:px-16 lg:px-24 py-16 max-w-2xl">
                            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 bg-coral-500/10 text-coral-400 border border-coral-500/20 text-[9px] font-black uppercase tracking-widest mb-6">
                                SPECIAL COLLECTION / DIVE GEAR
                            </span>
                            <h2 class="text-4xl sm:text-6xl font-black tracking-tighter text-white leading-none mb-6" style="text-wrap: balance;">
                                PERALATAN LAUT<br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-coral-400 to-coral-300">PILIHAN PROFESIONAL</span>
                            </h2>
                            <p class="text-sand-400 mb-10 max-w-md font-medium text-xs sm:text-sm leading-relaxed">
                                Lengkapi kebutuhan eksplorasi bawah laut dengan kualitas terbaik dari brand internasional.
                            </p>
                            <a href="{{ route('products.index') }}" class="btn bg-white hover:bg-sand-100 text-navy-950 btn-lg shadow-lg hover:-translate-y-0.5 transition-transform text-xs font-black tracking-widest">
                                EXPLORE PRODUCTS
                            </a>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 3 — Free Shipping --}}
                <div class="carousel-slide">
                    <div class="relative bg-navy-900 min-h-[420px] flex items-center overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-tr from-navy-900 via-navy-900 to-teal-900/30"></div>

                        <div class="relative z-10 px-8 sm:px-16 lg:px-24 py-16 max-w-2xl">
                            <span class="inline-flex items-center gap-1.5 py-1 px-3 bg-teal-500/10 text-teal-400 border border-teal-500/20 text-[9px] font-black uppercase tracking-widest mb-6">
                                FREIGHT LOGISTICS / PROMO
                            </span>
                            <h2 class="text-4xl sm:text-6xl font-black tracking-tighter text-white leading-none mb-6" style="text-wrap: balance;">
                                BEBAS ONGKOS KIRIM<br>
                                <span class="text-teal-400">KE SELURUH INDONESIA</span>
                            </h2>
                            <p class="text-sand-400 mb-10 max-w-md font-medium text-xs sm:text-sm leading-relaxed">
                                Pengiriman logistik kelautan cepat ke berbagai kepulauan tanpa khawatir biaya pengiriman.
                            </p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg shadow-lg hover:-translate-y-0.5 transition-transform text-xs font-black tracking-widest">
                                GET CODE NOW
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Navigation Arrows --}}
            <button @click="prev()" class="carousel-arrow prev bg-navy-900/50 border-teal-500/20 text-white" aria-label="Previous slide">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="next()" class="carousel-arrow next bg-navy-900/50 border-teal-500/20 text-white" aria-label="Next slide">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
            </button>

            {{-- Dot Indicators --}}
            <div class="absolute bottom-5 left-1/2 -translate-x-1/2 z-10 flex items-center gap-2">
                <template x-for="i in totalSlides" :key="i">
                    <button @click="goTo(i - 1)"
                            class="carousel-dot"
                            :class="{ 'active': current === (i - 1) }"
                            :aria-label="'Go to slide ' + i"></button>
                </template>
            </div>

            {{-- Progress Bar --}}
            <div class="carousel-progress-bar">
                <div class="carousel-progress-fill" :style="'width: ' + progress + '%'"></div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════
     SECTION 2: HOVER-DRIVEN CATEGORY SHOWCASE (Original Asymmetric - Compact Height)
     ═══════════════════════════════════════════════════ --}}
<section class="bg-sand-100 py-12" id="categories-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-10 animate-cinematic delay-100 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-2">
            <div>
                <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-1">CATEGORIES & GEAR</span>
                <h2 class="text-3xl font-black text-navy-900 tracking-tight leading-none">JELAJAHI KATEGORI</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-xs font-black text-navy-800 uppercase tracking-widest hover:text-teal-600 transition-colors flex items-center gap-1">
                Jelajahi Semua 
            </a>
        </div>

        <!-- Asymmetric Showcase Grid (Compact version: Left h-[280px], Right h-[128px] each) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-cinematic delay-200">
            
            <!-- Left Column: Big Card (Deep Sea, height: 280px) -->
            <div class="md:col-span-2">
                <a href="{{ route('products.index', ['search' => 'pancing']) }}" 
                   class="collection-card group bg-navy-900 relative block overflow-hidden rounded-[16px] h-[280px] shadow-sm">
                    
                    <!-- Background Image (Zoom on Hover) -->
                    <img src="{{ asset('images/collections/deep-sea.png') }}" 
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                         alt="Deep Sea Gear" />
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/20 to-transparent transition-opacity duration-300 group-hover:from-navy-950/80 z-10"></div>

                    <!-- Content Container -->
                    <div class="collection-card-content text-left p-6">
                        <h3 class="text-2xl font-black text-white leading-none">DEEP SEA GEAR</h3>
                        
                        <!-- Hover-only Details -->
                        <div class="opacity-0 max-h-0 group-hover:opacity-100 group-hover:max-h-20 transition-all duration-300 ease-out overflow-hidden">
                            <p class="text-xs text-sand-300 mt-2">Pancing profesional, sonar laut, jangkar, dan navigasi.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Right Column: 2 Stacked Cards (Each height: 128px, 128 + 24 gap + 128 = 280) -->
            <div class="md:col-span-1 flex flex-col gap-6">
                
                <!-- Card 2: Deck Wear -->
                <a href="{{ route('products.index', ['search' => 'pakaian']) }}" 
                   class="collection-card group bg-navy-900 relative block overflow-hidden rounded-[16px] h-[128px] shadow-sm">
                    
                    <img src="{{ asset('images/collections/deck-wear.png') }}" 
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                         alt="Deck Wear" />
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/20 to-transparent transition-opacity duration-300 group-hover:from-navy-950/80 z-10"></div>
                    
                    <div class="collection-card-content text-left p-4">
                        <h3 class="text-lg font-black text-white leading-none">DECK WEAR</h3>
                        
                        <!-- Hover-only Details -->
                        <div class="opacity-0 max-h-0 group-hover:opacity-100 group-hover:max-h-16 transition-all duration-300 ease-out overflow-hidden">
                            <span class="inline-flex items-center gap-1.5 text-[9px] font-black text-coral-400 uppercase tracking-widest mt-2">LIHAT KOLEKSI &rarr;</span>
                        </div>
                    </div>
                </a>

                <!-- Card 3: Eco Dive -->
                <a href="{{ route('products.index', ['search' => 'selam']) }}" 
                   class="collection-card group bg-navy-900 relative block overflow-hidden rounded-[16px] h-[128px] shadow-sm">
                    
                    <img src="{{ asset('images/collections/eco-dive.png') }}" 
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                         alt="Eco Exploration" />
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/20 to-transparent transition-opacity duration-300 group-hover:from-navy-950/80 z-10"></div>
                    
                    <div class="collection-card-content text-left p-4">
                        <h3 class="text-lg font-black text-white leading-none">ECO EXPLORATION</h3>
                        
                        <!-- Hover-only Details -->
                        <div class="opacity-0 max-h-0 group-hover:opacity-100 group-hover:max-h-16 transition-all duration-300 ease-out overflow-hidden">
                            <span class="inline-flex items-center gap-1.5 text-[9px] font-black text-teal-400 uppercase tracking-widest mt-2">LIHAT KOLEKSI &rarr;</span>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════
     SECTION 3: FLASH SALE
     ═══════════════════════════════════════════════════ --}}
<section class="py-12 bg-sand-100" id="flash-sale-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Flash Sale Header --}}
        <div class="bg-navy-900 rounded-t-[16px] px-6 sm:px-8 py-5 border border-teal-500/10 animate-cinematic delay-200">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] bg-coral-500 text-navy-900 font-black uppercase px-2.5 py-1 rounded-[4px] tracking-widest animate-pulse">⚡ LIVE</span>
                        <h3 class="text-lg sm:text-xl font-black text-white tracking-tight">KILAT DEALS</h3>
                    </div>

                    {{-- Countdown Timer --}}
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

                <a href="{{ route('products.index') }}" class="text-xs font-bold text-white uppercase tracking-widest hover:text-teal-300 flex items-center gap-1 transition-colors shrink-0">
                    Lihat Semua 
                </a>
            </div>
        </div>

        {{-- Flash Sale Products (Horizontal Scroll) --}}
        <div class="bg-white rounded-b-[16px] border border-t-0 border-sand-200 p-5 shadow-[0_8px_24px_rgba(11,19,43,0.04)] animate-cinematic delay-300">
            <div class="scroll-container gap-4 animate-scroll">
                @forelse($products->take(8) as $index => $product)
                    @php
                        $locations = ['Kota Jakarta Utara', 'Kota Surabaya', 'Kota Makassar', 'Kota Ambon', 'Kota Medan'];
                        $storeLocation = $locations[$product->store->id % 5] ?? 'Indonesia';
                    @endphp
                    <a href="{{ route('products.show', $product->id) }}" class="group block w-36 sm:w-40 flex-shrink-0">
                        <div class="flex flex-col h-full">
                            {{-- Image Container (1:1 aspect-square) --}}
                            <div class="relative aspect-square w-full rounded-[12px] bg-sand-200 overflow-hidden border border-sand-300/40 group-hover:shadow-warm-lg transition-all duration-300">
                                @if($product->image_url)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : (\Illuminate\Support\Str::startsWith($product->image_url, 'images/') ? asset($product->image_url) : asset('storage/' . $product->image_url)) }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103"
                                         loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sand-100 to-sand-200">
                                        <svg class="w-8 h-8 text-sand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif

                                {{-- Discount Badge --}}
                                <div class="absolute top-2 left-2">
                                    <span class="bg-coral-500 text-white text-[8px] font-black tracking-wider uppercase px-1.5 py-0.5 rounded-[3px]">{{ [10, 15, 20, 25, 30, 35, 40, 50][$index % 8] }}% OFF</span>
                                </div>
                            </div>

                            {{-- Info (Perfectly Stretched & Sticked) --}}
                            <div class="text-left flex flex-col flex-grow mt-3">
                                <h4 class="text-[11px] font-bold text-navy-900 leading-snug line-clamp-2 mb-1 group-hover:text-teal-600 transition-colors">{{ $product->name }}</h4>

                                {{-- Rating & Terjual --}}
                                <div class="flex items-center gap-1 mb-1">
                                    <svg class="w-2.5 h-2.5 text-amber-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <span class="text-[9px] font-bold text-navy-700">{{ number_format($product->rating, 1) }}</span>
                                    <span class="text-[9px] text-sand-400">·</span>
                                    <span class="text-[9px] text-sand-500">{{ number_format($product->sold_count) }} terjual</span>
                                </div>

                                {{-- Spacer to align bottom section --}}
                                <div class="flex-grow"></div>

                                <div class="mt-2">
                                    <p class="text-xs font-black text-coral-500 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                                    {{-- Store Slider Hover Effect --}}
                                    <div class="relative h-4 overflow-hidden text-[9px] text-sand-500 font-bold uppercase tracking-widest">
                                        <div class="absolute inset-0 transition-transform duration-300 transform group-hover:-translate-y-full flex items-center">
                                            {{ $product->store->name }}
                                        </div>
                                        <div class="absolute inset-0 transition-transform duration-300 transform translate-y-full group-hover:translate-y-0 text-teal-600 flex items-center gap-0.5">
                                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            {{ $storeLocation }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full py-8 text-center">
                        <p class="text-sand-500 text-sm font-medium">Belum ada produk flash sale.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</section>


{{-- ═══════════════════════════════════════════════════
     SECTION 4: PRODUCT SHOWCASE GRID (Flex Stretched & Aligned)
     ═══════════════════════════════════════════════════ --}}
<section class="bg-sand-50 py-16" id="products-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-10 animate-cinematic delay-300 gap-4">
            <div>
                <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-1">DISCOVER MORE</span>
                <h2 class="text-3xl font-black text-navy-900 tracking-tight leading-none">REKOMENDASI PRODUK</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-xs font-black text-navy-800 uppercase tracking-widest hover:text-teal-600 transition-colors flex items-center gap-1">
                Jelajahi Semua 
            </a>
        </div>

        <!-- Grid (Tokopedia style: 6 columns, flex aligned so price/store stick to bottom) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 gap-y-8 animate-cinematic delay-400">
            @forelse($products ?? collect() as $product)
                @php
                    $locations = ['Kota Jakarta Utara', 'Kota Surabaya', 'Kota Makassar', 'Kota Ambon', 'Kota Medan'];
                    $storeLocation = $locations[$product->store->id % 5] ?? 'Indonesia';
                @endphp
                <a href="{{ route('products.show', $product->id) }}" class="group block" id="product-card-{{ $product->id }}">
                    <div class="flex flex-col h-full ">
                        {{-- Thumbnail Container (1:1 square) --}}
                        <div class="relative aspect-square w-full bg-sand-200 rounded-[12px] overflow-hidden border border-sand-300/40 group-hover:shadow-warm-lg transition-all duration-300">
                            @if($product->image_url)
                                <img src="{{ \Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : (\Illuminate\Support\Str::startsWith($product->image_url, 'images/') ? asset($product->image_url) : asset('storage/' . $product->image_url)) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sand-100 to-sand-200">
                                    <svg class="w-8 h-8 text-sand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif

                            @if($product->stock == 0)
                                <div class="absolute inset-0 bg-navy-900/60 flex items-center justify-center">
                                    <span class="bg-navy-900 text-white text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded-[4px] border border-sand-600">HABIS</span>
                                </div>
                            @endif
                        </div>

                        {{-- Card Details (Flex columns) --}}
                        <div class="text-left flex flex-col flex-grow mt-3">
                            {{-- Title (sticks to top of container) --}}
                            <h3 class="text-xs font-bold text-navy-900 leading-snug mb-1 group-hover:text-teal-600 transition-colors line-clamp-2">
                                {{ $product->name }}
                            </h3>

                            {{-- Rating & Terjual --}}
                            <div class="flex items-center gap-1 mb-1">
                                <svg class="w-2.5 h-2.5 text-amber-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <span class="text-[9px] font-bold text-navy-700">{{ number_format($product->rating, 1) }}</span>
                                <span class="text-[9px] text-sand-400">·</span>
                                <span class="text-[9px] text-sand-500">{{ number_format($product->sold_count) }} terjual</span>
                            </div>

                            {{-- Spacer to push price and store to the bottom --}}
                            <div class="flex-grow"></div>

                            {{-- Price & Store (sticks to bottom of container) --}}
                            <div class="mt-2">
                                <p class="text-xs font-black text-coral-500 mb-2">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                {{-- Store Slider Hover Effect --}}
                                <div class="relative h-4 overflow-hidden text-[9px] text-sand-500 font-bold uppercase tracking-widest">
                                    <div class="absolute inset-0 transition-transform duration-300 transform group-hover:-translate-y-full flex items-center">
                                        {{ $product->store->name }}
                                    </div>
                                    <div class="absolute inset-0 transition-transform duration-300 transform translate-y-full group-hover:translate-y-0 text-teal-600 flex items-center gap-0.5">
                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $storeLocation }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-16 text-center">
                    <div class="mx-auto w-12 h-12 bg-sand-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <p class="text-sand-600 font-semibold text-sm">Belum ada produk yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Load More Button --}}
        @if(($products ?? collect())->count() > 0)
            <div class="text-center mt-14 animate-cinematic delay-500">
                <a href="{{ route('products.index') }}" id="load-more-btn" class="btn btn-outline hover:-translate-y-0.5 text-xs rounded-[8px]">
                    LIHAT SEMUA PRODUK
                </a>
            </div>
        @endif

    </div>
</section>

@endsection
