<?php

namespace App\Http\Controllers\User;

use App\Avatar;
use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\User;
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        if(request()->ajax()) {

            $user = User::findBy($userId, 'id');

            return response([
                'filename' => optional($user->avatar)->filename
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
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AvatarRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(AvatarRequest $request, $userId = null)
    {
        if($request->ajax()) {

            $user = User::findBy($userId, 'id');

            Avatar::newOrUpdate($user, $request, public_path($this->avatarPath));

            return message('The avatar has been saved.');
        }

        Avatar::newOrUpdate(Auth::user(), $request, public_path($this->avatarPath));

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
