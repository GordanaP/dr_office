<?php

namespace App\Observers;

use App\ActivationToken;

class ActivationTokenObserver
{
    /**
     * Listen to the ActivationToken creating event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(ActivationToken $token)
    {
        optional($token->user->activationToken)->delete();
    }
}