@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2">
    
    <div class="row">

        <div class="headings animated fadeInLeft">
            Terms & Conditions
            <p>
                Please read it thoroughly
            </p>
        </div>
       
    </div>

</div>

<div class="container block-white">

    <div class="container">
        
        <div class="row mt-2 terms">
            <div class="subheading">Terms & Conditions</div>
            <p class="justify-left">
                Thank you for using Ribsncuts online services. We will do our best to ensure a better and convenient user experience for you. By using Ribsncuts website, you accept and agree to the Terms and Conditions set out below.
                If you do not agree with any of these Terms and Conditions, you must not use this website. It is your responsibility to read the Terms & Conditions thoroughly before proceeding forward with website use as well as for any changes or amendments made from time to time. 
            </p>
        </div>

        <div class="row mt-2 terms">
            <div class="subheading">1. Business & Scope of Service</div>
            <p class="justify-left">
                Ribsncuts.com is an e-commerce platform that delivers products through its delivery channel online to provide you a shopping experience from convenience of your home.
            </p>
                <ul>
                    <li>
                        Your order is an offer to buy from us. Ribsncuts reserves the right to accept the order at its own discretion. An order will only be given effect when we notify you that we have received and confirmed your order (Via Email or Call). At any point up until then, we may decline to supply or fullfill your order. Payment of the order is due at the time of delivery only.
                    </li>
                    <li>
                        Price of products sold through our website may be different for different cities.
                    </li>
                    <li>
                        Ribsncuts team will deliver the product at the address specified during order confirmation. It is your responsibility to ensure that a proper address along with a contact number was provided, and someone is present at the given address to receive. Person reciving the order will be presumed to be a person authorize by you to receive and is required to make full payment of the order.If the order is undelivered due to absence of any receiver or wrong delivery address, an additional delivery fees can be applied on re-delivery of the order.
                    </li>
                </ul>
            </p>
        </div>

        <div class="row mt-2 terms">
            <div class="subheading">2. Terms of Use</div>
            <p class="justify-left">
                Any order placed by you at Ribsncuts.com is deemed to have been placed in accordance with these Terms of Use (we suggest you to carefully read all the points).
            </p>

            <ul>
                <li>
                    <strong>Eligibility</strong>
                    <p>You represent and warrant that you are at least 18 years old and competent to enter into legally binding agreement. You shall not use Ribsncuts.com if you are not competent to contract under the applicable laws, rules and regulations.</p>
                </li>
                <li>
                    <strong>Pricing</strong>
                    <p>All prices posted on this website are subject to change without notice. Posted prices include all taxes and charges. In case of any additional taxes or charges the same will be mentioned on the website. All prices are maximum retail price unless specified otherwise.</p>
                </li>
                <li>
                    <strong>Payment</strong>
                    <p>All payments are to be made in full and in cash (only in PKR) at the time of delivery. In case you opt for online payment, variance wil be demanded or if in excess will be returned to you at the time of delivery.</p>
                </li>
                <li>
                    <strong>Return & Refunds</strong>
                    <p>
                        If for some reason you are not satisfied with the product delivered, please contact our customer service team <a href="mailto:info@ribsncuts.com">info@ribsncuts.com</a> within 1 day after delivery, however in case the claim is not made within the specified time, we are not responsible for the return or refund of the same. There will be no charge for the replacement or return of the items.
                    </p>
                </li>
                <li>
                    <strong>Cancellation Policy</strong>
                    <p>
                        It is our policy to permit you to cancel the order until a contract has been made effective i.e. before we notify you via email/sms/phone call of dispatch of the order. Once an order is dispatched, no cancellations can take place.
                        <br>
                        If any fraudulent transaction is suspected or a transaction is not in accordance with these Terms and Conditions, we reserve the right to cancel such order. We may also flag such suspected users of our website, deny access to them and even cancel any orders placed by them.
                    </p>
                </li>
            </ul>

        </div>

        <div class="row mt-2 terms">
            <div class="subheading">3. Delivery Information</div>
            <p class="justify-left">
                Currently deliveries are only made in area mentioned in website during order placement. Any order booked for a delivery in the areas beyond the above mentioned areas will not be entertained and we do not accept any responsibility for non-delivery of the order.

                Ribsncuts delivers within 1 Hr 30 minutes in between 10:00 am to 8:00 pm during the time slot selected by you which is made available on a first come first served basis.
                
                No order below Rs. 1000 will be entertained and all deliveries are free of charge. There are no extra taxes, hidden costs or additional shipping charges. The prices mentioned on the website are the final prices. However, if no one is available at the specified address at the time of delivery, we will reschedule the delivery and a fee of Rs. 50 will be charged for second attempt of delivery.
            </p>
        </div>

        <div class="row mt-2 terms">
            <div class="subheading">4. Your Account/Profile</div>
            <p class="justify-left">

                As per the agreement, in order to transact with Ribsncuts you agree to provide us your correct, complete and up to date information including, but not limited to, your legal name, billing and delivery addresses, telephone number and you are required to promptly notify Ribsncuts of any change in your Customer Registration Data at <a href="mailto:info@ribsncuts.com">info@ribsncuts.com</a>.You may also change or update your account information from your account/profile page. Once you become a member, safeguarding and maintaining confidentiality of your account user name and password is your responsibility. Where a fraud is detected with your account or any other irregular activity, Ribsncuts.com reserves the right at its sole discretion to cancel any offers, your orders and suspend/terminate the account.
            </p>
        </div>

        <div class="row mt-2 terms">
            <div class="subheading">5. Disclaimer</div>
            <p class="justify-left">
                EXCEPT AS OTHERWISE EXPRESSLY STATED WITH RESPECT TO THE PRODUCTS WE SUPPLY, ALL CONTENTS ON OUR WEBSITE ARE OFFERED ON AN "AS IS" BASIS WITHOUT ANY WARRANTY WHATSOEVER EITHER EXPRESS OR IMPLIED. Ribsncuts MAKES NO REPRESENTATIONS, EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS OF THE PRODUCTS FOR A PARTICULAR PURPOSE. Ribsncuts DOES NOT GUARANTEE THE FUNCTIONS CONTAINED ON THE WEBSITE WILL BE UNINTERRUPTED OR ERROR-FREE, THAT THIS WEBSITE OR ITS SERVER WILL BE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS OR DEFECTS WILL BE CORRECTED EVEN IF Ribsncuts IS AWARE OF THEM.
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






  