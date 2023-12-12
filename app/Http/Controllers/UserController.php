<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("dashboard.users.all-users",compact("users"));
    }
    public function create(){
        return view("dashboard.users.add-user");
    }
    public function store(Request $request){
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
        return redirect()->route('admin.users.index')->with('success','User Created successfully');
    }

    public function edit(User $user){
        $user = User::all();
        return view('dashboard.users.edit-users',compact('user'));
    }
    public function update(Request $request,User $user){
        $request->validate([
            "name"=> "required|max:50",
            "email"=> "required|email|unique",
            "password"=> "required|confirmed",
        ]);
        $user = User::find($user->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route("admin.users.index")->with("success","User Updated successfully");
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route("admin.users.index")->with("success","User Deleted successfully");
    }
}
