<?php
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::middleware('auth')->get('/user', function (Request $request){
    return $request->user();
})->name('user');