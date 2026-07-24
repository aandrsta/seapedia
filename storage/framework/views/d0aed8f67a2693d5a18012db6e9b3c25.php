<?php $__env->startSection('title', $product->name . ' - SEAPEDIA'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Back Button -->
    <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-widest text-navy-600 hover:text-teal-600 mb-8 group transition-colors">
        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        KEMBALI KE KATALOG
    </a>

    <!-- Product Grid Detail Container (Rounded Tokopedia-Style Layout) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left: Image & Actions Stack (2 Columns width on desktop) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Product Card Container -->
            <div class="bg-white rounded-[16px] border border-sand-200 shadow-[0_8px_24px_rgba(11,19,43,0.04)] p-6 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <!-- Thumbnail -->
                    <div class="aspect-square bg-sand-50 rounded-[12px] overflow-hidden flex items-center justify-center border border-sand-200">
                        <?php if($product->image_url): ?>
                            <img src="<?php echo e(\Illuminate\Support\Str::startsWith($product->image_url, ['http://', 'https://']) ? $product->image_url : (\Illuminate\Support\Str::startsWith($product->image_url, 'images/') ? asset($product->image_url) : asset('storage/' . $product->image_url))); ?>" alt="<?php echo e($product->name); ?>" class="object-cover w-full h-full">
                        <?php else: ?>
                            <svg class="w-16 h-16 text-sand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg>
                        <?php endif; ?>
                    </div>

                    <!-- Details -->
                    <div class="flex flex-col justify-between">
                        <div class="space-y-4">
                            <div>
                                <span class="text-[9px] font-black text-teal-600 uppercase tracking-widest block mb-1">RECOMMENDED GEAR</span>
                                <h1 class="text-2xl sm:text-3xl font-black text-navy-900 leading-tight"><?php echo e($product->name); ?></h1>
                            </div>

                            <p class="text-2xl font-black text-navy-900 leading-none">
                                Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                            </p>

                            <!-- Status Badge -->
                            <div class="flex items-center gap-2">
                                <?php if($product->stock > 0): ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold rounded-full bg-emerald-500/10 text-emerald-700 border border-emerald-500/20">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Stok Tersedia: <strong class="font-black text-navy-950"><?php echo e($product->stock); ?></strong>
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold rounded-full bg-coral-500/10 text-coral-700 border border-coral-500/20">
                                        <span class="w-2 h-2 rounded-full bg-coral-500"></span>
                                        Stok Habis
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Description -->
                            <div class="border-t border-sand-100 pt-4">
                                <h3 class="text-[10px] font-black text-navy-900 uppercase tracking-widest mb-1.5">Deskripsi Produk</h3>
                                <p class="text-xs text-sand-600 leading-relaxed whitespace-pre-line">
                                    <?php echo e($product->description ?? 'Tidak ada deskripsi untuk produk ini.'); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Store Info & Checkout Panel Stack (1 Column width on desktop) -->
        <div class="space-y-6">
            
            <!-- Buy Box / Call to Action (Standard design) -->
            <div class="bg-white rounded-[16px] border border-sand-200 shadow-[0_8px_24px_rgba(11,19,43,0.04)] p-6 space-y-4">
                <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">BELI PRODUK</span>
                
                <?php if(auth()->guard()->guest()): ?>
                    <div class="bg-sand-50 p-4 border border-sand-200 text-center space-y-3 rounded-[12px]">
                        <p class="text-xs text-sand-600 font-medium leading-tight">Mulai transaksi instan di SEAPEDIA.</p>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary btn-sm rounded-[8px] text-center">MASUK</a>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary btn-sm rounded-[8px] text-center">DAFTAR</a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if(session('active_role') === 'buyer'): ?>
                        <div class="p-4 bg-teal-50 border border-teal-150 rounded-[12px] space-y-3">
                            <p class="text-[10px] text-teal-800 font-bold leading-normal uppercase tracking-wider">Checkout level 3 tersedia di rilis berikutnya.</p>
                            <button class="btn btn-primary btn-lg w-full rounded-[8px] disabled:opacity-50 disabled:cursor-not-allowed text-xs font-black tracking-widest" disabled>
                                TAMBAH KERANJANG
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="p-4 bg-sand-50 border border-sand-200 rounded-[12px] text-center text-xs">
                            <p class="text-sand-600 font-medium">
                                Anda login sebagai <strong class="uppercase text-navy-900"><?php echo e(session('active_role')); ?></strong>.
                                Pembelian hanya untuk akun <strong>Pembeli</strong>.
                            </p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Redesigned Seller Section Profile Card (Tokopedia-Style rounded-[16px]) -->
            <div class="bg-white rounded-[16px] border border-sand-200 shadow-[0_8px_24px_rgba(11,19,43,0.04)] p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <!-- Seller Store Logo / Avatar Box -->
                    <div class="w-12 h-12 bg-navy-900 text-teal-400 flex items-center justify-center shrink-0 border border-teal-500/20 rounded-[10px] overflow-hidden">
                        <?php if($product->store->logo_url): ?>
                            <img src="<?php echo e($product->store->logo_url); ?>" alt="<?php echo e($product->store->name); ?>" class="w-full h-full object-cover">
                        <?php elseif($product->store->user && $product->store->user->avatar_url): ?>
                            <img src="<?php echo e($product->store->user->avatar_url); ?>" alt="<?php echo e($product->store->name); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full bg-teal-600 text-white flex items-center justify-center font-black text-sm uppercase">
                                <?php echo e(strtoupper(substr($product->store->name, 0, 2))); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">INFORMASI SELLER</span>
                        <a href="<?php echo e(route('stores.show', $product->store->id)); ?>" class="text-sm font-black text-navy-900 hover:text-teal-600 transition-colors uppercase tracking-tight truncate block">
                            <?php echo e($product->store->name); ?>

                        </a>
                       
                    </div>
                </div>

                <p class="text-xs text-sand-600 leading-normal">
                    <?php echo e($product->store->description ?? 'Toko terpercaya penyedia produk kelautan berkualitas di SEAPEDIA.'); ?>

                </p>

                <!-- Store Metrics (Asymmetric clean table/grid layout) -->
                <div class="grid grid-cols-2 gap-4 pt-3 border-t border-sand-100">
                    <div>
                        <span class="text-[9px] font-black text-sand-400 uppercase tracking-widest block">JUMLAH PRODUK</span>
                        <span class="text-xs font-bold text-navy-900"><?php echo e($product->store->products->count()); ?> items</span>
                    </div>
                    <div>
                        <span class="text-[9px] font-black text-sand-400 uppercase tracking-widest block">RATING TOKO</span>
                        <span class="text-xs font-bold text-navy-900 flex items-center gap-1">
                            ⭐ <?php echo e(number_format($product->store->products->avg('rating') ?: 5.0, 1)); ?>

                            <span class="text-[10px] text-sand-400 font-medium">(<?php echo e($product->store->products->sum('sold_count')); ?> Terjual)</span>
                        </span>
                    </div>
                    <div>
                        <span class="text-[9px] font-black text-sand-400 uppercase tracking-widest block">BERGABUNG</span>
                        <span class="text-xs font-bold text-navy-900"><?php echo e($product->store->created_at->diffForHumans()); ?></span>
                    </div>
                    <div>
                        <span class="text-[9px] font-black text-sand-400 uppercase tracking-widest block">STATUS OPERASI</span>
                        <span class="text-xs font-bold text-emerald-600 tracking-wider uppercase flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            AKTIF
                        </span>
                    </div>
                </div>

                <!-- Visit Button (Rounded) -->
                <a href="<?php echo e(route('stores.show', $product->store->id)); ?>" class="btn btn-outline btn-sm w-full rounded-[8px] text-center font-black tracking-widest block py-2.5">
                    KUNJUNGI TOKO
                </a>
            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/products/show.blade.php ENDPATH**/ ?>