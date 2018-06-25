@extends('layout.frontend_master')

@section('meta-tags')
    {{-- For Facebook --}}
    <meta property="fb:app_id"                  content="237986806787117">
    <meta property="og:url"                     content="{{ route('view.product',['slug' => $product->slug ]) }}" />
    <meta property="og:type"                    content="website" />
    <meta property="og:title"                   content="{{ $product->title }}" />
    <meta property="og:description"             content="{{ $product->description }}"/>
    <meta property="og:image"                   content="{{ asset('/images/products/' . $product->image) }}" />
    <meta property="article:author"             content="Ribsncuts" />
    <meta property="article:publisher"          content="Ribsncuts" />
    <meta property="og:image:width"             content="700" />
    <meta property="og:image:height"            content="450" />
    {{-- For Twitter --}}
    <meta name="twitter:card" content="A Product from Ribsncuts">
    <meta name="twitter:site" content="Ribsncuts">
    <meta name="twitter:title" content="{{ $product->title }}">
    <meta name="twitter:description" content="{{ $product->description }}">
    <meta name="twitter:creator" content="Ribsncuts">
    <meta name="twitter:image" content="{{ asset('/images/products/' . $product->image) }}">
    <meta name="twitter:domain" content="ribsncuts.com">
@endsection

@section('content')
<br>
<br>
<br>
<div class="container block-white">
        
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
                            Share It!
                            {{-- Facebook --}}
                            <a target="_blank" 
                            onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('view.product',['slug' => $product->slug ]) }}&amp;src=sdkpreparse','Facebook Share','width=600,height=400'); return false;"
                            >
                            <i class="fa fa-facebook-square fa-2x"></i>
                            </a>


                            {{-- Twitter --}}
                            <a target="_blank" 
                            onclick="window.open('http://twitter.com/share?url={{ route('view.product',['slug' => $product->slug ]) }}&amp;via=ribsncuts.com&amp;text=Let us  Shop','Twitter Share','width=600,height=400'); return false;"
                            >
                            <i class="fa fa-twitter-square fa-2x"></i>
                            </a>


                            {{-- Pinterest --}}
                            <a target="_blank" 
                            onclick="window.open('https://www.pinterest.com/pin/create/button/?url={{ route('view.product',['slug' => $product->slug ]) }}&amp;media={{ asset('/images/products/' . $product->image) }}&amp;description={{$product->description}}','Pinterest Share','width=600,height=400'); return false;"
                            >
                            <i class="fa fa-pinterest-square fa-2x"></i>
                            </a>

                            {{-- Google Plus --}}
                            <a target="_blank" 
                            onclick="window.open('https://plus.google.com/share?url={{ route('view.product',['slug' => $product->slug ]) }}',
                            'Google Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-google-plus-square fa-2x"></i>
                            </a>
                     
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

@section('scripts')
{{-- Twitter Required --}}
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
{{-- Pinterest --}}
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
@endsection