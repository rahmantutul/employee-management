<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Businnes, Portfolio, Corporate"> 
	<meta name="Author" content="WebThemez"> 
    <title>EM &nabla; MANAGEMENT</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/font-awesome/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/elegant_font/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slider-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/elegant_font/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> 
    @stack('css')

</head>

<body>
   @include('frontend.layouts.header')
    
   @yield('content')


    <script src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sliderPro.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/contact/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('frontend/js/contact/contact_me.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @stack('script')
</body>
</html>
