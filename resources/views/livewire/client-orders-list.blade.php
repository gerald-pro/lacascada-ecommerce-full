<div>
    <div class="mb-4 flex space-x-4 justify-between">
        <div>
            <x-input wire:model.live.debounce.400ms="search" type="text" placeholder="Buscar pedidos..."
                class="w-48" />

            <x-select wire:model.live="paymentStatus" class="w-30">
                <option value="">Todos</option>
                <option value="PAGADO">Pagado</option>
                <option value="PENDIENTE">Pendiente</option>
                <option value="CANCELADO">Cancelado</option>
            </x-select>

            <x-spinner wire:loading wire:target='search' size="4" class="mx-6" />
        </div>
        <x-button wire:click='updateTransactions' wire:loading.attr='disabled'>
            <x-spinner wire:loading wire:target='updateTransactions' size="5" class="mx-1" />
            <i wire:loading.remove wire:target='updateTransactions' class="fas fa-refresh fa-lg fa-fw"></i>
        </x-button>
    </div>

    <table class="w-full table-auto">
        <thead class="border border-light">
            <tr>
                <th class="px-4 py-2">
                    <button wire:click="sortBy('id')">
                        ID
                        @if ($sortField === 'id')
                            @if ($sortDirection === 'asc')
                                ↑
                            @else
                                ↓
                            @endif
                        @endif
                    </button>
                </th>
                <th class="px-4 py-2">
                    <button wire:click="sortBy('created_at')">
                        Fecha
                        @if ($sortField === 'created_at')
                            @if ($sortDirection === 'asc')
                                ↑
                            @else
                                ↓
                            @endif
                        @endif
                    </button>
                </th>
                <th class="px-4 py-2">
                    Pago
                </th>
                <th class="px-4 py-2">
                    <button wire:click="sortBy('delivery_status')">
                        Entrega
                        @if ($sortField === 'delivery_status')
                            @if ($sortDirection === 'asc')
                                ↑
                            @else
                                ↓
                            @endif
                        @endif
                    </button>
                </th>
                <th class="px-4 py-2">
                    <button wire:click="sortBy('total_amount')">
                        Total
                        @if ($sortField === 'total_amount')
                            @if ($sortDirection === 'asc')
                                ↑
                            @else
                                ↓
                            @endif
                        @endif
                    </button>
                </th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="border border-light px-4 py-2">{{ $order->id }}</td>
                    <td class="border border-light px-4 py-2">{{ $order->created_at->format('d/m/Y H:m') }}</td>
                    <td class="border border-light px-4 py-2">{{ $order->payment->status ?? 'PENDIENTE' }}</td>
                    <td class="border border-light px-4 py-2">{{ $order->delivery_status }}</td>

                    <td class="border border-light px-4 py-2">{{ number_format($order->total_amount, 2) }} Bs</td>
                    <td class="border border-light px-4 py-2">
                        <x-button-secondary
                            wire:click="dispatch('show-order-details', { orderId: {{ $order->id }} })"
                            wire:loading.attr='disabled'>
                            <i class="fas fa-eye fa-fw"></i>
                        </x-button-secondary>
                        @if ($order->delivery_status === 'PENDIENTE' && ($order->payment == null || $order->payment->status === 'PENDIENTE'))
                            <x-button wire:click="payOrder({{ $order->id }})" wire:loading.attr='disabled'
                                wire:target="payOrder({{ $order->id }})">

                                <x-spinner wire:loading wire:target="payOrder({{ $order->id }})" size="3" />

                                <i wire:loading.remove wire:target="payOrder({{ $order->id }})"
                                    class="fas fa-credit-card  fa-fw">
                                </i>
                            </x-button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>

    <x-modal name="qr-modal" :show="$showQrModal">
        <div class="p-6">
            <h2 class="text-lg font-medium">
                Código QR de Pago
            </h2>

            <div class="mt-4 flex justify-center">
                <img src="{{ $qrImage }}" alt="QR Code" class="bg-white">
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cerrar
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
</div>
