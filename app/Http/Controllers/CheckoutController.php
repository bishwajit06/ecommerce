<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $payments = Payment::orderBy('priority', 'asc')->get();
            return view('layouts.frontend.pages.checkout',compact('payments'));
        }else{
            return redirect()->route('login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'shipping_address' => 'required',
            'payment' => 'required'
        ]);

        $order = new Order();



        //Check Transaction ID has given or not

        if($request->payment != 'cash_in'){
            if($request->transaction_id == NULL || empty($request->transaction_id)){
                session()->flash('sticky_error','Please give Transaction ID for your Payment.');
                return back();
            }

        }

        if(Auth::check()){
            $order->user_id = Auth::id();

        }
        $order->payment_id = Payment::where('short_name', $request->payment)->first()->id;
        $order->ip_address = request()->ip();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->transaction_id = $request->transaction_id;
        $order->save();
        foreach(Cart::totalCarts() as $cart ){
            $cart->order_id = $order->id;
            $cart->save();
        }
        session()->flash('success','Thank you. Your order has been received.');
        if(Auth::user()->role_id ==1){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('customer.dashboard');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
