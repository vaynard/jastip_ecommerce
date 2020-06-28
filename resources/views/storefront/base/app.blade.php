<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('storefront/css/bootstrap.custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storefront/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('storefront/css/custom.css') }}" rel="stylesheet">
    @yield('custom_css')
</head>
<body>
    
    <div id="page">
        @include('storefront.base.header')
        @yield('content')
        @include('storefront.base.footer')
    </div>
    <!-- page -->
    
    <div id="toTop"></div><!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('storefront/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('storefront/js/main.js') }}"></script>

    @include('vendor.flashalert.alert')
    @yield('custom_js')
    @yield('styles')
    @yield('scripts')

</body>
</html>
