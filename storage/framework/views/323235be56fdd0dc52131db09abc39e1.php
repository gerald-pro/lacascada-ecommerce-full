<?php foreach ((['component']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['customAttributes' => [], 'displayMinimisedOnReorder' => true]));

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

foreach (array_filter((['customAttributes' => [], 'displayMinimisedOnReorder' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($component->isTailwind()): ?>
    <tr <?php echo e($attributes
            ->merge($customAttributes)
            ->class(['bg-white dark:bg-gray-700 dark:text-white' => $customAttributes['default'] ?? true])
            ->class(['laravel-livewire-tables-reorderingMinimised'])
            ->except('default')); ?>

    >
        <?php echo e($slot); ?>

    </tr>
<?php elseif($component->isBootstrap()): ?>
    <tr <?php echo e($attributes
            ->merge($customAttributes)
            ->class(['' => $customAttributes['default'] ?? true])
            ->class(['laravel-livewire-tables-reorderingMinimised'])
            ->except('default')); ?>

    >
        <?php echo e($slot); ?>

    </tr>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\tr\plain.blade.php ENDPATH**/ ?>