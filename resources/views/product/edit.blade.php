@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
        </div>

        <div class="card-body">


            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('product.form')
                @method('PUT')

                <button class="btn btn-success btn-sm mt-2">Edit Produk</button>
            </form>
        </div>
    </div>
@endsection
