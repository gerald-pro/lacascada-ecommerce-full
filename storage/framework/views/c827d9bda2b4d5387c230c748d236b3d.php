<div>
    <?php if($component->debugIsEnabled()): ?>
        <p><strong><?php echo app('translator')->get('Debugging Values'); ?>:</strong></p>

        <?php if(! app()->runningInConsole()): ?>
            <div class="mb-4"><?php dump((new \Rappasoft\LaravelLivewireTables\DataTransferObjects\DebuggableData($component))->toArray()); ?></div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\rappasoft\laravel-livewire-tables\resources\views\includes\debug.blade.php ENDPATH**/ ?>