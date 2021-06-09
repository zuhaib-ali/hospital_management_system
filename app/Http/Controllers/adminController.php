<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adminController extends Controller
{
    //

    public function addAdmin(Request $request)
    {
        $data   =   new User;

        $file       =   $request->file('profile_img');
        $path       =   public_path('images');
        $ext        =   $file->getClientOriginalExtension();
        $fileName   =   time() . '.' . $ext;

        $data->first_name       =   $request->post('first_name');
        $data->last_name        =   $request->post('last_name');
        $data->username         =   $request->post('username');
        $data->email            =   $request->post('email');
        $data->mobile           =   $request->post('mobile');
        $data->cnic             =   $request->post('cnic');
        $data->age              =   $request->post('age');
        $data->blood_group      =   $request->post('blood_group');
        $data->address          =   $request->post('address');
        $data->password         =   $request->post('password');
        $data->dob              =   $request->post('dob');
        $data->gender           =   $request->post('gender');
        $data->role             =   $request->post('role');
        $file->move($path,$fileName);
        $data['profile_img']    =   $fileName;

        $data->save();
        return back()->with('success', 'Successfully Added');


    }

    public function editAdmin($id)
    {
        
    }

    public function delAdmin($id)
    {
        
    }
}
