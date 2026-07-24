<?php $__env->startSection('title', 'Pendaftaran Kemitraan - SEAPEDIA'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ selectedRole: '' }">
    
    <div class="text-center mb-10">
        <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-2">SEAPEDIA PARTNERSHIP</span>
        <h1 class="text-4xl font-black text-navy-800 tracking-tight">Bergabung Sebagai Mitra</h1>
        <p class="text-xs text-sand-500 mt-2 max-w-md mx-auto leading-relaxed">
            Kembangkan bisnis maritim Anda sendiri atau bantu mengirimkan produk laut berkualitas di ekosistem SEAPEDIA.
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

    <form action="<?php echo e(route('profile.partnership.store')); ?>" method="POST" class="space-y-8">
        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Seller Partnership Card -->
            <label class="relative block cursor-pointer select-none group <?php if(in_array('seller', $roles)): ?> pointer-events-none <?php endif; ?>">
                <input type="radio" name="role" value="seller" class="sr-only"
                       x-model="selectedRole"
                       <?php if(in_array('seller', $roles)): ?> disabled <?php endif; ?>>
                
                <div :class="selectedRole === 'seller' ? 'border-coral-400 bg-coral-50/10 shadow-warm-lg ring-2 ring-coral-400/20' : 'border-sand-300 bg-white hover:border-coral-300'"
                     class="h-full p-6 rounded-[20px] border transition-all duration-300 flex flex-col justify-between min-h-[220px] <?php if(in_array('seller', $roles)): ?> opacity-55 cursor-not-allowed bg-sand-50 <?php endif; ?>">
                    
                    <div>
                        <!-- Header & Icon -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-coral-100 text-coral-500 rounded-[14px]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72M6.75 18h3.5a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-3.5a.75.75 0 00-.75.75v3.75c0 .414.336.75.75.75z" /></svg>
                            </div>

                            <?php if(in_array('seller', $roles)): ?>
                                <span class="text-[9px] bg-coral-50 text-coral-600 px-2 py-0.5 rounded-full font-black uppercase tracking-wider border border-coral-200">Terdaftar</span>
                            <?php else: ?>
                                <!-- Radio indicator -->
                                <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition-all"
                                     :class="selectedRole === 'seller' ? 'border-coral-500 bg-coral-500' : 'border-sand-300 bg-white group-hover:border-coral-300'">
                                    <div class="w-2 h-2 rounded-full bg-white transition-transform"
                                         :class="selectedRole === 'seller' ? 'scale-100' : 'scale-0'"></div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <h3 class="text-lg font-black text-navy-900 uppercase tracking-tight">Mitra Penjual (Seller)</h3>
                        <p class="text-xs text-sand-500 mt-2 leading-relaxed">
                            Mulai pendaftaran toko Anda, kelola katalog produk, edit stok harga, dan kelola orderan transaksi masuk secara mandiri.
                        </p>
                    </div>

                    <?php if(!in_array('seller', $roles)): ?>
                        <span class="text-[10px] text-coral-500 font-bold group-hover:translate-x-1 transition-transform inline-flex items-center gap-1 mt-4">
                            Pilih untuk mendaftar penjual <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
                        </span>
                    <?php endif; ?>
                </div>
            </label>

            <!-- Driver Partnership Card -->
            <label class="relative block cursor-pointer select-none group <?php if(in_array('driver', $roles)): ?> pointer-events-none <?php endif; ?>">
                <input type="radio" name="role" value="driver" class="sr-only"
                       x-model="selectedRole"
                       <?php if(in_array('driver', $roles)): ?> disabled <?php endif; ?>>
                
                <div :class="selectedRole === 'driver' ? 'border-navy-400 bg-navy-50/10 shadow-warm-lg ring-2 ring-navy-400/20' : 'border-sand-300 bg-white hover:border-navy-300'"
                     class="h-full p-6 rounded-[20px] border transition-all duration-300 flex flex-col justify-between min-h-[220px] <?php if(in_array('driver', $roles)): ?> opacity-55 cursor-not-allowed bg-sand-50 <?php endif; ?>">
                    
                    <div>
                        <!-- Header & Icon -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-navy-100 text-navy-600 rounded-[14px]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            </div>

                            <?php if(in_array('driver', $roles)): ?>
                                <span class="text-[9px] bg-navy-50 text-navy-600 px-2 py-0.5 rounded-full font-black uppercase tracking-wider border border-navy-200">Terdaftar</span>
                            <?php else: ?>
                                <!-- Radio indicator -->
                                <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition-all"
                                     :class="selectedRole === 'driver' ? 'border-navy-500 bg-navy-500' : 'border-sand-300 bg-white group-hover:border-navy-300'">
                                    <div class="w-2 h-2 rounded-full bg-white transition-transform"
                                         :class="selectedRole === 'driver' ? 'scale-100' : 'scale-0'"></div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <h3 class="text-lg font-black text-navy-900 uppercase tracking-tight">Mitra Kurir (Driver)</h3>
                        <p class="text-xs text-sand-500 mt-2 leading-relaxed">
                            Mendaftar sebagai kurir logistik pengantaran pesanan produk maritim dan kelola pesanan pengiriman aktif Anda.
                        </p>
                    </div>

                    <?php if(!in_array('driver', $roles)): ?>
                        <span class="text-[10px] text-navy-600 font-bold group-hover:translate-x-1 transition-transform inline-flex items-center gap-1 mt-4">
                            Pilih untuk mendaftar kurir <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
                        </span>
                    <?php endif; ?>
                </div>
            </label>

        </div>

        <!-- Submit CTAs -->
        <div class="flex items-center justify-between pt-6 border-t border-sand-300">
            <a href="<?php echo e(route('profile')); ?>" class="btn btn-ghost">
                Batal &amp; Kembali
            </a>
            
            <button type="submit" 
                    :disabled="selectedRole === ''"
                    :class="selectedRole === '' ? 'opacity-50 cursor-not-allowed bg-sand-400' : 'bg-navy-900 hover:bg-navy-800'"
                    class="btn btn-primary px-8 text-white text-xs font-black tracking-widest uppercase transition-all shadow-md">
                Daftarkan Sebagai Mitra
            </button>
        </div>

    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/profile/partnership.blade.php ENDPATH**/ ?>