@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="animated fadeInUp">
            <h1 class="heading-all">{{$user->name}}</h1>
            <p class="text-justify"><h3>Welcome to your Profile</h3></p>
        </div>
    </div>

</div>

<div class="container block-white mt-2">

        <h2 class="heading-all">User Profile</h2>

    {{-- Tabs --}}
    <div class="m-2 my-3">

        {{-- Tabl Listing --}}
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery" aria-selected="false">Delivery Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders Information</a>
            </li>
        </ul>

        {{-- Tabs --}}
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                {{-- Profile Info Basic --}}
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">

                        <div class="card border-danger">

                            <div class="card-header bg-danger text-white">
                                <h4 class="card-title"><i class="fa fa-user"></i> Basic Information</h4>
                                <h6 class="card-subtitle muted">Change your username and email address</h6>   
                            </div>

                            <form action="#" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>
                    
                                    <div class="form-group">
                                        <input type="submit" value="Update Basic Information" class="form-control btn btn-success rounded-0">
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

                {{-- Password --}}
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">

                        <div class="card border-danger">

                            <div class="card-header text-white bg-danger">
                                <h4 class="card-title"><i class="fa fa-key"></i> Password</h4>
                                <h6 class="card-subtitle muted">Change your password</h6>
                            </div>

                            <form action="#" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" id="password" class="form-control" required>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Change Password" class="form-control btn btn-success">
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
            
            <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                   {{-- delivery --}}
                   <div class="row justify-content-center mt-5">
                        <div class="col-md-8">
    
                            <div class="card border-danger">
    
                                <div class="card-header text-white bg-danger">
                                    <h4 class="card-title"><i class="fa fa-home"></i> Delivery Address</h4>
                                    <h6 class="card-subtitle muted">Change/Update your address for order delivery</h6>
                                </div>
    
                                <form action="#" method="post">
                                    @csrf
                                    <div class="card-body">
    
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
            
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            
                {{-- Orders --}}
                <div class="table-responsive-sm table-responsive-md">
                    
                    @if($orders->count()>0)
                    <table class="table table-bordered" style="height: 100px">
                        <thead class="thead-dark text-white text-uppercase text-center">
                            <tr>
                                <th>Date</th>
                                <th>Order #</th>
                                <th>Sub Total</th>
                                <th>Grand Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                            @foreach($orders as $order)
                                <tbody> 
                                    <tr>
                                    <td>{{ $order->created_at->diffForHumans()}}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->grandtotal }}</td>
                                    <td>{{ $order->status }}0</td>
                                    <td>view</td>
                                    </tr>
                                </tbody>

                            @endforeach
            
                    </table>
                    @else
                    <h3 class="heading-all">No Orders Yet</h3>
                    @endif
                </div>
                    
            </div>
        
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
</script>

@endsection





  