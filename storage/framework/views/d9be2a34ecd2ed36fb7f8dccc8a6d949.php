<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="view-transition" content="same-origin">
    <title><?php echo $__env->yieldContent('title', 'SEAPEDIA - Marketplace Multi-Peran'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind and Alpine via Vite -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="flex flex-col min-h-screen font-sans bg-sand-200 text-navy-800 antialiased">

    <!-- Navbar Component -->
    <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>

    <!-- Flash Alert Component -->
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

    <!-- Toast Notification Container (Alpine.js) -->
    <div x-data class="fixed top-5 right-5 z-[9999] flex flex-col gap-3 max-w-md w-[calc(100%-2.5rem)] pointer-events-none sm:w-full">
        <template x-for="msg in $store.toast.messages" :key="msg.id">
            <div x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
                 class="pointer-events-auto relative overflow-hidden bg-navy-900/95 backdrop-blur-xl border border-navy-700/80 p-4 sm:p-4.5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-start justify-between gap-3.5 text-white">
                
                <div class="flex items-start gap-3.5">
                    <div :class="{
                            'bg-emerald-500/10 text-emerald-400 border-emerald-500/20': msg.type === 'success',
                            'bg-coral-500/10 text-coral-400 border-coral-500/20': msg.type === 'error',
                            'bg-teal-500/10 text-teal-400 border-teal-500/20': msg.type !== 'success' && msg.type !== 'error'
                         }"
                         class="p-2.5 border rounded-xl shrink-0 mt-0.5">
                        <svg x-show="msg.type === 'success'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <svg x-show="msg.type === 'error'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                        <svg x-show="msg.type !== 'success' && msg.type !== 'error'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div class="space-y-0.5">
                        <div class="flex items-center gap-2">
                            <span :class="{
                                    'bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]': msg.type === 'success',
                                    'bg-coral-400 shadow-[0_0_8px_rgba(248,113,113,0.8)]': msg.type === 'error',
                                    'bg-teal-400 shadow-[0_0_8px_rgba(45,212,191,0.8)]': msg.type !== 'success' && msg.type !== 'error'
                                  }"
                                  class="h-2 w-2 rounded-full"></span>
                            <h6 :class="{
                                    'text-emerald-400': msg.type === 'success',
                                    'text-coral-400': msg.type === 'error',
                                    'text-teal-400': msg.type !== 'success' && msg.type !== 'error'
                                }"
                                class="text-[11px] font-extrabold uppercase tracking-widest"
                                x-text="msg.type === 'success' ? 'Berhasil' : (msg.type === 'error' ? 'Peringatan / Error' : 'Informasi')"></h6>
                        </div>
                        <p class="text-xs sm:text-sm font-medium text-sand-100 leading-relaxed" x-text="msg.message"></p>
                    </div>
                </div>

                <button @click="$store.toast.remove(msg.id)" class="p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-white/10 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </template>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer Component -->
    <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/dini/Sites/seapedia/resources/views/layouts/app.blade.php ENDPATH**/ ?>