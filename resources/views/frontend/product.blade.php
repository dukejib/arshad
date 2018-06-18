@extends('layout.frontend_master')

@section('content')
<br>
<br>
<br>
<div class="container block-product">

    {{-- <div class="container"> --}}
        
        <div class="row">

                <div class="col-lg-8 col-sm-12 mb-2 mt-2">
                    <div class="col-lg-12">
                        <h1 class="heading-all">{{ $product->title }}</h1>
                    </div>
                    <div class="col-lg-12">
                        <img class="img-fluid" src="{{ asset('/images/products/' . $product->image) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="col-lg-12">
                        <h3 class="mt-3"><strong>Description</strong></h3>
                    </div>
                    <div class="col-lg-12">
                        <h5> {{ $product->description }}</h5>
                    </div>
                    <hr>
                    <div class="col-lg-12 mb-4">
                        <strong>Share it!</strong>
                        <i class="fa fa-facebook-square fa-2x" title="facebook"></i>
                        <i class="fa fa-twitter-square fa-2x" title="twitter"></i>
                        <i class="fa fa-instagram fa-2x" title="instagram"></i>
                        <i class="fa fa-google-plus-square fa-2x" title="Google +"></i>
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-12">
                   
                    <div class="col-lg-12 col-sm-12 mb-3 mt-2 clearfix">
                        @if( $product->category == 'Beef')
                            <a href="{{ route('view.products',['slug' => 'Beef' ]) }}" class="btn btn-success rounded-0 float-right">Go Back  <img src="{{ asset('/images/cow-white.png') }}" height="30px"> </a>
                        @elseif( $product->category == 'Mutton')
                            <a href="{{ route('view.products',['slug' => 'Mutton' ]) }}" class="btn btn-success rounded-0 float-right">Go Back  <img src="{{ asset('/images/goat-white.png') }}" height="30px"> </a>
                        @endif
                    </div>

                    <div class="border border-secondary">

                        <div class="col-lg-12 col-sm-12 text-center pt-2">
                            Currently, we are only available in Multan
                        </div>
                        <div class="col-lg-12 col-sm-12 text-danger text-center mb-2" style="font-size:125%;font-weight:bold;">
                            Rs. {{ $product->price_per_kg }} / Kg
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="row mt-3">

                                <div class="col-lg-6 col-sm-12 pt-2">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-danger btn-number rounded-0"  data-type="minus" data-field="quant[2]">
                                            <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-number rounded-0" data-type="plus" data-field="quant[2]">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 pt-2">
                                    <a href="#" class="btn btn-success btn-block rounded-0">Add to Cart</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 pt-4 pb-2">
                            Pay at the time of delivery
                        </div>
                        <div class="row pt-4 pb-2">
                            <div class="col-lg-6 col-sm-6">
                                @if( $product->category == 'Beef')
                                    <img src="{{ asset('/images/cow.png') }}" alt="cow" class="img-fluid float-right" width="96px">
                                @elseif( $product->category == 'Mutton')
                                    <img src="{{ asset('/images/goat.png') }}" alt="cow" class="img-fluid float-right" width="96px">
                                @endif
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <h3>Cut Source</h3>
                                {{ $product->cut_source}}
                            </div>
                        </div>
                    </div>

                </div>

        </div>
        

    {{-- </div> --}}
       
    <br>
    <br>
    <br>
    <br>

</div>
    

@endsection