<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <title>Ribs n Cuts</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ali Jibran">
    <meta name="createdby" content="http://karacraft.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta-tags')     {{-- Get Special Meta Tages for Facebook Share --}}

    <!-- Style Sheets -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/base.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/ribsncuts.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css')}}">
    <!-- Style Sheets -->

    <!-- External Style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css"/>
    

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Dorsa" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Palanquin" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Meera+Inimai" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">  --}}


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/images/icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/images/icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/images/icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/images/icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/images/icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/images/icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/images/icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/images/icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/images/icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/images/icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/images/icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
  
    </style>

</head>

<body>

    <div id="hero">
        {{-- FrontEnd Navigation --}}
        @include('includes.frontend_navigation')
        {{-- FrontEnd Content --}}
        @yield('content')
    </div>
    {{-- Add Frontend Footer --}}
    @include('includes.frontend_footer')
    {{-- Add Login Modal --}}
    @include('includes.login_modal')

<!-- Scripts -->
<script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/toastr.js') }}"></script>
<script src="{{ asset('/js/ribsncuts.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Scripts -->
@yield('scripts')

</body>
</html>