<?php

namespace App\Repository\Eloquent;

use App\User;
use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index() {
        return User::orderBy('id', 'DESC');
    }

    public function all()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function getByEmail($email) {
        return User::where('email'. $email)->get();
    }
}