<div>
    <!-- Sidebar -->
    <div id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 
        bg-skin-sidebar dark:bg-skin-sidebar-dark text-slate-900 dark:text-slate-100 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="<?php echo e(route('home')); ?>">
                <div class="flex items-center justify-between">
                    <img src="<?php echo e(asset('images/lacascada-black.png')); ?>" alt="Logo"
                        class="w-12 h-12 dark:filter dark:invert">
                    <span
                        class="font-bold ml-2 lg:sidebar-expanded:opacity-100 duration-200 lg:hidden lg:sidebar-expanded:block 2xl:block">
                        LA CASCADA
                    </span>
                </div>
            </a>

        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <ul class="mt-3">
                    <?php if($unGrouped->count() > 0): ?>
                        <?php $__currentLoopData = $unGrouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar.sidebar-sublink','data' => ['route' => ''.e($sidebarItem->page->route == '/' ? $sidebarItem->page->route : trim($sidebarItem->page->route, '/')).'','icon' => ''.e($sidebarItem->icon).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.sidebar-sublink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e($sidebarItem->page->route == '/' ? $sidebarItem->page->route : trim($sidebarItem->page->route, '/')).'','icon' => ''.e($sidebarItem->icon).'']); ?><?php echo e($sidebarItem->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f)): ?>
<?php $attributes = $__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f; ?>
<?php unset($__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f)): ?>
<?php $component = $__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f; ?>
<?php unset($__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($group->items->count() > 0): ?>
                            <?php if (isset($component)) { $__componentOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar.sidebar-headlink','data' => ['text' => ''.e($group->name).'','items' => $group->items,'icon' => ''.e($group->icon).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.sidebar-headlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => ''.e($group->name).'','items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group->items),'icon' => ''.e($group->icon).'']); ?>
                                <?php $__currentLoopData = $group->items->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar.sidebar-sublink','data' => ['icon' => ''.e($sidebarItem->icon).'','route' => ''.e($sidebarItem->page->route == '/' ? $sidebarItem->page->route : trim($sidebarItem->page->route, '/')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.sidebar-sublink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($sidebarItem->icon).'','route' => ''.e($sidebarItem->page->route == '/' ? $sidebarItem->page->route : trim($sidebarItem->page->route, '/')).'']); ?><?php echo e($sidebarItem->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f)): ?>
<?php $attributes = $__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f; ?>
<?php unset($__attributesOriginala6ce5b436c95f3cc9a7c3fa7f738b51f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f)): ?>
<?php $component = $__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f; ?>
<?php unset($__componentOriginala6ce5b436c95f3cc9a7c3fa7f738b51f); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5)): ?>
<?php $attributes = $__attributesOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5; ?>
<?php unset($__attributesOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5)): ?>
<?php $component = $__componentOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5; ?>
<?php unset($__componentOriginalf4bc3af4dc7ce63d969f12c1b7b8c2e5); ?>
<?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400"
                            d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\components\app\sidebar.blade.php ENDPATH**/ ?>