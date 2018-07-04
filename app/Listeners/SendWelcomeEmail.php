<?php

namespace App\Listeners;

use App\Mail\WelcomeToRibsncuts;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //Mail to user - Get his/her email id from $event
        Mail::to($event->user)->send(new WelcomeToRibsncuts($event->user));
    }
}
