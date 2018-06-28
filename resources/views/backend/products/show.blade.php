@extends('layouts.app')

@section('content')


<div class="row">

    <div class="col-md-3">
        {{-- Sidebar Here --}}
        @include('includes.sidebar_navigation')
    </div>

    <div class="col-md-9">

        <div class="row">
            <div class="col-md-4 col-sm-12 mt-4 mb-2">
                <h2>View Product</h2>
            </div>
            <div class="col-md-2 col-sm-12 mt-4 mb-2">
            <a href="{{ route('product.index')}}" class="btn btn-success btn-block">Go Back</a>
            </div>
        </div>
                
        <div class="row">
        
            <div class="col-sm-12 col-md-6">
                    
                <div class="card border-secondary mb-3">
                    <div class="card-header bg-secondary text-white">
                        {{ $product->title }}
                    </div> 
                    <img src="{{ asset('/images/products/' . $product->image) }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <p class="card-text"><strong>Description :</strong> {!! $product->description !!}</p>
                        <p><strong>Cut Source :</strong> {{ $product->cut_source }}</p>
                        <p><strong>Best For :</strong> {{ $product->best_for }}</p>
                        <p><strong>Price Per Kg :</strong> {{ $product->price_per_kg }}</p>
                    <a href="{{ route('product.index')}}" class="btn btn-primary">Back to Products</a>
                    </div>
                    <div class="card-footer bg-secondary text-white">
                        The Product was last updated @ {{ $product->updated_at->diffForHumans() }}
                    </div>
                </div>
                    
            </div>
        
        </div>
        
    </div>

</div>




@endsection
