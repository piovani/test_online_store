<?php

namespace App\Domain\Auth;

use App\Domain\User\User;
use JWTAuth;
use Exception;

class AuthService
{
    public function gerarToken($login, $password)
    {
        $user = User::where('login', $login)->first();

        if (!$user) {
            throw new Exception('User not fount');
        }

        if ($user->password !== $password) {
            throw new Exception('Invalid password');
        }

        $token = JWTAuth::fromUser($user);

        return $token;
    }
}
