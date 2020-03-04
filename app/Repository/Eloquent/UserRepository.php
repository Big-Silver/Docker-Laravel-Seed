<?php

namespace App\Repository\Eloquent;

use App\Repository\UserRepositoryInterface;
use App\User;
use Spatie\Permission\Models\Role;
use DB;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::orderBy('id', 'ASC');
    }

    public function all()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function getRoleName()
    {
        return Role::pluck('name', 'name')->all();
    }

    public function removeRoleById($id) {
        DB::table('model_has_roles')->where('model_id', $id)->delete();
    }
}