<?php foreach ((['component', 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['row', 'rowIndex']));

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

foreach (array_filter((['row', 'rowIndex']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $customAttributes = $component->getTrAttributes($row, $rowIndex);
?>

<tr
    rowpk='<?php echo e($row->{$component->getPrimaryKey()}); ?>'
    x-on:dragstart.self="currentlyReorderingStatus && dragStart(event)"
    x-on:drop.prevent="currentlyReorderingStatus && dropEvent(event)"
    x-on:dragover.prevent.throttle.500ms="currentlyReorderingStatus && dragOverEvent(event)"
    x-on:dragleave.prevent.throttle.500ms="currentlyReorderingStatus && dragLeaveEvent(event)"
    <?php if($component->hasDisplayLoadingPlaceholder()): ?> 
    wire:loading.remove
    <?php else: ?>
    wire:loading.class.delay="opacity-50 dark:bg-gray-900 dark:opacity-60"
    <?php endif; ?>
    id="<?php echo e($tableName); ?>-row-<?php echo e($row->{$component->getPrimaryKey()}); ?>"
    :draggable="currentlyReorderingStatus"
    wire:key="<?php echo e($tableName); ?>-tablerow-tr-<?php echo e($row->{$component->getPrimaryKey()}); ?>"
    loopType="<?php echo e(($rowIndex % 2 === 0) ? 'even' : 'odd'); ?>"
    <?php echo e($attributes->merge($customAttributes)
                ->class(['bg-white dark:bg-gray-700 dark:text-white rappasoft-striped-row' => ($component->isTailwind() && ($customAttributes['default'] ?? true) && $rowIndex % 2 === 0)])
                ->class(['bg-gray-50 dark:bg-gray-800 dark:text-white rappasoft-striped-row' => ($component->isTailwind() && ($customAttributes['default'] ?? true) && $rowIndex % 2 !== 0)])
                ->class(['cursor-pointer' => ($component->isTailwind() && $component->hasTableRowUrl() && ($customAttributes['default'] ?? true))])
                ->class(['bg-light rappasoft-striped-row' => ($component->isBootstrap() && $rowIndex % 2 === 0 && ($customAttributes['default'] ?? true))])
                ->class(['bg-white rappasoft-striped-row' => ($component->isBootstrap() && $rowIndex % 2 !== 0 && ($customAttributes['default'] ?? true))])
                ->except(['default'])); ?>


>
    <?php echo e($slot); ?>

</tr>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\tr.blade.php ENDPATH**/ ?>