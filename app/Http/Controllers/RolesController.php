<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view("roles.index",compact("roles"));
    }

    public function create()
    {
        $permissions = DB::table('permissions')->get();
        return view("roles.add",compact("permissions"));
    }

    public function store(Request $req)
    {
        $permissions = NULL;
        $prms = [];
        $data = [];
        if($req->permission_id != NULL){
            foreach($req->permission_id as $perm){
                array_push($prms,$perm);
            }
            $data = [
                'role'          =>  $req->post("role"),
                'desc'          =>  $req->post("desc"),
                'permission_id' =>  json_encode($prms)
            ];

        }else{
            $permissions = 0;
            $data = [
                'role'          =>  $req->post("role"),
                'desc'          =>  $req->post("desc"),
                'permission_id' =>  $permissions
            ];
        }

        $insert = DB::table('roles')->insert($data);
        if($insert == true){
            return redirect(url("/roles"))->with("role_added","Role Added Successfully");
        }else{
            return redirect(url("/roles"))->with("error","Something Went Wrong");
        }

    }

    public function edit($id)
    {

    }

    public function update(Request $req)
    {

    }

    public function delete($id)
    {

    }
}
