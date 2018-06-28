@extends('layouts.frontend_master')

@section('content')

<div class="container block-black">
    
    <div class="row">

        <div class="animated fadeInUp ml-5">
            <h1 class="heading-all">{{$user->name}}
            <br>
            <small class="text-justify">Welcome to your Profile</small>
            </h1>
            
        </div>
    </div>

</div>

<div class="container block-white">

    <div class="container">
        <h1 class="text-center heading-all">Get in Touch</h1>
        <br>
        <div class="container">
            Do Somethign Else Here - Like Tabs
        </div>
    </div>

</div>
    
@endsection






  