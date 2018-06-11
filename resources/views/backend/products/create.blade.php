@extends('layout.backend_master')

@section('content')

<h2>Edit Product</h2>

@include('includes.errors')
<br>
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

@endsection
