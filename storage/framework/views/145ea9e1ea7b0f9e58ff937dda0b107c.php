<!-- You will probably want to customize this component. -->

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'showCopyright' => true,
    'copyrightStart' => 2023,

    'showCredit' => true,

    'showVersion' => true,
]));

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

foreach (array_filter(([
    'showCopyright' => true,
    'copyrightStart' => 2023,

    'showCredit' => true,

    'showVersion' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<footer class="w-full mt-auto p-5 pt-6 bg-opacity-10 text-gray-800 dark:text-gray-200 text-center">

    <?php if(isset($currentPage)): ?>
        <p class="mt-3">
            Página: <?php echo e(Request::getRequestUri()); ?> - Visitas <?php echo e($currentPage->visits); ?>

        </p>
    <?php endif; ?>

    <?php if($showCopyright): ?>
        <div class="mx-3">
            <small class="text-sm">
                Copyright &copy;
                <?php echo e($copyrightStart != date('Y') ? $copyrightStart . '-' . date('Y') : $copyrightStart); ?>

                Gerald Avalos
            </small>
        </div>
    <?php endif; ?>

</footer>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\components\app\footer.blade.php ENDPATH**/ ?>