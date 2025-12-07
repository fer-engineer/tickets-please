<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Requests\ApiLoginRequest;

class AuthController extends Controller
{

    use ApiResponses;
    public function login(LoginUserRequest $request){
        $request->validated($request->all());


        if (!Auth::attemp($request->only('email' , 'password'))){
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email' , $request->email);

        return $this->ok(
            'Authenticated' ,
            [
                'token' => $user->createToken('Api token for' . $user->email)->plainTextToken
            ]

            );

    }

   
}
