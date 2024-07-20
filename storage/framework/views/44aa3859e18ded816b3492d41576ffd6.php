<?php foreach ((['component', 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'ml-0 ml-md-2' => $component->isBootstrap4(),
        'ms-0 ms-md-2' => $component->isBootstrap5(),
    ]); ?>"
>
    <select wire:model.live="perPage" id="<?php echo e($tableName); ?>-perPage"
        <?php echo e($attributes->merge($component->getPerPageFieldAttributes())
            ->class([
                'form-control' => $component->isBootstrap4() && $component->getPerPageFieldAttributes()['default-styling'],
                'form-select' => $component->isBootstrap5() && $component->getPerPageFieldAttributes()['default-styling'],
                'block w-full rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:ring focus:ring-opacity-50' => $component->isTailwind() && $component->getPerPageFieldAttributes()['default-styling'],
                'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 dark:bg-gray-700 dark:text-white dark:border-gray-600' => $component->isTailwind() && $component->getPerPageFieldAttributes()['default-colors'],
            ])
            ->except(['default','default-styling','default-colors'])); ?>

    >
        <?php $__currentLoopData = $component->getPerPageAccepted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e($item); ?>"
                wire:key="<?php echo e($tableName); ?>-per-page-<?php echo e($item); ?>"
            >
                <?php echo e($item === -1 ? __('All') : $item); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\toolbar\items\pagination-dropdown.blade.php ENDPATH**/ ?>