@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
     
    <div class="row">

        <div class="animated fadeInLeft">
            @guest
                <h1 class="heading-all">Please Login</h1>
            @else
            <h1 class="heading-all">Confirm Your Details</h1>
                <p class="text-justify"><h3>Please ensure, the details provided here are correct</h3></p>
            @endguest
        </div>
    </div>

</div>

<div class="container block-white">

    @guest
    <h2 class="heading-all">Login</h2>
        <div class="row mt-2">
            <div class="col-md-6 col-sm-12 mt-2">

                <div class="card">
                    <div class="card-header bg-dark text-white text-uppercase">
                        Login to Ribsncuts Account
                    </div>

                    <div class="card-body">
                        <form id="login_form">
                            <h5>Your email address</h5>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="you@email.com" maxlength="64" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="your password" required>
                            </div>                        
                            <p class="marg-b0 text-danger" id="login_errors" >
                            </p>
                            <input type="hidden" name="hidden" id="login_url" value="{{ route('user.login') }}">
                            <input type="hidden" name="hidden" id="register_url" value="{{ route('user.register') }}">
                            <input type="submit" class="btn btn-success btn-block rounded-0" value="Login" name="submit">
                        </form>
                    </div>

                    <div class="row ml-2 mt-2 mb-2">
                        <div class="col">
                            <a href="{{ route('user.register') }}" id="registerUser">New to Ribsncuts? Register Now!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mt-2">
                <div class="card">
                    <div class="card-header bg-dark text-white text-uppercase">
                        Login With Social Media
                    </div>
                    <div class="card-body">
                            <h5>Social Account Signin</h5>
                            <p class="mt-2 mb-2">Your Facebook account</p>
                            <a href="{{ route('facebook.login') }}" class="btn btn-primary rounded-0 btn-block mt-2 mb-2"><i class="fa fa-facebook"></i> Facebook</a>
                            <p class="mt-2 mb-2">Your Google Plus account</p>
                            <a href="{{ route('google.login') }}" class="btn btn-danger rounded-0 btn-block mt-2 mb-2"><i class="fa fa-google-plus"></i> Google</a>
                    </div>
                </div>
            </div>
        </div>
    @else
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

                   <div class="row">
                        <div class="col">
                            <input type="submit" value="Update Delivery Address" class="form-control btn btn-success rounded-0">
                        </div>
                        <div class="col">
                            <input type="submit" value="Proceed to Checkout" class="form-control btn btn-danger rounded-0">
                        </div>
                   </div>
                </div>
            </form>

        </div>
    @endif

</div>
<br>
<br>
<br>
<br>
<br>

@endsection