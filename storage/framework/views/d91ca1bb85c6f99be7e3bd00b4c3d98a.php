<div>
    <table class="min-w-full border border-light">
        <thead>
            <tr>
                <th class="w-1/12 px-4 py-2">ID</th>
                <th class="w-2/12 px-4 py-2">Nombre</th>
                <th class="w-2/12 px-4 py-2">Correo Electrónico</th>
                <th class="w-2/12 px-4 py-2">Asunto</th>
                <th class="w-4/12 px-4 py-2">Mensaje</th>
                <th class="w-1/12 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border px-4 py-2 border-light"><?php echo e($message->id); ?></td>
                    <td class="border px-4 py-2 border-light"><?php echo e($message->name); ?></td>
                    <td class="border px-4 py-2 border-light"><?php echo e($message->email); ?></td>
                    <td class="border px-4 py-2 border-light"><?php echo e($message->subject); ?></td>
                    <td class="border px-4 py-2 border-light"><?php echo e($message->message); ?></td>
                    <td class="border px-4 py-2 border-light">
                        <?php if (isset($component)) { $__componentOriginal3b9eae2fda1979ebeecf9420d156d189 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b9eae2fda1979ebeecf9420d156d189 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-secondary','data' => ['onclick' => 'confirmDeletion('.e($message->id).')','class' => 'py-2','title' => 'Eliminar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'confirmDeletion('.e($message->id).')','class' => 'py-2','title' => 'Eliminar']); ?>
                            <i class="fas fa-trash fa-fw"></i>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b9eae2fda1979ebeecf9420d156d189)): ?>
<?php $attributes = $__attributesOriginal3b9eae2fda1979ebeecf9420d156d189; ?>
<?php unset($__attributesOriginal3b9eae2fda1979ebeecf9420d156d189); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b9eae2fda1979ebeecf9420d156d189)): ?>
<?php $component = $__componentOriginal3b9eae2fda1979ebeecf9420d156d189; ?>
<?php unset($__componentOriginal3b9eae2fda1979ebeecf9420d156d189); ?>
<?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php $__env->startPush('scripts'); ?>
        <script>
            function confirmDeletion(id) {
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "Esta acción no se puede deshacer",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete', {
                            messageId: id
                        });
                    }
                })
            }
        </script>
    <?php $__env->stopPush(); ?>
</div><?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\livewire\contacts\contact-messages-list.blade.php ENDPATH**/ ?>