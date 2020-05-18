<?php

namespace App\Listeners;

use App\Events\ContactSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Klaviyo;

class SendKlaviyoContactInfo
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
     * @param  ContactCreated  $event
     * @return void
     */
    public function handle(ContactSaved $event)
    {
        $tracker = new Klaviyo("TR5Gti");
        $tracker->track(
            'New Contact',
            [
                '$id' => $event->contact->user->id, 
            ],
            [
                '$first_name' => $event->contact->first_name,
                '$email' => $event->contact->email,
                '$phone' => $event->contact->phone,
            ],
        );
    }
}
