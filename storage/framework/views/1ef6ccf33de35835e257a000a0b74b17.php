<?php $__env->startSection('title', 'Seller Dashboard - SEAPEDIA'); ?>
<?php $__env->startSection('page_title', 'Profil Toko'); ?>

<?php $__env->startSection('content'); ?>
<div class="card p-8 bg-white border border-sand-300 shadow-warm">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-sand-200 mb-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-coral-400/10 text-coral-500 rounded-full">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-navy-800">Portal Penjual SEAPEDIA</h2>
                <p class="text-sm text-sand-600">Kelola identitas toko dan kelola produk jualan Anda secara mandiri.</p>
            </div>
        </div>
    </div>

    <!-- Store Profile Status -->
    <?php if(auth()->user()->store): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="md:col-span-2 space-y-4">
                <div class="flex items-center gap-4">
                    <?php if(auth()->user()->store->logo_url): ?>
                        <img src="<?php echo e(auth()->user()->store->logo_url); ?>" alt="<?php echo e(auth()->user()->store->name); ?>" class="w-16 h-16 rounded-xl object-cover border border-sand-300 shadow-sm shrink-0">
                    <?php else: ?>
                        <div class="w-16 h-16 rounded-xl bg-teal-600 text-white flex items-center justify-center font-black text-xl uppercase shrink-0 shadow-sm">
                            <?php echo e(strtoupper(substr(auth()->user()->store->name, 0, 2))); ?>

                        </div>
                    <?php endif; ?>
                    <div>
                        <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider">Nama Toko</h4>
                        <p class="text-xl font-black text-navy-800"><?php echo e(auth()->user()->store->name); ?></p>
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider">Deskripsi Toko</h4>
                    <p class="text-sm text-sand-700 leading-relaxed"><?php echo e(auth()->user()->store->description ?? 'Tidak ada deskripsi toko.'); ?></p>
                </div>
            </div>
            
            <div class="p-5 rounded-sea border border-sand-300 bg-sand-50/50 flex flex-col justify-between">
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider mb-2">Status Pendaftaran</h4>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        Aktif / Terdaftar
                    </span>
                </div>
                <div class="mt-4 flex gap-2">
                    <a href="<?php echo e(route('seller.store.edit')); ?>" class="btn btn-secondary btn-sm w-full">
                        Edit Profil Toko
                    </a>
                </div>
                <p class="text-[10px] text-sand-500 mt-4">Terdaftar sejak <?php echo e(auth()->user()->store->created_at->format('d M Y')); ?></p>
            </div>
        </div>

        <!-- Quick actions / stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6 border-t border-sand-200">
            <div class="card p-6 bg-sand-50/30 border border-sand-300 flex items-center justify-between">
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider mb-1">Daftar Produk</h4>
                    <p class="text-2xl font-black text-navy-800"><?php echo e(auth()->user()->store->products->count()); ?> Produk</p>
                </div>
                <a href="<?php echo e(route('seller.products.index')); ?>" class="btn btn-primary btn-sm">
                    Kelola Produk
                </a>
            </div>

            <div class="card p-6 bg-sand-50/30 border border-sand-300 flex items-center justify-between">
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider mb-1">Pesanan Masuk (Level 4)</h4>
                    <p class="text-2xl font-black text-navy-800">0 Pesanan</p>
                </div>
                <button class="btn btn-ghost btn-sm border border-sand-400 text-xs disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    Lihat Pesanan
                </button>
            </div>
        </div>
    <?php else: ?>
        <!-- Store creation placeholder -->
        <div class="bg-coral-50 border border-coral-200 p-8 rounded-sea mb-8 flex flex-col items-center text-center">
            <svg class="w-12 h-12 text-coral-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <h4 class="text-base font-bold text-navy-800 mb-1">Toko Belum Terdaftar</h4>
            <p class="text-xs text-sand-600 max-w-md mb-4">Anda belum memiliki toko di SEAPEDIA. Silakan buat profil toko Anda terlebih dahulu untuk memulai jualan dan mengelola produk.</p>
            <a href="<?php echo e(route('seller.store.create')); ?>" class="btn btn-primary btn-sm">
                Buat Profil Toko Sekarang
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/dashboard/seller/index.blade.php ENDPATH**/ ?>