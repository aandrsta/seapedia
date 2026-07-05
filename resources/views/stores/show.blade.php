@extends('layouts.app')

@section('title', $store->name . ' - SEAPEDIA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Back Button -->
    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-navy-500 hover:text-teal-500 mb-8 group transition-colors">
        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Katalog
    </a>

    <!-- Store Info Banner -->
    <div class="card p-8 bg-white border border-sand-300 shadow-warm mb-10">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 pb-6 border-b border-sand-200 mb-6">
            <div class="flex items-center gap-4">
                <div class="p-4 bg-teal-500/10 text-teal-600 rounded-full">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-navy-800">{{ $store->name }}</h1>
                    <p class="text-xs text-sand-500 mt-1 uppercase tracking-wider font-semibold">Toko Mandiri Terverifikasi</p>
                </div>
            </div>
        </div>

        <div>
            <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider mb-2">Tentang Toko</h4>
            <p class="text-sm text-sand-700 leading-relaxed max-w-3xl whitespace-pre-line">
                {{ $store->description ?? 'Penjual belum menambahkan deskripsi untuk toko ini.' }}
            </p>
        </div>
    </div>

    <!-- Store Products -->
    <div>
        <h2 class="text-xl font-bold text-navy-800 mb-6">Produk dari Toko Ini</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($store->products as $product)
                <div class="card card-hover overflow-hidden flex flex-col bg-white">
                    <!-- Thumbnail -->
                    <div class="aspect-square bg-sand-300 relative flex items-center justify-center text-sand-500 overflow-hidden">
                        @if($product->image_url)
                            <img src="{{ \Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="object-cover w-full h-full">
                        @else
                            <svg class="w-12 h-12 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 flex-grow flex flex-col">
                        <!-- Title -->
                        <h3 class="text-base font-bold text-navy-800 line-clamp-2 mb-2" title="{{ $product->name }}">
                            {{ $product->name }}
                        </h3>

                        <!-- Price -->
                        <p class="text-lg font-black text-coral-500 mb-2">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        <!-- Description Snippet -->
                        <p class="text-xs text-sand-600 line-clamp-2 mb-4">
                            {{ $product->description ?? 'Tidak ada deskripsi produk.' }}
                        </p>

                        <!-- Stock & Button -->
                        <div class="mt-auto pt-4 border-t border-sand-200 flex items-center justify-between">
                            <span class="text-xs font-semibold {{ $product->stock > 0 ? 'text-emerald-700' : 'text-coral-500' }}">
                                Stok: {{ $product->stock }}
                            </span>
                            
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm rounded-full text-xs font-bold px-4">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 card bg-white text-sand-500 italic">
                    Belum ada produk aktif yang dijual oleh toko ini.
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
