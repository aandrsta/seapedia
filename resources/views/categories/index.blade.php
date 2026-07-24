@extends('layouts.app')

@section('title', 'Kategori Produk - SEAPEDIA')

@section('content')
<section class="bg-sand-100 py-16 min-h-[calc(100vh-16rem)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Component -->
        <x-header 
            title="Katalog" 
            highlight="Kategori" 
            description="Jelajahi produk maritim kami berdasarkan kategori pilihan untuk mempermudah navigasi belanja Anda."
        />

        <!-- Uniform 3-Column Grid Layout (Large Category Cards) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-cinematic delay-100">
            @forelse($categories as $category)
                <div class="col-span-1">
                    <a href="{{ route('products.index', ['search' => $category->name]) }}" 
                       class="collection-card group bg-navy-900 relative block overflow-hidden rounded-[20px] h-[360px] shadow-warm-lg transition-all duration-300 border border-sand-300/40">
                        
                        <img src="{{ asset($category->image) }}" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                             alt="{{ $category->name }}" />
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/20 to-transparent transition-opacity duration-300 group-hover:from-navy-950/80 z-10"></div>

                        <!-- Content Container -->
                        <div class="collection-card-content text-left p-8">
                            <h3 class="text-2xl font-black text-white leading-none uppercase tracking-tight">{{ $category->name }}</h3>
                            
                            <!-- Hover-only Details -->
                            <p class="collection-card-description text-sm text-sand-300 font-medium leading-relaxed">
                                {{ $category->description }}
                            </p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full py-16 text-center">
                    <p class="text-sand-600 font-semibold text-sm">Tidak ada kategori yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
