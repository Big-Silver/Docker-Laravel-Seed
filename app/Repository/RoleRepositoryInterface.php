<?php

namespace App\Repository;

interface RoleRepositoryInterface
{
    public function index();

    public function all();

    public function getById($id);

    public function getAllPermissions();
    
    public function getRolePermissionsById($id);

    public function getAllRolePermissionsById($id);

    public function createRole($role);

    public function removeRoleById($id);
}