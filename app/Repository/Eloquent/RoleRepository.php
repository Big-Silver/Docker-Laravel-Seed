<?php

namespace App\Repository\Eloquent;

use Spatie\Permission\Models\Role;
use App\Repository\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function index() {
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
}