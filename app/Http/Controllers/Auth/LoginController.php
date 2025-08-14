<?php

namespace App\Http\Controllers\Auth;

use App\Dto\LoginDTO;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;

class LoginController extends Controller
{
    public function store(LoginRequest $loginRequest, AuthService $authService): JsonResponse
    {
        $credentials = $loginRequest->validated();
        
        $loginDto = new LoginDTO($credentials['email'], $credentials['password']);

        if ($authService->login($loginDto)) {
            $loginRequest->session()->regenerate();

            return response()->json([
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'message' => 'Unable to login, credentials are invalid. Please try again!',
        ], 401);
    }
}
