@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->order_product as $order_product)
                        <tr>
                            <td>{{ $order_product->product->product_name }}</td>
                            <td>{{ $order_product->product_qty }}</td>
                            <td>@currency($order_product->total_price)</td>

                        </tr>
                    @empty
                        <tr>
                            <th colspan="4" scope="row" class="text-center">Tidak ada data</th>
                        </tr>
                    @endforelse


                </tbody>
            </table>



        </div>
    </div>
@endsection
