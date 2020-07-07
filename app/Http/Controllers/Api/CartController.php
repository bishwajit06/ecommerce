<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required'
        ],
            [
                'product_id.required' => 'Please give a product'
            ]);

        if (Auth::check()){
            $cart = Cart::where('user_id', Auth::id())
                ->where('ip_address', request()->ip())
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
        }else{
            $cart = Cart::where('ip_address', request()->ip())
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
        }

        if(!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart = new Cart();
            if (Auth::check()){
                $cart->user_id = Auth::id();
            }

            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }

        return json_encode([
            'status' => 'success',
            'Message' => 'Item add to cart',
            'totalItems' => Cart::totalItems()
        ]);


    }
}
