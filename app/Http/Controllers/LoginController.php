<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function register(Request $request) {
        {

            $request->validate([
                'name' => 'required',
                'email' => 'required' ,'string' ,'unique:users','email',
                'password' => 'required','string','confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $token=$user->createToken('token')->plainTextToken;

            return response()->json([
                'status'=> true,
                'user'=>$user,
                'message'=>'user created',
                'token'=>$token
            ]);
        }

}



    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid Credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        return response([
            'user'      => Auth::user(),
            'token'     => $token
        ]);
    }



    public function user()
    {
        return response([
            'user' => Auth::user()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success'=>true,'message'=>'logout?!?!?']);

    }

}
