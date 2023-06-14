<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    // Pour la pagination
    public $pageSize = 12;

    // Concernant la Category
    public $slug;

    // Pour le tri 
    public $triEnCours = 'Par Defaut';

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

    public function mount($slug)
    {
        $this->slug = $slug;
    }


    public function render()
    {
        $category = Category::where('slug', $this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->triEnCours == 'Prix: Petit au Grand' )
        {
        $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if($this->triEnCours == 'Prix: Grand au Petit')
        {
        $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }
        else if($this->triEnCours == 'Nouveautés')
        {
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }else{
            $products = Product::where('category_id', $category_id)->paginate($this->pageSize);
        }
        
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('livewire.category-component', [
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name,
        ]);
    }
}
