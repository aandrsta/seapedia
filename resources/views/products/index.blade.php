@extends('layouts.app')

@section('title', 'Katalog Produk - SEAPEDIA')

@section('content')
<!-- Hero Header for Catalog Component -->
<x-header 
    type="hero"
    title="Katalog" 
    highlight="Pilihan" 
    description="Temukan penawaran terbaik dari kreator dan penjual independen di seluruh ekosistem."
/>



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Products Grid (Editorial Style) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-12">
        @forelse($products as $index => $product)
            <x-product-card :product="$product" :index="$index" />
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
