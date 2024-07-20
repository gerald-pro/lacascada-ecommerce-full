<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomeProducts extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $minPrice = 0;
    public $maxPrice = 1000;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function updatingMinPrice()
    {
        $this->resetPage();
    }

    public function updatingMaxPrice()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();

        $items = Product::with('promotions')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'ILIKE', '%' . $this->search . '%')
                        ->orWhere('description', 'ILIKE', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->minPrice, function ($query) {
                $query->where('price', '>=', $this->minPrice);
            })
            ->when($this->maxPrice, function ($query) {
                $query->where('price', '<=', $this->maxPrice);
            })
            ->paginate(9);

        foreach ($items as &$product) {
            if (!$product->image_url) {
                $product->image_url = 'https://elements-cover-images-0.imgix.net/742bf1f7-98f6-4a39-8bd1-edf8e0c119da?auto=compress%2Cformat&w=866&fit=max&s=dd1ba4a153484fe218d015f3ff3bfcbe';
            }
        }

        return view('livewire.home-products', [
            'products' => $items,
            'categories' => $categories,
        ]);
    }

    public function addToCart(int $productId): void
    {
        $product = Product::findOrFail($productId);

        Cart::add($product->id, $product->name, $product->discountedPrice);

        $this->dispatch('toast:message', [
            'message' => 'Producto añadido al carrito de compras',
            'status' => 'success',
        ]);
    }
}
