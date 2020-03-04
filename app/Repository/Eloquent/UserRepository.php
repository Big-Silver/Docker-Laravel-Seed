<?php

namespace App\Repository\Eloquent;

use App\User;
use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index() {
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
}