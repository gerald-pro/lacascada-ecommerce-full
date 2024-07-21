<div>
    <div class="flex flex-col sm:flex-row  border border-light rounded">
        <div class="sm:w-1/3 overflow-hidden shadow-sm shadow-slate-400" wire:ignore>
            <?php if($product->currentPromotion): ?>
            <div class="relative">
                <div class="absolute top-0 right-0">
                    <div class="w-32 h-8 absolute top-4 -right-8">
                        <div
                            class="h-full w-full bg-rose-600 text-white text-center leading-8 transform rotate-45">
                            PROMOCIÓN
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="w-full rounded-lg">
        </div>
        <div class="sm:w-2/3 sm:pl-6">
            <h1 class="text-3xl font-bold mt-3"><?php echo e($product->name); ?></h1>
            <p class="mt-4"><?php echo e($product->description); ?></p>
            <div class="mt-4">
                <?php if($product->currentPromotion): ?>
                    <span class="text-2xl line-through text-red-500">Bs.
                        <?php echo e(number_format($product->price, 2)); ?></span>
                    <span class="text-2xl font-bold ml-2">Bs.
                        <?php echo e(number_format($product->discountedPrice, 2)); ?></span>
                    <span class="text-sm bg-emerald-100 text-emerald-700 rounded-full px-2 py-1 ml-2">
                        -<?php echo e($product->currentPromotion->discount_percentage); ?>%
                    </span>
                <?php else: ?>
                    <span class="text-2xl font-bold">Bs. <?php echo e(number_format($product->price, 2)); ?></span>
                <?php endif; ?>
            </div>
            <div class="mt-6">
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:click' => 'addToCart('.e($product->id).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'addToCart('.e($product->id).')']); ?>
                    <?php echo e(__('Añadir al carrito')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
            </div>
        </div>
    </div>

    <div class="mt-28" wire:ignore>
        <h2 class="text-2xl font-bold">Productos Recomendados</h2>
        <div class="flex flex-row flex-wrap justify-start">
            <?php $__currentLoopData = $recommendedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-card','data' => ['product' => $recommendedProduct]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recommendedProduct)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $attributes = $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $component = $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\livewire\product-show.blade.php ENDPATH**/ ?>