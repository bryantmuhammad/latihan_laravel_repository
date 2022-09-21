@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">Customer</h5>
            <a href="{{ route('customer.create') }}">
                <span class="badge text-bg-primary">Tambah Customer</span>
            </a>

        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->customer_phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('customer.edit', $customer->id) }}"
                                    class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4" scope="row" class="text-center">Tidak ada data</th>
                        </tr>
                    @endforelse


                </tbody>
            </table>

            {{ $customers->links() }}

        </div>
    </div>
@endsection
