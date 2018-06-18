@extends('layout.backend_master')

@section('content')

<div class="row">
    <div class="col-lg-6 col-sm-12 mt-4 mb-2">
        <h2>Add New Product</h2>
    </div>
    <div class="col-lg-2 col-sm-12 mt-4 mb-2">
    <a href="{{ route('product.index')}}" class="btn btn-success btn-block">Go Back</a>
    </div>
    
</div>
    
@include('includes.errors')

<div class="row">
    <div class="col-lg-8 col-sm-12">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="categroy" id="cateogry">
                        <option value="Beef">Beef</option>
                        <option value="Mutton">Mutton</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="cut_source">Cut Source</label>
                    <input type="text" name="cut_source" id="cut_source" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="best_for">Best For</label>
                    <input type="text" name="best_for" id="best_for" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                </div>
            
                <div class="form-group">
                    <label for="price_per_kg">Price Per Kg?</label>
                    <input type="text" name="price_per_kg" id="price_per_kg" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="">Ensure that Image size is 200x200 px only, otherwise, it will look bad</label>
                </div>
                <div class="form-group">
                    {{-- <label for="image" class="btn btn-info pull-left">Add Product Image</label> --}}
                    {{-- <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg"> --}}
                    <input id="image"  type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Save Product</button>
                </div>
                {{ csrf_field() }}
            </form>
    </div>
</div>


@endsection
