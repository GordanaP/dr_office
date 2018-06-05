<?php

namespace App;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * Bootstrap the application Role service.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(RoleObserver::class);
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
     * Get the users who own the role.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Format the role creation date.
     *
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->toFormattedDateString();
    }

    /**
     * Create a new role.
     *
     * @param  array $data
     * @return void
     */
    public static function createNew($data)
    {
        $role = new static;

        $role->name = $data['name'];

        $role->save();
    }

    /**
     * Update the role.
     *
     * @param  array $data
     * @return void
     */
    public function saveChanges($data) {

        $this->name = $data['name'];

        $this->save();
    }
}