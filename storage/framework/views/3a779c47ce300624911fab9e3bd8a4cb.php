<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Pedidos
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white">
            <section class="bg-white dark:bg-gray-800 overflow-auto shadow-sm sm:rounded-lg mb-5">

                <div class="p-6 bg-white dark:bg-gray-800">
                    <header class="flex flex-row justify-between items-center">
                        <h3 class="text-xl font-bold mb-5">Pedidos registrados</h3>
                    </header>

                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('orders-table');

$__html = app('livewire')->mount($__name, $__params, 'lw-3706915915-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </section>

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('order-details');

$__html = app('livewire')->mount($__name, $__params, 'lw-3706915915-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>





    <?php $__env->startPush('scripts'); ?>
        <?php echo \Rappasoft\LaravelLivewireTables\Mechanisms\RappasoftFrontendAssets::tableScripts(); ?>

        <?php echo \Rappasoft\LaravelLivewireTables\Mechanisms\RappasoftFrontendAssets::tableThirdPartyScripts(); ?>


        <script>
            function confirmComplete(id) {
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "El pedido se establecerá como completado y se generará el respectivo pago",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, continuar!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('complete-order', {
                            orderId: id
                        });
                    }
                })
            }

            function confirmCancel(id) {
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "El pedido se establecerá como cancelado y se modificará el respectivo pago",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, continuar!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('cancel-order', {
                            orderId: id
                        });
                    }
                })
            }
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\orders\index.blade.php ENDPATH**/ ?>