@extends('layouts.frontend_master')

@section('content')

{{-- Top Graphics --}}
<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="col-lg-6 col-sm-12 animated fadeInLeft">
            <h1 class="heading-block-transparent">The Meat Masters</h1>
            <p class="text-justify">
                <p class="subheading">Our highly equipped and professional &quot;Meat Masters&quot; provides you the finely trimmed premium quality meat in all cuts.</p>
            </p>
        </div>

        <div class="col-lg-6 col-sm-12 animated fadeInRight">
            <img src="{{ asset('/images/bughda.png') }}" alt="" style="display:block;margin:auto;">
        </div>

    </div>

</div>

{{-- Products --}}
<div class="container block-white mt-2">

    <div class="container">
        <h2 class="heading-all">Our Cuts</h2>

        <div class="owl-carousel owl-theme animated fadeInUp">

            @foreach($products as $product) 
            <!-- class='item' is required by owl-carousel >> check my.js -->
            <div class="card">
                <h5 class="card-header text-center bg-danger text-white rounded-0">{{ $product->title }}</h5>
                <a href="{{ route('view.product',['slug' => $product->slug ]) }}">
                    <img class="card-img-top rounded-0" src="{{ asset('/images/products/' . $product->image) }}" alt="{{ $product->title }}">
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

</div>

{{-- Delivery --}}
<div class="block-black">
    <div class="container">
        <h2 class="heading-all">About Our Products</h2>
    
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <ul>
                            <li># 1</li>
                            <li># 2</li>
                            <li># 3</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li># 1</li>
                            <li># 2</li>
                            <li># 3</li>
                        </ul>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-lg-6 col-sm-12">
                <img src="{{ asset('/images/rider.png') }}" alt="" srcset="" class="img-fluid mx-auto d-block">
            </div>
        </div>

    </div>
</div>

{{-- Map --}}
<div class="map-white">
    <div class="container">
        <h2 class="heading-all">Visit our Outlet</h2>
        
        {{-- Map --}}
        <div id="map">
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
{{-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg6Ly4QKp1D_21tvBW6DZU40CFcGe4f6M&callback=initMap">
</script> --}}

<script>
// Initialize and add the map
function initMap() {
    console.log("in map api");
  // The location of Uluru
  var uluru = {lat: 30.157458, lng: 71.524915};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 12, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
@endsection