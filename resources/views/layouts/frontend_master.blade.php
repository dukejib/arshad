<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="https://www.ribsncuts.com/" />
    <!-- The Title -->
    <title>Ribs n Cuts | The Meat Providers</title>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Fresh , Juicy, Beef & Mutton to cater your culinary needs. Let Ribs n Cuts be the part of your party by providinig tender meat to your door step">
    <meta name="keywords" content="meat,beef,mutton,mince,ribs,multan,local,nihari,gol,boti,delivery">
    <meta name="author" content="Ali Jibran">
    <meta name="createdby" content="https://karacraft.com">
    <meta name="robots" content="index.follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <!-- Get Special Meta Tages for Facebook Share -->
    @yield('meta-tags')

    <!-- Style Sheets -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/base.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/ribsncuts.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css')}}">
    <!-- Style Sheets -->
    <!-- Laravel-Notify Css -->
    @notifyCss
    <!-- External Style Sheets -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css"/>

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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122271693-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-122271693-1');
    </script>

</head>

<body>

    <div id="app">
        <div class="hero">
            {{-- FrontEnd Navigation --}}
            @include('includes.nav_front')
            {{-- FrontEnd Content --}}
            @yield('content')
        </div>
        {{-- Add Frontend Footer --}}
        @include('includes.frontend_footer')
        {{-- Add Login Modal --}}
        @include('includes.login_modal')
    </div>


<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}"></script>
{{-- <script src="{{ asset('/js/toastr.js') }}"></script> --}}
<script src="{{ asset('/js/ribsncuts.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script> 
<!-- Laravel-Notify JS-->
@notifyJs


    {{-- @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}",'Success');
    @elseif(Session::has('info'))
        toastr.info("{{ Session::get('info') }}",'Information');
    @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}",'Failed');
    @endif --}}

<!-- For Facebook -->
<script>
        window.fbAsyncInit = function() {
        FB.init({
            appId      : '237986806787117',
            xfbml      : true,
            version    : 'v3.0'
      });
      FB.AppEvents.logPageView();
    };
  
    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
<!-- Scripts -->
@yield('scripts')

</body>
</html>