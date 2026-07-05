@extends('layouts.dashboard')

@section('title', 'Kelola Produk - SEAPEDIA')
@section('page_title', 'Daftar Produk Jualan')

@section('content')
<div class="card p-8 bg-white border border-sand-300 shadow-warm">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-sand-200 mb-6">
        <div>
            <h2 class="text-xl font-bold text-navy-800">Semua Produk</h2>
            <p class="text-xs text-sand-600">Daftar produk yang Anda tawarkan di toko {{ auth()->user()->store->name }}.</p>
        </div>
        <a href="{{ route('seller.products.create') }}" class="btn btn-primary btn-sm self-start sm:self-center">
            + Tambah Produk Baru
        </a>
    </div>

    <!-- Products Table / List -->
    @if($products->isEmpty())
        <div class="text-center py-16 text-sand-500 italic">
            Belum ada produk jualan yang diunggah. Silakan klik tombol di atas untuk menambahkan produk pertama Anda.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-sand-300 bg-sand-100/50">
                        <th class="label px-4 py-3 text-left">Info Produk</th>
                        <th class="label px-4 py-3 text-left">Harga</th>
                        <th class="label px-4 py-3 text-left">Stok</th>
                        <th class="label px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand-200">
                    @foreach($products as $product)
                        <tr class="hover:bg-sand-50/50 transition-colors">
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    @if($product->image_url)
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-sea border border-sand-300">
                                    @else
                                        <div class="w-12 h-12 rounded-sea bg-sand-200 border border-sand-300 flex items-center justify-center text-xs font-bold text-sand-600 uppercase">
                                            {{ substr($product->name, 0, 2) }}
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-sm font-bold text-navy-800 leading-tight mb-1">{{ $product->name }}</p>
                                        <p class="text-xs text-sand-600 line-clamp-1 max-w-sm">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm font-bold text-navy-800">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 text-sm">
                                <span class="font-bold {{ $product->stock === 0 ? 'text-coral-500' : 'text-navy-800' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" target="_blank" class="btn btn-ghost btn-sm border border-sand-400 text-xs px-2.5" title="Lihat di Katalog">
                                        Lihat
                                    </a>
                                    <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-secondary btn-sm text-xs px-2.5">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-ghost btn-sm text-coral-500 hover:bg-coral-50 text-xs px-2.5">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-8 pt-6 border-t border-sand-200">
        <a href="{{ route('dashboard.seller') }}" class="text-sm font-semibold text-navy-600 hover:text-teal-500 transition-colors flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dasbor
        </a>
    </div>
</div>
@endsection
