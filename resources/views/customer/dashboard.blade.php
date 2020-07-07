@extends('layouts.frontend.master')

@section('title')
    Online Shopping Market
@endsection

@push('css')
<style>
    .thankyou_message p{
        font-size: 22px;
        border: 2px dotted #29441d;
        padding: 10px;
        }
</style>
@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class='active'>My Account</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> My Account</div>
                        <nav class="yamm megamenu-horizontal">
                            <ul class="nav">
                            <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                <li><a href="#">Orders</a></li>
                                <li><a href="#">Account Details</a></li>
                                <li><a href="#">Shipping Address</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                            <!-- /.nav -->
                        </nav>
                    </div>
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="clearfix filters-container m-t-5">
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="thankyou_message">
                                    @include('layouts.frontend.partial.messages')
                                </div>
                                <h4>Hello <strong>{{ Auth::user()->first_name.' '.Auth::user()->last_name}}</strong>!</h4>
                                <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

    </div>
    <!-- /.body-content -->
@endsection

@push('js')

@endpush
