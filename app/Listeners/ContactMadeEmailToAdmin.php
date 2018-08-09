<?php

namespace App\Listeners;

use App\Mail\ContactMadeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMadeEmailToAdmin
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
        // return $event;
        // dd($event);
        Mail::to('info@ribsncuts.com')->send(new ContactMadeEmail($event));
        // dd ($contact);
    }
}
