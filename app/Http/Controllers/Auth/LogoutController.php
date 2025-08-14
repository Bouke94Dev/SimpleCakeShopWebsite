<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function store(AuthService $authService)
    {
            $authService->logout();
            return response()->json(['message' => 'Logged out']);
    }
}
