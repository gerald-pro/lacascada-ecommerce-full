<div x-data="{
    searchOpen: false,
    init() {
        this.$watch('searchOpen', value => {
            if (value === true) {
                this.$nextTick(() => {
                    this.$refs.searchInput && this.$refs.searchInput.focus()
                })
            }
        })
    }
}">
    <button
        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
        :class="{ 'bg-slate-200': searchOpen }" @click.prevent="searchOpen = true" aria-controls="search-modal">
        <span class="sr-only">Search</span>
        <i class="fas fa-search fa-fw"></i>
    </button>
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity" x-show="searchOpen"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak></div>
    <div id="search-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center px-4 sm:px-6"
        role="dialog" aria-modal="true" x-show="searchOpen" x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4" x-cloak>
        <div class="bg-white dark:bg-slate-800 border border-transparent dark:border-slate-700 overflow-auto max-w-2xl w-full max-h-full rounded shadow-lg"
            @click.outside="searchOpen = false" @keydown.escape.window="searchOpen = false">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('global-searcher');

$__html = app('livewire')->mount($__name, $__params, 'lw-3435145876-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\lacascada-ecommerce\resources\views\components\modal-search.blade.php ENDPATH**/ ?>