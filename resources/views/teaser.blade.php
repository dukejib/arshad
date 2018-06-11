<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Ali Jibran">
    <meta name="createdby" content="http://karacraft.com">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>RIBS N CUTS</title>

    <!-- Style Sheets -->
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/ribsncuts-old.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/toastr.css') }}">
    <!-- Style Sheets -->

    <!-- External Style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/assets/images/icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/assets/images/icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/assets/images/icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/images/icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/assets/images/icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/assets/images/icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/assets/images/icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/assets/images/icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/images/icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/assets/images/icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/assets/images/icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/assets/images/icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">


</head>
<body>
    
    <div class="contactus animated infinite pulse" id="contactus">
        <a href="#getintouch" class="tip"><span>Contact Us</span><i class="fa fa-envelope fa-2x"></i></a>
    </div>
    <!-- Header -->
    <header class="header">
        
        <div class="col-left">
            <span class="helper"></span>
            <img class="centerImg animated fadeIn"
            srcset="{{ asset('/assets/images/ribsncuts-small.png')}} 320w,
                    {{ asset('/assets/images/ribsncuts-small.png')}} 480w,
                    {{ asset('/assets/images/ribsncuts-small.png')}} 640w,
                    {{ asset('/assets/images/ribsncuts-large.png')}} 800w,"
            sizes = "(max-width:320px)  280px,
                    (max-width:480px) 440px,
                    (max-width:640px) 600px,
                    800px"
            src="{{ asset('/assets/images/ribsncuts-large.png') }}" 
            alt="ribsncuts - Let's meet premium quality">

        </div>
        
        <div class="col-right">

        </div>

    </header>
    <!-- Header -->

    <!-- Contact form -->
    <div class="contact-form form" id="getintouch">
        <div class="container">
            <!-- Form Start -->
            <form id="email_form">
                <div class="row" >
                    <div class="col-lg-4 col-md-4 col-sm-12" id="left-col">
                        <h1>Get in Touch</h1> 
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 right" id="right-col">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Name" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" placeholder="YourEmail@email.com" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <input type="text"  class="form-control form-control-lg" placeholder="Your Phone Number (03001234567)" name="number" id="number" required>
                        </div>
                        <div class="form-group">
                            <select name="reason" id="reaosn" class="form-control">
                                <option value="reason">Choose Your Reason</option>
                                <option value="complain">Complain</option>
                                <option value="feedback">Feedback</option>
                                <option value="generalquery">General Query</option>
                                <option value="jobs">Jobs</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-lg" name="comment" id="comment" maxlength="6000" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-secondary btn-block" value="Send" name="submit">
                    </div>
                </div>
            </form>
            <!-- Form Start -->
        </div>
    </div>

    <footer>
        ribsncuts.com
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script src="{{ asset('assets/js/ribsncuts.js') }}"></script>
    <!-- Scripts -->
    <script>
    

    //Email System Here
    $(document).ready(function(){

    
        //Form Submit Starts Here
        $('#email_form').submit(function(e)
        {
            e.preventDefault(); //Stop Submission

            $form = $(this); //Get the form
            //show some response on the button
            $('button[type="submit"]', $form).each(function()
            {
                $btn = $(this);
                $btn.prop('type','button' );
                $btn.prop('orig_label',$btn.text());
                $btn.text('Sending ...');
            });

            $username = $('#username').val();
            $email = $('#email').val();
            $comment = $('#comment').val();
            
            /** You can use the following as well in ajax requrest */
            //     data: $form.serialize(),
            //     success: after_form_submitted, //This is callback functions
            //     dataType: 'json'

            $.ajax({
                type:"POST",
                url: "handler2.php",
                dataType: "json",
                data: {username:$username,email:$email,comment:$comment},
                success:function(obj){
                    if(!('error' in obj)){
                        // console.log('result ok');
                        // console.log(obj.result);
                        toastr.success(obj.result,'Operation Successful');
                        //Reset the form
                        $('#email_form')[0].reset();
                        //WE are all done
                    }else {
                        // console.log('error happened');
                        console.log(obj.error);
                        toastr.error(obj.error,'Operation Failed');
                    }
                }
            })
        });
        //Form Submit End Here
    });    
    
    

    
    

    

    </script>
</body>
</html>