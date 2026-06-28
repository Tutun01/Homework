<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo= new ProductRepository();
    }
    public function addProducts ()
    {
        return view('add-product');
    }


    public function addProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);

        return redirect()->route("allProducts");

    }
}
