<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";

    protected $fillable = [
        "name", "description", "amount", "price", "image"
    ];

    public static function latestProducts() {
        return self::orderBy('created_at', 'desc')->take(6)->get();
    }

}
