<?php

namespace App\Listeners\Auth;

use App\Events\Auth\AccountCreatedByAdmin;
use App\Events\Auth\AccountUpdatedByAdmin;
use App\Events\Auth\TokenRequested;
use App\Mail\Auth\PleaseActivateYourAccount;
use App\Mail\Auth\PleaseConfirmYourEmailAddress;
use App\Mail\Auth\YourAccountHasBeenUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class ActivateAccount
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
     * Handle the account created by an admin event.
     *
     * @param  AccountCreatedByAdmin  $event
     * @return void
     */
    public function sendTokenAndPassword(AccountCreatedByAdmin $event)
    {
        Mail::to($event->user)
            ->send(new PleaseActivateYourAccount($event->user->activationToken, $event->password));
    }

    /**
     * Handle the request for new token event.
     *
     * @param  TokenRequested  $event
     * @return void
     */
    public function resendActivationToken(TokenRequested $event)
    {
        Mail::to($event->user)
            ->send(new PleaseConfirmYourEmailAddress($event->user->activationToken));
    }

    /**
     * Handle the account updated by an admin event.
     *
     * @param  AccountCreatedByAdmin  $event
     * @return void
     */
    public function sendLoginCredentials(AccountUpdatedByAdmin $event)
    {
        Mail::to($event->email)
            ->send(new YourAccountHasBeenUpdated($event->email, $event->password));
    }
}
