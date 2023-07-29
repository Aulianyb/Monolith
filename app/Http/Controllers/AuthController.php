<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    public function register(Request $request)
    {
        $data = $request->all(); 
        // $validator = $this->validator($data);

        app()->instance('registerValidator', $this->validator($data));

        if (app('registerValidator')->fails()){
            return view('auth\register')->withErrors(app('registerValidator'));
        } else {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]); 
            return $this->login($request);
        }
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))){
            return view('auth\login')->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }

        $user = Auth::user(); 
        $token = $user->createToken('token')->plainTextToken; 
        $cookie = cookie('jwt', $token, 24*60); 
        
        return redirect()->route('home')->withCookie($cookie);
    }

    public function logout(){
        $cookie = Cookie::forget('jwt');
        return redirect('/'); 
    }

    public function user(){
        dd(Auth::user()); 
        return Auth::user(); 
    }

    public function register_index()
    {
        app()->singleton('registerValidator', function($app){
            return $validator = Validator::make([], []);
        }); 
        return view('auth\register')->withErrors(app('registerValidator')); 
    }

    public function login_index()
    {
        $validator = Validator::make([], []);
        return view('auth\login')->withErrors($validator); 
    }
}
