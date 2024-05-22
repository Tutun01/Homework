<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::view("/about", "about");

Route::get("/welcome", [HomepageController::class, 'index']);
Route::get("/shop", [ShopController::class, 'index']);

Route::get("/contact", [ContactController::class, 'index']);
//Route::view("/contact", "contact");


Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function (){

    Route::get("/all-contacts", [ContactController::class, "getAllContacts"]);

    Route::get("/delete-contact/{contact}", [ContactController::class, "delete"])
        ->name("deleteContact");

    Route::post("/send-contact", [ContactController::class, 'sendContact']);


    Route::get("/add-product", [ProductsController::class, 'index']);


    Route::post("/add-product", [ProductsController::class, 'addProduct'])
        ->name("saveProduct");
//Route::get("/admin/products", [\App\Http\Controllers\ProductsController::class, 'getAllProducts']);

    Route::get("/all-products", [ProductController::class, 'index'])
        ->name("allProducts");

    Route::get("/delete-product/{product}", [ProductController::class, "delete"])

        ->name("deleteProduct");

    Route::get("/product/edit/{product}", [ProductController::class, "singleProduct"])

        ->name("product.single");

    Route::post("/product/save/{id}", [ProductController::class, "edit"])

        ->name("product.save");

});

require __DIR__.'/auth.php';
