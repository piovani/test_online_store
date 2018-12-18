<?php

namespace App\Domain\Auth;

use App\Http\Controllers\Controller;
use App\Domain\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    public function authenticate(Request $request)
    {
        try {
            $token = $this->service->gerarToken($request->email, $request->password);

            return response(compact('token'));
        } catch (Exception $e) {
            return response(['Email and/or password incorrect'], 401);
        }
    }

    public function refresh()
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());

        return response(compact('token'));
    }
}
