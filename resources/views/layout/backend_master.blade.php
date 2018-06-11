<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Ali Jibran">
    <meta name="createdby" content="http://karacraft.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ribs n Cuts</title>

    <!-- Style Sheets -->
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/backend.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/toastr.css') }}">
    <!-- Style Sheets -->

    <!-- External Style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css"/>
   
</head>

<body>
   
    @include('includes.backend_navigation')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                {{-- Sidebar Here --}}
                @include('includes.sidebar_navigation')
            </div>
            <div class="col-sm-9">
                {{-- Actual Content --}}
                @yield('content')
            </div>
        </div>
    </div>


<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/toastr.js') }}"></script>

@yield('scripts')
<!-- Scripts -->
<script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}','Operation Successful');
        @endif
    
        @if(Session::has('info'))
            toastr.info('{{ Session::get('info') }}','Important Information');
        @endif
    
        @if(Session::has('danger'))
            toastr.error('{{ Session::get('danger') }}','Cascading Data');
        @endif
</script>
</body>
</html>