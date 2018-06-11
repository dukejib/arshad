@extends('layout.backend_master')

@section('content')

<div class="col-sm-8">

    <h2>View Product</h2>
        
    <div class="card border-secondary mb-3">
        <div class="card-header bg-secondary text-white">
            {{ $product->title }}
        </div> 
        <img src="{{ asset('/assets/images/products/' . $product->image) }}" alt="" class="card-img-top">
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


@endsection
