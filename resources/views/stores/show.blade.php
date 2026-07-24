@extends('layouts.app')

@section('title', $store->name . ' - SEAPEDIA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Back Button -->
    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-navy-500 hover:text-teal-500 mb-8 group transition-colors">
        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Katalog
    </a>

    <!-- Store Info Banner (Clean Modern Light Theme) -->
    <div class="bg-white rounded-[24px] border border-sand-200 shadow-[0_10px_30px_rgba(11,19,43,0.05)] mb-10 p-8 sm:p-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-sand-100">
            <!-- Store Profile Header -->
            <div class="flex items-center gap-5 sm:gap-6">
                <!-- Store Logo / Avatar Container -->
                <div class="relative group">
                    <div class="w-20 h-20 sm:w-22 sm:h-22 rounded-2xl overflow-hidden border border-sand-300 shadow-sm shrink-0 bg-sand-50">
                        @if($store->logo_url)
                            <img src="{{ $store->logo_url }}" alt="{{ $store->name }}" class="w-full h-full object-cover">
                        @elseif($store->user && $store->user->avatar_url)
                            <img src="{{ $store->user->avatar_url }}" alt="{{ $store->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-teal-600 text-white flex items-center justify-center font-black text-2xl uppercase">
                                {{ strtoupper(substr($store->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-4.5 h-4.5 bg-emerald-500 border-2 border-white rounded-full flex items-center justify-center" title="Toko Aktif">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                    </span>
                </div>

                <div class="space-y-1.5">
                    <div class="flex flex-wrap items-center gap-2.5">
                        <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-navy-900 leading-tight">{{ $store->name }}</h1>
                    </div>

                    
                </div>
            </div>

            <!-- Status Box -->
            <div class="shrink-0 flex items-center gap-3">
                <div class="px-4 py-2 rounded-xl bg-sand-50 border border-sand-200 text-center">
                    <span class="text-[9px] font-black uppercase tracking-widest text-sand-500 block">STATUS</span>
                    <span class="text-xs font-bold text-emerald-700 flex items-center justify-center gap-1.5 mt-0.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Aktif
                    </span>
                </div>
            </div>
        </div>

        <!-- Store Description & Metrics Grid -->
        <div class="pt-6 space-y-6">
            @if($store->description)
                <p class="text-xs sm:text-sm text-sand-700 leading-relaxed max-w-3xl font-medium">
                    {{ $store->description }}
                </p>
            @endif

            <!-- Soft Light Stat Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">JUMLAH PRODUK</span>
                    <span class="text-base sm:text-lg font-black text-navy-900 mt-0.5 block">{{ $store->products->count() }} Items</span>
                </div>
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">RATING TOKO</span>
                    <span class="text-base sm:text-lg font-black text-navy-900 mt-0.5 flex items-center gap-1">
                        ⭐ {{ number_format($store->products->avg('rating') ?: 5.0, 1) }}
                    </span>
                </div>
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">TOTAL TERJUAL</span>
                    <span class="text-base sm:text-lg font-black text-navy-900 mt-0.5 block">{{ $store->products->sum('sold_count') }} Produk</span>
                </div>
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">BERGABUNG SEJAK</span>
                    <span class="text-xs sm:text-sm font-black text-navy-900 mt-1 block">{{ $store->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Store Products -->
    <div>
        <h2 class="text-xl font-bold text-navy-800 mb-6">Produk dari Toko Ini</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-12">
            @forelse($store->products as $index => $product)
                <x-product-card :product="$product" :index="$index" :bg-card="true" />
            @empty
                <div class="col-span-full py-24 text-center bg-white rounded-[24px] border border-sand-300 shadow-sm">
                    <div class="w-24 h-24 bg-sand-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-navy-800 mb-1">Belum Ada Produk</h3>
                    <p class="text-sand-600 font-medium text-xs">Penjual ini belum menambahkan katalog produk jualan.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
