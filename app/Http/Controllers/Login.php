<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Login extends Controller
{

    public function loginUser(Request $request){
        $request->validate([
            'email'     => "required",
            'password'  => "required"
        ]);

        $email = $request->email;
        $pass = $request->password;

        $login = DB::table('users')
        ->leftJoin('roles','users.role_id','roles.id')
        ->select("users.*",'roles.permission_id')
        ->where('users.email',$email)
        ->first();
        if($login != NULL && Hash::check($pass, $login->password)){
            $request->session()->put("user", $login);
            return redirect()->route("index");
        }
        return back()->with('null', 'Enter Your Username & Password!');
    }

}
