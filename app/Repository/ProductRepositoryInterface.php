<?php

namespace App\Repository;

interface ProductRepositoryInterface
{
    public function index();

    public function all();

    public function getById($id);

    public function createProduct($request);
}