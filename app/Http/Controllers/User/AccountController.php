<?php

namespace App\Http\Controllers\User;

use App\Events\Auth\AccountCreatedByAdmin;
use App\Events\Auth\AccountUpdatedByAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AccountRequest;
use App\Role;
use App\Services\Models\UserService;
use App\Traits\ModelFinder;
use App\User;
use Auth;

class AccountController extends Controller
{
    use ModelFinder;

    protected $users;

    protected $avatarPath = 'images/avatars';

    /**
     * Create new controller instance.
     *
     * @return  void
     */
    public function __construct(UserService $users)
    {
        $this->users = $users;

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

            $users = $this->users->get();

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
        $user = $this->users->createAccount($request);

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

            $user = User::find($userId);

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
    public function update(AccountRequest $request, $userId = null)
    {
        if ($request->ajax()) {

            $this->users->updateAccount($userId, $request);

            $user = User::find($userId);

            if(! $user->isAdmin()) {
                event(new AccountUpdatedByAdmin($user, $request->password));
            }

            return message('The account has been updated');
        }

        $this->users->updateAccount(Auth::id(), $request);

        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @userId  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        if (request()->ajax()) {

            $this->users->deleteAccount($userId, $this->avatarPath);

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