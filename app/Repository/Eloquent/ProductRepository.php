<?php

namespace App\Repository\Eloquent;

use App\Product;
use App\Repository\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        return Product::orderBy('id', 'ASC');
    }

    public function all()
    {
        return Product::all();
    }

    public function getById($id)
    {
        return Product::find($id);
    }

    public function createProduct($request)
    {
        Product::create($request->all());
    }
}