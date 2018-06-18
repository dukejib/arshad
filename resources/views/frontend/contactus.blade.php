@extends('layout.frontend_master')

@section('content')

<div class="container block-transparent">
    
    <div class="row">

        <div class="animated fadeInUp text-center">
            <h1 class="heading-all">Contact Us</h1>
            <p class="text-justify"><h3>We are here to listen to your complains, queries and most definitely your "feedback" ,since you are our #1 priority</h3></p>
        </div>
    </div>

</div>

<div class="container block-product">

    <div class="container">
        <h1 class="text-center heading-all">Get in Touch</h1>
        <br>
        <div class="container">
            <!-- Form Start -->
            <form id="email_form">
               
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
                    <select name="reason" id="reason" class="form-control">
                        <option value="0">Choose Your Reason</option>
                        <option value="Complain">Complain</option>
                        <option value="Feedback">Feedback</option>
                        <option value="General Query">General Query</option>
                        <option value="Jobs">Jobs</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="comment" id="comment" maxlength="3000" required></textarea>
                </div>
                <input type="submit" class="btn btn-danger btn-block rounded-0" value="Send" name="submit">
              
            </form>
            <!-- Form Start -->
        </div>
    </div>

</div>
    

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
                        text:"Errors occured while sending your email. Please try again.",
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






  