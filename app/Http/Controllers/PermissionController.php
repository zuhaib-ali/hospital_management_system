<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = DB::table("permissions")->get();
        return view("permission.index",compact('permissions'));
    }

    public function store(Request $req)
    {
        // dd($req->all());

        $data = [
            'permission'    =>  $req->post("permission"),
            'description'   =>  $req->post("description")
        ];

        $insert = DB::table('permissions')->insert($data);
        if($insert == true){
            return redirect(url("/permissions"))->with("added","Permission Added Successfully");
        }else{
            return redirect(url("/permissions"))->with("error","Something Went Wrong");
        }
    }

    public function edit($id)
    {
        // echo $id;
        $permission = DB::table("permissions")->where("id",$id)->first();
        return view("permission.edit",compact("permission"));
    }

    public function update(Request $req)
    {
        // dd($req->all());

        $data = [
            'permission'    =>  $req->post("permission"),
            'description'   =>  $req->post("description")
        ];

        $insert = DB::table('permissions')->where("id",$req->id)->update($data);
        if($insert == true){
            return redirect(url("/permissions"))->with("updated","Permission Updated Successfully");
        }else{
            return redirect(url("/permissions"))->with("error","Something Went Wrong");
        }
    }

    public function delete($id)
    {
        $delete = DB::table('permissions')->where("id",$id)->delete();
        if($delete == true){
            return redirect(url("/permissions"))->with("deleted","Permission Deleted Successfully");
        }else{
            return redirect(url("/permissions"))->with("error","Something Went Wrong");
        }

    }

}
