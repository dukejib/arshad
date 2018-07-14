<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //We are not using this . it has 2 files Event.php and EventListener.php
        // // 'App\Events\Event' => [
        //     'App\Listeners\EventListener',
        // ],
        //Listen to an Registeration Event And Send Email
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\SendWelcomeEmail',
        ],
        //Listen to Contact Email Event and Send Email
        'App\Events\ContactMadeEvent' => [
            '\App\Listeners\ContactMadeEmailToAdmin',
        ],
        //Listen to Order Generation Event
        'App\Events\NewOrderGeneratedEvent' => [
            'App\Listeners\NewOrderGeneratedSendEmail',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
