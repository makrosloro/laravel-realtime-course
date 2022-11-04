<?php

namespace App\Listeners;

use App\Events\UserSessionChange;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastUserLogoutNotification
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

    public function handle(Logout $event)
    {
        broadcast(new UserSessionChange("{$event->user->name} is offline!", 'danger'));
    }
}
