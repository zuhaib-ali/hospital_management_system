<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class RolesController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view("roles.index", compact("roles"));
    }

    public function create()
    {
        $permissions = DB::table('permissions')->get();
        return view("roles.add", compact("permissions"));
    }

    public function store(Request $req)
    {
        $permissions = NULL;
        $prms = [];
        $data = [];
        if ($req->permission_id != NULL) {
            foreach ($req->permission_id as $perm) {
                array_push($prms, $perm);
            }
            $data = [
                'role'          =>  $req->post("role"),
                'desc'          =>  $req->post("desc"),
                'permission_id' =>  json_encode($prms)
            ];
        } else {
            $permissions = 0;
            $data = [
                'role'          =>  $req->post("role"),
                'desc'          =>  $req->post("desc"),
                'permasdission_id' =>  $permissions
            ];
        }

        $insert = DB::table('roles')->insert($data);
        if ($insert == true) {
            return redirect(url("/roles"))->with("role_added", "Role Added Successfully");
        } else {
            return redirect(url("/roles"))->with("error", "Something Went Wrong");
        }
    }

    public function edit($id)
    {
        $role_id = Crypt::decrypt($id);
        // echo $role_id;
        $role = DB::table('roles')->where("id",$role_id)->first();
        return view("roles.edit",compact("role"));
    }

    public function update(Request $req)
    {
        $permissions = NULL;
        $prms = [];
        $data = [];
        if ($req->permission_id != NULL) {
            foreach ($req->permission_id as $perm) {
                array_push($prms, $perm);
            }
            $data = [
                'role'          =>  $req->post("role"),
                'desc'          =>  $req->post("desc"),
                'permission_id' =>  json_encode($prms)
            ];
        } else {
            $permissions = 0;
            $data = [
                'role'          =>  $req->post("role"),
                'desc'          =>  $req->post("desc"),
                'permasdission_id' =>  $permissions
            ];
        }

        $insert = DB::table('roles')->where("id",$req->id)->update($data);
        if ($insert == true) {
            return redirect(url("/roles"))->with("role_updated", "Role Updated Successfully");
        } else {
            return redirect(url("/roles"))->with("error", "Something Went Wrong");
        }
    }

    public function delete($id)
    {
        $role_id = Crypt::decrypt($id);
        $delete = DB::table('roles')->where("id",$role_id)->delete();
        if ($delete == true) {
            return redirect(url("/roles"))->with("role_deleted", "Role Deleted Successfully");
        } else {
            return redirect(url("/roles"))->with("error", "Something Went Wrong");
        }

    }
}
