<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use PDF;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.order.show',compact('order'));
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
        $order = Order::find($id);

        $order->delete();
        Toastr::success('Order Successfully Deleted', 'Success');
        return redirect()->back();
    }
    public function seenByAdmin($id)
    {
        $order = Order::find($id);
        if($order->is_seen_by_admin){
            $order->is_seen_by_admin = 0;
        }else{
            $order->is_seen_by_admin = 1;
        }
        $order->save();
        Toastr::success('Order Status has been changed', 'Success');
        return back();
    }

    public function completed($id)
    {
        $order = Order::find($id);
        if($order->is_completed){
            $order->is_completed = 0;
        }else{
            $order->is_completed = 1;
        }
        $order->save();
        Toastr::success('Order Status has been changed', 'Success');
        return back();
    }

    public function paid($id)
    {
        $order = Order::find($id);
        if($order->is_paid){
            $order->is_paid = 0;
        }else{
            $order->is_paid = 1;
        }
        $order->save();
        Toastr::success('Order Status has been changed', 'Success');
        return back();
    }

    public function invoice($id)
    {
        $order = Order::find($id);

        //return view('layouts.backend.pages.invoice',compact('order'));

        $pdf = PDF::loadView('layouts.backend.pages.invoice',compact('order'));
        return $pdf->stream('invoice.pdf');
    }
}
