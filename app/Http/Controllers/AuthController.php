<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
//use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok('Authenticated', [
            'token' => $user->createToken('Api token for ' . $user->email)->plainTextToken
        ]);
    }

}
