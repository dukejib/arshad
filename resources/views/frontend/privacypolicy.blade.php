@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="animated fadeInLeft">
            <h1 class="heading-all">Privacy Policy</h1>
            <p class="text-justify"><h3>Customer privacy is our one of our priority.We take strict measures to assure your data is kept safe.</h3></p>
        </div>
    </div>

</div>

<div class="container block-white">

    <div class="container">
        
        <div class="row mt-2 privacy">
            <h2 class="heading-all">Privacy Policy</h2>
            <p class="justify-left">
               Your privacy is important to us. This privacy policy will illustrate the information that is gathered, the protection techniques of such information, as well as the uses of the information you provide to us. Our privacy policy is subject to change without notice, hence it must be reviewed at regular intervals to stay updated. The fact that you trust us and are shopping at our store means that you agree and accept the practices described in this privacy and security policy that may be changed time to time.
            </p>
        </div>

        <div class="row mt-2 privacy">
            <h2 class="heading-all">Personal Information</h2>
            <p class="justify-left">
                All customer can browse the website and check products without registering with Ribsncuts.com. Placing an order will require you to share your personal details with us. The information you will provide to us will be kept safe in our database.
            </p>
        </div>

        <div class="row mt-2 privacy">
            <h2 class="heading-all">Change/Remove Your Personal Information</h2>
            <p class="justify-left">
                You have the right to change your personal information or remove your account any time. Personal Information can be changed from the Profile/Account Page at any time. To remove your account with us, please send an email to <a href="mailto:info@ribsncuts.com">info@ribsncuts.com</a>.
            </p>
        </div>

        <div class="row mt-2 privacy">
            <h2 class="heading-all">Cookies</h2>
            <p class="justify-left">
                Ribsncuts also reserves the rights to store certain types of information through cookies. Cookies enable us to recognize your needs and serve you better. Ribsncuts cookies do not store personal information.
                If you perform a transaction with us, we collect information about your buying behavior.Information is stored in order to offer you the best shopping experience and resolve all other issues.
            </p>
        </div>

        <div class="row mt-2 privacy">
            <h2 class="heading-all">Information Usage</h2>
            <p class="justify-left">
                Ribsncuts uses your personal information to enhance our services and personalize your shopping experience. We do not sell or rent the customer information to any third parties except to provide Ribsncuts service or as explained below.
            </p>
            <ul>
                <li>
                        Ribsncuts may use the customer data such as demographics and disclose to advertisers, partners, and other for various purposes.
                </li>
                <li>

                        Ribsncuts may hire other companies for certain activities like delivering packages and data analysis. These companies may have access to your personal information to perform their activities.
                </li>
            </ul>
        </div>

        <div class="row mt-2 privacy">
            <h2 class="heading-all">Socail Sharing / Links </h2>
            <p class="justify-left">
                    Ribsncuts.com links to other social websites that may collect personally identifiable information about you. Meat One is not responsible for the content of those linked websites.

            </p>
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






  