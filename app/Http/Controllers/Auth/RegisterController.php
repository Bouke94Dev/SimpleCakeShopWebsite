<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Dto\RegisterDTO;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController {

    public function store(RegisterRequest $registerRequest, AuthService $authService): JsonResponse
    {
        $validated = $registerRequest->validated();

        $registerDto = new RegisterDTO($validated['name'], $validated['email'], $validated['password']);

        $user = User::create([
            'name' => $registerDto->name,
            'email' => $registerDto->email,
            'password' => Hash::make($registerDto->password)
        ]);

        $authService->loginWithoutAttempt($user);

        $registerRequest->session()->regenerate();

        return Response()->json([
            'message' => 'account registration was succesfull'
        ]);

    }
}

