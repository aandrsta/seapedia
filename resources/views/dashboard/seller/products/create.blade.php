@extends('layouts.dashboard')

@section('title', 'Tambah Produk Baru - SEAPEDIA')
@section('page_title', 'Unggah Produk Jualan')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Unggah Produk Baru</h2>
            <p class="text-xs text-sand-600">Isi detail di bawah untuk memublikasikan barang jualan Anda di katalog SEAPEDIA.</p>
        </div>

        <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" class="label">Nama Produk</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name') }}"
                       class="input @error('name') input-error @enderror" 
                       placeholder="Contoh: Ikan Kakap Segar Premium" required autofocus>
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
                           placeholder="Contoh: 85000" min="0" required>
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
                           placeholder="Contoh: 50" min="0" required>
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
                          placeholder="Jelaskan kondisi barang, berat, asal tangkapan, dll...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Media Picker -->
            <div x-data="mediaPicker()" class="space-y-2">
                <label class="label">Foto Produk <span class="text-sand-400 font-normal normal-case tracking-normal">(Opsional)</span></label>

                <!-- Drop Zone -->
                <div
                    @click="if(!preview) $refs.fileInput.click()"
                    @dragover.prevent="dragging = true"
                    @dragleave.prevent="dragging = false"
                    @drop.prevent="handleDrop($event)"
                    :class="dragging ? 'border-teal-400 bg-teal-50/20' : (preview ? 'border-teal-300 bg-teal-50/10' : 'border-sand-300 hover:border-teal-400 hover:bg-sand-50 cursor-pointer')"
                    class="relative rounded-[16px] border-2 border-dashed transition-all duration-200 overflow-hidden"
                    style="min-height: 180px;"
                >
                    <!-- Preview state -->
                    <template x-if="preview">
                        <div class="relative">
                            <img :src="preview" alt="Preview" class="w-full max-h-64 object-cover rounded-[14px]">
                            <div class="absolute inset-0 bg-black/0 hover:bg-black/20 transition-colors rounded-[14px] flex items-center justify-center opacity-0 hover:opacity-100">
                                <span class="text-white text-xs font-black uppercase tracking-wider bg-black/50 px-3 py-1.5 rounded-full">Klik untuk ganti</span>
                            </div>
                            <!-- Change photo overlay click -->
                            <div class="absolute inset-0 cursor-pointer" @click.stop="$refs.fileInput.click()"></div>
                        </div>
                    </template>

                    <!-- Empty state -->
                    <template x-if="!preview">
                        <div class="flex flex-col items-center justify-center py-12 px-6 text-center">
                            <div class="w-14 h-14 bg-sand-100 rounded-[14px] flex items-center justify-center mb-4">
                                <svg class="w-7 h-7 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M13.5 10.5h.008v.008H13.5V10.5zm-7.5 0h.008v.008H6V10.5zm10.5 0h.008v.008H16.5V10.5zM3 8.25A.75.75 0 013.75 7.5h16.5a.75.75 0 01.75.75v9a.75.75 0 01-.75.75H3.75a.75.75 0 01-.75-.75v-9z" />
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-navy-700 mb-1">Seret &amp; lepas foto di sini</p>
                            <p class="text-[11px] text-sand-500 font-medium">atau <span class="text-teal-600 font-bold underline underline-offset-2">klik untuk pilih file</span></p>
                            <p class="text-[10px] text-sand-400 mt-2">JPG, PNG, WebP · Maks. 2MB</p>
                        </div>
                    </template>
                </div>

                <!-- Error & action row -->
                <div class="flex items-center justify-between">
                    <div>
                        @error('product_image')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                        <p x-show="fileName" x-text="fileName" class="text-[11px] text-sand-500 font-medium"></p>
                    </div>
                    <button type="button"
                            x-show="preview"
                            @click="clearFile()"
                            class="text-[10px] text-coral-500 font-bold hover:text-coral-700 transition-colors flex items-center gap-1 shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                        Hapus Foto
                    </button>
                </div>

                <!-- Hidden input reference for Alpine -->
                <input type="file" x-ref="fileInput" name="product_image" accept="image/jpeg,image/png,image/webp"
                       class="sr-only" @change="handleFile($event)">
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

@push('scripts')
<script>
function mediaPicker() {
    return {
        preview:  null,
        fileName: null,
        dragging: false,

        handleFile(event) {
            const file = event.target.files[0];
            if (file) this.loadPreview(file);
        },

        handleDrop(event) {
            this.dragging = false;
            const file = event.dataTransfer.files[0];
            if (!file) return;

            // Sync to the named input so the form submits it
            const dt   = new DataTransfer();
            dt.items.add(file);
            this.$refs.fileInput.files = dt.files;

            this.loadPreview(file);
        },

        loadPreview(file) {
            const maxMB = 2;
            const maxSize = maxMB * 1024 * 1024;
            const validTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];

            if (file.type && !validTypes.includes(file.type.toLowerCase())) {
                const msg = 'Format file tidak didukung! Harap unggah foto berformat JPG, PNG, atau WebP.';
                if (window.Alpine && window.Alpine.store('toast')) {
                    window.Alpine.store('toast').add(msg, 'error', 7000);
                } else {
                    alert(msg);
                }
                this.clearFile();
                return;
            }

            if (file.size > maxSize) {
                const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
                const msg = `Ukuran foto (${sizeMB}MB) terlalu besar! Maksimal ukuran foto adalah ${maxMB}MB.`;
                if (window.Alpine && window.Alpine.store('toast')) {
                    window.Alpine.store('toast').add(msg, 'error', 7000);
                } else {
                    alert(msg);
                }
                this.clearFile();
                return;
            }

            this.fileName = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
            const reader  = new FileReader();
            reader.onload = (e) => { this.preview = e.target.result; };
            reader.readAsDataURL(file);
        },

        clearFile() {
            this.preview  = null;
            this.fileName = null;
            this.$refs.fileInput.value = '';
        }
    }
}
</script>
@endpush
@endsection
