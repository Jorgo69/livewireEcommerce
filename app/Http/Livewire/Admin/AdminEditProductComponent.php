<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status ;
    public $featured ;
    public $quantity;
    public $image;
    public $category_id;
    public $newImage;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->sku = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->featured = $product->featured;
        $this->category_id = $product->category_id;
    }

    public function genrateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
                'name'=>'required',
                'slug'=>'required',
                'name'=>'required',
                'slug'=>'required',
                'short_description'=>'required',
                'description'=>'required',
                'regular_price'=>'required',
                // 'sale_price'=>'required',
                'sku'=>'required',
                'stock_status'=>'required',
                'featured'=>'required',
                'quantity'=>'required',
                'image'=>'required',
                'category_id'=>'required'
        ]);
    }


    public function updateProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            // 'sale_price'=>'required',
            'sku'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->sku;
        $product->stock_status  = $this->stock_status;
        $product->featured  = $this->featured;
        $product->quantity = $this->quantity;
        
        if($this->newImage)
        {
            // unlink('assets/imgs/products/'.$product->image);
            $imageName = Carbon::now()->timestamp. '.' .$this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;

        }

        $product->category_id = $this->category_id;
        $product->save();
        // session()->flash('Admin_message', 'Produit modifier avec success');
        return back()->with('Admin_message', 'Modification avec Success');
    }

    public function render()
    {
        $category = Category::orderBy('name', 'ASC')->get();

        return view('livewire.admin.admin-edit-product-component',
        ['categories'=>$category]
    );
    }
}
