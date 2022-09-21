<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /** @var ProductRepository */
    private $product_repo;


    /**
     * Constructor for autoload repo & service
     * 
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->product_repo = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => $this->product_repo->paginate(20)
        ];

        return $this->view('product.index', 'Produk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('product.create', 'Tambah Produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->product_repo->create($request->validated(), $request->file('product_photo'));
        Alert::success('Berhasil', 'Berhasil menambahkan produk!');
        return redirect()->route('product.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return $this->view('product.edit', 'Edit Produk', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->product_repo->update($request->validated(), $product, $request->file('product_photo'));
        Alert::success('Berhasil', 'Berhasil merubah produk!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
