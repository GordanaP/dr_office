<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = ['filename'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Create a new avatar or update the existing one
     *
     * @param  \App\User $user
     * @param  array $data
     * @param  string $path
     *
     */
    // public static function newOrUpdate($user, $data, $path)
    // {
    //     if ($data['avatar_options'] == 1)
    //     {
    //         $user->addAvatar($user, $data, $path);
    //     }
    //     else if($data['avatar_options'] == 2)
    //     {
    //         $user->removeAvatar($path);
    //     }
    // }
}
