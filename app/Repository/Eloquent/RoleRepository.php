<?php

namespace App\Repository\Eloquent;

use App\Repository\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleRepository implements RoleRepositoryInterface
{
    public function index()
    {
        return Role::orderBy('id', 'ASC');
    }

    public function all()
    {
        return Role::all();
    }

    public function getById($id)
    {
        return Role::find($id);
    }

    public function getAllPermissions()
    {
        return Permission::get();    
    }

    public function getRolePermissionsById($id)
    {
        return Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
    }

    public function getAllRolePermissionsById($id)
    {
        return DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
    }

    public function createRole($role)
    {
        return Role::create(['name' => $role]);
    }

    public function removeRoleById($id)
    {
        DB::table("roles")->where('id', $id)->delete();
    }
}