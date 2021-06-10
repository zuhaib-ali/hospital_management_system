<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Location;
use DB;

class components extends Controller
{
    //
    public function addPatient(Request $request)
    {
        $addPatient =  Patient::create([
            'firstname'         =>  $request->firstname,
            'lastname'          =>  $request->lastname,
            'number'            =>  $request->number,
            'dob'               =>  $request->dob,
            'email'             =>  $request->email,
            'address'           =>  $request->address
        ]);

        if($addPatient == true)
        {
            return back()->with('success', 'Patient Added Successfully');
        }else
        {
            return back()->with('failed', 'Failed to Add');
            
        }
        
    }

    public function dicharge($id)
    {
        $discharge  =   DB::table('patients')->where('id', $id)->update(['status' => 'discharged']);

        if($discharge == true)
        {
            return back()->with('dicharged','Patients Has Discharged');
        }else {
            return back()->with('failed','Failed To Discharged');
        }
    }

    public function erase($id)
    {
        $erase  =   DB::table('patients')->where('id', $id)->delete();

        if($erase == true)
        {
            return back()->with('erased',"Patient's Data Has Deleted");
        }else {
            return back()->with('failed','Failed To Delete');
        }
    }

    public function addLocation(Request $request)
    {
       $addLoc  =   Location::create([
           'name'       =>  $request->name,
           'email'      =>  $request->email,
           'phone'      =>  $request->phone,
           'address'    =>  $request->address               
       ]);

       if($addLoc == true)
       {
        return back()->with('success', 'Location Added Successfully');
       }
       else{
        return back()->with('failed', 'Failed to Add'); 
       }
    }


    public function delLocation($id)
    {
        $delL  =   DB::table('locations')->where('id', $id)->delete();

        if($delL == true)
        {
            return back()->with('delLoc',"Location Has Deleted");
        }else {
            return back()->with('failed','Failed To Delete');
        }
    }

    public function viewLocation(Request $request)
    {
        $id    =   $request->post(id);
        $view  =   DB::table('locations')->where('id', $id)->get();
        return json_encode($view);
    }
    
}
