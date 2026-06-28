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

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("/admin")->group(function (){

    Route::controller(ContactController::class)->prefix("/contact")->group(function () {
        Route::get("/contact", "index")->name("contact");
        Route::get("/all", "getAllContacts");
        Route::name('contact.')->group(function (){
            Route::get("/delete/{contact}", "delete")->name("delete");
            Route::post("/send", "sendContact")->name("send");
        });

    });

    Route::controller(ProductsController::class)->prefix("/products")->group(function (){
        Route::name('products.')->group(function (){
            Route::get("/add-p", "addProducts")->name("add");
            Route::post("/add", "addProduct")->name("save");
        });
    });

    Route::controller(ProductController::class)->group(function () {
        Route::name('product.')->group(function (){
            Route::get("/all",'index')->name("all");
            Route::get("/delete/{product}","delete")->name("delete");
            Route::get("/edit/{product}","singleProduct")->name("single");
            Route::post("/save/{product}","edit")->name("save");
        });
    });

});

require __DIR__.'/auth.php';
