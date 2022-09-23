<?php

namespace App\Traits;

use App\Services\AuthorizationService;

trait View
{
    protected function view($view_name, $title, $data = [], $first_page = FALSE)
    {
        $data['navbar'] = $this->navbar();
        $data['title']  = $title;

        return view($view_name, $data);
    }

    protected function navbar()
    {
        $navbar = [
            'Home'      => '/',
            'Customer'  => '/customer',
            'Produk' => '/product',
            'Order' => '/order',
            'History Order' => '/order/history'
        ];
        return $navbar;
    }
}
