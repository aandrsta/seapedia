<?php $__env->startSection('title', 'Edit Profil Toko - SEAPEDIA'); ?>
<?php $__env->startSection('page_title', 'Perbarui Profil Toko'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Perbarui Profil Toko</h2>
            <p class="text-xs text-sand-600">Sesuaikan informasi profil toko Anda agar pembeli selalu mendapatkan info terbaru.</p>
        </div>

        <form action="<?php echo e(route('seller.store.update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{ logoPreview: '<?php echo e($store->logo_url); ?>' }">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Store Logo Upload -->
            <div>
                <label class="label">Logo / Foto Toko</label>
                <div class="flex items-center gap-4 mt-2">
                    <div class="w-16 h-16 rounded-xl border border-sand-300 bg-sand-100 flex items-center justify-center overflow-hidden shrink-0">
                        <template x-if="logoPreview">
                            <img :src="logoPreview" alt="<?php echo e($store->name); ?>" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!logoPreview">
                            <div class="w-full h-full bg-teal-600 text-white flex items-center justify-center text-xl font-black uppercase">
                                <?php echo e(strtoupper(substr($store->name, 0, 2))); ?>

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
                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Store Name -->
            <div>
                <label for="name" class="label">Nama Toko</label>
                <input type="text" id="name" name="name" 
                       value="<?php echo e(old('name', $store->name)); ?>"
                       class="input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       placeholder="Contoh: Toko Berkah Samudra" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error"><?php echo e($message); ?></p>
                <?php else: ?>
                    <p class="text-[10px] text-sand-500 mt-1">Nama toko bersifat unik dan tidak dapat digunakan oleh toko lain.</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Store Description -->
            <div>
                <label for="description" class="label">Deskripsi Toko</label>
                <textarea id="description" name="description" rows="5" 
                          class="input <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                          placeholder="Ceritakan tentang toko Anda, barang yang dijual, jam operasional, dll..."><?php echo e(old('description', $store->description)); ?></textarea>
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

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-sand-200">
                <a href="<?php echo e(route('dashboard.seller')); ?>" class="btn btn-ghost">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/dashboard/seller/store/edit.blade.php ENDPATH**/ ?>