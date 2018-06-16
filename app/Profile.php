<?php

namespace App;

use App\Observers\ProfileObserver;
use App\Traits\Profile\HasAvatar;
use App\Traits\Profile\HasSchedule;
use App\Traits\Profile\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasAvatar, HasSlug, HasSchedule;

    /**
     * Bootstrap the application Profile service.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(ProfileObserver::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    /**
     * Get the working days that belong to the profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workingDays()
    {
        return $this->belongsToMany(WorkingDay::class)->as('work')->withPivot('start_at', 'end_at');
    }

    /**
     * Get the profile's full name
     *
     * @return string
     */
    public function getFullName()
    {
        return ucfirst($this->first_name) .' ' .ucfirst($this->last_name);
    }

    /**
     * Get the profile's avatar
     *
     * @param  string $path
     * @param  string $default
     * @return string
     */
    public function getAvatar($path = 'images/avatars', $default='default.jpg')
    {
        $fileName = optional($this->avatar)->filename ?: $default;

        return $path.'/'.$fileName;
    }
}