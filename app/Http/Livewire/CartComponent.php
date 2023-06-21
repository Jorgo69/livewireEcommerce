<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    
    public function incrementQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product-> qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function decrementQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product-> qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function delete($id)
    {
        Cart::instance('cart')->remove($id);
        session()->flash('delete', 'Produit Supprimer du Panier avec Success');
    }
    
    public function destroy()
    {
        Cart::destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
        
        return back()->with('destroy', 'Panier Vider avec Success');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
