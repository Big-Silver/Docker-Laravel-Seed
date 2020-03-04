<?php

namespace App\Repository;

interface ContactRepositoryInterface
{
    public function index();

    public function all();

    public function getById($id);

    public function getByEmail($email);
}