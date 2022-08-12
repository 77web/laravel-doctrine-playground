<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function login(): RedirectResponse
    {
        Auth::login($this->em->find(User::class, 1));

        return new RedirectResponse(route('todo.index'));
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return new RedirectResponse(route('todo.index'));
    }
}
