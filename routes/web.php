<?php

use Illuminate\Support\Facades\Route;

Route::view("/about", "about");

Route::get("/welcome", [\App\Http\Controllers\HomepageController::class, 'index']);
Route::get("/shop", [\App\Http\Controllers\ShopController::class, 'index']);

Route::get("/contact", [\App\Http\Controllers\ContactController::class, 'index']);
//Route::view("/contact", "contact");


Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactController::class, "getAllContacts"]);

Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, 'sendContact']);

Route::get("/admin/delete-contact/{contact}", [\App\Http\Controllers\ContactController::class, "delete"])
    ->name("deleteContact");

Route::get("/admin/add-product", [\App\Http\Controllers\ProductsController::class, 'index']);

Route::post("/add-product", [\App\Http\Controllers\ProductsController::class, 'addProduct'])
    ->name("saveProduct");
//Route::get("/admin/products", [\App\Http\Controllers\ProductsController::class, 'getAllProducts']);

Route::get("/admin/all-products", [\App\Http\Controllers\ProductController::class, 'index'])
    ->name("allProducts");

Route::get("/admin/delete-product/{product}", [\App\Http\Controllers\ProductController::class, "delete"])
    ->name("deleteProduct");

Route::get("/admin/product/edit/{id}", [\App\Http\Controllers\ProductController::class, "singleProduct"])
    ->name("product.single");

Route::post("/admin/product/save/{id}", [\App\Http\Controllers\ProductController::class, "edit"])
    ->name("product.save");

