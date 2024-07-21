<?php foreach ((['component', 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php
    $customAttributes = [
        'wrapper' => $this->getTableWrapperAttributes(),
        'table' => $this->getTableAttributes(),
        'thead' => $this->getTheadAttributes(),
        'tbody' => $this->getTbodyAttributes(),
    ];
?>

<?php if($component->isTailwind()): ?>
    <div
        wire:key="<?php echo e($tableName); ?>-twrap"
        <?php echo e($attributes->merge($customAttributes['wrapper'])
            ->class(['shadow overflow-y-auto border-b border-gray-200 dark:border-gray-700 sm:rounded-lg' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')); ?>

    >
        <table
            wire:key="<?php echo e($tableName); ?>-table"
            <?php echo e($attributes->merge($customAttributes['table'])
                ->class(['min-w-full divide-y divide-gray-200 dark:divide-none' => $customAttributes['table']['default'] ?? true])
                ->except('default')); ?>

        >
            <thead wire:key="<?php echo e($tableName); ?>-thead"
                <?php echo e($attributes->merge($customAttributes['thead'])
                    ->class(['bg-gray-50 dark:bg-gray-800' => $customAttributes['thead']['default'] ?? true])
                    ->except('default')); ?>

            >
                <tr>
                    <?php echo e($thead); ?>

                </tr>
            </thead>

            <tbody
                wire:key="<?php echo e($tableName); ?>-tbody"
                id="<?php echo e($tableName); ?>-tbody"
                <?php echo e($attributes->merge($customAttributes['tbody'])
                        ->class(['bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-none' => $customAttributes['tbody']['default'] ?? true])
                        ->except('default')); ?>

            >
                <?php echo e($slot); ?>

            </tbody>

            <?php if(isset($tfoot)): ?>
                <tfoot wire:key="<?php echo e($tableName); ?>-tfoot">
                    <?php echo e($tfoot); ?>

                </tfoot>
            <?php endif; ?>
        </table>
    </div>
<?php elseif($component->isBootstrap()): ?>
    <div wire:key="<?php echo e($tableName); ?>-twrap"
        <?php echo e($attributes->merge($customAttributes['wrapper'])
            ->class(['table-responsive' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')); ?>

    >
        <table
            wire:key="<?php echo e($tableName); ?>-table"
            <?php echo e($attributes->merge($customAttributes['table'])
                ->class(['laravel-livewire-table table' => $customAttributes['table']['default'] ?? true])
                ->except('default')); ?>

        >
            <thead
                wire:key="<?php echo e($tableName); ?>-thead"
                <?php echo e($attributes->merge($customAttributes['thead'])
                    ->class(['' => $customAttributes['thead']['default'] ?? true])
                    ->except('default')); ?>

            >
                <tr>
                    <?php echo e($thead); ?>

                </tr>
            </thead>

            <tbody
                wire:key="<?php echo e($tableName); ?>-tbody"
                id="<?php echo e($tableName); ?>-tbody"
                <?php echo e($attributes->merge($customAttributes['tbody'])
                        ->class(['' => $customAttributes['tbody']['default'] ?? true])
                        ->except('default')); ?>

            >
                <?php echo e($slot); ?>

            </tbody>

            <?php if(isset($tfoot)): ?>
                <tfoot wire:key="<?php echo e($tableName); ?>-tfoot">
                    <?php echo e($tfoot); ?>

                </tfoot>
            <?php endif; ?>
        </table>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table.blade.php ENDPATH**/ ?>