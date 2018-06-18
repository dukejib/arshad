@extends('layout.backend_master')

@section('content')


<div class="row">
    <div class="col-lg-10 col-sm-12 mt-4 mb-2">
        <h2>Add New Product</h2>
    </div>
    <div class="col-lg-2 col-sm-12 mt-4 mb-2">
    <a href="{{ route('product.create')}}" class="btn btn-success btn-block">Create New</a>
    </div>
    
</div>


<div>
@if(count($products)>0)
    <table class="table table-condensed table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Cut Source</th>
                <th>Best For</th>
                <th>Price / KG</th>
                <th>Description</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
            
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>
                <img src="{{ asset('/images/products/' . $product->image) }}" alt="" srcset="" width="100px">
            </td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->cut_source }}</td>
            <td>{{ $product->best_for }}</td>
            <td>{{ $product->price_per_kg }}</td>
            <td>{{ str_limit($product->description,25) }}</td>
            <td>
                <a href="{{ route('product.show',['id' => $product->id]) }}" class="btn btn-success">Show</a></td>
            <td>
                <a href="{{ route('product.edit',['id' => $product->id]) }}" class="btn btn-info">Edit</a>
            </td>
            <td>
                <form action="{{ route('product.destroy',['id' => $product->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{--This is necessary if using route::resource--}}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-xs btn-danger" type="submit">
                        <i class="fa fa-close fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h3 class="bg-info">There is no Product Available Yet</h3>
@endif
</div>

@endsection