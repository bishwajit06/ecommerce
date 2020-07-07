<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        $newProducts = Product::latest()->get();
        return view('layouts.frontend.pages.home',compact('newProducts','sliders'));
    }
}
