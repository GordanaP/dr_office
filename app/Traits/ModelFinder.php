<?php

namespace App\Traits;

use App\Role;
use App\User;

trait ModelFinder
{
    /**
     * Get all roles;
     *
     * @return array
     */
    public function getRoles() {

        return Role::all();
    }

    /**
     * Get all users.
     *
     * @return array
     */
    public function getUsers()
    {
        return User::with('roles:name')->with('avatar')->get();
    }
}