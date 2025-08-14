<?php

namespace App\Services;

use App\Dto\LoginDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService
{
    public function login(LoginDTO $dto): bool
    {
        return Auth::attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ]);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function loginWithoutAttempt(Authenticatable $user): void
    {
        Auth::login($user);
    }
}
