<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $clock = date("h");
        $isMorning = ($clock >= 0 && $clock <= 12);
        $currentTime = date("h:i:s");
        $latestProducts = ProductsModel::latestProducts();

        return view('welcome', compact('clock', 'isMorning', 'latestProducts', 'currentTime'));
    }
}
