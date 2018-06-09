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

        $slug = $this->getSlug($profile, $data['first_name'], $data['last_name']);

        $profile->title = $data['title'];
        $profile->first_name = $data['first_name'];
        $profile->last_name = $data['last_name'];
        $profile->slug = $slug;

        $this->profile()->save($profile);

        return $profile;
    }

    /**
     * Create the user name slug during account update.
     *
     * @param  \App\User $user
     * @param  string $name
     * @return string
     */
    protected function getSlug($profile, $first_name, $last_name)
    {
        $currentName = setFullName($profile->first_name, $profile->last_name);
        $newName = setFullName($first_name, $last_name);

        $slug = $newName == $currentName ?  $profile->slug : Profile::uniqueNameSlug($newName);

        return $slug;
    }

}