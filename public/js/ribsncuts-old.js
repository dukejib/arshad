/** Used by teaser.blade.php */
$(document).ready(function(){

    //Make Header taf full page
    $(document).ready(function(){
        $('.header').height($(window).height());
        // console.log('windows height changed');
    });

    //This removes the animated.class from the .tip to stop aniamtion
    $('.tip').hover(function(){
        $('#contactus').toggleClass('pulse');
        // console.log('tip animation toggled');
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

});