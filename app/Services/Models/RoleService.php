<?php

namespace App\Services\Models;

use App\Role;
use App\User;

class RoleService
{
    protected $role;

    /**
     * Make a new instance of the model.
     *
     * @param \App\Role $role
     * @return  void
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Get all roles.
     *
     * @return array
     */
    public function get($column='name', $order='asc')
    {
        return Role::orderBy($column, $order)->get();
    }


    /**
     * Find the user by the attribute.
     *
     * @param string $value
     * @param  string $field
     * @return \App\User
     */
    public function findBy($value, $field='name')
    {
        return Role::where($field, $value)->firstOrFail();
    }

    /**
     * Create a new role or update the existing one.
     *
     * @param  array $data
     * @param  int $roleId
     * @return \App\Role $role
     */
    public function createOrUpdate($data, $roleId=null)
    {
        $role = $roleId ? Role::find($roleId) : new Role;

        $role->name = $data['name'];

        $role->save();

        return $role;
    }

    /**
     * Delete a role.
     *
     * @param  int $roleId
     * @return void
     */
    public function remove($roleId)
    {
        $role = Role::find($roleId);

        $role->delete();
    }
}