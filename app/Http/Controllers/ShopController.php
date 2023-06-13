<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function voir(){

        $products = Product::paginate(12);
        
        return view('shop', [
            'products' => $products
        ]);
    }
}
