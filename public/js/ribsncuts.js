/** Used by teaser.blade.php */
$(document).ready(function(){
    
    //Toastr.js Settings
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        // "positionClass": "toast-bottom-full-width",
        // "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    
    //This is how we listen to animation end events in all browsers
    $(function(){
        var animationName = "animated bounce";
        var animationEnd = "animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd MSAnimationEnd";
        //$(#element).addClass(animationName).one(animationEnd,function(){
        //    $(this).removeClass(animationName);
        //});
    });

    /** Owl Carousel Slider Interval */
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            200:{
                items:1
            },
            400:{
                items:2
            },
            600:{
                items:2
            },
            800:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    //Login Form Submit Starts Here
    $('#login_form').submit(function(e)
    {
        e.preventDefault(); //Stop Submission
        
        $email = $('#email').val();
        $password = $('#password').val();
        $login_url = $('#login_url').val();
        console.log($login_url);
        $.ajax({
            type:"POST",
            url: $login_url,
            dataType: "json",
            data: {email:$email,password:$password,'_token':$('meta[name=csrf-token]').attr('content')}, //get Csrf-Token
            success:function(res,status){
                console.log('Resp : ' + res.statusText + ' Code : ' + res.status + ' Status : ' + status);
                $('#login_form')[0].reset();
                //WE are all done
                $('#loginModal').modal('hide');
                //Redirect to Profile
                window.location.replace(res);
                },
            error:function(res,status){
                console.log('Resp : ' + res.statusText + ' Code : ' + res.status + ' Status : ' + status);
                $('#login_errors').html('Unable to log you in');
                // console.log(obj.statusText + ' ' +  obj.status);
                },
            complete:function(){

            }
        })
    });
    //Login Form Submit End Here

    $('#registerUser').click(function(){
        $('#loginModal').modal('hide');
        //Show Registration Modal
        $register_url = $('#register_url').val();
        // console.log($register_url);
        $.ajax({
            type: "GET",
            url: $register_url,
            data: "data",
            dataType: "json",
            success: function (response) {
                // console.log(response);
                window.location.replace(response);
            },
            error:function(response){
                // console.log(response);
            }
        });
    });

    //Clear the Modals
    $('#loginModal').on('hide.bs.modal',function(){
        $(this).find('#login_form')[0].reset();
    });

});