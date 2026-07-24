<?php $__env->startSection('title', 'Dompet Belanja - SEAPEDIA'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-sand-100 py-16 min-h-[calc(100vh-16rem)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ customAmount: '' }">
        
        <!-- Breadcrumb & Header -->
        <div class="mb-8 flex items-center justify-between">
            <a href="<?php echo e(route('profile')); ?>" class="text-xs font-bold text-teal-600 hover:text-teal-500 flex items-center gap-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                Kembali ke Profil
            </a>
        </div>

        <div class="mb-10 text-left animate-cinematic">
            <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-2">SEAPEDIA WALLET</span>
            <h1 class="text-4xl font-black text-navy-800 tracking-tight">Dompet Belanja</h1>
            <p class="text-xs text-sand-500 font-medium mt-1 leading-relaxed">
                Isi saldo dompet digital belanja Anda dan tinjau riwayat seluruh transaksi pembayaran di ekosistem Seapedia.
            </p>
        </div>

        <!-- Alert Component -->
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Side: Balance & Top-up Form -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Balance Display Card -->
                <div class="card p-6 bg-gradient-to-br from-teal-600 to-teal-700 text-white border border-teal-500/30 shadow-warm rounded-[20px] relative overflow-hidden animate-cinematic delay-100">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 16px 16px;"></div>
                    <div class="relative z-10">
                        <span class="text-[9px] font-black uppercase tracking-widest text-teal-200">TOTAL SALDO AKTIF</span>
                        <h2 class="text-3xl font-black mt-1 tracking-tight">
                            Rp <?php echo e(number_format($wallet->balance, 0, ',', '.')); ?>

                        </h2>
                        <div class="mt-8 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-teal-300 rounded-full animate-pulse"></span>
                            <span class="text-[10px] text-teal-100 font-bold uppercase tracking-wider">Siap Digunakan Belanja</span>
                        </div>
                    </div>
                </div>

                <!-- Top-up Form Card -->
                <div class="card p-6 bg-white border border-sand-300 shadow-warm rounded-[20px] animate-cinematic delay-200">
                    <h3 class="text-xs font-black text-navy-900 uppercase tracking-widest mb-4">Pengisian Saldo</h3>
                    
                    <form action="<?php echo e(route('buyer.wallet.topup')); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        
                        <div>
                            <label for="amount" class="label text-sand-400 font-bold uppercase tracking-wider text-[10px]">Nominal (Rp)</label>
                            <input type="number" 
                                   id="amount" 
                                   name="amount" 
                                   x-model.number="customAmount"
                                   class="input <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   placeholder="Contoh: 100000" 
                                   min="10000" 
                                   max="10000000" 
                                   required>
                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="form-error mt-1.5"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Instant Options -->
                        <div class="grid grid-cols-2 gap-2 pt-2">
                            <button type="button" @click="customAmount = 50000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 50.000
                            </button>
                            <button type="button" @click="customAmount = 100000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 100.000
                            </button>
                            <button type="button" @click="customAmount = 250000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 250.000
                            </button>
                            <button type="button" @click="customAmount = 500000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 500.000
                            </button>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-full mt-4 font-black tracking-widest text-[10px] rounded-[12px] shadow-md py-4">
                            PROSES TOP-UP SEKARANG
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side: Wallet History List -->
            <div class="lg:col-span-2 space-y-6">
                <div class="card p-6 bg-white border border-sand-300 shadow-warm rounded-[20px] animate-cinematic delay-200">
                    <h3 class="text-xs font-black text-navy-900 uppercase tracking-widest mb-4">Riwayat Transaksi Dompet</h3>
                    
                    <?php if($transactions->isEmpty()): ?>
                        <div class="text-center py-16 text-sand-400 font-semibold italic text-xs">
                            Belum ada riwayat transaksi dompet digital Anda.
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
                                <th class="text-[10px] font-bold text-navy-600 uppercase tracking-wider px-4 py-3.5">Tanggal &amp; Waktu</th>
                                <th class="text-[10px] font-bold text-navy-600 uppercase tracking-wider px-4 py-3.5">Detail</th>
                                <th class="text-[10px] font-bold text-navy-600 uppercase tracking-wider px-4 py-3.5 text-right">Nominal</th>
                             <?php $__env->endSlot(); ?>

                             <?php $__env->slot('tbody', null, []); ?> 
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-sand-50/30 transition-colors">
                                        <td class="px-4 py-4 text-xs font-semibold text-sand-600">
                                            <?php echo e($transaction->created_at->format('d M Y · H:i')); ?>

                                        </td>
                                        <td class="px-4 py-4">
                                            <!-- Transaction Type Badge -->
                                            <div class="flex items-center gap-2">
                                                <?php if($transaction->type === 'topup'): ?>
                                                    <span class="inline-flex items-center text-[9px] font-black uppercase bg-emerald-500/10 text-emerald-700 border border-emerald-200/50 px-1.5 py-0.5 rounded tracking-wide shrink-0">TOP UP</span>
                                                <?php elseif($transaction->type === 'payment'): ?>
                                                    <span class="inline-flex items-center text-[9px] font-black uppercase bg-navy-500/10 text-navy-700 border border-navy-200/50 px-1.5 py-0.5 rounded tracking-wide shrink-0">PAYMENT</span>
                                                <?php elseif($transaction->type === 'refund'): ?>
                                                    <span class="inline-flex items-center text-[9px] font-black uppercase bg-teal-500/10 text-teal-700 border border-teal-200/50 px-1.5 py-0.5 rounded tracking-wide shrink-0">REFUND</span>
                                                <?php endif; ?>
                                                <span class="text-xs text-navy-900 font-bold leading-tight"><?php echo e($transaction->description); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-xs font-black text-right shrink-0">
                                            <span class="<?php echo e($transaction->type === 'topup' || $transaction->type === 'refund' ? 'text-emerald-600' : 'text-coral-500'); ?>">
                                                <?php echo e($transaction->type === 'topup' || $transaction->type === 'refund' ? '+' : '-'); ?>

                                                Rp <?php echo e(number_format($transaction->amount, 0, ',', '.')); ?>

                                            </span>
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

                        <!-- Pagination -->
                        <div class="mt-6">
                            <?php echo e($transactions->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/buyer/wallet/index.blade.php ENDPATH**/ ?>