<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success', 'Product Ajouter avec Success dans le Panier');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();

        // Related Product
        $r_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();

        // New Product soit avec la methode latest() recuperation des derniers element
        $n_products = Product::latest()->take(3)->get();

        return view('livewire.details-component', [
            'product' => $product,
            'r_products' => $r_products,
            'n_products' => $n_products,
        ]);
    }
}
