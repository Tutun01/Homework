<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductsModel;

class ShopController extends Controller
{
    function index()
    {
        $products = ProductsModel::latestProducts();

        return view('shop', compact('products'));
    }
}
