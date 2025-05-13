<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = \request(['name', 'password']);
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Login yoki parol noto‘g‘ri'], 401);
        }
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);

    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to logout, please try again.'
            ], 500);
        }
    }
}
