<?php

namespace App;

use App\Observers\UserObserver;
use App\Traits\User\HasProfile;
use App\Traits\User\HasRoles;
use App\Traits\User\VerifiesEmail;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,
    HasProfile,
    HasRoles,
    VerifiesEmail;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified' => 'boolean',
    ];

    /**
     * Bootstrap the application User service.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(UserObserver::class);
    }

    /**
     * Format the account creation date.
     *
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->toFormattedDateString();
    }

    /**
     * Get the token that belongs to the user.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

    /**
     * Set the user's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}