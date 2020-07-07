<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>
        @yield('title', 'Online Shopping Market')
    </title>



    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap-select.min.css')}}">

    @stack('css')

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/font-awesome.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('layouts.frontend.partial.header')
<!-- ============================================== HEADER : END ============================================== -->
<!-- ============================================== MAIN CONTENT ============================================== -->
@yield('content')
<!-- ============================================== END : MAIN CONTENT ============================================== -->
<!-- ============================================================= FOOTER ============================================================= -->
@include('layouts.frontend.partial.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('assets/frontend/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/echo.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/scripts.js')}}"></script>
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
<script>
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    });

    function addToCart(product_id){

        $.post( "{{URL('api/carts/store')}}",
        {
            product_id: product_id
        })
        .done(function( data ) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                alertify.set('notifier','position', 'top-right');
                alertify.success('Item add to cart successfully');
                $("#totalItems").html(data.totalItems);
            }
        });

    }
</script>
@stack('js')
</body>
</html>
