<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function index();

    public function all();

    public function getById($id);

    public function getRoleName();

    public function removeRoleById($id);
}