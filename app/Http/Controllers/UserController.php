<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function create_user(Request $request){
        // validating inputs
        $request->validate([
            'first_name' => ['required', 'min:3','max:15'],
            'last_name' => ['required', 'min:3','max:15'],
            // 'username' => ['required', 'min:3','max:20', 'unique:users,username'],
            'email' => 'required|email|unique:users',
            'mobile' => ['required', 'min:11','max:16'],
            'address' => 'required',
            'password' =>  ['required', 'min:5','max:25'],
            'confirm_password' => ['required', 'min:5','max:25', 'same:password'],
            'gender' => 'required',
            // 'profile_img' => ['required', 'mimes:jpeg, jpg, png, PNG, JPG, JPEG', 'max:3000'],
        ]);

        if($request->profile != null){
            // Image new name
            $image_new_name = time().'_'.$request->first_name.'_'.$request->last_name.'.'.$request->profile_img;
        }else{
            $image_new_name = null;
        }

        
        
        // User creating.
        $user_created = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            // 'cnic' => $request->cnic,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'address' => $request->address,
            'password' => Hash::make($request->confirm_password),
            // 'dob' => "10/22/2021",
            'gender' => $request->gender,
            'role' => $request->role,
            'profile_img' => $image_new_name,                
        ]);

        // Check if user successfully created.
        if($user_created == true){
            // moving image to public folder
            if($request->profile_img != null){
                $request->profile_img->move(public_path('images'), $image_new_name);
            }
            $request->session()->flash('success', 'Successfully Inserted');
            return redirect()->route('login');
        }else{
            return back()->with('failed', 'Failed to Insert');
        }
    }

    // EDIT PROFILE
    public function editProfile(Request $request){
        if($request->session()->has('user') == true){

            $carts = DB::table('carts')->get();

            $user = $request->session()->get('user');
            return view('components.edit_profile', [
                    'user'=>$user,
                    'carts'=>$carts
                ]
            );
        }
    }

    // UPDATING PROFILE
    public function updateProfile(Request $request){
        
        // FINDING USER BY ID
        $user = User::get()->find($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->e_mail;
        $user->mobile = $request->mobile;
        $user->cnic = $request->cnic;
        $user->address = $request->address;
        $user->blood_group = $request->blood_group;
        $user->dob = $request->dob;
        $user->age = $request->age;
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

    // Add staff
    public function addStaff(Request $request){
        $image_name = null;

        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email|unique:users",
            "mobile" => "required",
            "address" => "required",
            "age" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password",
            "gender" => "required",
            "role" => "required"
        ]);

        if($request->photo != null){
            $image_name = time()."_".$request->first_name."_".$request->last_name."_".$request->photo;
        }

        $staff = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'age' => $request->age,
            'password' => Hash::make($request->confirm_password),
            'gender' => $request->gender,
            'role' => $request->role,
            'profile_img' => $image_name
        ]);

        if($staff){
            if($image_name != null){
                $request->photo->move(public_path("profile_images"), $image_name);
            }

            return back()->with("staff_success", $request->first_name." ".$request->last_name." added.");
        }
    }

    // Edit staff
    public function editStaff(Request $request){
        return view("components.staff.edit", [
            "staff" => User::find($request->id)
        ]);        
    }

    // update staff
    public function updateStaff(Request $request){
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "mobile" => "required",
            "address" => "required",
            "age" => "required",
            "gender" => "required",
            "role" => "required"
        ]);


        $staff = User::find($request->id);

        $staff_name = $staff->username;

        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->username = $request->first_name." ".$request->last_name;
        $staff->mobile = $request->mobile;
        $staff->address = $request->address;
        $staff->gender = $request->gender;
        $staff->role = $request->role;

        if($staff->update()){
            return back()->with("staff_info", $staff_name." updated.");
        }
    }

    // Delete staff
    public function deleteStaff(Request $request){

    }
}
