<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class DropDownController extends Controller
{
    public function index(){
    	
        $categories = Category::all();
    	$products = Product::all();
        
        return view('dropdown.dropdown', compact('categories','products'));
    }
 
    public function getProducts($id){
    	if($id!=0){
    		$products = Category::find($id)->products()->select('id', 'name')->get()->toArray();
    	}else{
    		$products = Product::all()->toArray();
    	}
    	return response()->json($products);
    }
}
