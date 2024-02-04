<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function register($data)
    {
        return User::create(
            [
                "name" => $data["name"],
                "email" => $data["email"],
                "password"  => Hash::make($data["password"])
            ]
        );
    }

    public function login($data)
    {

        if (Auth::attempt(["email" => $data["email"], "password" => $data["password"]])) {
            $token = JWTAuth::fromUser(Auth::user());
            return ["user" => Auth::user(), "token" => $token];
        }
    }

    public function me()
    {
        return JWTAuth::user();
    }
}
