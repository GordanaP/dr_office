<?php

namespace App\Http\Controllers\User;

use App\Events\Auth\AccountCreatedByAdmin;
use App\Events\Auth\AccountUpdatedByAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AccountRequest;
use App\Services\Models\RoleService;
use App\Services\Models\UserService;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Hash;

class AccountController extends Controller
{
    protected $users;

    protected $roles;

    protected $avatarPath = 'images/avatars';

    /**
     * Create new controller instance.
     *
     * @return  void
     */
    public function __construct(UserService $users, RoleService $roles)
    {
        $this->users = $users;
        $this->roles = $roles;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax())
        {
            $users = $this->users->get();

            return [ 'data' => $users->load('profile') ];
        }
    }

    /**
     * Display a listing of the users' accounts
     *
     * @return \Illuminate\Http\Response
     */
    public function accountsList()
    {
        $roles = $this->roles->get();

        return view('users.accounts.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @userId  \App\Http\Requests\AccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        if (request()->ajax())
        {
            $user = $this->users->createAccount($request);

            event(new AccountCreatedByAdmin($user, $request->password));

            return message("A new account has been created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(request()->ajax())
        {
            $html = view('users.roles.partials._html', compact('user'))->render();

            return response([
                'user' => $user->load('roles', 'profile'),
                'html' => $html
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @userId  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.accounts.edit')->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @userId  \Illuminate\Http\Request  $request
     * @userId  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, User $user)
    {
        if ($request->ajax())
        {
            $newEmail = $request->email;
            $newPassword = $request->password;

            if ($this->users->hasChangedLoginCredentials($user, $newEmail, $newPassword))
            {
                event(new AccountUpdatedByAdmin($newEmail, $newPassword));
            }

            $this->users->updateAccount($user, $request);

            return message('The account has been updated');
        }

        $this->users->updateAccount(Auth::user(), $request);

        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @userId  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (request()->ajax())
        {
            $this->users->deleteAccount($user, $this->avatarPath);

            return message('The account has been deleted.');
        }
    }

    /**
     * Get the response for a successfull account update.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function updated()
    {
        $response = message('Your account has been saved.');

        return redirect()->route('users.accounts.edit')->with($response);
    }
}