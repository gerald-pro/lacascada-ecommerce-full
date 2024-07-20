<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{
    public $product;
    public $recommendedProducts;

    public function mount($id)
    {
        $this->product = Product::with('promotions')->findOrFail($id);
        $this->setDefaultImage($this->product);
        $this->loadRecommendedProducts();
    }

    public function loadRecommendedProducts()
    {
        $recomended = Product::with('promotions')
        ->where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->take(4)
            ->get();

        foreach ($recomended as $product) {
            $this->setDefaultImage($product);
        }


        $this->recommendedProducts = $recomended;
    }

    private function setDefaultImage($product)
    {
        if (!$product->image_url) {
            $product->image_url = 'https://elements-cover-images-0.imgix.net/742bf1f7-98f6-4a39-8bd1-edf8e0c119da?auto=compress%2Cformat&w=866&fit=max&s=dd1ba4a153484fe218d015f3ff3bfcbe';
        }
    }

    public function addToCart(int $productId): void
    {
        $product = Product::findOrFail($productId);

        Cart::add($product->id, $product->name, $product->discountedPrice);

        $this->dispatch('toast:message', [
            'message' => 'Producto añadido al carrito de compras',
            'status' => 'success',
        ]);

        $this->setDefaultImage($this->product);
        foreach ($this->recommendedProducts as $product) {
            $this->setDefaultImage($product);
        }
    }

    public function render()
    {
        return view('livewire.product-show');
    }
}
