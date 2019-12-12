<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Administration</title>
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- External Style Sheets -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css' />
</head>

<body>
    {{-- Navigation --}}
    @include('includes.nav_back')

    <div id="app">
        <main>
            @yield('content')

            @include('components.modals')
        </main>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    <script src="{{ asset('/js/backend.js') }}"></script>

</body>

</html>