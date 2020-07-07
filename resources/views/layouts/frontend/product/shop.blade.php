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
                    <li><a href="#">Home</a></li>
                    <li class='active'>Handbags</li>
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
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('layouts.frontend.partial.category_menu')
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    @include('layouts.frontend.partial.category_sidebar')
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img src="{{asset('assets/frontend/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive"> </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text"> Big Sale </div>
                                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div>


                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">
                                <div class="pagination-container">
                                    {{$products->links()}}
                                </div>
                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @if(count($products) > 0)
                                        @foreach($products as $product)

                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{route('product.detail',$product->slug)}}">
                                                                @php $i=1 @endphp
                                                                @foreach($product->images as $image)

                                                                    @if($i <= 1)
                                                                        <img  src="{{asset('storage/products/'.$image->image)}}" alt="">
                                                                    @endif
                                                                        @php $i++ @endphp
                                                                @endforeach

                                                            </a>
                                                        </div>
                                                        <!-- /.image -->
                                                        <div class="tag new"><span>new</span></div>
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('product.detail',$product->slug)}}">{{ $product->name }}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        <div class="product-price">
                                                            <span class="price"> {{ $product->price }} </span>
                                                            <span class="price-before-discount">$ 800</span>
                                                            <span style="margin-right: 10px;" class="pull-right">
                                                                <button onclick="addToCart({{$product->id}})" class="btn btn-warning" type="submit">Add to cart</button>
                                                            </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button onclick="addToCart({{$product->id}})" class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                                                </li>
                                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                        @endforeach
                                        @else
                                            <div class="col-sm-12 col-md-12 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img src="{{asset('assets/frontend/images/no_data.png')}}" alt="" class="img-responsive">
                                                            </div>
                                                            <br>
                                                            <h4 class="name text-center">Yet no product available </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane "  id="list-container">
                                <div class="category-product">
                                    <div class="category-product-inner wow fadeInUp">
                                        @foreach($products as $product)
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">

                                                        <div class="product-image">

                                                            <div class="image">
                                                                <a href="{{route('product.detail',$product->slug)}}">
                                                                    @php $i=1 @endphp
                                                                    @foreach($product->images as $image)

                                                                        @if($i<2)
                                                                            <img  src="{{asset('storage/products/'.$image->image)}}" alt="">
                                                                        @endif
                                                                        @php $i++ @endphp
                                                                    @endforeach

                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="{{route('product.detail',$product->slug)}}">{{$product->name}}</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price"> {{$product->price}} </span> <span class="price-before-discount">$ 800</span> </div>
                                                            <!-- /.product-price -->
                                                            <div class="description m-t-10">{!! Str::limit($product->description,200) !!}
                                                                <a href="{{route('product.detail',$product->slug)}}" class="btn"> More details</a>
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-list-row -->
                                                <div class="tag new"><span>new</span></div>
                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                        @endforeach
                                    </div>
                                    <!-- /.category-product-inner -->
                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->

                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    {{$products->links()}}
                                </div>
                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.text-right -->
                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('layouts.frontend.partial.brand_logo')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
        <!-- /.container -->

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
