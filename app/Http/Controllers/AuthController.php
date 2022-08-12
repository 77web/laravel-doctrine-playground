<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(): RedirectResponse
    {
        Auth::attempt(['email' => 'user@example.com', 'password' => 'password']);

        return new RedirectResponse(route('todo.index'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return new RedirectResponse(route('todo.index'));
    }
}
