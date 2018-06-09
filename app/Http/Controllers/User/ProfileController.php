<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\User;

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
    public function show($userId)
    {
        if(request()->ajax()) {

            $user = User::find($userId);

            return [
                'profile' => $user->profile ?? '',
            ];
        }
    }

    public function edit($userId)
    {
        $user = User::find($userId);

        return view('users.profiles.edit')->with([
            'user' => $user->load('profile', 'profile.avatar')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $userId)
    {
        if(request()->ajax()) {

            $user = User::find($userId);

            $user->createOrUpdateProfile($request);

            return message('The profile has been saved.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        if(request()->ajax()) {

            $user = User::find($userId);

            $user->removeProfile($this->avatarPath);

            return message('The profile has been deleted.');
        }
    }
}