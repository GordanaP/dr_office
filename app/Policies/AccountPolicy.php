<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    // public function view(User $auth, User $model)
    // {
    //     return $auth->is($model);
    // }

    /**
     * Determine whether the user can access models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function access(User $auth)
    {
        return $auth->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $auth, User $model)
    {
        return $auth->isAdmin();
        // return $auth->isAdmin() || $auth->is($model);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $auth, User $model)
    {
        return $auth->isAdmin();
        // return $auth->isAdmin() || $auth->is($model);
    }
}