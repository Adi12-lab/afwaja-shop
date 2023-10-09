<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Arowana - Beard Oil Responsive HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />
    @yield("styles")
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        @include('layouts.inc.frontend.header')
        @include('layouts.inc.frontend.utilize')

        @yield('main')

        @include('layouts.inc.frontend.feature')
        @include('layouts.inc.frontend.footer')
        <livewire:frontend.quick-view />
        <livewire:frontend.cart.alert />
        <livewire:frontend.wishlist.alert />
    </div>

    <!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield("scripts")
    @stack('scripts')

</body>

</html>
