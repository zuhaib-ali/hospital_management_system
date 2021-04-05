<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function create_user(Request $request){
        // validating inputs to create user.
        $request->validate([
            'full_name' => ['required', 'min:7','max:30'],
            'e_mail' => ['required', 'email', 'unique'],
            'mobile' => ['required', 'min:11','max:13',],
            'cnic' =>  ['required', 'min:13', 'max:13'],
            'age' => 'required',
            'blood_group' => 'required',
            'address' => 'required',
            'password1' =>  ['required', 'min:15','max:25', 'password'],
            'password2' => ['required', 'min:15','max:25', 'same:password1'],
            'dob' => 'required',
            'gender' => 'required',
        ]);

        // Inserting new user.
        $user_created = User::create([
            'name' => $request->full_name,
            'email' => $request->e_mail,
            'mobile' => $request->mobile,
            'cnic' => $request->cnic,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'address' => $request->address,
            'password' => Hash::make($request->password2),
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        // Check if user successfully created.
        if($user_created){
            return back()->with('success', 'Successfully Inserted');
        }else{
            return back()->with('failed', 'Failed to Insert');
        }
    }


    // Authenticating and loging in user.
    public function loginUser(Request $request){
        // validating inputs to login.
        $request->validate([
            'e_mail' => ['required', 'email'],
            'password' => 'required',
        ]);

        // getting user if email exists to belonging user.
        $user = User::get()->where('email', $request->e_mail);
        $user_password = Hash::check($request->password, $user[0]->password);

        if($user_password){
            Auth::loginUsingId($user[0]->id);
            return route('index');
        }
    }


    // Loging out user.
    public function logoutUser(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
