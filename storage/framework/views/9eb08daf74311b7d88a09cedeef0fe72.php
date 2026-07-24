<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => '',
    'highlight' => '',
    'description' => '',
    'type' => 'simple', // 'simple' or 'hero'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => '',
    'highlight' => '',
    'description' => '',
    'type' => 'simple', // 'simple' or 'hero'
]); ?>
<?php foreach (array_filter(([
    'title' => '',
    'highlight' => '',
    'description' => '',
    'type' => 'simple', // 'simple' or 'hero'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($type === 'hero'): ?>
    <div class="bg-sand-200 text-black pt-16 pb-12 relative overflow-hidden animate-cinematic">
        <div class="absolute inset-0 dot-pattern-dark opacity-50"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight mb-4">
                <?php echo e($title); ?> <?php if($highlight): ?><span class="text-teal-400"><?php echo e($highlight); ?></span><?php endif; ?>
            </h1>
            <?php if($description): ?>
                <p class="text-sm text-sand-600 max-w-2xl font-medium mt-3 leading-relaxed">
                    <?php echo e($description); ?>

                </p>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="mb-12 text-left animate-cinematic">
        <h1 class="text-4xl sm:text-5xl font-black tracking-tight mb-4">
            <?php echo e($title); ?> <?php if($highlight): ?><span class="text-teal-400"><?php echo e($highlight); ?></span><?php endif; ?>
        </h1>
        <?php if($description): ?>
            <p class="text-sm text-sand-500 font-medium mt-3 max-w-lg leading-relaxed">
                <?php echo e($description); ?>

            </p>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/dini/Sites/seapedia/resources/views/components/header.blade.php ENDPATH**/ ?>