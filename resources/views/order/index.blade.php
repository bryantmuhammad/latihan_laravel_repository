@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-lg-6 col-md-6 col-sm-12 pt-2 product-list" data-id="{{ $product->id }}">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset("storage/{$product->product_photo}") }}" class="card-img-top"
                                        alt="Foto {{ $product->product_name }}" wdith="180" height="150">
                                    <div class="card-body">
                                        <p class="card-text">{{ $product->product_name }}</p>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h1>Tidak ada produk</h1>
                        @endforelse


                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="customer" class="mb-2">Customer</label>
                                <select name="customer" id="customer" class="form-control">
                                    <option value="0">- Pilih Customer -</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <x-forms.input-group label="Tanggal Order" name="order_date"
                                value="{{ old('order_date', $customer->order_date ?? '') }}" id="orderdate" required="true"
                                placeholder="Masukan Tanggal Order" type="date">
                            </x-forms.input-group>
                        </div>
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10%">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col" width="15%">Qty</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tableproduk">


                                </tbody>
                                <tbody>
                                    <tr>
                                        <td class="text-center" colspan="3"><b>Total</b></td>
                                        <td><b id="total">Rp 0</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
