<!DOCTYPE html>
<html lang="en" class="group" data-sidebar-size="lg" class="group light" data-sidebar-size="lg" data-card-style="round" data-theme-mode="light" data-theme-width="fluid">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>LMS-HUB</title>
  <meta name="robots" content="noindex, follow">
  <meta name="description" content="web development agency">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}">
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/vendor/select/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/vendor/summernote.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/output.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-body-light dark:bg-dark-body group-data-[theme-width=box]:container group-data-[theme-width=box]:max-w-screen-3xl xl:group-data-[theme-width=box]:px-4">
    <div id="loader" class="w-screen h-screen flex-center bg-white dark:bg-dark-card fixed inset-0 z-[9999]">
        <img src="{{ asset('dashboard/assets/images/loader.gif') }}" alt="loader">
    </div>
    @if (!in_array(Route::currentRouteName(), ['login', 'signup', 'forgetPassword', 'resetPassword', 'verification.notice']))
    <!-- Start Header -->
    @include('components.admin.header')
    <!-- End Header -->
    @endif

    @if (!in_array(Route::currentRouteName(), ['login', 'signup', 'forgetPassword', 'resetPassword', 'verification.notice']))
    <!-- Start App Menu -->
    @include('components.admin.sidebar')
    <!-- End App Menu -->
    @endif

    <!-- Start App Settings Sidebar -->
    @include('components.admin.setting')
    <!-- End App Settings Sidebar -->

    <!-- Start Main Content -->
    @yield('admin-content')
    <!-- End Main Content -->

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/vendor/flowbite.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/vendor/smooth-scrollbar/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/dashboard-admin-lms.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/component/app-menu-bar.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/switcher.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/layout.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/vendor/select/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/vendor/summernote.min.js') }}"></script>
    <script>
        $.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
        });
    </script>
    @yield('customJs')
</body>
</html>
