<?php

namespace App\Traits\User;

use App\Profile;

trait HasProfile
{
    /**
     * Get the profile that belongs to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * The user's profile has been created.
     *
     * @return bool
     */
    public function hasProfile()
    {
        return $this->profile;
    }

    /**
     * Delete the user's profile
     *
     * @return void
     */
    public function deleteProfile()
    {
        $this->profile()->delete();
    }
}