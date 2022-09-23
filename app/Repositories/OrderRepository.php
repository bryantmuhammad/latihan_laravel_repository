<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function model()
    {
        return Order::class;
    }

    public function get_number_order()
    {
        return 'ORD-' . date('ymd') . generateRandomString(4);
    }
}
