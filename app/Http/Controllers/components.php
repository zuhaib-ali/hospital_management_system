<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

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
    
}
