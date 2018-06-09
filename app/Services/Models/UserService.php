<?php

namespace App\Services\Models;

use App\Traits\Profile\HasAvatar;
use App\User;

class UserService
{
    use HasAvatar;

    protected $user;

    /**
     * Make a new instance of the model.
     *
     * @param \App\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all users.
     *
     * @return array
     */
    public function get($column='email', $order='asc')
    {
        return User::with('roles:name')->orderBy($column, $order)->get();
    }


    /**
     * Find the user by the attribute.
     *
     * @param string $value
     * @param  string $field
     * @return \App\User
     */
    public function findBy($value, $field='email')
    {
        return User::where($field, $value)->firstOrFail();
    }

    /**
     * Create a new account.
     *
     * @param array $data
     * @return \App\User $user
     */
    public function createAccount($data)
    {
        $user = new User;

        $user->name = setUsername($data['first_name'], $data['last_name']);
        $user->email = $data['email'];
        $user->password = $data['password']; //attribute set

        $user->save();

        $user->assignRole($data['role_id']);

        $user->createOrUpdateProfile($data);

        return $user;
    }

    /**
     * Update the account.
     *
     * @param  array $data
     * @return void
     */
    public function updateAccount($userId, $data)
    {
        $user = User::find($userId);

        $user->email = $data['email'];

        if ($data['first_name'] && $data['last_name'])
        {
            $user->name = setUsername($data['first_name'], $data['last_name']);
        }

        if($data['password'])
        {
            $user->password = $data['password'];
        }

        $user->save();

        if($data['role_id'])
        {
            $user->assignRole($data['role_id']);
        }

        $user->createOrUpdateProfile($data);
    }

    /**
     * Delete the account.
     *
     * @param  string $path
     * @return void
     */
    public function deleteAccount($userId, $path)
    {
        $user = User::find($userId);

        $user->profile->removeAvatarFromDestination($path);

        $user->delete();
    }
}