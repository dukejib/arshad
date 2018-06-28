<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ali Jibran">
    <meta name="createdby" content="http://karacraft.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/backend.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/toastr.css') }}" rel="stylesheet">

    <!-- External Style Sheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet"/>

</head>

<body>
    {{-- Navigation --}}
    @include('includes.backend_navigation')
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/toastr.js') }}"></script>
    <script src="{{ asset('/js/backend.js') }}" defer></script>

    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}",'Success');
        @elseif(Session::has('info'))
            toastr.success("{{ Session::get('info') }}",'Information');
        @elseif(Session::has('failure'))
            toastr.success("{{ Session::get('failure') }}",'Failed');
        @endif
    </script>
</body>
</html>
