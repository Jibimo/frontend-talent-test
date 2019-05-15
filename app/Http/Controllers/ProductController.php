<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return new ProductResourceCollection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
