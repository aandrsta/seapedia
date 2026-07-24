<?php $__env->startSection('title', 'Kelola Produk - SEAPEDIA'); ?>
<?php $__env->startSection('page_title', 'Daftar Produk Jualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="card p-8 bg-white border border-sand-300 shadow-warm">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-sand-200 mb-6">
        <div>
            <h2 class="text-xl font-bold text-navy-800">Semua Produk</h2>
            <p class="text-xs text-sand-600">Daftar produk yang Anda tawarkan di toko <?php echo e(auth()->user()->store->name); ?>.</p>
        </div>
        <a href="<?php echo e(route('seller.products.create')); ?>" class="btn btn-primary btn-sm self-start sm:self-center">
            + Tambah Produk Baru
        </a>
    </div>

    <!-- Products Table / List -->
    <?php if($products->isEmpty()): ?>
        <div class="text-center py-16 text-sand-500 italic">
            Belum ada produk jualan yang diunggah. Silakan klik tombol di atas untuk menambahkan produk pertama Anda.
        </div>
    <?php else: ?>
        <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('thead', null, []); ?> 
                <th class="px-5 py-3.5 text-xs font-semibold text-sand-600 uppercase tracking-wider text-left">Info Produk</th>
                <th class="px-5 py-3.5 text-xs font-semibold text-sand-600 uppercase tracking-wider text-left">Harga</th>
                <th class="px-5 py-3.5 text-xs font-semibold text-sand-600 uppercase tracking-wider text-left">Stok</th>
                <th class="px-5 py-3.5 text-xs font-semibold text-sand-600 uppercase tracking-wider text-right">Aksi</th>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('tbody', null, []); ?> 
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-sand-50/40 transition-colors">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <?php if($product->image_url): ?>
                                    <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="w-11 h-11 object-cover rounded-lg border border-sand-200 shrink-0">
                                <?php else: ?>
                                    <div class="w-11 h-11 rounded-lg bg-sand-100 border border-sand-200 flex items-center justify-center text-xs font-bold text-sand-600 uppercase shrink-0">
                                        <?php echo e(substr($product->name, 0, 2)); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-navy-900 leading-tight truncate"><?php echo e($product->name); ?></p>
                                    <p class="text-xs text-sand-500 line-clamp-1 mt-0.5"><?php echo e($product->description ?? 'Tidak ada deskripsi.'); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 text-sm font-semibold text-navy-900 whitespace-nowrap">
                            Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                        </td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium <?php echo e($product->stock === 0 ? 'bg-coral-50 text-coral-600 border border-coral-200/60' : 'text-navy-800'); ?>">
                                <?php echo e($product->stock); ?>

                            </span>
                        </td>
                        <td class="px-5 py-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?php echo e(route('products.show', $product->id)); ?>" target="_blank" class="btn btn-ghost btn-sm text-xs px-2.5 text-sand-600 hover:text-navy-800" title="Lihat di Katalog">
                                    Lihat
                                </a>
                                <a href="<?php echo e(route('seller.products.edit', $product->id)); ?>" class="btn btn-secondary btn-sm text-xs px-2.5">
                                    Edit
                                </a>
                                
                                <form action="<?php echo e(route('seller.products.destroy', $product->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-ghost btn-sm text-coral-500 hover:bg-coral-50 text-xs px-2.5">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
    <?php endif; ?>

    <div class="mt-8 pt-6 border-t border-sand-200">
        <a href="<?php echo e(route('dashboard.seller')); ?>" class="text-sm font-semibold text-navy-600 hover:text-teal-500 transition-colors flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dasbor
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/dashboard/seller/products/index.blade.php ENDPATH**/ ?>