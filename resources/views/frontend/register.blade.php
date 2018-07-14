@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2 mb-2">
    
    <div class="row">
        
        <div class="headings animated fadeInLeft">
            Sign Up
            <p>
                Create a new account at Ribsncuts to manage your orders
            </p>
        </div>
       
    </div>

</div>

<div class="container block-white">

    <div class="subheading">Sign Up Details</div>

        <!-- Form Start -->
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header text-white bg-dark text-uppercase">
                        {{ __('Register') }}
                    </div>
                    
                    <div class="card-body">
                        @include('includes.errors')
                        <form method="POST" action="{{ route('user.register') }}" aria-label="{{ __('Register') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success rounded-0 btn-block">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="text-center mt-5">Please note that after Registration, you will be redirected to a page, where you can enter your address details for order delivery</p>
                    </div>
                </div>
            
            </div>
        </div>
        <!-- Form End -->

</div>
<br>
<br>
<br>
<br>
<br>

@endsection





  