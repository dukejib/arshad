@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
     
    <div class="row">

        <div class="animated fadeInUp">
            <h1 class="heading-all">Shopping Cart</h1>
            <p class="text-justify"><h3>View your selected items, alter item quantity as per requirements</h3></p>
        </div>
    </div>

</div>
    

<div class="container block-white mt-2">

    <h2 class="heading-all">Shopping Cart</h2>

    @if(Session::has('cart'))

    <div class="table-responsive-sm table-responsive-md">
            <table class="table table-bordered" style="height: 100px">
                <thead class="thead-dark text-white text-uppercase text-center">
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity in Kg</th>
                        <th>Amount in PKR</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach(Cart::content() as $product)
                <tbody class="text-center" style="font-weight:bold">
                    <td class="align-middle"><img class="img-fluid" width="100px" src="{{ asset('/images/products/' . $product->model->image) }}" alt="{{ $product->name }}"></td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle" style="width:20%">
                        <div class="input-group">

                            <span class="input-group-btn">
                                <a href="{{ route('cart.increase',['id' => $product->rowId , 'qty' => $product->qty] ) }}" class="btn btn-xs btn-success rounded-0"><i class="fa fa-plus fa-1x"></i></a>
                                
                            </span>
                            
                            <input type="text" id="quantity" class="form-control input-number text-center" value="{{ $product->qty }}">
                            
                            <span class="input-group-btn">
                                    <a href="{{ route('cart.decrease',['id' => $product->rowId , 'qty' => $product->qty]) }}" class="btn btn-xs btn-danger rounded-0" ><i class="fa fa-minus fa-1x"></i></a>
                            </span>
                        </div>
                        
                    </td>
                    <td class="align-middle">{{ $product->price }}</td>
                    <td class="align-middle">
                    <a href="{{ route('cart.remove',['rowid' => $product->rowId]) }}"> <i class="fa fa-times-circle fa-2x text-danger"></i></a>
                    </td>
                </tbody>
                @endforeach
                <tfoot class="bg-dark text-white">
                        <tr>
                            <td colspan="5" class="text-right text-white" style="font-size:20px;font-weight:bold">Subtotal : RS {{ Cart::subtotal() }}</td>
                        </tr>
                </tfoot>
    
            </table>
        </div>
    
        <div class="row">

            <div class="col-sm-12 col-md-6">
                {{-- Mode of Payment --}}
                <div class="card mt-2 mb-2">

                    <div class="card-body">
                        <h4 class="card-title"><i class="fa fa-money"></i> Mode of Payment </h4>
                        <hr>
                        <h5>Cash on Delivery <i class="fa fa-motorcycle"></i>
                        <br>
                        <small>Pay at the time of Delivery</small>
                        </h5> 
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                {{-- Grand Total --}}
                <div class="table-responsive-sm table-responsive-md mt-2 mb-2">
                    <table class="table table-bordered" style="font-weight:bold">
                        
                        <tbody>
                            <tr>
                                <td>Sub Total RS</td>
                                <td>{{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td>You Saved RS</td>
                                <td>0</td>
                            </tr>
                        </tbody>

                        <tfoot class="bg-dark text-white">
                            <tr>
                                <td class="w-50" >Grand Total RS</td>
                                <td class="w-50" >{{ Cart::total() }}</td>
                            </tr>
                           
                        </tfoot>
                
                    </table>
                    
                    <div class="text-danger mb-2">
                        <strong>Minimum Order : RS 1,000/-</strong>
                    </div>

                    <div class="row">
                        <div class="col">
                            <a href="{{route('home') }}" class="btn btn-success rounded-0 btn-block">Continue Shopping</a>
                        </div>
                        <div class="col">
                            <a href="{{route('cart.checkout') }}" class="btn btn-danger rounded-0 btn-block">Checkout</a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>


    @else

    <h1>Your Cart is Empty</h1>

    @endif

</div>
<br>
<br>
<br>
<br>
<br>

@endsection