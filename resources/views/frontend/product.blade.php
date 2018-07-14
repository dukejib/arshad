@extends('layouts.frontend_master')

@section('meta-tags')
    {{-- For Facebook --}}
    <meta property="fb:app_id"                  content="237986806787117">
    <meta property="og:url"                     content="{{ route('view.product',['slug' => $product->slug ]) }}" />
    <meta property="og:type"                    content="website" />
    <meta property="og:title"                   content="{{ $product->title }}" />
    <meta property="og:description"             content="{{ $product->description }}"/>
    <meta property="og:image"                   content="{{ asset('/images/products/' . $product->image) }}" />
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

<div class="container block-white mb-2 mt-2">
               
    <div class="row">

        {{-- Product Description --}}
        <div class="col-lg-8 col-sm-12 mb-2 mt-2 animated fadeInUp">
            <div class="col-lg-12">
                <div class="product-title">{{ $product->title }}</div>
            </div>
            <div class="col-lg-12">
                <img class="img-fluid" src="{{ asset('/images/products/' . $product->image) }}" alt="{{ $product->title }}">
            </div>
            <div class="col-lg-12">
                <div class="product-desc-header">Description</div>
            </div>
            <div class="col-lg-12">
                <div class="product-desc"> {{ $product->description }}</div>
            </div>
            
            <div class="col-lg-12">
                
                <div class="social-share">
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
        </div>
        
        {{-- Product Pricing --}}
        <div class="col-lg-4 col-sm-12">
            
            {{-- Back Button --}}
            <div class="col-lg-12 col-sm-12 mb-2 mt-2 clearfix">
                @if( $product->category == 'Beef')
                    <a href="{{ route('view.products',['slug' => 'Beef' ]) }}" class="btn btn-success rounded-0 float-right make-me-block">Go Back  <img src="{{ asset('/images/cow-white.png') }}" height="30px"> </a>
                @elseif( $product->category == 'Mutton')
                    <a href="{{ route('view.products',['slug' => 'Mutton' ]) }}" class="btn btn-success rounded-0 float-right make-me-block">Go Back  <img src="{{ asset('/images/goat-white.png') }}" height="30px"> </a>
                @endif
            </div>

            <div class="border border-secondary">

                {{-- Availability --}}
                <div class="col-lg-12 col-sm-12 text-center availability-text">
                    Currently, we are only available in <b>Multan</b>
                </div>

                {{-- Price --}}
                <div class="col-lg-12 col-sm-12">
                    <div class="price-text">
                        Rs. {{ $product->price_per_kg }} / Kg
                    </div>
                </div>

                {{-- Qty Buttons --}}
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row mt-3">
                        {{-- Qty Buttons --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 pt-2">
                            <div class="input-group">

                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number rounded-0" id="btnPlus">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                                
                                <input type="text" id="quantity" class="form-control input-number text-center" value="1" min="1" max="10">
                                
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger btn-number rounded-0" id="btnMinus">
                                    <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 pt-2">
                            <a href="#" id="addToCart" class="btn btn-success btn-block rounded-0">Add to Cart</a>
                        </div>

                    </div>
                </div>

                {{-- Payment Type --}}
                <div class="col-lg-12 col-sm-12 pt-4 pb-2">
                    <div class="payment-terms">
                        <i class="fa fa-money"></i> Pay at the time of delivery
                    </div>
                </div>


                <div class="row pt-2 pb-2 pl-2 pr-2">
                    <div class="col" >
                        @if( $product->category == 'Beef')
                            <img src="{{ asset('/images/cow.png') }}" alt="cow" class="mx-auto d-block">
                        @elseif( $product->category == 'Mutton')
                            <img src="{{ asset('/images/goat.png') }}" alt="goat" class="mx-auto d-block">
                        @endif
                    </div>
                    <div class="col pt-4">
                        <strong>Cut Source</strong><br>
                        <strong>{{ $product->cut_source}}</strong>
                    </div>
                </div>
            </div>

        </div>

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

@section('scripts')
{{-- Twitter Required --}}
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
{{-- Pinterest --}}
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script>
    $(document).ready(function(){
        var url = "{{ route('cart.add',['id' => $product->id , 'qty' => 5]) }}";
        var qty = parseInt($('#quantity').val());
        // console.log(qty);

        //Decrease Quantity
        $('#btnPlus').click(function(){
            if(qty < 10){
                qty = qty + 1;
                // console.log(qty);
                $('#quantity').val(qty);
            }
        })

        //Increase Quantity
        $('#btnMinus').click(function(){
            if(qty >  1){
                qty = qty- 1;
                // console.log(qty);
                $('#quantity').val(qty);
            }
        })

        //Add to Cart
        $('#addToCart').click(function(){
            $new_url = url.slice(0,-1) + qty;
            console.log($new_url);
            $.ajax({
                type:"GET",
                url: $new_url,
                dataType: "json",
                data: {'_token':$('meta[name=csrf-token]').attr('content')}, //get Csrf-Token
                success:function(res,status){
                    console.log('Resp : ' + res + ' Status : ' + status);
                    setInterval(function(){
                        toastr.success('Product Added to Cart','Success');
                    },2000);
                    // sessionStorage.setItem("SessionName","SessionData");
                    // $('#login_form')[0].reset();
                    //WE are all done
                    // $('#loginModal').modal('hide');
                    //Redirect to Profile
                    // window.location.replace(res);
                },
                error:function(res,status){
                    console.log('Resp : ' + res.statusText + ' Status : ' + status);
                    // console.log(obj.statusText + ' ' +  obj.status);
                    // swal({
                    //     title:"Operation Failed",
                    //     text:"Error sending email. Please try again.",
                    //     icon:"warning"
                    // });
                    // toastr.error(obj.error,'Operation Failed');
                },
                complete:function(){
                    location.reload();
                }
            });
        })
    });
</script>
@endsection