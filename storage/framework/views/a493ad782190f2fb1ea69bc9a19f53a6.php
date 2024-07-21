<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['text' => '', 'icon' => 'fa-question', 'items' => []]));

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

foreach (array_filter((['text' => '', 'icon' => 'fa-question', 'items' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $isActiveGroup = false;
    foreach ($items as $item) {
        if (request()->is(trim($item->page->route, '/'))) {
            $isActiveGroup = true;
            break;
        }
    }
?>

<li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if($isActiveGroup): ?> <?php echo e('bg-skin-background dark:bg-skin-navbar-dark'); ?> <?php endif; ?>"
    x-data="{ open: <?php echo e($isActiveGroup ? 1 : 0); ?> }">
    <a class="block truncate transition duration-150 <?php if($isActiveGroup): ?> <?php echo e('text-primary-hover'); ?> <?php endif; ?>"
        href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas <?php echo e($icon); ?> fa-lg fa-fw"></i>
                <span
                    class="font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e($text); ?></span>
            </div>
            <!-- Icon -->
            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                <i class="fa fa-sm fa-chevron-down fa-fw <?php if($isActiveGroup): ?> <?php echo e('fa-rotate-180'); ?> <?php endif; ?>"
                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12"></i>
            </div>
        </div>
    </a>
    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
        <ul class="pl-9 mt-1 <?php if(!$isActiveGroup): ?> <?php echo e('hidden'); ?> <?php endif; ?>"
            :class="open ? '!block' : 'hidden'">
            <?php echo e($slot); ?>

        </ul>
    </div>
</li>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\components\sidebar\sidebar-headlink.blade.php ENDPATH**/ ?>