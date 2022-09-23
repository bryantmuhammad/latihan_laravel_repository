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
                        <th scope="col">Tanggal Order</th>
                        <th scope="col">Nomor Order</th>
                        <th scope="col">Nama Customer</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->order_date->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->customer->customer_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4" scope="row" class="text-center">Tidak ada data</th>
                        </tr>
                    @endforelse


                </tbody>
            </table>

            {{ $orders->links() }}

        </div>
    </div>
@endsection
