<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;

class LogoutController extends Controller
{
    public function store(AuthService $authService)
    {
        $authService->logout();

        return response()->json(['message' => 'Logged out']);
    }
}
