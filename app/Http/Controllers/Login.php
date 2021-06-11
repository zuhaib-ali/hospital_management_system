<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Controller
{
    //
    // Login User and Authentication
    public function loginUser(Request $request){
        // validating inputs to login.
        if($request->username || $request->password != NULL){

            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
    
            // RETRIVING USER.
            $user = User::get()->where('username', $request->username)->first();
            
            // LOGIN IF USER EXISTS.
            if($user == TRUE){
                
                // IF USER PASSWORD MATCHES.
                $user_password = Hash::check($request->password, $user->password);
                if($user_password != NULL){
                   
                    // putting user in session
                    $request->session()->put('user', $user);

                    if($user->role == 'admin'){
                        return redirect()->route('index');
                    }
                    
                    // REDIRECTING AFTER AUTHENTICATING
                    return redirect()->route('index');
                }else{
                    return back()->with('login_failed', 'The Username Or Password does not match!');
                }
            }else{   
                return back()->with('login_failed', $request->username.' does not eixts');
            }
        }

        else{
            return back()->with('null', 'Enter Your Username & Password!'); 
        }
    }

}
