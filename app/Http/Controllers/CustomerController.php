<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\CustomerRepository;


class CustomerController extends Controller
{
    /** @var OutletRepository */
    private $customer_repo;

    /**
     * Constructor for autoload repo & service
     * 
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customer_repo = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Alert::success('Success Title', 'Success Message');
        $data = [
            'customers' => $this->customer_repo->paginate(5)
        ];
        return $this->view('customer.index', 'Customer', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('customer.create', 'Tambah Customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $this->customer_repo->create($request->validated());
        Alert::success('Berhasil', 'Berhasil menambahkan customer!');
        return redirect()->route('customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return $this->view('customer.edit', 'Edit Customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $this->customer_repo->update($request->validated(), $customer->id);
        Alert::success('Berhasil', 'Berhasil merubah customer!');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->customer_repo->delete($customer->id);
        Alert::success('Berhasil', 'Berhasil menghapus customer!');
        return redirect()->route('customer.index');
    }
}
