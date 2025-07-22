<?php

namespace App\Services\Common;

use App\Models\User;
use Illuminate\Http\Request;
use LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService{

    static public function login(Request $request){

        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        if (!$token) {return null;}

        $user = Auth::user();
        $user->token = $token;
        return $user;


    }
    static function register(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = Auth::login($user);

        $user->token = $token;
        return $user;
    }

    static function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
