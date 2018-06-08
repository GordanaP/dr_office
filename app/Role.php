<?php

namespace App;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the users who own the role.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}