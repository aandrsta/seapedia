@extends('layouts.dashboard')

@section('title', 'Edit Profil Toko - SEAPEDIA')
@section('page_title', 'Perbarui Profil Toko')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Perbarui Profil Toko</h2>
            <p class="text-xs text-sand-600">Sesuaikan informasi profil toko Anda agar pembeli selalu mendapatkan info terbaru.</p>
        </div>

        <form action="{{ route('seller.store.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{ logoPreview: '{{ $store->logo_url }}' }">
            @csrf
            @method('PUT')

            <!-- Store Logo Upload -->
            <div>
                <label class="label">Logo / Foto Toko</label>
                <div class="flex items-center gap-4 mt-2">
                    <div class="w-16 h-16 rounded-xl border border-sand-300 bg-sand-100 flex items-center justify-center overflow-hidden shrink-0">
                        <template x-if="logoPreview">
                            <img :src="logoPreview" alt="{{ $store->name }}" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!logoPreview">
                            <div class="w-full h-full bg-teal-600 text-white flex items-center justify-center text-xl font-black uppercase">
                                {{ strtoupper(substr($store->name, 0, 2)) }}
                            </div>
                        </template>
                    </div>
                    <div>
                        <input type="file" id="logo" name="logo" class="hidden" accept="image/*" @change="
                            const file = $event.target.files[0];
                            if (file) {
                                logoPreview = URL.createObjectURL(file);
                            }
                        ">
                        <label for="logo" class="btn btn-secondary btn-sm text-xs font-bold px-3 py-2 cursor-pointer inline-flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"></path></svg>
                            Ganti Logo Toko
                        </label>
                        <p class="text-[10px] text-sand-500 mt-1">PNG, JPG, WEBP hingga 2MB.</p>
                    </div>
                </div>
                @error('logo')
                    <p class="form-error mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Store Name -->
            <div>
                <label for="name" class="label">Nama Toko</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name', $store->name) }}"
                       class="input @error('name') input-error @enderror" 
                       placeholder="Contoh: Toko Berkah Samudra" required>
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
                          placeholder="Ceritakan tentang toko Anda, barang yang dijual, jam operasional, dll...">{{ old('description', $store->description) }}</textarea>
                @error('description')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-sand-200">
                <a href="{{ route('dashboard.seller') }}" class="btn btn-ghost">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
