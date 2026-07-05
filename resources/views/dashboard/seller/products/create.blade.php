@extends('layouts.dashboard')

@section('title', 'Tambah Produk Baru - SEAPEDIA')
@section('page_title', 'Unggah Produk Jualan')

@section('content')
<div class="max-w-2xl">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Unggah Produk Baru</h2>
            <p class="text-xs text-sand-600">Isi detail di bawah untuk memublikasikan barang jualan Anda di katalog SEAPEDIA.</p>
        </div>

        <form action="{{ route('seller.products.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" class="label">Nama Produk</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name') }}"
                       class="input @error('name') input-error @enderror" 
                       placeholder="Contoh: Kamera DSLR Nikon D7500" required autofocus>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price & Stock Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Price -->
                <div>
                    <label for="price" class="label">Harga Jual (Rp)</label>
                    <input type="number" id="price" name="price" 
                           value="{{ old('price') }}"
                           class="input @error('price') input-error @enderror" 
                           placeholder="Contoh: 14500000" min="0" required>
                    @error('price')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="label">Jumlah Stok Barang</label>
                    <input type="number" id="stock" name="stock" 
                           value="{{ old('stock') }}"
                           class="input @error('stock') input-error @enderror" 
                           placeholder="Contoh: 15" min="0" required>
                    @error('stock')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="label">Deskripsi Lengkap Produk</label>
                <textarea id="description" name="description" rows="4" 
                          class="input @error('description') input-error @enderror" 
                          placeholder="Jelaskan kondisi barang, kelengkapan, garansi, dll...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image URL -->
            <div>
                <label for="image_url" class="label">URL Gambar Produk (Opsional)</label>
                <input type="url" id="image_url" name="image_url" 
                       value="{{ old('image_url') }}"
                       class="input @error('image_url') input-error @enderror" 
                       placeholder="Contoh: https://example.com/kamera-dslr.jpg">
                @error('image_url')
                    <p class="form-error">{{ $message }}</p>
                @else
                    <p class="text-[10px] text-sand-500 mt-1">Masukkan URL gambar produk yang valid (mulai dengan http:// atau https://).</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-sand-200">
                <a href="{{ route('seller.products.index') }}" class="btn btn-ghost">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    Tambahkan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
