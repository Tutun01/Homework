<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProduct", compact('allProducts'));
    }

    public function delete($product)
    {
        $singleProduct = ProductsModel::where(['id' => $product]) ->first();

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

        $product->name = $request->get("name");
        $product->description = $request->get("description");
        $product->amount = $request->get("amount");
        $product->price = $request->get ("price");
        $product->save();

        return redirect()->back();

    }
}
