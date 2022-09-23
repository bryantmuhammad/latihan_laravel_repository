<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['order_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
