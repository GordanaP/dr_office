<?php

namespace App\Traits\User;

trait HasAccount
{
    /**
     * Create a new account.
     *
     * @param array $data
     * @return \App\User $user
     */
    public static function createAccount($data)
    {
        $user = new static;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        $user->save();

        $user->assignRole($data['role_id']);

        return $user;
    }

    /**
     * Update the account.
     *
     * @param  array $data
     * @return void
     */
    public function updateAccount($data)
    {
        $slug = $this->getSlug($data['name']);

        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->slug = $slug;

        if($data['password'])
        {
            $this->password = bcrypt($data['password']);
        }

        if($data['role_id'])
        {
            $this->assignRole($data['role_id']);
        }

        $this->save();
    }

    /**
     * Delete the account.
     *
     * @param  string $path
     * @return void
     */
    public function deleteAccount($path)
    {
        $this->removeAvatarFromDestination($path);

        $this->delete();
    }
}