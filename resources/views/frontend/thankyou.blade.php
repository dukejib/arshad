@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
     
    <div class="row">

        <div class="headings animated fadeInLeft">
            Thank You
            <p>
                {{ $user->name }}
            </p>
        </div>

    </div>

</div>

<div class="container block-white">

    <div class="subheading">Order</div>

    <div class="table-responsive-sm table-responsive-md">
        <table class="table table-bordered" style="height: 100px">
            <thead class="thead-dark text-white text-uppercase text-center">
                <tr>
                    <th>Order #</th>
                    <th>Sub Total</th>
                    <th>Grand Total</th>
                    <th>Status</th>
                    <th>City</th>
                   
                </tr>
            </thead>
            
                <tbody class="text-center" style="font-weight:bold">
                   
                    <td class="align-middle">{{ $order->id }}</td>
                    <td class="align-middle">{{ $order->subtotal }}</td>
                    <td class="align-middle">{{ $order->grandtotal }}</td>
                    <td class="align-middle">{{ $order->status }}</td>
                    <td class="align-middle">{{ $order->city }}</td>
                    
                </tbody>

        </table>
    </div>

    <div class="subheading">Order Details</div>

    <div class="table-responsive-sm table-responsive-md">
        <table class="table table-bordered" style="height: 100px">
            <thead class="thead-dark text-white text-uppercase text-center">
                <tr>
                    <th>Product</th>
                    <th>Kg</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            @foreach($order->order_details as $od)
                <tbody class="text-center" style="font-weight:bold">
                    <td class="align-middle">{{ $od->product_name }}</td>
                    <td class="align-middle">{{ $od->product_qty }}</td>
                    <td class="align-middle">{{ $od->product_price }}</td>
                    <td class="align-middle">{{ $od->product_price * $od->product_qty }}</td>
                </tbody>
            @endforeach
            <tfoot class="bg-dark text-white">
                <tr>
                    <td colspan="5" class="text-right text-white" style="font-size:20px">Grand total : RS {{ $order->grandtotal }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
       
</div>
<br>
<br>
<br>
<br>
<br>

@endsection