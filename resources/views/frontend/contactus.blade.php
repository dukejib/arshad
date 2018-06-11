@extends('layout.frontend_master')

@section('content')

<div class="container bg-transparent">
    
    <div class="row">

        <div class="col animated fadeInUp">
            <h1>The Meat Masters</h1>
            <p><h3>Our highly equipped and professional &quot;Meat Masters&quot; provides you the finely trimmed premium quality meat in all cuts.</h3></p>
        </div>

        <div class="col animated fadeInUp">
            <img src="{{ asset('/assets/images/letsmeet-medium.png') }}" alt="" style="display:block;margin:auto;">
        </div>

    </div>

</div>

<div class="container bg1">

    <!-- Contact form -->
    <div class="contact-form form" id="getintouch">
        <div class="container">
            <h1 class="text-center">Get in Touch</h1> 
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
                <input type="submit" class="btn btn-danger btn-block rounded-0" value="Send" name="submit">
              
            </form>
            <!-- Form Start -->
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>

</div>
    

@endsection







  