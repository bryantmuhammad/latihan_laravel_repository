@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
            <a href="{{ route('product.create') }}">
                <span class="badge text-bg-primary">Tambah Produk</span>
            </a>

        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok Produk</th>
                        <th scope="col" class="text-center">Foto Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_stok }}</td>
                            <td class="text-center">
                                <a href="{{ asset('storage/' . $product->product_photo) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $product->product_photo) }}" alt="Foto Produk"
                                        width="150" height="120">
                                </a>
                            </td>
                            <td>{{ $product->product_price }}</td>
                            <td class="text-center">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" scope="row" class="text-center">Tidak ada data</th>
                        </tr>
                    @endforelse


                </tbody>
            </table>

            {{ $products->links() }}

        </div>
    </div>
@endsection
