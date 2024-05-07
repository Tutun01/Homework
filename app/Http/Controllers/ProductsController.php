<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index ()
    {
        return view('add-product');
    }

    public function getAllProducts()
    {
        $allProducts = ProductsModel::all(); // SELECT * FROM products
        return view("allProducts", compact('allProducts'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            "name" => "required|string", // if (isset($_POST['email'])) && is_string($_POST['email'])
            "description" => "required|string|min:5",
            "amount" => "required|string",
            "price" => "required|string",
            "image" => "required|string",
            "created_at" => "required|string",
            "updated_at" => "required|string",

        ]);


        ProductsModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),
            "created_at" => $request->get("created_at"),
            "updated_at" => $request->get("updated_at"),
        ]);

        return redirect("/admin/add-product");



    }
}
