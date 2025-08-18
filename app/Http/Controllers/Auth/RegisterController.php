<?php

namespace App\Http\Controllers\Auth;

use App\Dto\RegisterDTO;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function store(RegisterRequest $registerRequest, AuthService $authService): JsonResponse
    {
        $validated = $registerRequest->validated();

        $registerDto = new RegisterDTO($validated['name'], $validated['email'], $validated['password']);

        $user = User::create([
            'name' => $registerDto->name,
            'email' => $registerDto->email,
            'password' => Hash::make($registerDto->password),
        ]);

        $authService->loginWithoutAttempt($user);

        $registerRequest->session()->regenerate();

        return Response()->json([
            'message' => 'account registration was succesfull',
        ]);

    }
}
