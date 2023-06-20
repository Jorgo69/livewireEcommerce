<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;
    // Pour la pagination
    public $pageSize = 12;

    // Pour le tri 
    public $triEnCours = 'Par Defaut';

    //Pour la recherche
    public $q;
    public $search_terme;

    public function mount()
    {
        $this->fill(request()->only('q'));
        $this->search_terme = '%' .$this->q. '%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success', 'Product Ajouter avec Success dans le Panier');
        return redirect()->route('shop.cart');
    }

    
    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeTri($tri)
    {
        $this->triEnCours = $tri;
    }


    public function render()
    {
        if($this->triEnCours == 'Prix: Petit au Grand' )
        {
        $products = Product::where('name', 'like', $this->search_terme)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if($this->triEnCours == 'Prix: Grand au Petit')
        {
        $products = Product::where('name', 'like', $this->search_terme)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }
        else if($this->triEnCours == 'Nouveautés')
        {
            $products = Product::where('name', 'like', $this->search_terme)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }else{
            $products = Product::where('name', 'like', $this->search_terme)->paginate($this->pageSize);
        }
        
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('livewire.search-component', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
