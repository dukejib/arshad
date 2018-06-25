@extends('layout.frontend_master') 
@section('content')
<br>
<br>
<br>
<div class="container block-white">
    <h1 class="heading-all text-center">All Cuts</h1>
    <br>

    <div class="container">

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
    <br>
    <br>

</div>
@endsection