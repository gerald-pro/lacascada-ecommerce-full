<?php foreach ((['isTailwind', 'isBootstrap', 'tableName', 'component']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['colCount' => 1]));

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

foreach (array_filter((['colCount' => 1]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$customAttributes['loader-wrapper'] = $component->getLoadingPlaceHolderWrapperAttributes();
$customAttributes['loader-icon'] = $component->getLoadingPlaceHolderIconAttributes();
?>
<?php if($this->hasLoadingPlaceholderBlade()): ?>
    <?php echo $__env->make($this->getLoadingPlaceHolderBlade(), ['colCount' => $colCount], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>

    <tr wire:key="<?php echo e($tableName); ?>-loader" class="hidden d-none"
    <?php echo e($attributes->merge($customAttributes['loader-wrapper'])
            ->class(['w-full text-center h-screen place-items-center align-middle' => $isTailwind && ($customAttributes['loader-wrapper']['default'] ?? true)])
            ->class(['w-100 text-center h-100 align-items-center' => $isBootstrap && ($customAttributes['loader-wrapper']['default'] ?? true)])); ?>

    wire:loading.class.remove="hidden d-none"
    >
        <td colspan="<?php echo e($colCount); ?>">
            <div class="h-min self-center align-middle text-center">
                <div class="lds-hourglass"
                <?php echo e($attributes->merge($customAttributes['loader-icon'])
                            ->class(['lds-hourglass' => $isTailwind && ($customAttributes['loader-icon']['default'] ?? true)])
                            ->class(['lds-hourglass' => $isBootstrap && ($customAttributes['loader-icon']['default'] ?? true)])
                            ->except('default')); ?>

                ></div>
                <div><?php echo e($component->getLoadingPlaceholderContent()); ?></div>
            </div>
        </td>
    </tr>

<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\includes\loading.blade.php ENDPATH**/ ?>