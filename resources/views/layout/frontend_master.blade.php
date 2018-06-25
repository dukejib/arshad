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
        @include('includes.frontend_navigation')
        @yield('content')
    </div>
    
    {{-- <img src="../public/images/bg-2.jpg"> --}}
    {{-- @include('includes.frontend_navigation') --}}
    
    {{-- @yield('content') --}}
    

    <footer>
        <div class="container">
            <h3 class="heading-all">Quick Links</h3>

            <div class="row">
                
                {{-- Line # 1 --}}
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <p style="padding:0;margin:0">Follow Us</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <ul style="list-style: none;padding:0;margin:0;">
                                <li><i class="fa fa-facebook-square fa-2x"></i></li>
                                <li><i class="fa fa-google-plus-square fa-2x"></i></li>
                                <li><i class="fa fa-twitter-square fa-2x"></i></li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <ul style="list-style: none;padding:0;margin:0;">
                                <li>ribsncuts@facebook.com</li>
                                <li>ribsncuts@gmail.com</li>
                                <li>ribsncuts@twitter.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Line # 2 --}}
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <p style="padding:0;margin:0">COntact Us</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <ul style="list-style: none;padding:0;margin:0;">
                                <li><i class="fa fa-facebook-square fa-2x"></i></li>
                                <li><i class="fa fa-google-plus-square fa-2x"></i></li>
                                <li><i class="fa fa-twitter-square fa-2x"></i></li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <ul style="list-style: none;padding:0;margin:0;">
                                <li>ribsncuts@gmail.com</li>
                                <li>ribsncuts@facebook.com</lip-0>
                                <li>ribsncuts@twitter.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                {{-- Line # 3 --}}
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <p style="padding:0;margin:0">COntact Us</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <ul style="list-style: none;padding:0;margin:0;">
                                <li><i class="fa fa-facebook-square fa-2x"></i></li>
                                <li><i class="fa fa-google-plus-square fa-2x"></i></li>
                                <li><i class="fa fa-twitter-square fa-2x"></i></li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <ul style="list-style: none;padding:0;margin:0;">
                                <li>ribsncuts@gmail.com</li>
                                <li>ribsncuts@facebook.com</lip-0>
                                <li>ribsncuts@twitter.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>



    {{-- Login Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Please Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row row-divided">
                
                <div class="col-md-6 column-2">
                    <h5>What is your email address</h5>
                    <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Your Email" maxlength="64">
                    <p class="marg-b0">
                        <small id="login_email_error"></small>
                    </p>
                    <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Your Password">
                    <p class="marg-b0">
                        <small id="login_password_error"></small>
                    </p>
                    <button class="btn btn-success btn-block rounded-0" onclick="user_login()"><i class="fa fa-login"></i> Login</button>
                </div>

                <div class="vertical-divider">or</div>

                <div class="col-md-6 column-1">
                    <form class="form">
                        <h5>Login with your social account</h5>
                        <p>Facebook</p>
                        <button type="button" class="btn btn-primary rounded-0 btn-block"><i class="fa fa-facebook"></i> Facebook</button>
                        <p>Goolge Plus</p>
                        <button type="button" class="btn btn-danger rounded-0 btn-block"><i class="fa fa-google-plus-square"></i> Goolge Plus</button>
                    </form>
                </div>
                    
             
            </div>
            
        </div>
       
        </div>
    </div>
</div>

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