@extends('layouts.frontend_master') 
@section('content')


{{-- Beef/Mutton Picture Here--}}
<div class="container block-transparent">
    
        <div class="row">
    
            <div class="col-lg-6 col-sm-12 animated fadeInLeft">
                <h1 class="heading-block-transparent">The Meat Masters</h1>
                <p class="text-justify">
                    <p class="subheading">

                            Ribsncuts offers you a complete variety of Mutton cuts produced by quality bred goats treated with tenderness and a committed shariah compliant process. At Meat One, customers are always our first priority!</p>
                </p>
            </div>
    
            <div class="col-lg-6 col-sm-12 animated fadeInRight">
                @if($category == 'Beef')
                <img src="{{ asset('/images/cow-tray.jpg') }}" alt="" style="display:block;margin:auto;" width="400px">
                @elseif ($category == 'Mutton')
                <img src="{{ asset('/images/goat-tray.jpg') }}" alt="" style="display:block;margin:auto;" width="400px">
                @endif
            </div>
    
        </div>
    
    </div>


<div class="container block-white">

    <div class="container">
            <h2 class="heading-all">All Cuts</h2>

        @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
            <div class="col-md-4 col-sm-6 col-lg-4 mt-4 mb-4">

                <div class="card">
                    <a href="{{ route('view.product',['slug' => $product->slug ]) }}">
                        <img class="card-img-top rounded-0" src="{{ asset('/images/products/' . $product->image) }}" alt="{{ $product->title }}">
                    </a>
                    <div class="card-body rounded-0">
                        <h5>{{ $product->title }}</h5>
                        <p class="text-danger"> Rs. {{ $product->price_per_kg }} / Kg</p>
                        <p class="card-text">{!! str_limit($product->description,100) !!}</p>

                    </div>
                </div>

            </div>
            @endforeach
        </div>
        @endforeach

    </div>

    <br>
    <br>

</div>
@endsection