<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLoginPage(){
        return view('auth.login');
    }
    public function getRegisterPage(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            "name"=> "required|max:50",
            "email"=> "required|email|unique",
            "password"=> "required|confirmed",
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('home')->with('success','User Register successfully');
    }
    public function login(Request $request){
        $request->validate([
            "name"=> "required|max:50",
            "email"=> "required|email|unique",
            "password"=> "required|confirmed",
        ]);
        $user = User::where("email", $request->email);
        if($user) {
            return redirect()->route("home")->with("success", "User Login successfully");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success' , 'User Logout successfully');
    }
}
