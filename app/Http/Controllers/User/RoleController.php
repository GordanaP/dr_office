<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RevokeRolesRequest;
use App\Http\Requests\RoleRequest;
use App\Role;
use App\Services\Models\RoleService;
use App\User;

class RoleController extends Controller
{
    protected $roles;

    /**
     * Create new controller instance.
     *
     * @return  void
     */
    public function __construct(RoleService $roles)
    {
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
        $roles = $this->roles->get();

        return view('users.roles.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->roles->createOrUpdate($request);

        return message("A new role has been created");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return response([
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->roles->createOrUpdate($request, $role->id);

        return message("The role has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->roles->remove($role->id);

        return message("The role has been deleted");
    }

    /**
     * Revoke the user's roles.
     *
     * @param  \App\Http\Requests\RevokeRolesRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function revoke(RevokeRolesRequest $request, $userId)
    {
        $user = User::find($userId);

        $user->revokeRole($request->role_id);

        return message("The selected role(s) have been revoked.'");
    }
}