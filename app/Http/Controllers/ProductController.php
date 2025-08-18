<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller implements HasMiddleware
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

    public static function middleware(): array
    {
        return [
            new Middleware('cache.headers:public;max_age=31536000;etag'),
        ];
    }
}
