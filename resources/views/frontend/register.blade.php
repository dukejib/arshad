@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="animated fadeInUp">
            <h1 class="heading-all">Register</h1>
            <p class="text-justify"><h3>Manage your own Ribsncuts account</h3></p>
        </div>
    </div>

</div>

<div class="container block-white">

    <div class="container">
        <h1 class="heading-all">Details</h1>
        <br>
        <div class="container">
            <!-- Form Start -->
            <div class="row justify-content-center mt-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white bg-danger">{{ __('Register') }}
                            
                            </div>
                            
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
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
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Form Start -->
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
    //Post Url
    $form_url = "{{ route('contactus.post') }}";
    //Email System Here
    $(document).ready(function(){

        //Form Submit Starts Here
        $('#email_form').submit(function(e)
        {
            e.preventDefault(); //Stop Submission
            
            $username = $('#username').val();
            $email = $('#email').val();
            $comment = $('#comment').val();
            $number = $('#number').val();
            $reason = $('#reason').val();

            if($reason == 0){
                swal({
                    title: "Reason Required",
                    text: "Please choose a valid reason.",
                    icon:"warning"});
                return;
            }

            /** You can use the following as well in ajax requrest */
            //     data: $form.serialize(),
            //     success: after_form_submitted, //This is callback functions
            //     dataType: 'json'
            
            $.ajax({
                type:"POST",
                url: $form_url,
                dataType: "json",
                data: {username:$username,email:$email,comment:$comment,reason:$reason,number:$number,'_token':$('meta[name=csrf-token]').attr('content')},
                success:function(obj){
                    console.log(obj.result);
                    swal({
                        title:"Email Submitted",
                        text:"Thank you for contacting us.",
                        icon:"success"
                    });
                    // toastr.success(obj.result,'Operation Successful');
                    //Reset the form
                    $('#email_form')[0].reset();
                    //WE are all done
                     
                    },
                error:function(obj){
                    // console.log('error happened');
                    console.log(obj.error);
                    swal({
                        title:"Operation Failed",
                        text:"Error sending your email. Please try again.",
                        icon:"warning"
                    });
                    // toastr.error(obj.error,'Operation Failed');
                    }
            })
        });
        //Form Submit End Here
    });    
    </script>
@endsection






  