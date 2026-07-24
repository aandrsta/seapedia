<?php $__env->startSection('title', 'Edit Produk - SEAPEDIA'); ?>
<?php $__env->startSection('page_title', 'Perbarui Informasi Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Edit Produk</h2>
            <p class="text-xs text-sand-600">Perbarui rincian produk jualan Anda yang terpajang di katalog SEAPEDIA.</p>
        </div>

        <form action="<?php echo e(route('seller.products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Product Name -->
            <div>
                <label for="name" class="label">Nama Produk</label>
                <input type="text" id="name" name="name" 
                       value="<?php echo e(old('name', $product->name)); ?>"
                       class="input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       placeholder="Contoh: Ikan Kakap Segar Premium" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Price & Stock Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Price -->
                <div>
                    <label for="price" class="label">Harga Jual (Rp)</label>
                    <input type="number" id="price" name="price" 
                           value="<?php echo e(old('price', (int)$product->price)); ?>"
                           class="input <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           placeholder="Contoh: 85000" min="0" required>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="form-error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="label">Jumlah Stok Barang</label>
                    <input type="number" id="stock" name="stock" 
                           value="<?php echo e(old('stock', $product->stock)); ?>"
                           class="input <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           placeholder="Contoh: 50" min="0" required>
                    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="form-error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="label">Deskripsi Lengkap Produk</label>
                <textarea id="description" name="description" rows="4" 
                          class="input <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                          placeholder="Jelaskan kondisi barang, berat, asal tangkapan, dll..."><?php echo e(old('description', $product->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Media Picker with existing preview -->
            <div x-data="mediaPickerEdit('<?php echo e($product->image_url); ?>')" class="space-y-2">
                <label class="label">Foto Produk <span class="text-sand-400 font-normal normal-case tracking-normal">(Opsional)</span></label>

                <!-- Drop Zone -->
                <div
                    @click="if(!removeImage) $refs.fileInput.click()"
                    @dragover.prevent="dragging = true"
                    @dragleave.prevent="dragging = false"
                    @drop.prevent="handleDrop($event)"
                    :class="{
                        'border-teal-400 bg-teal-50/20': dragging,
                        'border-coral-300 bg-coral-50/10 opacity-50 cursor-not-allowed': removeImage,
                        'border-teal-300 bg-teal-50/10': !dragging && !removeImage && (preview || existingUrl),
                        'border-sand-300 hover:border-teal-400 hover:bg-sand-50 cursor-pointer': !dragging && !removeImage && !preview && !existingUrl
                    }"
                    class="relative rounded-[16px] border-2 border-dashed transition-all duration-200 overflow-hidden"
                    style="min-height: 180px;"
                >
                    <!-- Marked for removal overlay -->
                    <template x-if="removeImage">
                        <div class="absolute inset-0 flex flex-col items-center justify-center bg-coral-50/80 z-10 rounded-[14px]">
                            <svg class="w-8 h-8 text-coral-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                            <p class="text-xs font-bold text-coral-600">Foto akan dihapus</p>
                            <button type="button" @click.stop="cancelRemove()" class="mt-2 text-[10px] text-teal-600 font-bold underline underline-offset-2">Batalkan</button>
                        </div>
                    </template>

                    <!-- New preview (just uploaded) -->
                    <template x-if="preview && !removeImage">
                        <div class="relative">
                            <img :src="preview" alt="Preview baru" class="w-full max-h-64 object-cover rounded-[14px]">
                            <div class="absolute top-2 left-2 bg-teal-500 text-white text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded-full">Foto Baru</div>
                            <div class="absolute inset-0 cursor-pointer hover:bg-black/10 transition-colors rounded-[14px]" @click.stop="$refs.fileInput.click()"></div>
                        </div>
                    </template>

                    <!-- Existing image preview -->
                    <template x-if="!preview && existingUrl && !removeImage">
                        <div class="relative">
                            <img :src="existingUrl" alt="Foto saat ini" class="w-full max-h-64 object-cover rounded-[14px]">
                            <div class="absolute top-2 left-2 bg-navy-700 text-white text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded-full">Foto Saat Ini</div>
                            <div class="absolute inset-0 cursor-pointer hover:bg-black/10 transition-colors rounded-[14px] flex items-end justify-center pb-4 opacity-0 hover:opacity-100">
                                <span class="text-white text-xs font-black bg-black/60 px-3 py-1 rounded-full">Klik untuk ganti foto</span>
                            </div>
                            <div class="absolute inset-0 cursor-pointer" @click.stop="$refs.fileInput.click()"></div>
                        </div>
                    </template>

                    <!-- Empty state -->
                    <template x-if="!preview && !existingUrl && !removeImage">
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

                <!-- Error, file info, and action row -->
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div>
                        <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="form-error"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p x-show="fileName" x-text="fileName" class="text-[11px] text-sand-500 font-medium"></p>
                    </div>
                    <div class="flex items-center gap-3 shrink-0">
                        <!-- Clear new upload -->
                        <button type="button"
                                x-show="preview"
                                @click="clearNewUpload()"
                                class="text-[10px] text-sand-500 font-bold hover:text-sand-700 transition-colors flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Batalkan
                        </button>
                        <!-- Remove existing -->
                        <button type="button"
                                x-show="existingUrl && !preview && !removeImage"
                                @click="markRemove()"
                                class="text-[10px] text-coral-500 font-bold hover:text-coral-700 transition-colors flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                            Hapus Foto
                        </button>
                    </div>
                </div>

                <!-- Hidden inputs -->
                <input type="file" x-ref="fileInput" name="product_image" accept="image/jpeg,image/png,image/webp"
                       class="sr-only" @change="handleFile($event)">
                <!-- remove_image flag submitted when user marks current image for deletion -->
                <input type="hidden" name="remove_image" :value="removeImage ? '1' : '0'">
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-sand-200">
                <a href="<?php echo e(route('seller.products.index')); ?>" class="btn btn-ghost">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function mediaPickerEdit(existingUrl) {
    return {
        existingUrl: existingUrl || null,
        preview:     null,
        fileName:    null,
        dragging:    false,
        removeImage: false,

        handleFile(event) {
            const file = event.target.files[0];
            if (file) this.loadPreview(file);
        },

        handleDrop(event) {
            this.dragging = false;
            const file   = event.dataTransfer.files[0];
            if (!file) return;

            const dt = new DataTransfer();
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
                this.clearNewUpload();
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
                this.clearNewUpload();
                return;
            }

            this.removeImage = false;
            this.fileName    = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
            const reader     = new FileReader();
            reader.onload    = (e) => { this.preview = e.target.result; };
            reader.readAsDataURL(file);
        },

        clearNewUpload() {
            this.preview  = null;
            this.fileName = null;
            this.$refs.fileInput.value = '';
        },

        markRemove() {
            this.removeImage = true;
        },

        cancelRemove() {
            this.removeImage = false;
        }
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/dashboard/seller/products/edit.blade.php ENDPATH**/ ?>