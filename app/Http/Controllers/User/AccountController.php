<?php

namespace App\Http\Controllers\User;

use App\Events\Auth\AccountCreatedByAdmin;
use App\Events\Auth\AccountUpdatedByAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AccountRequest;
use App\Role;
use App\Traits\ModelFinder;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    use ModelFinder;

    protected $avatarPath = 'images/avatars';

    /**
     * Create new controller instance.
     *
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {

            $users = $this->getUsers();

            return [ 'data' => $users ];
        }
    }

    /**
     * Display a listing of the users' accounts
     *
     * @return \Illuminate\Http\Response
     */
    public function accountsList()
    {
        $roles = $this->getRoles();

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
        $user = User::createAccount($request);

        event(new AccountCreatedByAdmin($user, $request->password));

        return message("A new account has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        if(request()->ajax()) {

            $user = User::findBy($userId, 'id');

            $html = view('users.roles.partials._html', compact('user'))->render();

            return response([
                'user' => $user->load('roles'),
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
    public function edit(User $user)
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
    public function update(AccountRequest $request, $userId = null)
    {
        if ($request->ajax()) {

            $user = User::findBy($userId, 'id');

            $user->load('roles')->updateAccount($request);

            if(! $user->isAdmin()) {
                event(new AccountUpdatedByAdmin($user, $request->password));
            }

            return message('The account has been updated');
        }

        Auth::user()->updateAccount($request);

        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @userId  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId = null)
    {
        if (request()->ajax()) {

            $user = User::findBy($userId, 'id');

            $user->deleteAccount($this->avatarPath);

            return message('The account has been deleted.');
        }

        Auth::user()->deleteAccount($this->avatarPath);

        return $this->deleted();
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

    /**
     * Get the response for a successfull account deletion.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function deleted()
    {
        $response = message('Your account has been deleted.');

        return redirect()->route('index')->with($response);
    }
}