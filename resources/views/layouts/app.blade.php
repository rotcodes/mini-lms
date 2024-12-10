<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">
    <meta name="description" content="Multi-Tenant, Course, Course Selling">

    <!-- Title -->
    <title>Oppida - Online Course & Education HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/fav.png') }}" type="image/x-icon">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('dashboard/assets/css/output.css') }}"> --}}
    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
    <!-- Icomoon Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/magnific-popup.min.css') }}">
    <!-- NoUi Range Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/nouislider.min.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/nice-select.css') }}">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/aos.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/animate.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="theme-color-1">
    <!-- Preloader start -->
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    <!-- Preloader end -->

    <!-- Header-area start -->
    @include('components.header')
    <!-- Header-area end -->

    @yield('content')

    <!-- Footer-area start -->
    @include('components.footer')
    <!-- Footer-area end-->

    <!-- Go top -->
    <div class="go-top"><i class="fal fa-long-arrow-up"></i></div>

    <!-- Magic Cursor -->
    <div class="cursor"></div>
    <!-- Jquery JS -->
    <script src="{{ asset('assets/js/vendors/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendors/bootstrap.min.js') }}"></script>
    <!-- Counter JS -->
    <script src="{{ asset('assets/js/vendors/jquery.counterup.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('assets/js/vendors/jquery.nice-select.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <!-- Noui Range Slider JS -->
    <script src="{{ asset('assets/js/vendors/nouislider.min.js') }}"></script>
    <!-- Swiper Slider JS -->
    <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <!-- Lazysizes -->
    <script src="{{ asset('assets/js/vendors/lazysizes.min.js') }}"></script>
    <!-- AOS JS -->
    <script src="{{ asset('assets/js/vendors/aos.min.js') }}"></script>
    <!-- Mouse Hover JS -->
    <script src="{{ asset('assets/js/vendors/mouse-hover-move.js') }}"></script>
    <!-- Main script JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('customJs')
</body>

</html>
