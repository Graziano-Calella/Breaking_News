<?php

namespace App\Listeners;

use App\Notifications\SendOTP;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Fortify\Events\TwoFactorAuthenticationEnabled;
use Laravel\Fortify\Events\TwoFactorAuthenticationChallenged;

class SendTwoFactorCodeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if ($event instanceof TwoFactorAuthenticationChallenged || $event instanceof TwoFactorAuthenticationEnabled) {
            $event->user->notify(app(SendOTP::class));
        }
    }
}
