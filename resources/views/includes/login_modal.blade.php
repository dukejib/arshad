{{-- Login Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                    <h5>What is your email address</h5>
                    <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Your Email" maxlength="64">
                    <p class="marg-b0">
                        <small id="login_email_error"></small>
                    </p>
                    <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Your Password">
                    <p class="marg-b0">
                        <small id="login_password_error"></small>
                    </p>
                    <button class="btn btn-success btn-block rounded-0" onclick="user_login()"><i class="fa fa-login"></i> Login</button>
                </div>

                <div class="vertical-divider">or</div>

                <div class="col-md-6 column-1">
                    <form class="form">
                        <h5>Login with your social account</h5>
                        <p>Facebook</p>
                        <button type="button" class="btn btn-primary rounded-0 btn-block"><i class="fa fa-facebook"></i> Facebook</button>
                        <p>Goolge Plus</p>
                        <button type="button" class="btn btn-danger rounded-0 btn-block"><i class="fa fa-google-plus-square"></i> Goolge Plus</button>
                    </form>
                </div>
                    
                
            </div>
            
        </div>
        <br>
        <br>
        </div>
    </div>
</div>