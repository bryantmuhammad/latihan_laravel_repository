<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Services\OrderService;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    private $order_service;

    public function __construct(OrderService $orderService)
    {
        $this->order_service = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all(),
            'customers' => Customer::all()
        ];
        return $this->view('order.index', 'Order Produk', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = $this->order_service->create_order($request->validated());

        if ($order->status) {
            Alert::success('Berhasil', $order->message);
            return redirect()->route('order.index');
        }

        Alert::error('Gagal', $order->message);
        return redirect()->route('order.index');
    }

    public function show(Order $order)
    {
        $data = [
            'order' => $order->load('order_product.product')
        ];

        return $this->view('order.detail', 'Detail Order', $data);
    }

    public function history()
    {
        $data = [
            'orders' => Order::with('customer')->paginate(20)
        ];

        return $this->view('order.history', "History Order", $data);
    }
}
