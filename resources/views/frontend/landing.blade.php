@extends('layouts.frontend_master')

@section('meta-tags')
    {{-- For Facebook --}}
    <meta property="fb:app_id"                  content="237986806787117">
    <meta property="og:url"                     content="{{ route('home') }}" />
    <meta property="og:type"                    content="website" />
    <meta property="og:title"                   content="RibsnCuts" />
    <meta property="og:description"             content="Fresh , Juicy, Beef & Mutton to cater your culinary needs. Let Ribs n Cuts be the part of your party by providinig tender meat to your door step"/>
    <meta property="og:image"                   content="{{ asset('/images/ribsncuts-256b.png') }}" />
    <meta property="og:image:width"             content="256" />
    <meta property="og:image:height"            content="256" />
    {{-- For Twitter --}}
    <meta name="twitter:card" content="Ribsncuts">
    <meta name="twitter:site" content="Ribsncuts">
    <meta name="twitter:title" content="RibsnCuts">
    <meta name="twitter:description" content="Fresh , Juicy, Beef & Mutton to cater your culinary needs. Let Ribs n Cuts be the part of your party by providinig tender meat to your door step">
    <meta name="twitter:creator" content="Ribsncuts">
    <meta name="twitter:image" content="{{ asset('/images/ribsncuts-256b.png') }}">
    <meta name="twitter:domain" content="ribsncuts.com">
@endsection



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
    {{-- <div class="carousel carousel-slider">
            <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"></a>
            <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2"></a>
            <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
            <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
            <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
          </div> --}}

    <div class="row">
        @foreach($products as $product) 
        <div class="col s12 m4"> 
            <div class="carousel carousel-slider">
                    <a class="carousel-item" href="#">
                        <div class="card">
                            <div class="card-image">
                                <img class="card-img-top rounded-0" src="{{ asset('/images/products/' . $product->image) }}" alt="{{ $product->title }}">
                                <span class="card-title">{{ $product->title }}</span>
                            </div>
                            <div class="card-content">
                                <p class="card-text">{!! str_limit($product->description,100) !!}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('view.product',['slug' => $product->slug ]) }}" class="btn btn-danger rounded-0">Read More!</a>
                            </div>
                        </div>
                    </a>
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