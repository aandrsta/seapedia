<?php $__env->startSection('title', 'Buat Profil Toko - SEAPEDIA'); ?>
<?php $__env->startSection('page_title', 'Daftarkan Toko Baru'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full max-w-2xl mx-auto">
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-navy-800 mb-1">Pendaftaran Toko Baru</h2>
            <p class="text-xs text-sand-600">Buat identitas unik untuk toko Anda agar dikenal oleh calon pembeli di SEAPEDIA.</p>
        </div>

        <form action="<?php echo e(route('seller.store.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Store Name -->
            <div>
                <label for="name" class="label">Nama Toko</label>
                <input type="text" id="name" name="name" 
                       value="<?php echo e(old('name')); ?>"
                       class="input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       placeholder="Contoh: Toko Berkah Samudra" required autofocus>
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
                          placeholder="Ceritakan tentang toko Anda, barang yang dijual, jam operasional, dll..."><?php echo e(old('description')); ?></textarea>
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
                    Daftarkan Toko
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/dashboard/seller/store/create.blade.php ENDPATH**/ ?>