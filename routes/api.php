<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// routes defined in here are stateless so they do not contain session by default reminder for myself

Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
