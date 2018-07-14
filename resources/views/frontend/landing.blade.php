@extends('layouts.frontend_master')

@section('content')

{{-- Top Graphics --}}
<div class="container block-transparent mt-2 mb-2">
    
    <div class="row">
        
        <div class="col-lg-6 col-sm-12 animated fadeInLeft">
            
            <div class="headings animated fadeInLeft">
                The Meat Masters
                <p>
                    Our highly equipped and professional &quot;Meat Masters&quot; provides you the finely trimmed premium quality meat in all cuts
                </p>
            </div>
            
        </div>

        <div class="col-lg-6 col-sm-12 animated fadeInRight">
            <img src="{{ asset('/images/bughda.png') }}" alt="" style="display:block;margin:auto;">
        </div>

    </div>

</div>

{{-- Products --}}
<div class="container block-white mt-2">

    <div class="subheading">Our Cuts</div>

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

    <br>
    <br>

</div>

{{-- Delivery --}}
<div class="block-black">
    <div class="container">
        <div class="subheading">Product Quality & Service</div>
    
        <div class="row">
            <div class="col-lg-6 col-sm-12 about-product">
                <ul>
                    <li>Bacteria Free</li>
                    <li>Grass Fed</li>
                    <li>Temperature Controlled</li>
                    <li>Antibiotic Free</li>
                </ul>
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
        <div class="subheading">Visit our Outlet in Multan</div>
        
        {{-- Map --}}
        <div id="map">
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg6Ly4QKp1D_21tvBW6DZU40CFcGe4f6M&callback=initMap">
</script>

<script>
// Initialize and add the map
function initMap() {
    console.log("in map api");
  // The location of multan
  var multan = {lat: 30.228450, lng: 71.479049};
  // The map, centered at multan
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 16, center: multan});
  // The marker, positioned at multan
  var marker = new google.maps.Marker({position: multan, map: map});
}
</script>
@endsection