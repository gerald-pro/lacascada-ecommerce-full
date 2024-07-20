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

<?php if($component->collapsingColumnsAreEnabled() && $component->hasCollapsedColumns()): ?>
    <?php
        $colspan = $component->getColspanCount();
        $columns = collect();

        if($component->shouldCollapseAlways())
        {
            $columns->push($component->getCollapsedAlwaysColumns());
        }
        if ($component->shouldCollapseOnMobile() && $component->shouldCollapseOnTablet()) {
            $columns->push($component->getCollapsedMobileColumns());
            $columns->push($component->getCollapsedTabletColumns());
        } elseif ($component->shouldCollapseOnTablet() && ! $component->shouldCollapseOnMobile()) {
            $columns->push($component->getCollapsedTabletColumns());
        } elseif ($component->shouldCollapseOnMobile() && ! $component->shouldCollapseOnTablet()) {
            $columns->push($component->getCollapsedMobileColumns());
        }

        $columns = $columns->collapse();
    ?>

    <tr
        x-data
        @toggle-row-content.window="($event.detail.tableName === '<?php echo e($tableName); ?>' && $event.detail.row === <?php echo e($rowIndex); ?>) ? $el.classList.toggle('<?php echo e($component->isBootstrap() ? 'd-none' : 'hidden'); ?>') : null"

        wire:key="<?php echo e($tableName); ?>-row-<?php echo e($row->{$this->getPrimaryKey()}); ?>-collapsed-contents"
        wire:loading.class.delay="opacity-50 dark:bg-gray-900 dark:opacity-60"

        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'hidden bg-white dark:bg-gray-700 dark:text-white' => $component->isTailwind(),
            'd-none' => $component->isBootstrap()
        ]); ?>"
    >
        <td
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'pt-4 pb-2 px-4' => $component->isTailwind(),
                'pt-3 p-2' => $component->isBootstrap(),
            ]); ?>"
            colspan="<?php echo e($colspan); ?>"
        >
            <div>
                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colIndex => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($column->isHidden()) continue; ?>
                    <?php if($this->columnSelectIsEnabled() && ! $this->columnSelectIsEnabledForColumn($column)) continue; ?>

                    <p wire:key="<?php echo e($tableName); ?>-row-<?php echo e($row->{$this->getPrimaryKey()}); ?>-collapsed-contents-<?php echo e($colIndex); ?>"
                    
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'block mb-2' => $component->isTailwind() && $column->shouldCollapseAlways(),
                            'block mb-2 sm:hidden' => $component->isTailwind() && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && !$column->shouldCollapseOnMobile(),
                            'block mb-2 md:hidden' => $component->isTailwind() && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && $column->shouldCollapseOnMobile(),
                            'block mb-2 lg:hidden' => $component->isTailwind() && !$column->shouldCollapseAlways() && ($column->shouldCollapseOnTablet() || $column->shouldCollapseOnMobile()),
                            
                            'd-block mb-2' => $component->isBootstrap() && $column->shouldCollapseAlways(),
                            'd-block mb-2 d-sm-none' => $component->isBootstrap() && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && !$column->shouldCollapseOnMobile(),
                            'd-block mb-2 d-md-none' => $component->isBootstrap() && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && $column->shouldCollapseOnMobile(),
                            'd-block mb-2 d-lg-none' => $component->isBootstrap() && !$column->shouldCollapseAlways() && ($column->shouldCollapseOnTablet() || $column->shouldCollapseOnMobile()),

                        ]); ?>"
                    >
                        <strong><?php echo e($column->getTitle()); ?></strong>: <?php echo e($column->renderContents($row)); ?>

                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\collapsed-columns.blade.php ENDPATH**/ ?>