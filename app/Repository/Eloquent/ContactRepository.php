<?php

namespace App\Repository\Eloquent;

use App\Contact;
use App\Repository\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    public function index()
    {
        return Contact::orderBy('id', 'ASC');
    }

    public function all()
    {
        return Contact::all();
    }

    public function getById($id)
    {
        return Contact::find($id);
    }

    public function getByEmail($email)
    {
        return Contact::where('email'. $email)->get();
    }
}