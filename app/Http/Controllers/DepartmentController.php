<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentController extends Controller
{
    // index
    public function index(Request $request){
        if($request->session()->has("user") == true){
            return view("components.departments.departments", [
                "departments" => Department::all()
            ]);
        }else{
            return redirect()->route("login");
        }
        
    }

    // ADD
    public function add(Request $request){
        if($request->session()->has("user") == true){
            
            $request->validate([
                "department_name" => "required",
                "description" => "required"
            ]);
            $department_created = Department::create([
                "department_name" => $request->department_name,
                "description" => $request->description,
            ]);

            if($department_created == true){
                return redirect()->route("departments")->with("department_created", "A new department ".$request->department_name." created successfully" );    
            }
        }else{
            return redirect()->route("login");
        }
    }

    // DESTROY
    public function destroy(Request $request){
        if($request->session()->has("user") == true){
            // DEPARTMENT
            $department = Department::find($request->department_id);
            // DEPARTMENT NAME
            $department_name = $department->department_name;

            // IF DELETED
            if($department->delete() == true){
                return redirect()->route("departments")->with("department_deleted", "You deleted department ".$department_name);
            }
        }else{
            return redirect()->route("login");
        }
    }

    // EDIT
    public function edit(Request $request){
        if($request->session()->has("user") == true){
            return view("components.departments.edit", ["department"=>Department::find($request->department_id)]);
        }else{
            return redirect()->route("login");
        }
        
    }
}
