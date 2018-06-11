/** Used by teaser.blade.php */
$(document).ready(function(){
    
    console.log('javascript started');

    //Make Header taf full page
    $(document).ready(function(){
        $('.header').height($(window).height());
        console.log('windows height changed');
    });

    //Toastr.js Settings
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-full-width",
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

    //This removes the animated.class from the .tip to stop aniamtion
    $('.tip').hover(function(){
        $('#contactus').toggleClass('pulse');
        console.log('tip animation toggled');
    });

    //Windows Scroll check for Animating the Contact Form when in range
    $(window).scroll(function(){
        //Get Y pixel place
        var y = $(this).scrollTop();
        // console.log("y is : " + y);
            if(y >= 146){
            showGetInTouch();
        }
    });

    //If tip is clicked then go contact us form
    function showGetInTouch(){
        //Add animate class to other things.
        $('#right-col').addClass('animated bounceInRight');
        $('#left-col').addClass('animated bounceInLeft');
        // console.log('showing GetInTouch');
    }

    //This is how we listen to animation end events in all browsers
    $(function(){
        var animationName = "animated bounce";
        var animationEnd = "animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd MSAnimationEnd";
        //$(#element).addClass(animationName).one(animationEnd,function(){
        //    $(this).removeClass(animationName);
        //});
    });

    //Uses Toastr https://github.com/CodeSeven/toastr
    /** Toastr Options */
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        //"positionClass": "toast-bottom-full-width",
        "positionClass": "toast-bottom-center",
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
                items:1
            },
            600:{
                items:3
            },
            800:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});