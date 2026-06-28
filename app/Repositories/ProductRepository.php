<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function createNew($request)
    {
        $this->productModel->create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),
            "created_at" => $request->get("created_at"),
            "updated_at" => $request->get("updated_at"),
        ]);
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

    public function edit($request, $product)
    {
        $product->name = $request->get("name");
        $product->description = $request->get("description");
        $product->amount = $request->get("amount");
        $product->price = $request->get ("price");
        $product->image = $request->get("image") ?? $product->image;
        $product->save();
    }
}
