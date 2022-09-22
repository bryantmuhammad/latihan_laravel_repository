<?php

namespace App\Traits;

use App\Services\AuthorizationService;

trait View
{
    protected function view($view_name, $title, $data = [], $first_page = FALSE)
    {
        // $data['title'] = $title;
        // $data["sidebar"] = $this->menu_sidebar();

        // $current_url = url()->current();
        // $list_query_string = \request()->query();
        // $query_string = "?";
        // $delimiter = "";
        // foreach ($list_query_string as $key => $value) {
        //     $query_string .= "$delimiter$key=$value";
        //     $delimiter = "&";
        // }
        // $full_url = "$current_url$query_string";


        // $type_breadcrumb = \Illuminate\Support\Str::random(6);
        // if (isset($data["type_breadcrumb"])) {
        //     $type_breadcrumb = $data["type_breadcrumb"];
        // }
        // $data["breadcrumb"] = $this->draw_breadcrumb($title, $full_url, $type_breadcrumb, $first_page);

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
            'Order' => '/order'
        ];
        return $navbar;
    }
}
