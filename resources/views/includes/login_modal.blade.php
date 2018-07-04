{{-- Login Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Please Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row row-divided">
                
                <div class="col-md-6 column-2">
                        
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
                        <input type="hidden" name="hidden" id="passforgot_url" value="{{ route('user.passforgot') }}">
                        <input type="submit" class="btn btn-success btn-block rounded-0" value="Login" name="submit">
                    </form>

                </div>

                <div class="vertical-divider">or</div>

                <div class="col-md-6 column-1 text-center">
                    <h5>Social Account Signin</h5>
                    <p class="mt-2 mb-2">Your Facebook account</p>
                    <a href="{{ route('facebook.login') }}" class="btn btn-primary rounded-0 btn-block mt-2 mb-2"><i class="fa fa-facebook"></i> Facebook</a>
                    <p class="mt-2 mb-2">Your Gmail account</p>
                    <a href="{{ route('google.login') }}" class="btn btn-danger rounded-0 btn-block mt-2 mb-2"><i class="fa fa-google-plus"></i> Google</a>
                </div>
                
            </div>

            <div class="row ml-2 mt-2 mb-2">
                {{-- <div class="col">
                    <a href="#" id="forgotPassword">Forgot Password</a>
                </div> --}}
            </div>
            <div class="row ml-2 mt-2 mb-2">
                <div class="col">
                    <a href="#" id="registerUser">New to Ribsncuts? Register Now!</a>
                </div>
            </div>
            
        </div>
        <br>
        <br>
        </div>
    </div>
</div>