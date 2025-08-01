<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->firstOrFail();
            $token = $user->createToken('access_token');

            return $this->toResponse(['user' => $user, 'token' => $token->plainTextToken], 'User logged in', 200);
        }

        return $this->toResponse([], 'error in authentication', 401);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::create($credentials);
        $token = $user->createToken('access_token');

        return $this->toResponse(['token' => $token->plainTextToken, 'user' => $user], 'user registered', 200);
    }
}
