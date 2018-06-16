<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Profile;
use Auth;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    protected $avatarPath = 'images/avatars';

    /**
     * Create new controller instance.
     *
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $profileId
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        if(request()->ajax()) {

            return response([
                'profile' => $profile->load('avatar') ?: ''
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AvatarRequest  $request
     * @param  int  $profileId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        if($request->ajax()) {

            $profile->createOrUpdate($profile, $request, public_path($this->avatarPath));

            return message('The avatar has been saved.');
        }
    }
}
