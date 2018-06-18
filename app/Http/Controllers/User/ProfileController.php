<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Profile;
use App\User;
use App\WorkingDay;

class ProfileController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(request()->ajax()) {

            return [
                'profile' => $user->profile ?? '',
            ];
        }
    }

    public function edit(Profile $profile)
    {
        return view('users.profiles.edit')->with([
            'profile' => $profile->load('avatar'),
            'days' => WorkingDay::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        if(request()->ajax()) {

            $user->createOrUpdateProfile($request);

            return message('The profile has been saved.');
        }
    }
}