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
                    <li class='active'>Checkout</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs outer-bottom-xs">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    @if(App\Cart::totalItems() > 0)
                    <div class="col-md-6">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                @include('layouts.frontend.partial.messages')
                                <h4>Shipping Address</h4>
                                <hr>
                                <form class="register-form outer-top-xs" role="form" method="post" action="{{ route('checkout.store') }}">

                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="info-title" for="name">Name <span>*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror unicase-form-control text-input" id="name" name="name" value="{{ Auth::check() ? Auth::user()->first_name .' '. Auth::user()->last_name : '' }}" required autocomplete="name" autofocus >
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror unicase-form-control text-input" id="phone" name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}" required autocomplete="phone" autofocus >
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="shipping_address">Shipping Address <span>*</span></label>
                                                <textarea id="about" name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror unicase-form-control text-input" rows="1" required autocomplete="shipping_address" autofocus>{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>
                                                @error('shipping_address')
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="message">Aditional Message (optional)</label>
                                                <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror unicase-form-control text-input" rows="3" autocomplete="message" autofocus>{{ old('message') }}</textarea>
                                                @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="payment">Select A Payment Methoud <span>*</span></label>
                                                <select class="form-control @error('payment') is-invalid @enderror unicase-form-control text-input" id="payments" name="payment" required autocomplete="payment">
                                                    <option value="" selected>Select A Payment Methoud</option>
                                                    @foreach($payments as $payment)
                                                        <option value="{{$payment->short_name}}">{{$payment->name}}</option>
                                                    @endforeach
                                                </select>

                                                @foreach($payments as $payment)
                                                    @if($payment->short_name == "cash_in")
                                                    <div class="hidden" id="payments-{{$payment->short_name}}">
                                                        <br>
                                                        <div class="alert alert-warning">
                                                            <h3>{{$payment->name}} Payment</h3>
                                                            <p>There is nothing nessesary. Just finish the order.You will get your product in two or three days.</p>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="hidden" id="payments-{{$payment->short_name}}">
                                                        <br>
                                                        <div class="alert alert-warning">
                                                            <div class="">
                                                                <h3>{{$payment->name}} Payment</h3>
                                                                <p><strong>{{$payment->name}} NO: {{$payment->no}}</strong> </p>
                                                                <p><strong>Account Type: {{$payment->type}}</strong> </p>
                                                                <p>Please send the above money to this {{$payment->name}} account no and write transactoin ID below there.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach

                                                <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="{{$payment->name}}-Transaction ID">

                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary checkout-btn pull-left outer-left-xs">PLACE ORDER</button>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">YOUR ORDER</h4>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                                </thead><!-- /thead -->

                                                <tbody>
                                                @php
                                                    $totalPrice = 0;
                                                    $taxRate = 5;
                                                    $shippingCost = App\Setting::first()->shipping_cost;
                                                @endphp
                                                @foreach(App\Cart::totalCarts() as $cart)
                                                    <tr>
                                                        <td style="padding: 5px">
                                                            <h5>{{$cart->product->name}} x {{$cart->product_quantity}}</h5>
                                                        </td>
                                                        <td style="padding: 5px">
                                                                <span>
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
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr style="border-top: 1px solid #888888">
                                                        <td style="padding: 10px;"><strong>Subtotal: </strong></td>
                                                        <td style="padding: 10px; text-align:center;"><strong>{{ $totalPrice }} BDT</strong></td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid #888888">
                                                        <td style="padding: 10px;"><strong>Tax 5% : </strong></td>
                                                        <td style="padding: 10px; text-align:center;"><strong> {{ $tax = $totalPrice*$taxRate/100 }} BDT</strong></td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid #888888; border-bottom: 1px solid #333333">
                                                        <td style="padding: 10px;"><strong>Shipping cost: </strong></td>
                                                        <td style="padding: 10px; text-align:center;"><strong> {{ $shippingCost }} BDT</strong></td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid #888888; border-bottom: 1px solid #333333">
                                                        <td style="padding: 10px;"><strong>Grand Total: </strong></td>
                                                        <td style="padding: 10px; text-align:center;"><strong> {{ $totalPrice + $tax + $shippingCost}} BDT</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('carts')}}" class="btn btn-upper btn-primary pull-left outer-left-xs">Change cart</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="cart-checkout-btn">
                                    <p class="">There is no item in your cart !</p>
                                    <a href="{{route('shop')}}" class="btn btn-primary checkout-btn">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection

@push('js')

    <script>
        $("#payments").change(function(){

            var paymentMethoud = $("#payments").val();
            if(paymentMethoud == "cash_in"){
                $("#payments-cash_in").removeClass('hidden');
                $("#payments-bkash").addClass('hidden');
                $("#payments-rocket").addClass('hidden');
                $("#transaction_id").addClass('hidden');
            }else if(paymentMethoud == "bkash"){
                $("#payments-bkash").removeClass('hidden');
                $("#payments-rocket").addClass('hidden');
                $("#payments-cash_in").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }else if(paymentMethoud == "rocket"){
                $("#payments-rocket").removeClass('hidden');
                $("#payments-bkash").addClass('hidden');
                $("#payments-cash_in").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }
        })

    </script>

@endpush
