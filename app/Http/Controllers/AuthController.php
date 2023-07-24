<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]); 
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))){
            return response([
                'message' => 'Invalid Credentials!'
            ], Response::HTTP_UNAUTHORIZED); 
        }

        $user = Auth::user(); 
        $token = $user->createToken('token')->plainTextToken; 
        $cookie = cookie('jwt', $token); 
        
        return response([
            'message' => 'Success',
            'token' => $token
        ])->withCookie($cookie); 
    }

    public function logout(){
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Success logout'
        ])->WithCookie($cookie); 
    }

    public function user(){
        return Auth::user(); 
    }
}
