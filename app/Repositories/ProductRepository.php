<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function model()
    {
        return Product::class;
    }

    public function create($input, $file = NULL)
    {
        // Store File
        $input['product_photo'] = $file->store('product-images');
        Parent::create($input);
    }
}
