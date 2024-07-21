<?php foreach ((['component', 'rowIndex', 'rowID']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['column' => null, 'customAttributes' => [], 'displayMinimisedOnReorder' => false, 'hideUntilReorder' => false]));

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

foreach (array_filter((['column' => null, 'customAttributes' => [], 'displayMinimisedOnReorder' => false, 'hideUntilReorder' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($component->isTailwind()): ?>
    <td x-cloak <?php echo e($attributes
        ->merge($customAttributes)
        ->class(['px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white' => $customAttributes['default'] ?? true])
        ->class(['hidden' => $column && $column->shouldCollapseAlways()])
        ->class(['hidden md:table-cell' => $column && $column->shouldCollapseOnMobile()])
        ->class(['hidden lg:table-cell' => $column && $column->shouldCollapseOnTablet()])
        ->except('default')); ?> <?php if($hideUntilReorder): ?> x-show="reorderDisplayColumn" <?php endif; ?> >
        <?php echo e($slot); ?>

    </td>
<?php elseif($component->isBootstrap()): ?>
    <td <?php echo e($attributes
        ->merge($customAttributes)
        ->class(['' => $customAttributes['default'] ?? true])
        ->class(['d-none' => $column && $column->shouldCollapseAlways()])
        ->class(['d-none d-md-table-cell' => $column && $column->shouldCollapseOnMobile()])
        ->class(['d-none d-lg-table-cell' => $column && $column->shouldCollapseOnTablet()])
        ->except('default')); ?>>
        <?php echo e($slot); ?>

    </td>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\td\plain.blade.php ENDPATH**/ ?>