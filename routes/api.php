<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// routes defined in here are stateless so they do not contain session by default reminder for myself

Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{products}/reviews', [ReviewController::class, 'index']);
