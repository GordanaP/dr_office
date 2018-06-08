<?php

namespace App\Traits\Profile;

use App\Avatar;

trait HasAvatar
{
    public function createOrUpdate($profile, $data, $path)
    {
        if ($data['avatar_options'] == 1)
        {
            $profile->addAvatar($profile, $data, $path);
        }
        else if($data['avatar_options'] == 2)
        {
            $profile->removeAvatar($path);
        }
    }

    /**
     * Remove the avatar from the storage.
     *
     * @param string $path
     *
     */
    public function removeAvatarFromDestination($path)
    {
        $this->avatar ? unlink($path .'/' .$this->avatar->filename) : '';
    }

    /**
     * Add the avatar.
     *
     * @param array $data
     * @param string $path
     */
    protected function addAvatar($profile, $data, $path)
    {
        $this->changeAvatarPath($profile, $data, $path);

        $this->changeAvatar($profile, $data);
    }

    /**
     * Remove the avatar.
     *
     * @param string $path
     */
    protected function removeAvatar($path)
    {
        $this->removeAvatarFromDestination($path);

        $this->deleteAvatar();
    }

    /**
     * Change the avatar path in the storage.
     *
     * @param  array $data
     */
    protected function changeAvatarPath($profile, $data, $path)
    {
        $myArray = $data->all();

        $file = $data['avatar'];
        $fileName = setAvatarName($profile->id, $file);

        $this->removeAvatarFromDestination($path);
        $file->move($path, $fileName);
    }

    /**
     * Change the avatar in the database.
     *
     * @param  array $data
     */
    protected function changeAvatar($profile, $data)
    {
        $avatar = $this->avatar ?: new Avatar;

        $avatar->filename = setAvatarName($profile->id, $data['avatar']);

        $this->saveAvatar($avatar);
    }

    /**
     * Save the avatar in the database.
     *
     * @param  \App\Avatar $avatar
     *
     */
    protected function saveAvatar($avatar)
    {
        $this->avatar()->save($avatar);
    }

    /**
     * Remove the avatar from the database.
     *
     */
    protected function deleteAvatar()
    {
        optional($this->avatar)->delete();
    }
}