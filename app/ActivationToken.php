<?php

namespace App;

use App\Observers\ActivationTokenObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActivationToken extends Model
{
    /**
     * The attributes that are carbon parsed.
     *
     * @var array
     */
    protected $dates = ['expires_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }

    /**
     * Bootstrap the application ActivationToken service.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::observe(ActivationTokenObserver::class);
    }

    /**
     * Get the user that owns the activation token.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create a new model instance.
     *
     * @param $user
     * @return App\ActivationToken
     */
    public static function generateNewFor($user)
    {
        $token = new static;

        $token->token = str_limit(md5(($user->email).str_random()), 32);
        $token->expires_at = Carbon::today()->addWeeks(2);
        $token->user_id = $user->id;

        $token->save();

        return $token;
    }

    /**
     * Indicates if the activation token is expired.
     *
     * @return bool
     */
    public function hasExpired()
    {
        return Carbon::today()->gt($this->expires_at);
    }
}