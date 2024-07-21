<?php foreach ((['component', 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['filter', 'filterLayout' => 'popover', 'tableName' => 'table', 'isTailwind' => false, 'isBootstrap' => false, 'isBootstrap4' => false, 'isBootstrap5' => false]));

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

foreach (array_filter((['filter', 'filterLayout' => 'popover', 'tableName' => 'table', 'isTailwind' => false, 'isBootstrap' => false, 'isBootstrap4' => false, 'isBootstrap5' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $customLabelAttributes = $filter->getFilterLabelAttributes();
?>

<?php if($filter->hasCustomFilterLabel() && !$filter->hasCustomPosition()): ?>
    <?php echo $__env->make($filter->getCustomFilterLabel(),['filter' => $filter, 'filterLayout' => $filterLayout, 'tableName' => $tableName, 'isTailwind' => $isTailwind, 'isBootstrap' => $isBootstrap, 'isBootstrap4' => $isBootstrap4, 'isBootstrap5' => $isBootstrap5, 'customLabelAttributes' => $customLabelAttributes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(!$filter->hasCustomPosition()): ?>
    <label for="<?php echo e($tableName); ?>-filter-<?php echo e($filter->getKey()); ?>"

        <?php echo e($attributes->merge($customLabelAttributes)
                ->class(['block text-sm font-medium leading-5 text-gray-700 dark:text-white' => $isTailwind && ($customLabelAttributes['default'] ?? true)])
                ->class(['d-block' => $isBootstrap && $filterLayout == 'slide-down' && ($customLabelAttributes['default'] ?? true)])
                ->class(['mb-2' => $isBootstrap && $filterLayout == 'popover' && ($customLabelAttributes['default'] ?? true)])
                ->except('default')); ?>


    >
        <?php echo e($filter->getName()); ?>

    </label>

<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\filter-label.blade.php ENDPATH**/ ?>