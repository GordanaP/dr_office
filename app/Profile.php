<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Get the user that owns the profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create a new profile or update the existing one
     *
     * @param  \App\User $user
     * @param  array $data
     *
     * @return void
     */
    public static function newOrUpdate($user, $data)
    {
        $profile = $user->profile ?: new static;

        $profile->name = $data['name'];
        $profile->about = $data['about'];
        $profile->location = $data['location'];

        $user->profile()->save($profile);
    }
}
