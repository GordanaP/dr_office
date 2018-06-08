<?php

namespace App\Http\Controllers\User;

use App\Avatar;
use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Profile;
use Illuminate\Support\Facades\Auth;

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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($profileId)
    {
        if(request()->ajax()) {

            $profile = Profile::find($profileId);

            return response([
                'filename' => optional($profile->avatar)->filename
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.avatars.edit')->with([
            'profile' => optional(Auth::user()->profile)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AvatarRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(AvatarRequest $request, $profileId = null)
    {
        if($request->ajax()) {

            $profile = Profile::find($profileId);

            $profile->createOrUpdate($profile, $request, public_path($this->avatarPath));

            return message('The avatar has been saved.');
        }

        optional(Auth::user()->profile)->createOrUpdate(Auth::user()->profile, $request, public_path($this->avatarPath));

        return $this->updated();
    }

    /**
     * Get the response for the successfully updated avatar.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function updated()
    {
        $response = message('Your avatar has been saved.');

        return back()->with($response);
    }
}
