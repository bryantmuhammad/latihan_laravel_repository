<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerRepository extends BaseRepository
{
    public function model()
    {
        return Customer::class;
    }
}
