<<?php echo e(isset($href) ? 'a' : 'button'); ?> <?php echo e($attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-3 py-1 bg-gray-800 dark:bg-gray-100 border border-transparent rounded-md font-semibold text-sm text-white dark:text-black uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'])); ?>>
    <?php echo e($slot); ?>

</<?php echo e(isset($href) ? 'a' : 'button'); ?>>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\components\button.blade.php ENDPATH**/ ?>