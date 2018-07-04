@extends('layouts.frontend_master') 
@section('content')

<div class="container block-white mt-2">

    <div class="container">

        <div class="row ">
    
            <div class="col-lg-6 col-sm-12 mt-2 mb-2 order-1">
                @if($category == 'Beef')
                <img src="{{ asset('/images/cow-cut-chart.png') }}" alt="" style="display:block;margin:auto;"  class="img-fluid">
                @elseif ($category == 'Mutton')
                <img src="{{ asset('/images/goat-cut-chart.png') }}" alt="" style="display:block;margin:auto;"  class="img-fluid">
                @endif
            </div>
    
            <div class="col-lg-6 col-sm-12 mt-2 mb-2 order-0" >
                @if($category == 'Beef')
                <img src="{{ asset('/images/know-your-beef-cuts.png') }}" alt="" style="display:block;margin:auto;"  class="img-fluid">
                @elseif ($category == 'Mutton')
                <img src="{{ asset('/images/know-your-mutton-cuts.png') }}" alt="" style="display:block;margin:auto;"  class="img-fluid">
                @endif
            </div>

        </div>
    </div>

    <div class="container animated fadeIn">
           

        @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
            <div class="col-md-4 col-sm-6 col-lg-4 mt-4 mb-4">

                <div class="card">
                    <a href="{{ route('view.product',['slug' => $product->slug ]) }}">
                        <img class="card-img-top rounded-0" src="{{ asset('/images/products/' . $product->image) }}" alt="{{ $product->title }}">
                    </a>
                    <div class="card-body rounded-0">
                        <h5 style="font-weight:900">{{ $product->title }}</h5>
                        <p class="text-danger" style="font-weight:bold"> Rs. {{ $product->price_per_kg }} / Kg</p>
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

<br>
<br>
<br>
<br>
<br>

@endsection