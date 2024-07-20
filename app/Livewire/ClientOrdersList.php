<?php

namespace App\Livewire;

use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ClientOrdersList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $qrImage;
    public $showQrModal = false;
    public $paymentStatus = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updateTransactions()
    {
        PaymentService::updatePendingTransactions(Auth::user()->id);
        $this->dispatch('toast:message', [
            'message' =>  'Pedidos actualizados',
            'status' => 'success',
        ]);
    }

    public function render()
    {
        $orders = Order::where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('total_amount', 'like', '%' . $this->search . '%')
                    ->orWhere('delivery_status', 'like', '%' . $this->search . '%');
            })
            ->when($this->paymentStatus, function ($query) {
                $query->whereHas('payment', function ($query) {
                    $query->where('status', $this->paymentStatus);
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.client-orders-list', [
            'orders' => $orders
        ]);
    }

    public function payOrder($orderId)
    {
        try {
            $response = PaymentService::processPayment($orderId);

            if ($response['status'] === 'success') {
                $order = Order::with('user', 'orderItems.product')->findOrFail($orderId);
                $this->qrImage = $order->payment->qr_image;
                $this->dispatch('open-modal', 'qr-modal');
            } else {
                $this->dispatch('swal:modal', [
                    'title' => 'Pago!',
                    'text' =>  $response['message'],
                    'icon' => 'error',
                ]);
            }
        } catch (\Exception $e) {
            $this->dispatch('swal:modal', [
                'title' => 'Pago!',
                'text' =>  $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }
}
