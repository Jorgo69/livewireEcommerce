<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success', 'Product Ajouter avec Success dans le Panier');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        
        $products = Product::paginate(12);

        return view('livewire.shop-component', [
            'products' => $products
        ]);
    }
}