<?php

namespace App\Services\Product;

use App\Models\Product;

class ProductService
{
    public function store($data)
    {
        return Product::create($data);
    }
}
