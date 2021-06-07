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
            'username' => ['required', 'min:3','max:20', 'unique:users,username'],
            'e_mail' => ['required', 'email'],
            'mobile' => ['required', 'min:11','max:16',],
            'cnic' =>  ['required', 'min:13', 'max:14', 'unique:users,cnic'],
            'age' => 'required',
            'blood_group' => 'required',
            'address' => 'required',
            'password' =>  ['required', 'min:5','max:25'],
            'confirm_password' => ['required', 'min:5','max:25', 'same:password'],
            'dob' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'profile_img' => ['required', 'mimes:jpeg, jpg, png, PNG, JPG, JPEG', 'max:3000'],
        ]);

        // Image new name
        $image_new_name = time().'-'.$request->first_name.'.'.$request->profile_img->extension();
        
        // User creating.
        $user_created = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->e_mail,
            'mobile' => $request->mobile,
            'cnic' => $request->cnic,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'address' => $request->address,
            'password' => Hash::make($request->confirm_password),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'role' => $request->role,
            'profile_img' => $image_new_name,                
        ]);

        // Check if user successfully created.
        if($user_created == true){
            // moving image to public folder
            $request->profile_img->move(public_path('images'), $image_new_name);
            $request->session()->flash('success', 'Successfully Inserted');
            return redirect()->route('login');
        }else{
            return back()->with('failed', 'Failed to Insert');
        }
    }


    // Login User and Authentication
    public function loginUser(Request $request){
        // validating inputs to login.
        if($request->username || $request->password != NULL){

            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
    
            // getting user if username exists to belonging user.
            $user = User::get()->where('username', $request->username)->first();
            
            if($user == TRUE){
                $user_password = Hash::check($request->password, $user->password);
                if($user_password != NULL){

                    // putting user in session
                    $request->session()->put('user', $user);

                    if($user->role == 'admin'){
                        return redirect()->route('index');
                    }else if($user->role == 'user'){
                        return redirect()->route('index2');
                    }else{
                        return redirect()->route('index3');
                    }
                    
                }else{
                    return back()->with('login_failed', 'The Username Or Password does not match!');
                }
            }
            
            else{
                
                return back()->with('login_failed', $request->username.' does not eixts');
            }
        }

        else{
            return back()->with('null', 'Enter Your Username & Password!'); 
        }
    }

    // UPDATING USER PROFILE
    public function editProfile(Request $request){
        // FINDING USER BY ID
        $user = User::find($request->user_id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->e_mail;
        $user->mobile = $request->mobile;
        $user->cnic = $request->cnic;
        $user->address = $request->address;
        $user->blood_group = $request->blood_group;
        $user->dob = $request->dob;
        $user->gender = $request->gender;

        // SAVING UPDATED
        $updated = $user->update();     

        if($updated == true){
            if($request->session()->has('user')){
                $request->session()->forget('user');
            }
            $request->session()->put('user', $user);
            return back()->with('updated', 'Record Failed To Update');
        }else{
            return back()->with('failed', 'Record Failed To Update');
        }
    }

    // Loging out user.
    public function logoutUser(Request $request){
        $request->session()->forget('user');
        return redirect('login')->with('logout','Logout Successfull');
    }
}
