<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['route', 'icon' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['route', 'icon' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<li class="<?php if($icon): ?> px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php else: ?> mb-1 last:mb-0 <?php endif; ?>">
    <a class="block transition duration-150 truncate <?php if(request()->is($route)): ?>) <?php echo e('!text-primary-hover'); ?> <?php endif; ?> hover:text-primary"
        href="<?php echo e(url($route)); ?>">
        <?php if($icon): ?>
            <div class="flex items-center">
                <i class="fa-solid fa-lg <?php echo e($icon); ?> fa-fw"></i>
                <span
                    class="font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e($slot); ?></span>
            </div>
        <?php else: ?>
            <span class="font-medium duration-200"><?php echo e($slot); ?></span>
        <?php endif; ?>
    </a>
</li>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\components\sidebar\sidebar-sublink.blade.php ENDPATH**/ ?>