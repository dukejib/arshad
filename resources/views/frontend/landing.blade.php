@extends('layout.frontend_master')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css'/>
@section('content')

<div class="container bg-transparent">
    
    <div class="row">

        <div class="col animated fadeInUp">
            <h1>The Meat Masters</h1>
            <p><h3>Our highly equipped and professional &quot;Meat Masters&quot; provides you the finely trimmed premium quality meat in all cuts.</h3></p>
        </div>

        <div class="col animated fadeInUp">
            <img src="{{ asset('/assets/images/letsmeet-medium.png') }}" alt="" style="display:block;margin:auto;">
        </div>

    </div>

</div>

<div class="container bg1">

    <div class="container">
        <h1 class="text-center">Products</h1>

        <div class="owl-carousel owl-theme animated fadeIn">

            @foreach($products as $product) 
            {{--  class='item' is required by owl-carousel >> check my.js  --}}
            <div class="card">
                <h5 class="card-header text-center bg-danger text-white rounded-0">{{ $product->title }}</h5>
                <a href="{{ route('view.product',['slug' => $product->slug ]) }}">

                        <img class="card-img-top rounded-0" src="{{ asset('/assets/images/products/' . $product->image) }}" alt="{{ $product->title }}">
                </a>
                <div class="card-body rounded-0">
                  <p class="card-text">{!! str_limit($product->description,100) !!}</p>
                  <a href="{{ route('view.product',['slug' => $product->slug ]) }}" class="btn btn-danger rounded-0">Read More!</a>
                </div>
            </div>
            @endforeach
    
    
        </div>

    </div>
       
    <br>
    <br>
    <br>
    <br>

</div>
    

@endsection