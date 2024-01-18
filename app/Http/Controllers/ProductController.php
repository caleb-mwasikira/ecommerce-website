<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function view_all_products()
    {
        return view("welcome", [
            "products" => Product::all(),
        ]);
    }

    public function view_product(int $productId)
    {
        $product = Product::with("reviews")->findOrFail($productId);

        return view("products.show", [
            "product" => $product,
        ]);
    }

    public function add_product()
    {
        return view("products.editor", [
            "product" => null,
            "categories" => Category::all()
        ]);
    }

    public function edit_product(int $productId) {
        $product = Product::findOrFail($productId);
        
        return view("products.editor", [
            "product" => $product,
            "categories" => Category::all()
        ]);
    }
}
