<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
        parent::create($input);
    }

    public function update($input, $model, $file = NULL)
    {
        if ($file) {
            // Store File
            $input['product_photo'] = $file->store('product-images');
            Storage::delete($model->product_photo);
        }
        parent::update($input, $model);
    }
}
