<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo= new ProductRepository();
    }
    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProduct", compact('allProducts'));
    }

    public function delete($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);

        if ($singleProduct == null)
        {
            die("Product don't exist");
        }
        $singleProduct->delete();

        return redirect()->back();
    }

    public function singleProduct(Request $request, ProductsModel $product)
    {
        return view('products.edit', compact('product'));
    }

    public function edit(Request $request, ProductsModel $product)
    {
        $this->productRepo->editProduct($product, $request);
        return redirect()->back();
    }
}
