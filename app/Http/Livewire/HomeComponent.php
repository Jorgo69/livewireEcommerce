<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public $tri = 'new_added';
    public $slug;

    public function changement($trier)
    {
        $this->tri = $trier;
    }

    public function render()
    {
        $slides = HomeSlider::where('status', 1)->get();

        $last_produit = Product::orderBy('created_at', 'DESC')->get()->take(8);

        $popular_produit = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);

        if($this->tri == 'featured')
        {
            $products = Product::orderBy('featured', 1)->get()->take(6);
        }
        else if($this->tri == 'new_added')
        {
            $products = Product::orderBy('created_at', 'DESC')->get()->take(8);
        }
        else
        {
            $products = Product::orderBy('name', 'ASC')->get()->take(2);
        }

        

        return view('livewire.home-component', [
            'slides' => $slides,
            'last_produit' => $last_produit,
            'popular_produit' => $popular_produit,
            'products' => $products
        ]);
    }
}
