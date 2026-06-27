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

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function (){

    Route::controller(ContactController::class)->group(function () {
        Route::get("/contact", "index");
        Route::get("/contact/all", "getAllContacts");
        Route::post("/contact/send", "sendContact")->name("sendContact");
        Route::get("/contact/delete/{contact}", "delete")->name("deleteContact");
    });

    Route::controller(ProductsController::class)->group(function (){
        Route::get("/add-product", "index");
        Route::post("/add-product", "addProduct")->name("saveProduct");
        Route::get("/all-products", "index")->name("allProducts");
        Route::get("/delete-product/{product}", "delete")->name("deleteProduct");
        Route::get("/product/edit/{product}", "singleProduct")  ->name("product.single");
        Route::post("/product/save/{product}", "edit")->name("product.save");
    });
});

require __DIR__.'/auth.php';
