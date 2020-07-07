@extends('layouts.backend.master')

@section('title','')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/backend/lib/advanced-datatable/css/DT_bootstrap.css')}}" />
    <style>
        .content-panel{
            padding: 20px;
        }
    </style>
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>ORDER ID #POR0{{ $order->id}}</h3>
            <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.order.index')}}" type="button" class="btn btn-theme">All Orders</a></h4>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <h3>Order Details
                            <span class="pull-right">
                                <form action="{{route('admin.order.invoice',$order->id)}}" method="post">
                                    @csrf
                                    <button type="submit" title="invoice" class="btn btn-upper btn-warning outer-left-xs">Invoice</button>
                                </form>
                            </span>
                        </h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Order ID :</strong> #POR0{{ $order->id}}</p>
                                <p><strong>Order Name :</strong> {{$order->name}}</p>
                                <p><strong>Phone :</strong> {{ $order->phone }}</p>
                                <p><strong>Email :</strong></p>
                                <p><strong>Message :</strong> {{$order->message}}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Shipping Address :</strong> {{ $order->shipping_address }}</p>
                                <p><strong>Order Name :</strong></p>
                                <p><strong>Payment :</strong> {{ $order->payment->name }}</p>
                                <p><strong>Transaction ID :</strong> {{$order->transaction_id}}</p>
                                <p style="float: left; margin-right:5px;"><strong>Status :</strong></p>
                                <p style="float: left; margin-right:5px;">
                                    @if ($order->is_completed)
                                    <span class="label label-success label-mini">completed</span>
                                    @else
                                    <span class="label label-warning label-mini">Progress</span>
                                    @endif
                                </p>
                                <p>
                                    @if ($order->is_paid)
                                    <span class="label label-success label-mini">Paid</span>
                                    @else
                                    <span class="label label-danger label-mini">Unpaid</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
            <div class="row mt">

                <div class="col-md-12">
                    <div class="content-panel">
                        <h3>Carts Item</h3>
                        <hr>
                        <div class="row">
                            <div class="shopping-cart mb-5">
                                @if($order->carts->count() > 0)
                                <div class="shopping-cart-table ">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Product Name</th>
                                                <th class="cart-edit item">Quantity</th>
                                                <th class="cart-qty item">Update</th>
                                                <th class="cart-sub-total item">Unit Price</th>
                                                <th class="cart-sub-total item">Subtotal</th>
                                                <th class="cart-romove item">Remove</th>
                                            </tr>
                                            </thead><!-- /thead -->
                                            <tbody>
                                                @php
                                                $totalPrice = 0;
                                                $taxRate = 5;
                                                @endphp
                                                @foreach($order->carts as $cart)
                                                <tr>
                                                    <td class="cart-image">
                                                        <a class="entry-thumbnail" href="{{route('product.detail',$cart->product->slug)}}">
                                                            @if($cart->product->images->count() > 0)
                                                            <img style="height:40px;" src="{{asset('storage/products/'.$cart->product->images->first()->image)}}" alt="">
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="cart-product-name-info">
                                                        <h4 class='cart-product-description'><a href="{{route('product.detail',$cart->product->slug)}}">{{$cart->product->name}}</a></h4>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="rating rateit-small"></div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="reviews">
                                                                    (06 Reviews)
                                                                </div>
                                                            </div>
                                                        </div><!-- /.row -->
                                                        <div class="cart-product-info">
                                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                                        </div>
                                                    </td>
                                                    <form action="{{route('carts.update',$cart->id)}}" method="post">
                                                    @csrf
                                                    <td class="cart-product-quantity">
                                                        <div class="quant-input">
                                                            <input class="quant-input" type="number" name="product_quantity" value="{{$cart->product_quantity}}">
                                                            <button type="submit" href="#" class="product-edit">Update</button>
                                                        </div>
                                                    </td>
                                                    <td class="cart-product-edit">
                                                        <button type="submit" href="#" class="product-edit">Update</button>
                                                    </td>
                                                    </form>
                                                    <td class="cart-product-sub-total">
                                                        <span class="cart-sub-total-price">{{$cart->product->price}} BDT</span>
                                                    </td>
                                                    <td class="cart-product-sub-total">
                                                        <span class="cart-sub-total-price">
                                                            @php
                                                                $totalPrice += $cart->product->price * $cart->product_quantity;
                                                            @endphp
                                                            {{$cart->product->price * $cart->product_quantity}} BDT
                                                        </span>
                                                    </td>
                                                    <td class="romove-item">
                                                        <form action="{{route('carts.delete',$cart->id)}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"/>
                                                            <button type="submit" title="cancel" class="btn btn-upper btn-danger outer-left-xs"><i class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody><!-- /tbody -->
                                        </table><!-- /table -->
                                    </div>
                                </div><!-- /.shopping-cart-table -->


                                <div class="col-md-3 col-sm-12 pull-left">


                                </div>
                                <div class="col-md-3 col-sm-12 pull-right">
                                    <p><strong>Subtotal :{{ $totalPrice }} BDT</strong></p>
                                    <p><strong>Tax 5% : {{ $tax = $totalPrice*$taxRate/100 }} BDT</strong></p>
                                    <p><strong>Grand Total : {{ $totalPrice + $tax}} BDT</strong></p>
                                    <hr>
                                    <div class="shopping-cart-btn">
                                        <form action="{{route('admin.order.seen',$order->id)}}" method="post" style="float:left;margin-right:10px">
                                            @csrf
                                            @if ($order->is_seen_by_admin)
                                            <input type="submit" value="Order Seen" class="btn btn-upper btn-success outer-left-xs"/>
                                            @else
                                            <input type="submit" value="Order Unseen" class="btn btn-upper btn-warning outer-left-xs"/>
                                            @endif
                                        </form>
                                        <form action="{{route('admin.order.completed',$order->id)}}" method="post" style="float:left;margin-right:10px">
                                            @csrf
                                            @if ($order->is_completed)
                                            <input type="submit" value="Complete Order" class="btn btn-upper btn-success outer-left-xs"/>
                                            @else
                                            <input type="submit" value="Cancel Order" class="btn btn-upper btn-danger outer-left-xs"/>
                                            @endif
                                        </form>
                                        <form action="{{route('admin.order.paid',$order->id)}}" method="post">
                                            @csrf
                                            @if ($order->is_paid)
                                            <input type="submit" value="Paid Order" class="btn btn-upper btn-success outer-right-xs"/>
                                            @else
                                            <input type="submit" value="Order Unpaid" class="btn btn-upper btn-danger outer-right-xs"/>
                                            @endif

                                        </form>
                                    </div><!-- /.shopping-cart-btn -->
                                </div>
                                @else
                                <div class="col-md-12 col-sm-12 cart-shopping-total">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn">
                                                    <p class="">There is no item in your cart !</p>
                                                    <a href="{{route('shop')}}" class="btn btn-primary checkout-btn">Continue Shopping</a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody><!-- /tbody -->
                                    </table><!-- /table -->
                                </div><!-- /.cart-shopping-total -->
                                @endif
                            </div><!-- /.shopping-cart -->
                        </div> <!-- /.row -->
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
@endsection

@push('js')
    <!-- js placed at the end of the document so the pages load faster -->


    <script type="text/javascript" language="javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
    <!--script for this page-->
    <script type="text/javascript">
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; margin-bottom:20px;">';
            sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
            sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
            sOut += '</table>';

            return sOut;
        }

        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '<img src="{{asset('assets/backend/lib/advanced-datatable/images/details_open.png')}}">';
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });

            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */

        });
    </script>
@endpush
