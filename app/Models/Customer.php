<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected function customerName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
