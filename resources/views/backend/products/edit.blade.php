@extends('layout.backend_master')

@section('content')

<div class="row">
    <div class="col-lg-10 col-sm-12 mt-4 mb-2">
        <h2>Edit Product</h2>
    </div>
    <div class="col-lg-2 col-sm-12 mt-4 mb-2">
    <a href="{{ route('product.index')}}" class="btn btn-success btn-block">Go Back</a>
    </div>
</div>

@include('includes.errors')
<br>
<div class="row">

    <div class="col-md-6 col-sm-12">

        <form action="{{ route('product.update',['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
            {{-- <div>{{ str_slug($product->title) }}</div> --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}"> 
            </div>
        
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                    @if($product->category == 'Beef')
                        <option value="Beef"  selected>Beef</option>
                        <option value="Mutton">Mutton</option>
                    @elseif ($product->category == 'Mutton')
                        <option value="Beef">Beef</option>
                        <option value="Mutton" Selected>Mutton</option>
                    @endif
                </select>
            </div>
        
            <div class="form-group">
                <label for="cut_source">Cut Source</label>
                <input type="text" name="cut_source" id="cut_source" class="form-control" value="{{ $product->cut_source }}">
            </div>
        
            <div class="form-group">
                <label for="best_for">Best For</label>
                <input type="text" name="best_for" id="best_for" class="form-control" value="{{ $product->best_for }}">
            </div>
        
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="price_per_kg">Price Per Kg?</label>
                <input type="text" name="price_per_kg" id="price_per_kg" class="form-control" value="{{ $product->price_per_kg }}">
            </div>
            <div class="from-group">
                <label for="">Exisiting Image (Ensure that Image size is <strong>700x450px</strong> only, otherwise, it will look bad)</label>
                <img src="{{ asset('/images/products/' . $product->image) }}" alt="" srcset="" width="350px" class="form-control"> 
            </div>
            <div class="form-group">
                {{-- <label for="image" class="btn btn-info pull-left">Add Product Image</label> --}}
                {{-- <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg"> --}}
                <input id="image"  type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Update Product</button>
            </div>
            {{ csrf_field() }}
            {{-- This is required since we are using Route::resource() --}}
            {{ method_field('PUT') }}
        </form>

    </div>

</div>

@endsection
