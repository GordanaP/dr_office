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
    public function removeProfile($path)
    {
        $this->profile->removeAvatarFromDestination($path);

        $this->delete();
    }

    public function createOrUpdateProfile($data)
    {
        $profile = $this->profile ?: new Profile;

        $profile->name = $data['first_name'].' '.$data['last_name'];
        $profile->about = $data['about'];
        $profile->location = $data['location'];

        $this->profile()->save($profile);

        return $profile;
    }
}