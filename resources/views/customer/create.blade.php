@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
        </div>

        <div class="card-body">


            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                @include('customer.form')

                <button class="btn btn-success btn-sm mt-2">Tambah Customer</button>
            </form>
        </div>
    </div>
@endsection
