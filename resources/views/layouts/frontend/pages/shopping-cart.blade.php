@extends('layouts.frontend.master')

@section('title')
    Online Shopping Market
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class='active'>Shopping Carts</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs outer-bottom-xs">
        <div class="container">
            <div class="row">
                <div class="shopping-cart mb-5">
                    @if(App\Cart::totalItems() > 0)
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-edit item">Quantity</th>
                                    <th class="cart-qty item">Update</th>
                                    <th class="cart-sub-total item">Unit Price</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{route('shop')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php
                                $totalPrice = 0;
                                $taxRate = 5;
                                @endphp
                                @foreach(App\Cart::totalCarts() as $cart)
                                <tr>
                                    <td class="romove-item">
                                        <form action="{{route('carts.delete',$cart->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id"/>
                                            <button type="submit" title="cancel" class="icon"><i class="fa fa-trash-o"></i></button>
                                        </form>

                                    </td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="{{route('product.detail',$cart->product->slug)}}">
                                            @if($cart->product->images->count() > 0)
                                            <img src="{{asset('storage/products/'.$cart->product->images->first()->image)}}" alt="">
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
                                </tr>
                                @endforeach
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Estimate shipping and tax</span>
                                    <p>Enter your destination to get shipping and tax.</p>
                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="info-title control-label">Country <span>*</span></label>
                                        <select class="form-control unicase-form-control selectpicker">
                                            <option>--Select options--</option>
                                            <option>India</option>
                                            <option>SriLanka</option>
                                            <option>united kingdom</option>
                                            <option>saudi arabia</option>
                                            <option>united arab emirates</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">State/Province <span>*</span></label>
                                        <select class="form-control unicase-form-control selectpicker">
                                            <option>--Select options--</option>
                                            <option>TamilNadu</option>
                                            <option>Kerala</option>
                                            <option>Andhra Pradesh</option>
                                            <option>Karnataka</option>
                                            <option>Madhya Pradesh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">Zip/Postal Code</label>
                                        <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">{{ $totalPrice }} BDT</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Tax 5%<span class="inner-left-md">{{ $tax = $totalPrice*$taxRate/100 }} BDT</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">{{ $totalPrice + $tax}} BDT</span>
                                    </div>
                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{route('checkout')}}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                        <span class="">Checkout with multiples address!</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
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
        </div><!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection

@push('js')

    <script>
        $(".pagination-container").find("ul").removeClass("pagination").addClass("list-inline list-unstyled").
        find(".active").css({"color": "#106DB2"});
        $(".pagination-container .page-item").first().addClass("prev");
        $(".pagination-container .page-item").last().addClass("next");

    </script>

@endpush
