<?php

namespace App\Repository;

interface RoleRepositoryInterface
{
    public function index();

    public function all();

    public function getById($id);
}