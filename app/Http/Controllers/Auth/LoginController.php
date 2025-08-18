<?php

namespace App\Http\Controllers\Auth;

use App\Dto\LoginDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

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
