<?php

namespace App\Providers\Listeners;

use App\Mail\LoginCredentials;
use Illuminate\Support\Facades\Mail;
use App\Providers\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginCredentials
{
  

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user,$event->password)
        );
      
    }
}
