<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $products = Product::latest()->paginate(9);
        return view('layouts.frontend.product.shop', compact('products'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('layouts.frontend.product.detail',compact('product'));
    }

}
