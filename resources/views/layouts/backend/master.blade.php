<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Ecommerce | Admin Panel</title>

    <!-- Favicons -->
    <link href="{{asset('assets/backend/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/backend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/gritter/css/jquery.gritter.css')}}" />

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('assets/backend/lib/chart-master/Chart.js')}}"></script>

    @stack('css')

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('layouts.backend.partial.header')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    @include('layouts.backend.partial.sidebar')
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    @yield('content')
    <!--main content end-->
    <!--footer start-->
    @include('layouts.backend.partial.footer')
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/backend/lib/jquery/jquery.min.js') }}"></script>

<script src="{{asset('assets/backend/lib/bootstrap/js/bootstrap.min.js')}}"></script>


<script class="include" type="text/javascript" src="{{asset('assets/backend/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('assets/backend/lib/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/backend/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/backend/lib/jquery.sparkline.js')}}"></script>
<!--common script for all pages-->
<script src="{{asset('assets/backend/lib/common-scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/backend/lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/backend/lib/gritter-conf.js')}}"></script>

<script type="application/javascript">
    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>

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
@stack('js')

</body>

</html>

