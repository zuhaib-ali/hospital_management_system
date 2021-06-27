<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Appointment;
use App\Models\User;
use DB;

class reportController extends Controller
{
    //
    public function trackingSheet()
    {
        $appointment        =   Appointment::all();
        return view('components.Report.tracking')->with(
            [
                'data'       =>  $appointment,                    
            ]
        );
    }

    public function printSheet($aId,$pId,$lId)
    {
        $patient        = User::where('id',$pId)->first();
        $location       = Location::where('id',$lId)->first();
        $appointment    = Appointment::where('id',$aId)->first();

        return view('components.Report.printSheet')->with(
            [
                'patient'   =>  $patient,
                'location'  =>  $location,
                'apnt'      =>  $appointment
            ]
        );
    }
}
