<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Login extends Controller{

    public function loginUser(Request $request){
        $request->validate([
            'email'     => "required",
            'password'  => "required"
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->with('null', 'Enter Your Username & Password!');
        }else{
            if($user->role == "admin"){
                $request->session()->put("user", $user);
                return redirect('/admin');
                
            }elseif($user->role == "doctor"){
                $request->session()->put("user", $user);
                return redirect()->route("doctor.index");

            }elseif($user->role == "user"){
                $request->session()->put("user", $user);
                return redirect()->route("user.index");
            }
        }
    }
}
