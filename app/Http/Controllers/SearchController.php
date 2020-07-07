<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::orwhere('name','LIKE',"%$query%")
                    ->orwhere('slug','LIKE',"%$query%")
                    ->orwhere('description','LIKE',"%$query%")
                    ->orwhere('price','LIKE',"%$query%")
                    ->paginate(3);
        return view('layouts.frontend.pages.search',compact('products','query'));

    }
}
