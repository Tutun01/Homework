<?php

use Illuminate\Support\Facades\Route;

Route::view("/about", "about");

Route::get("/welcome", [\App\Http\Controllers\HomepageController::class, 'index']);
Route::get("/shop", [\App\Http\Controllers\ShopController::class, 'index']);

Route::get("/contact", [\App\Http\Controllers\ContactController::class, 'index']);
//Route::view("/contact", "contact");


Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactController::class, "getAllContacts"]);

Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, 'sendContact']);
