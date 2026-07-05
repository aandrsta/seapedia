@extends('layouts.app')

@section('title', 'Katalog Produk - SEAPEDIA')

@section('content')
<!-- Hero Header for Catalog -->
<div class="bg-navy-800 text-white pt-16 pb-12 relative overflow-hidden animate-cinematic">
    <div class="absolute inset-0 dot-pattern-dark opacity-50"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <h1 class="text-4xl sm:text-5xl font-black tracking-tight mb-4">Katalog <span class="text-teal-400">Pilihan</span></h1>
        <p class="text-lg text-sand-300 max-w-2xl font-medium">Temukan penawaran terbaik dari kreator dan penjual independen di seluruh ekosistem.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Products Grid (Editorial Style) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-12">
        @forelse($products as $index => $product)
            @php
                $locations = ['Kota Jakarta Utara', 'Kota Surabaya', 'Kota Makassar', 'Kota Ambon', 'Kota Medan'];
                $storeLocation = $locations[$product->store->id % 5] ?? 'Indonesia';
            @endphp
            <a href="{{ route('products.show', $product->id) }}" class="group block animate-cinematic" style="animation-delay: {{ 200 + ($index * 100) }}ms;">
                <div class="flex flex-col h-full">
                    <!-- Edge-to-edge Thumbnail (1:1 aspect-square) -->
                    <div class="relative aspect-square w-full rounded-[12px] bg-sand-200 overflow-hidden mb-3 border border-sand-300/40 group-hover:shadow-warm-lg transition-all duration-300">
                        @if($product->image_url)
                            <img src="{{ \Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : (\Illuminate\Support\Str::startsWith($product->image_url, 'images/') ? asset($product->image_url) : asset('storage/' . $product->image_url)) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sand-200 to-sand-300 transition-transform duration-500 group-hover:scale-103">
                                <svg class="w-16 h-16 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif

                        <!-- Stock Status Tag (Absolute positioning) -->
                        @if($product->stock <= 5 && $product->stock > 0)
                            <div class="absolute top-3 left-3 bg-coral-500 text-white text-[9px] font-black uppercase tracking-wider px-2 py-1 rounded-[4px] shadow-warm">
                                Sisa {{ $product->stock }}
                            </div>
                        @elseif($product->stock == 0)
                            <div class="absolute top-3 left-3 bg-sand-800 text-white text-[9px] font-black uppercase tracking-wider px-2 py-1 rounded-[4px] shadow-warm">
                                Habis
                            </div>
                        @endif
                    </div>

                    <!-- Details (Title, Price, then Store Slider on hover) -->
                    <div class="text-left flex flex-col flex-grow mt-3">
                        <!-- Title (sticks to top) -->
                        <h3 class="text-xs font-bold text-navy-800 leading-tight mb-1.5 group-hover:text-teal-700 transition-colors line-clamp-2">
                            {{ $product->name }}
                        </h3>

                        <!-- Rating & Terjual -->
                        <div class="flex items-center gap-1.5 mt-1 mb-2 bg-sand-100/60 px-2 py-1 rounded-[6px] w-fit">
                            <svg class="w-3.5 h-3.5 text-amber-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="text-xs font-extrabold text-navy-900">{{ number_format($product->rating, 1) }}</span>
                            <span class="text-xs text-sand-400">|</span>
                            <span class="text-[11px] text-sand-600 font-semibold">{{ number_format($product->sold_count) }} terjual</span>
                        </div>

                        <!-- Spacer to push price and store down -->
                        <div class="flex-grow"></div>

                        <!-- Price & Store (sticks to bottom) -->
                        <div class="mt-2">
                            <p class="text-xs font-black text-coral-500 mb-2">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            <!-- Store with Sliding Hover -->
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
            <div class="col-span-full py-24 text-center bg-white rounded-[24px] border border-sand-300 shadow-sm animate-cinematic delay-200">
                <div class="w-24 h-24 bg-sand-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-navy-800 mb-2">Koleksi Tidak Ditemukan</h3>
                <p class="text-sand-600 font-medium">Coba gunakan kata kunci pencarian yang berbeda.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
