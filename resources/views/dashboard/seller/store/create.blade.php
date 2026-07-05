@extends('layouts.dashboard')

@section('title', 'Buat Profil Toko - SEAPEDIA')
@section('page_title', 'Daftarkan Toko Baru')

@section('content')
<div class="max-w-2xl">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Pendaftaran Toko Baru</h2>
            <p class="text-xs text-sand-600">Buat identitas unik untuk toko Anda agar dikenal oleh calon pembeli di SEAPEDIA.</p>
        </div>

        <form action="{{ route('seller.store.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Store Name -->
            <div>
                <label for="name" class="label">Nama Toko</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name') }}"
                       class="input @error('name') input-error @enderror" 
                       placeholder="Contoh: Toko Berkah Samudra" required autofocus>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @else
                    <p class="text-[10px] text-sand-500 mt-1">Nama toko bersifat unik dan tidak dapat digunakan oleh toko lain.</p>
                @enderror
            </div>

            <!-- Store Description -->
            <div>
                <label for="description" class="label">Deskripsi Toko</label>
                <textarea id="description" name="description" rows="5" 
                          class="input @error('description') input-error @enderror" 
                          placeholder="Ceritakan tentang toko Anda, barang yang dijual, jam operasional, dll...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-sand-200">
                <a href="{{ route('dashboard.seller') }}" class="btn btn-ghost">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    Daftarkan Toko
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
