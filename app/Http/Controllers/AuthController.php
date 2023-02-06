<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $type = $request->type;
        if(\Auth::attempt([$type => $request->{$type}, 'password' => $request->password]) ) {
            // return ['status' => true, 'token' => \Auth::user()];
            $token = \Auth::user()->createToken('myApp');
            // \Auth::user()->createToken('myApp')->accessToken
            return ['token' => $token->plainTextToken];
        }
        // Auth::attemp();
    }

}
