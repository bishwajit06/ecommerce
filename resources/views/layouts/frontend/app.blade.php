<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/bootstrap.min.css">
    <!-- MAIN CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/main.css">
    <!--my responsive-->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/responsive.css">
    <!--- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/nice-select.css">
    <!--- awl carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/owl.carousel.min.css">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
</head>
<body>
@include('layouts.frontend.partial.header')

@yield('content')

@include('layouts.frontend.partial.footer')
</body>
</html>
