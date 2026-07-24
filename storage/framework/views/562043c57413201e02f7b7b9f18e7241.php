<?php if(session('success') || session('error') || session('info') || session('status') || $errors->any()): ?>
    <div class="fixed top-5 right-5 z-[9999] flex flex-col gap-3 max-w-md w-[calc(100%-2.5rem)] pointer-events-none sm:w-full">
        
        
        <?php if(session('success')): ?>
            <div x-data="{ show: true }"
                 x-init="setTimeout(() => show = false, 6000)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
                 class="pointer-events-auto relative overflow-hidden bg-navy-900/95 backdrop-blur-xl border border-navy-700/80 p-4 sm:p-4.5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-start justify-between gap-3.5 text-white">
                
                <div class="flex items-start gap-3.5">
                    <div class="p-2.5 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-xl shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    </div>
                    <div class="space-y-0.5">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
                            <h6 class="text-[11px] font-extrabold uppercase tracking-widest text-emerald-400">Berhasil</h6>
                        </div>
                        <p class="text-xs sm:text-sm font-medium text-sand-100 leading-relaxed">
                            <?php echo e(session('success')); ?>

                        </p>
                    </div>
                </div>
                
                <button @click="show = false" class="p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-white/10 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        <?php endif; ?>

        
        <?php if(session('error')): ?>
            <div x-data="{ show: true }"
                 x-init="setTimeout(() => show = false, 7000)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
                 class="pointer-events-auto relative overflow-hidden bg-navy-900/95 backdrop-blur-xl border border-navy-700/80 p-4 sm:p-4.5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-start justify-between gap-3.5 text-white">
                
                <div class="flex items-start gap-3.5">
                    <div class="p-2.5 bg-coral-500/10 text-coral-400 border border-coral-500/20 rounded-xl shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                    </div>
                    <div class="space-y-0.5">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-coral-400 shadow-[0_0_8px_rgba(248,113,113,0.8)]"></span>
                            <h6 class="text-[11px] font-extrabold uppercase tracking-widest text-coral-400">Terjadi Kesalahan</h6>
                        </div>
                        <p class="text-xs sm:text-sm font-medium text-sand-100 leading-relaxed">
                            <?php echo e(session('error')); ?>

                        </p>
                    </div>
                </div>

                <button @click="show = false" class="p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-white/10 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        <?php endif; ?>

        
        <?php if(session('info')): ?>
            <div x-data="{ show: true }"
                 x-init="setTimeout(() => show = false, 6000)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
                 class="pointer-events-auto relative overflow-hidden bg-navy-900/95 backdrop-blur-xl border border-navy-700/80 p-4 sm:p-4.5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-start justify-between gap-3.5 text-white">
                
                <div class="flex items-start gap-3.5">
                    <div class="p-2.5 bg-teal-500/10 text-teal-400 border border-teal-500/20 rounded-xl shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div class="space-y-0.5">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-teal-400 shadow-[0_0_8px_rgba(45,212,191,0.8)]"></span>
                            <h6 class="text-[11px] font-extrabold uppercase tracking-widest text-teal-400">Informasi</h6>
                        </div>
                        <p class="text-xs sm:text-sm font-medium text-sand-100 leading-relaxed">
                            <?php echo e(session('info')); ?>

                        </p>
                    </div>
                </div>

                <button @click="show = false" class="p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-white/10 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        <?php endif; ?>

        
        <?php if(session('status')): ?>
            <div x-data="{ show: true }"
                 x-init="setTimeout(() => show = false, 6000)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
                 class="pointer-events-auto relative overflow-hidden bg-navy-900/95 backdrop-blur-xl border border-navy-700/80 p-4 sm:p-4.5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-start justify-between gap-3.5 text-white">
                
                <div class="flex items-start gap-3.5">
                    <div class="p-2.5 bg-teal-500/10 text-teal-400 border border-teal-500/20 rounded-xl shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div class="space-y-0.5">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-teal-400 shadow-[0_0_8px_rgba(45,212,191,0.8)]"></span>
                            <h6 class="text-[11px] font-extrabold uppercase tracking-widest text-teal-400">Status</h6>
                        </div>
                        <p class="text-xs sm:text-sm font-medium text-sand-100 leading-relaxed">
                            <?php echo e(session('status')); ?>

                        </p>
                    </div>
                </div>

                <button @click="show = false" class="p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-white/10 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div x-data="{ show: true }"
                 x-init="setTimeout(() => show = false, 8000)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
                 class="pointer-events-auto relative overflow-hidden bg-navy-900/95 backdrop-blur-xl border border-navy-700/80 p-4 sm:p-4.5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-start justify-between gap-3.5 text-white">
                
                <div class="flex items-start gap-3.5">
                    <div class="p-2.5 bg-coral-500/10 text-coral-400 border border-coral-500/20 rounded-xl shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-coral-400 shadow-[0_0_8px_rgba(248,113,113,0.8)]"></span>
                            <h6 class="text-[11px] font-extrabold uppercase tracking-widest text-coral-400">Periksa Input</h6>
                        </div>
                        <ul class="list-disc list-inside text-xs font-medium text-sand-100 space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <button @click="show = false" class="p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-white/10 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>


<?php /**PATH /home/dini/Sites/seapedia/resources/views/components/alert.blade.php ENDPATH**/ ?>