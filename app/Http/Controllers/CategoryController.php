<?php

namespace App\Http\Controllers;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function showCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = $category->products()->get();
        if (!is_null($category)){
            return view('layouts.frontend.product.showCategory',compact('category','products'));
       }else{
            Toastr::error('Category Successfully Updated', 'Error');
            return redirect()->route('home');
        }
    }
}
