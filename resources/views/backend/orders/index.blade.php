@extends('layouts.app')

@section('content')

<div class="row">
    
    <div class="col-sm-3">
        {{-- Sidebar Here --}}
        @include('includes.sidebar_navigation')
    </div>

    <div class="col-sm-9">
        {{-- {{ $orders }} --}}
        <div class="row">
            <div class="col-lg-10 col-sm-12 mt-4 mb-2">
                <h2>{{ $type }} Orders</h2>
            </div>
            {{-- <div class="col-lg-2 col-sm-12 mt-4 mb-2">
                <a href="{{ route('product.create')}}" class="btn btn-success btn-block">Create New</a>
            </div> --}}
        <div>
        @if(count($orders)>0)
            <div class="table-responsive-sm table-responsive-md">
                <table class="table table-condensed table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Action</th>
                            <th>Time</th>
                            <th>Order #</th>
                            <th>User</th>
                            <th>Sub Total</th>
                            <th>Grand Total</th>
                            <th>Status</th>
                            <th>City</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                    @foreach($orders as $order)
                        <tr value="{{ $order->id }}">
                            <td><a class="show button" value="btn{{ $order->id }}" title="Show order Details"></a></td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->subtotal }}</td>
                            <td>{{ $order->grandtotal }}</td>
                            <td>
                                @if($order->status == 'Pending')
                                    <a href="{{ route('order.status',['toggle' => 'Transit', 'id' => $order->id]) }}" class="btn btn-success btn-sm">Pending</a>
                                @elseif ($order->status == 'Transit')
                                    <a href="{{ route('order.status',['toggle' => 'Completed', 'id' => $order->id]) }}" class="btn btn-success btn-sm">Transit</a>
                                @elseif ($order->status == 'Completed')
                                    Completed
                                @endif
                            </td>
                            <td>{{ $order->city }}</td>
                            {{-- Show Nested Data --}}

                            <thead class="bg-success text-white hidden-tr {{ $order->id }}">
                                <th colspan="2">&nbsp;</th>
                                <th colspan="3">Product</th>
                                <th>Kg</th>
                                <th>Price</th>
                                <th>Total</th>
                            </thead>
                            {{-- <tr class="hidden-tr"> --}}
                            @foreach($order->order_details as $od )
                            
                                <tr class="bg-secondary text-white hidden-tr {{ $order->id }}">
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">{{ $od->product_name }} </td>
                                    <td>{{ $od->product_qty }} </td>
                                    <td>{{ $od->product_price }} </td>
                                    <td>{{ $od->product_price * $od->product_qty }} </td>
                                    
                                </tr>
                                
                            @endforeach
                            {{-- </tr> --}}
                        </tr>
                  
                            
                      
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
    </div>

</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){

    $('.button').click(function(){
        console.log(this);
        $value = $(this).attr('value').slice(3,4);
        console.log($value);
        $(this).toggleClass('show');
        $(this).toggleClass('hide');
        $('.' + $value).toggleClass('hidden-tr');
    })

})
</script>
@endsection