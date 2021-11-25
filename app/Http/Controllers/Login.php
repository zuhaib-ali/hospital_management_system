<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Controller
{
    
    // public function loginUser(Request $request){
    
    //     if($request->username || $request->password != NULL){

    //         $request->validate([
    //             'username' => 'required',
    //             'password' => 'required',
    //         ]);
    
    //         $user = User::get()->where('username', $request->username)->first();
    
    //         if($user == TRUE){
    
    //             $user_password = Hash::check($request->password, $user->password);
    //             if($user_password != NULL){
    
    //                 $request->session()->put('user', $user);

    //                 if($user->role == 'admin'){
    //                     return redirect()->route('index');
    //                 }
    
    //                 return redirect()->route('index');
    //             }else{
    //                 return back()->with('login_failed', 'The Username Or Password does not match!');
    //             }
    //         }else{   
    //             return back()->with('login_failed', $request->username.' does not eixts');
    //         }
    //     }
    //     else{
    //         return back()->with('null', 'Enter Your Username & Password!'); 
    //     }
    // }

    public function loginUser(Request $request){
        $user = User::where("email", $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->with('null', 'Enter Your Username & Password!'); 
        }
        $request->session()->put("user", $user);
        return redirect()->route("index");
    }

}
