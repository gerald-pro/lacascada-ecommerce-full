<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:site_name" content="<?php echo e(config('app.name', 'Laravel')); ?>">

    <title>
        <?php echo e((isset($title) ? $title . ' - ' : '') . config('app.name', 'Laravel')); ?>

    </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-family antialiased bg-skin-background dark:bg-skin-background-dark text-slate-600 dark:text-slate-400"
    :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
    <div id="preloader" class="fixed inset-0 bg-white flex justify-center items-center preloader-transition">
        <div class="flex justify-center items-center h-screen">
            <div class="rounded-full h-5 w-5 bg-gray-900 animate-ping"></div>
        </div>
    </div>
    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden">

        <?php if (isset($component)) { $__componentOriginal790df3a3003b05a46d3e5fdd59aeab47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47)): ?>
<?php $attributes = $__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47; ?>
<?php unset($__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal790df3a3003b05a46d3e5fdd59aeab47)): ?>
<?php $component = $__componentOriginal790df3a3003b05a46d3e5fdd59aeab47; ?>
<?php unset($__componentOriginal790df3a3003b05a46d3e5fdd59aeab47); ?>
<?php endif; ?>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden" x-ref="contentarea">

            <?php if (isset($component)) { $__componentOriginal6f648324bf790658b48f4e99fb28ec74 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6f648324bf790658b48f4e99fb28ec74 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6f648324bf790658b48f4e99fb28ec74)): ?>
<?php $attributes = $__attributesOriginal6f648324bf790658b48f4e99fb28ec74; ?>
<?php unset($__attributesOriginal6f648324bf790658b48f4e99fb28ec74); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6f648324bf790658b48f4e99fb28ec74)): ?>
<?php $component = $__componentOriginal6f648324bf790658b48f4e99fb28ec74; ?>
<?php unset($__componentOriginal6f648324bf790658b48f4e99fb28ec74); ?>
<?php endif; ?>

            <main class="">
                <?php echo e($slot); ?>

            </main>
            <?php if (isset($component)) { $__componentOriginalf09be65b7603473fd0d1ba7668ac812d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf09be65b7603473fd0d1ba7668ac812d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf09be65b7603473fd0d1ba7668ac812d)): ?>
<?php $attributes = $__attributesOriginalf09be65b7603473fd0d1ba7668ac812d; ?>
<?php unset($__attributesOriginalf09be65b7603473fd0d1ba7668ac812d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf09be65b7603473fd0d1ba7668ac812d)): ?>
<?php $component = $__componentOriginalf09be65b7603473fd0d1ba7668ac812d; ?>
<?php unset($__componentOriginalf09be65b7603473fd0d1ba7668ac812d); ?>
<?php endif; ?>
        </div>

    </div>

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <script src="<?php echo e(asset('js/crud_resources.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\layouts\app.blade.php ENDPATH**/ ?>