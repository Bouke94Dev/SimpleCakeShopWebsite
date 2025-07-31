<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::with(['productImage'])->get();

        return response()->json(ProductResource::collection($products));
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::with(['productImage'])->findorfail($id);

        return response()->json(new ProductResource($product));
    }
}
