<x-app-layout>
    <x-slot name="header">
        Mis Pedidos
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white">
            <section class="bg-white dark:bg-gray-800 overflow-auto shadow-sm sm:rounded-lg mb-5">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <header class="flex flex-row justify-between items-center">
                        <h3 class="text-xl font-bold mb-5">Mis pedidos</h3>
                    </header>
                    <livewire:client-orders-list />
                </div>
            </section>

            <livewire:order-details />
        </div>
    </div>
</x-app-layout>
