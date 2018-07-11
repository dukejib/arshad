@extends('layouts.frontend_master') 
@section('content')

<div class="container block-white mt-2">

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
   
    <div class="animated fadeIn">
           
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

                    <div class="row m-2">

        
                        {{-- Qty Buttons --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row mt-3">
                                {{-- Qty Buttons --}}
                                <div class="col-lg-6 col-md-6 col-sm-12 pt-2">
                                    <div class="input-group">
        
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-number rounded-0 button-add" id="{{ $product->id }}">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                        
                                        <input type="text" id="quantity{{$product->id }}" class="form-control input-number text-center" value="1" min="1" max="10">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-danger btn-number rounded-0 button-minus" id="{{ $product->id }}">
                                            <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 pt-2">
                                    <button type="button" id="{{ $product->id }}" class="btn btn-success btn-block rounded-0 button-addtocart">Add to Cart</button>
                                </div>
        
                            </div>
                        </div>


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

@section('scripts')

<script>

$(document).ready(function(){
    var url = "{{ route('cart.add',['id' => 1 , 'qty' => 5]) }}";
    console.log(url);
    var qty;
    // console.log(qty);

    $('.button-add').click(function(){
        console.log(this.id);
        $name = '#quantity' + this.id;
        qty = parseInt($($name).val());
          
        if(qty < 10){
            qty = qty + 1;
            // console.log(qty);
            $($name).val(qty);
        }
    })

    $('.button-minus').click(function(){
        console.log(this.id);
        $name = '#quantity' + this.id;
        qty = parseInt($($name).val());
          
        if(qty >  1){
            qty = qty- 1;
            // console.log(qty);
            $($name).val(qty);
        }
    })

    $('.button-addtocart').click(function(){
        console.log(this.id);
        $id = this.id;  //Product Id
        $qty = $('#quantity' + this.id).val();
        $new_url = url.slice(0,-4) + '/' + $id + '/' + $qty;
        console.log($new_url);
        $.ajax({
            type:"GET",
            url: $new_url,
            dataType: "json",
            data: {'_token':$('meta[name=csrf-token]').attr('content')}, //get Csrf-Token
            success:function(res,status){
                console.log('Resp : ' + res + ' Status : ' + status);
                // toastr.success('Product Added to Cart','Success');
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
        })
    })


});
</script>

@endsection