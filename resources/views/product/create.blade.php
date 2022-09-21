@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
        </div>

        <div class="card-body">


            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('product.form')

                <button class="btn btn-success btn-sm mt-2">Tambah Produk</button>
            </form>
        </div>
    </div>
@endsection
