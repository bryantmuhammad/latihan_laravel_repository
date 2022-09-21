@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline">{{ $title }}</h5>
        </div>

        <div class="card-body">


            <form action="{{ route('customer.update', $customer->id) }}" method="post">
                @csrf
                @method('PUT')
                @include('customer.form')

                <button class="btn btn-success btn-sm mt-2">Edit Customer</button>
            </form>
        </div>
    </div>
@endsection
