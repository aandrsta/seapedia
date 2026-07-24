<?php $__env->startSection('title', $store->name . ' - SEAPEDIA'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Back Button -->
    <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-1.5 text-sm font-semibold text-navy-500 hover:text-teal-500 mb-8 group transition-colors">
        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Katalog
    </a>

    <!-- Store Info Banner (Clean Modern Light Theme) -->
    <div class="bg-white rounded-[24px] border border-sand-200 shadow-[0_10px_30px_rgba(11,19,43,0.05)] mb-10 p-8 sm:p-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-sand-100">
            <!-- Store Profile Header -->
            <div class="flex items-center gap-5 sm:gap-6">
                <!-- Store Logo / Avatar Container with Pulsing Green Border Ring -->
                <div class="relative group">
                    <div class="absolute -inset-1 rounded-[18px] border-2 border-emerald-500 animate-pulse"></div>
                    <div class="relative w-20 h-20 sm:w-22 sm:h-22 rounded-2xl overflow-hidden shadow-sm shrink-0 bg-sand-50">
                        <?php if($store->logo_url): ?>
                            <img src="<?php echo e($store->logo_url); ?>" alt="<?php echo e($store->name); ?>" class="w-full h-full object-cover">
                        <?php elseif($store->user && $store->user->avatar_url): ?>
                            <img src="<?php echo e($store->user->avatar_url); ?>" alt="<?php echo e($store->name); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full bg-teal-600 text-white flex items-center justify-center font-black text-2xl uppercase">
                                <?php echo e(strtoupper(substr($store->name, 0, 2))); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-4.5 h-4.5 bg-emerald-500 border-2 border-white rounded-full flex items-center justify-center z-10" title="Toko Aktif">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                    </span>
                </div>

                <div class="space-y-1.5">
                    <div class="flex flex-wrap items-center gap-2.5">
                        <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-navy-900 leading-tight"><?php echo e($store->name); ?></h1>
                    </div>

                    
                </div>
            </div>

            <!-- Status Box -->
            <div class="shrink-0 flex items-center gap-3">
                <div class="px-4 py-2 rounded-xl bg-sand-50 border border-sand-200 text-center">
                    <span class="text-[9px] font-black uppercase tracking-widest text-sand-500 block">STATUS</span>
                    <span class="text-xs font-bold text-emerald-700 flex items-center justify-center gap-1.5 mt-0.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Aktif
                    </span>
                </div>
            </div>
        </div>

        <!-- Store Description & Metrics Grid -->
        <div class="pt-6 space-y-6">
            <?php if($store->description): ?>
                <p class="text-xs sm:text-sm text-sand-700 leading-relaxed max-w-3xl font-medium">
                    <?php echo e($store->description); ?>

                </p>
            <?php endif; ?>

            <!-- Soft Light Stat Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">JUMLAH PRODUK</span>
                    <span class="text-base sm:text-lg font-black text-navy-900 mt-0.5 block"><?php echo e($store->products->count()); ?> Items</span>
                </div>
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">RATING TOKO</span>
                    <span class="text-base sm:text-lg font-black text-navy-900 mt-0.5 flex items-center gap-1">
                        ⭐ <?php echo e(number_format($store->products->avg('rating') ?: 5.0, 1)); ?>

                    </span>
                </div>
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">TOTAL TERJUAL</span>
                    <span class="text-base sm:text-lg font-black text-navy-900 mt-0.5 block"><?php echo e($store->products->sum('sold_count')); ?> Produk</span>
                </div>
                <div class="p-4 rounded-2xl bg-sand-50/60 border border-sand-200/80 hover:bg-sand-100/50 transition-colors">
                    <span class="text-[9px] font-black text-sand-500 uppercase tracking-widest block">BERGABUNG SEJAK</span>
                    <span class="text-xs sm:text-sm font-black text-navy-900 mt-1 block"><?php echo e($store->created_at->diffForHumans()); ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Store Products -->
    <div>
        <h2 class="text-xl font-bold text-navy-800 mb-6">Produk dari Toko Ini</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-12">
            <?php $__empty_1 = true; $__currentLoopData = $store->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-card','data' => ['product' => $product,'index' => $index,'bgCard' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index),'bg-card' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $attributes = $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $component = $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full py-24 text-center bg-white rounded-[24px] border border-sand-300 shadow-sm">
                    <div class="w-24 h-24 bg-sand-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-sand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-navy-800 mb-1">Belum Ada Produk</h3>
                    <p class="text-sand-600 font-medium text-xs">Penjual ini belum menambahkan katalog produk jualan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/stores/show.blade.php ENDPATH**/ ?>