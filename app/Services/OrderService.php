<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\OrderProductRepository;
use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderService
{
    private $order_repo;
    private $order_product_repo;
    private $product_repo;

    public function __construct(OrderRepository $orderRepo, OrderProductRepository $orderProduct, ProductRepository $productRepo)
    {
        $this->order_repo           = $orderRepo;
        $this->order_product_repo   = $orderProduct;
        $this->product_repo         = $productRepo;
    }

    public function generate_product_from_request_array($request)
    {
        $products = Product::select('id', 'product_price', 'product_stok')
            ->whereIn('id', $request['product_id'])
            ->get();


        $list_product   = [];
        $count          = count($request['product_id']);

        for ($i = 0; $i < $count; $i++) {
            $product_id = $request['product_id'][$i];
            $qty        = $request['qty'][$i];
            $product    = $products->firstWhere('id', $product_id);

            // Jika produk nya tidak ada dalam database
            if (!$product)  return FALSE;
            // Jika qty lebih besar dari jumlah stok
            if ($qty > $product->product_stok) return FALSE;

            $total_price = $qty * $product->product_price;
            $list_product[] =   [
                'product_id'        => $product->id,
                'product_price'     => $product->product_price,
                'product_qty'       => $qty,
                'total_price'       => $total_price,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ];
        }

        return $list_product;
    }

    public function create_order($request)
    {
        $order_number = $this->order_repo->get_number_order();
        $product_list = $this->generate_product_from_request_array($request, $order_number);
        $response = create_response();
        if (!$product_list) {
            $response->message = "Produk tidak ditemukan";
            return $response;
        }

        try {
            DB::transaction(function () use ($request, $order_number, $product_list) {
                $order = $this->order_repo->create([
                    'order_date' => $request['order_date'],
                    'order_number' => $order_number,
                    'customer_id' => $request['customer_id'],
                ]);

                $product_list = add_new_key_to_array($product_list, 'order_id', $order->id);
                $order_product = $this->order_product_repo->create_batch($product_list);

                // Pengurangan stok
                $this->product_repo->decrement_stok($product_list);
            });
        } catch (\Exception $e) {
            $response->status_code = 500;
            $response->message = "Terjadi kesalahan server!";
            return $response;
        }

        $response->status = TRUE;
        $response->status_code = 200;
        $response->message = "Order berhasil dibuat!";

        return $response;
    }
}
