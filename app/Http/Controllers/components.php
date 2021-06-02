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
        $patient = new Patient;
        
        $patient->firstname     =   $request->post('firstname');
        $patient->lastname      =   $request->post('lastname');
        $patient->number        =   $request->post('number');
        $patient->dob           =   $request->post('dob');
        $patient->email         =   $request->post('email');
        $patient->address       =   $request->post('address');

        $add = $patient->save();

        if($add == true)
        {
            return back()->with('success', 'Patient Added Successfully');
        }else
        {
            return back()->with('failed', 'Failed to Add');
            
        }
        
    }
    
}
