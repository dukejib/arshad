@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="headings animated fadeInLeft">
            {{$user->name}}
            <p>
                Welcome to your Profile
            </p>
        </div>
    </div>

</div>

<div class="container block-white mt-2">

        <h2 class="subheading">User Profile</h2>

    {{-- Tabs --}}
    <div class="m-2 my-3">

        {{-- Tabl Listing --}}
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true">address Information</a>
            </li>
            @if($orders->count()>0)
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders Information</a>
            </li>
            @endif
        </ul>

        {{-- Tabs --}}
        <div class="tab-content" id="myTabContent">

            {{-- Address --}}
            <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">

                        <div class="card border-dark">

                            <div class="card-header text-white bg-dark">
                                <h4 class="card-title"><i class="fa fa-home"></i> Delivery Address</h4>
                                <h6 class="card-subtitle muted">Change/Update your address for order delivery</h6>
                            </div>

                            @include('includes.errors')
                            <form action="{{ route('profile.address') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="{{ $user->name }}" disabled>
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                                    </div>
                    
                                    <div class="form-group">
                                            <label for="contact">Contact Person
                                                <br>
                                                <small>If you aren&apos;t available to receive the delivery</small>
                                            </label>
                                            <input type="text" name="contact" id="contact" class="form-control" required value="{{ $user->profile->contact }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="cellnumber">Cell Phone #</label>
                                            <input type="text" maxlength="11" minlength="11" name="cellnumber" id="cellnumber" class="form-control" required value="{{ $user->profile->cellnumber }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="landline">Landline #</label>
                                            <input type="text" maxlength="11" minlength="11" name="landline" id="landline" class="form-control" value="{{ $user->profile->landline }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address
                                                <br><small>Your Complete address with a Prominent Landmark</small>
                                            </label>
                                            <textarea name="address" id="address" cols="5" rows="3" class="form-control" required>{{ $user->profile->address }}</textarea>
                                        </div>
    
                                        <div class="form-group">
                                            <input type="submit" value="Update Delivery Address" class="form-control btn btn-success rounded-0">
                                        </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>


            </div>
     
            {{-- Orders --}}
            @if($orders->count()>0)
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <div class="table-responsive-sm table-responsive-md">
                   
                    <table class="table table-bordered mt-5" style="height: 100px">
                        <thead class="thead-dark text-white text-uppercase text-center">
                            <tr>
                                <th>Action</th>
                                <th>Date</th>
                                <th>Order #</th>
                                <th>Sub Total</th>
                                <th>Grand Total</th>
                                <th>Status</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        
                        <tbody> 
                            @foreach($orders as $order)

                            <tr value="{{ $order->id }}">
                                <td><a class="plusShow button" value="btn{{ $order->id }}" title="Show order Details"></a></td>
                                <td class="align-middle">{{ $order->created_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ $order->id }}</td>
                                <td class="align-middle">{{ $order->subtotal }}</td>
                                <td class="align-middle">{{ $order->grandtotal }}</td>
                                <td class="align-middle">{{ $order->status }}</td>
                                <td class="align-middle">{{ $order->city }}</td>
                
                                {{-- Show Nested Data --}}

                            <thead class="bg-success text-white hidden-tr {{ $order->id }}">
                                <th>&nbsp;</th>
                                <th colspan="3">Product</th>
                                <th>Kg</th>
                                <th>Price</th>
                                <th>Total</th>
                            </thead>
                            {{-- <tr class="hidden-tr"> --}}
                            @foreach($order->order_details as $od )
                            
                                <tr class="bg-secondary text-white hidden-tr {{ $order->id }}">
                                    <td>&nbsp;</td>
                                    <td colspan="3">{{ $od->product_name }} </td>
                                    <td>{{ $od->product_qty }} </td>
                                    <td>{{ $od->product_price }} </td>
                                    <td>{{ $od->product_price * $od->product_qty }} </td>
                                    
                                </tr>
                                
                            @endforeach
                            {{-- </tr> --}}
                            </tr> {{-- Value --}}

                            @endforeach
                        </tbody>

                    </table>
                   
                </div>
                    
            </div>
            @endif
        </div>
    
    </div>

<br>
<br>
<br>
<br>
<br>

@endsection

@section('scripts')
<script>

$(function(){
    $('#landline').keydown(function(e){
        return AllowNumbersOnly(e);
    })

    $('#cellnumber').keydown(function(e){
        return AllowNumbersOnly(e);
    })
})

function AllowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
      e.preventDefault();
    }
  }


$(document).ready(function(){

    $('.button').click(function(){
        console.log(this);
        $value = $(this).attr('value').slice(3);
        console.log($value);
        $(this).toggleClass('plusShow');
        $(this).toggleClass('plusHide');
        $('.' + $value).toggleClass('hidden-tr');
    })

})
</script>

@endsection





  