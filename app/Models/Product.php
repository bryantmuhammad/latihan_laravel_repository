<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderProduct;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    protected function productName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
