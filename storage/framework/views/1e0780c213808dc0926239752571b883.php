<?php foreach ((['component', 'row', 'rowIndex', 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['column', 'colIndex']));

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

foreach (array_filter((['column', 'colIndex']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $customAttributes = $component->getTdAttributes($column, $row, $colIndex, $rowIndex)
?>

<td wire:key="<?php echo e($tableName . '-table-td-'.$row->{$this->getPrimaryKey()}.'-'.$column->getSlug()); ?>"
    <?php if($column->isClickable()): ?>
        <?php if($component->getTableRowUrlTarget($row) === "navigate"): ?> wire:navigate href="<?php echo e($component->getTableRowUrl($row)); ?>"
        <?php else: ?> onclick="window.open('<?php echo e($component->getTableRowUrl($row)); ?>', '<?php echo e($component->getTableRowUrlTarget($row) ?? '_self'); ?>')"
        <?php endif; ?>
    <?php endif; ?>
        <?php echo e($attributes->merge($customAttributes)
                ->class(['px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white' => $component->isTailwind() && ($customAttributes['default'] ?? true)])
                ->class(['hidden' =>  $component->isTailwind() && $column && $column->shouldCollapseAlways()])
                ->class(['hidden md:table-cell' => $component->isTailwind() && $column && $column->shouldCollapseOnMobile()])
                ->class(['hidden lg:table-cell' => $component->isTailwind() && $column && $column->shouldCollapseOnTablet()])
                ->class(['' => $component->isBootstrap() && ($customAttributes['default'] ?? true)])
                ->class(['d-none' => $component->isBootstrap() && $column && $column->shouldCollapseAlways()])
                ->class(['d-none d-md-table-cell' => $component->isBootstrap() && $column && $column->shouldCollapseOnMobile()])
                ->class(['d-none d-lg-table-cell' => $component->isBootstrap() && $column && $column->shouldCollapseOnTablet()])
                ->style(['cursor:pointer' => $component->isBootstrap() && $column && $column->isClickable()])
                ->except('default')); ?>

    >
        <?php echo e($slot); ?>

</td>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\td.blade.php ENDPATH**/ ?>