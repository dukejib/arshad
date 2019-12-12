@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="col">
                @if (count($products)>0)
                <table class="table table-is-narrow">
                    <thead class="thead-dark">
                        <tr>
                            <th>S#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Cut Source</th>
                            <th>Best For</th>
                            <th>Price / KG</th>
                            <th>Description</th>
                            <th>View</th>
                            <th>Edit</th>
                            {{-- <th>Delete</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>
                                <img src="{{ asset('/images/products/' . $product->image) }}" alt="" srcset=""
                                    width="100px">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->cut_source }}</td>
                            <td>{{ $product->best_for }}</td>
                            <td>{{ $product->price_per_kg }}</td>
                            <td>{{ str_limit($product->description,25) }}</td>
                            <td>
                                <a href="{{ route('product.show',['product' => $product]) }}">@fa('binoculars','fa-fw
                                    has-text-success')</a></td>
                            <td>
                                <a href="{{ route('product.edit',['product' => $product]) }}">@fa('edit','fa-fw
                                    has-text-primary')</a>
                            </td>
                            {{-- <td> --}}
                            {{-- <form action="{{ route('product.destroy',['id' => $product->id]) }}" method="post">
                            --}}
                            {{ csrf_field() }}
                            {{--This is necessary if using route::resource--}}
                            {{ method_field('DELETE') }}
                            {{-- <button class="btn btn-xs btn-danger" type="submit">
                                            <i class="fa fa-close fa-trash"></i>
                                        </button> --}}
                            {{-- </form> --}}
                            {{-- </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h5>Database is Empty</h5>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection