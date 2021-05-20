<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function create_user(Request $request){
        // validating inputs
        $request->validate([
            'first_name' => ['required', 'min:3','max:15'],
            'last_name' => ['required', 'min:3','max:15'],
            'e_mail' => ['required', 'email'],
            'mobile' => ['required', 'min:11','max:13',],
            'cnic' =>  ['required', 'min:13', 'max:13', 'unique:users,cnic'],
            'age' => 'required',
            'blood_group' => 'required',
            'address' => 'required',
            'password' =>  ['required', 'min:15','max:25'],
            'confirm_password' => ['required', 'min:15','max:25', 'same:password'],
            'dob' => 'required',
            'gender' => 'required',
            'profile_img' => ['required', 'mimes:jpeg, jpg, png, PNG, JPG, JPEG', 'max:1000'],
        ]);

        // Image new name
        $image_new_name = time().'-'.$request->first_name.'.'.$request->profile_img->extension();
        
        
        
        
        // User creating.
        $user_created = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->e_mail,
            'mobile' => $request->mobile,
            'cnic' => $request->cnic,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'address' => $request->address,
            'password' => Hash::make($request->confirm_password),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'profile_img' => $image_new_name,                
        ]);

        // Check if user successfully created.
        if($user_created){
            // moving image to public folder
            $request->profile_img->move(public_path('images'), $image_new_name);
            return back()->with('success', 'Successfully Inserted');
        }else{
            return back()->with('failed', 'Failed to Insert');
        }
    }


    // Login User and Authentication
    public function loginUser(Request $request){
        // validating inputs to login.
        $request->validate([
            'e_mail' => ['required', 'email'],
            'password' => 'required',
        ]);

        // getting user if email exists to belonging user.
        $user = User::get()->where('email', $request->e_mail)->first();
        
        if($user){
            $user_password = Hash::check($request->password, $user->password);
            if($user_password){
                $request->session()->put('user', $user);
                return redirect()->route('index');
            }else{
                return back()->with('login_failed', 'The email or password does not match!');
            }
        }else{
            return back()->with('login_failed', $request->e_mail.' does not eixts');

        }
    }


    // Loging out user.
    public function logoutUser(Request $request){
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
