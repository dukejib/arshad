@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="animated fadeInLeft">
            <h1 class="heading-all">Contact Us</h1>
            <p class="text-justify"><h3>We are here to listen to your complaints, queries and most definitely your <em>feedback</em>,since you are our <em>#1</em> priority</h3></p>
        </div>
    </div>

</div>

<div class="container block-white">

    <h2 class="heading-all">Contact Us</h2>

    <div class="row justify-content-center mt-2">
        <div class="col-md-8 col-sm-12">
            
            <div class="card">
                <div class="card-header text-white bg-dark text-uppercase">
                    Your Details
                </div>
                    
                    <div class="card-body">
                        <form  aria-label="ContactUs" id="email_form">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" placeholder="Your Name" name="username" id="username" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control form-control-lg" placeholder="YourEmail@email.com" name="email" id="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Cell Number</label>

                                <div class="col-md-6">
                                    <input type="text"  class="form-control form-control-lg" placeholder="Your Phone Number (03001234567)" name="number" id="number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Reason of Contact</label>
                                
                                <div class="col-md-6">
                                    <select name="reason" id="reason" class="form-control">
                                        <option value="0">Choose Your Reason</option>
                                        <option value="Complain">Complain</option>
                                        <option value="Feedback">Feedback</option>
                                        <option value="General Query">General Query</option>
                                        <option value="Jobs">Jobs</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Comments</label>

                                <div class="col-md-6">
                                    <textarea class="form-control form-control-lg" name="comment" id="comment" maxlength="3000" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success btn-block rounded-0">
                                        <i class="fa fa-envelope"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>

        <div class="col-md-4 col-sm-12">

            <div class="card">
                <div class="card-header text-white bg-dark text-uppercase">
                    Our Address
                </div>
                    
                <div class="card-body">
                    <p>
                        <strong>Address:</strong><br>
                        Shop# 2, Corner Zakriya Town,<br>
                        Main Bossan Road, <br>
                        Opposite Chase Up,<br>
                        Multan
                    </p>
                    
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






  