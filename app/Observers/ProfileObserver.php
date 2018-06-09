<?php

namespace App\Observers;

use App\ActivationToken;
use App\Profile;

class ProfileObserver
{
    /**
     * Listen to the Profile creating event.
     *
     * @param  \App\Profile  $profile
     * @return void
     */
    public function creating(Profile $profile)
    {
        $name = setFullName($profile->first_name, $profile->last_name);

        $profile->slug = Profile::uniqueNameSlug($name);
    }
}