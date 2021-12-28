<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;

class UserController extends Controller
{
    public function create_user(Request $request)
    {
        // validating inputs
        $request->validate([
            'first_name' => ['required', 'min:3', 'max:15'],
            'last_name' => ['required', 'min:3', 'max:15'],
            'email' => 'required|email|unique:users',
            'mobile' => ['required', 'min:11', 'max:16'],
            'address' => 'required',
            'password' =>  ['required', 'min:5', 'max:25'],
            'confirm_password' => ['required', 'min:5', 'max:25', 'same:password'],
            'gender' => 'required',
        ]);

        $image_new_name = null;
        if ($request->profile_img != null) {
            // Image new name
            $image_new_name = time().'_'.$request->profile_img->getClientOriginalName();
        }

        // User creating.
        $user_created = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name . " " . $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'address' => $request->address,
            'password' => Hash::make($request->confirm_password),
            'gender' => $request->gender,
            'role' => $request->role,
            'profile_img' => $image_new_name,
        ]);

        // Check if user successfully created.
        if ($user_created == true) {
            // moving image to public folder
            if ($request->profile_img != null) {
                $request->profile_img->move(public_path('profile_images'), $image_new_name);
            }
            $request->session()->flash('success', 'Successfully Inserted');
            return redirect()->route('login_view');
        } else {
            return back()->with('failed', 'Failed to Insert');
        }
    }

    // EDIT PROFILE
    public function editProfile(Request $request)
    {
        if ($request->session()->has('user') == true) {

            $carts = DB::table('carts')->get();

            $user = $request->session()->get('user');
            return view(
                'components.edit_profile',
                [
                    'user' => $user,
                    'carts' => $carts
                ]
            );
        }
    }

    // UPDATING PROFILE
    public function updateProfile(Request $request)
    {

        // FINDING USER BY ID
        $user = User::get()->find($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->e_mail;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->blood_group = $request->blood_group;
        $user->age = $request->age;
        $user->gender = $request->gender;


        // SAVING UPDATED
        if ($user->update()) {
            return back()->with('updated', 'Profile updated, please re-login to see new changes!');
        } else {
            return back()->with('failed', 'Record Failed To Update');
        }
    }
    
    // Add staff
    public function addStaff(Request $request)
    {
        $image_name = null;

        $request->validate([
            "first_name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "confirm_password" => "required|same:password",
            "gender" => "required",
        ]);

        if ($request->photo != null) {
            $image_name = $request->first_name . "." . $request->file('photo')->getClientOriginalExtension();
        }

        $staff = User::create([
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'username'          =>  $request->first_name . " " . $request->last_name,
            'email'             =>  $request->email,
            'mobile'            =>  $request->mobile,
            'address'           =>  $request->address,
            'age'               =>  $request->age,
            'password'          =>  Hash::make($request->confirm_password),
            'gender'            =>  $request->gender,
            'role'              =>  $request->role,
            'role_id'           =>  $request->role_id,
            'profile_img'       =>  $image_name
        ]);

        if ($staff) {
            if ($image_name != null) {
                $request->photo->move(public_path("profile_images"), $image_name);
            }

            return back()->with("staff_success", $request->first_name . " " . $request->last_name . " added.");
        }
    }

    // Edit staff
    public function editStaff(Request $request){
        $user_id = Crypt::decrypt($request->id);
        return view("components.staff.edit", [
            "staff" => User::find($user_id),
            "roles"  =>  DB::table("roles")->whereNotIn('id', [1])->get()
        ]);
    }

    // update staff
    public function updateStaff(Request $request){
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "mobile" => "required",
            "address" => 'required',
            "gender" => 'required',
            "role" => 'required'
        ]);

        $staff = User::find($request->id);

        $staff_name = $staff->username;

        $staff->first_name  =   $request->first_name;
        $staff->last_name   =   $request->last_name;
        $staff->username    =   $request->first_name . " " . $request->last_name;
        $staff->mobile      =   $request->mobile;
        $staff->address     =   $request->address;
        $staff->gender      =   $request->gender;
        $staff->role        =   $request->role;
        $staff->role_id     =   $request->role_id;

        if ($staff->update()) {
            return redirect(url("/aUsers"))->with("staff_info", $staff_name . " updated.");
        }
    }

    // Delete staff
    public function deleteStaff($id){
        $user_id = Crypt::decrypt($id);
        $delete = DB::table("users")->where("id", $user_id)->delete();
        if ($delete == true) {
            return back()->with("user_deleted", "User Deleted Successfully");
        } else {
            return back()->with("error","Something Went Wrong");
        }
    }

    public function edit(Request $request){
        return view('users.edit', [
            'user' => User::find($request->session()->get('user')->id),
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
        ]);

        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->first_name." ".$request->last_name;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->update();

        return back()->with('info', "Profile udpated");
    }
}
