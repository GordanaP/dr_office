<?php

namespace App;

use App\Traits\Profile\HasAvatar;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasAvatar;

    // protected $with = ['avatar'];

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
     * Get the avatar that belongs to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function avatar()
    {
        return $this->hasOne(Avatar::class);
    }

}