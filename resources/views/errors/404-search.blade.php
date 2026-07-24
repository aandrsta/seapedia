@extends('layouts.app')

@section('title', 'Pencarian Tidak Ditemukan - SEAPEDIA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 flex flex-col items-center justify-center text-center animate-cinematic">
    
    <!-- Minimalist Empty State Icon -->
    <div class="w-20 h-20 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center mb-8 border border-teal-100 shadow-sm">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637z" />
        </svg>
    </div>

    <!-- Main Message -->
    <h1 class="text-3xl font-black text-navy-900 tracking-tight mb-4">PENCARIAN TIDAK DITEMUKAN</h1>
    <p class="text-sm text-sand-600 max-w-md leading-relaxed font-medium mb-10">
        Maaf, kami tidak dapat menemukan produk kelautan yang cocok dengan kata kunci <strong class="text-navy-900">"{{ request('search') }}"</strong> di sistem kami saat ini.
    </p>

    <!-- Navigation Buttons -->
    <div class="flex flex-col sm:flex-row gap-4">
        <a href="{{ route('home') }}" class="btn btn-primary text-xs font-black tracking-widest uppercase py-3.5 px-8 rounded-[8px]">
            Kembali ke Beranda
        </a>
        <a href="{{ route('products.index') }}" class="btn btn-outline text-xs font-black tracking-widest uppercase py-3.5 px-8 rounded-[8px]">
            Lihat Semua Produk
        </a>
    </div>

</div>
@endsection
