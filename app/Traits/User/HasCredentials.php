<?php

namespace App\Traits\User;

trait HasCredentials
{
    /**
     * The user has changed email address
     *
     * @param  array  $data
     * @return boolean
     */
    protected function hasChangedEmail($user, $newEmail)
    {
        $oldEmail = $user->email;

        return $newEmail != $oldEmail;
    }


    /**
     * The user has changed password.
     *
     * @param  \App\User  $user
     * @param  array  $data
     * @return boolean
     */
    protected function hasChangedPassword($user, $newPassword)
    {
        $oldPassword = $user->password;

        return ! blank($newPassword) && ! \Hash::check($newPassword, $oldPassword);
    }
}