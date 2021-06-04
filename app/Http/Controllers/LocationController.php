<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    // ADDING LOCATION
    public function addLocation(Request $request){
        $request->validate([
            'city'=>['required'],
        ]);
        
        // INSERTING LOCATION TO DATABASE
        $location = Location::create([
            'city' => $request->city
        ]);
        
        // IF LOCATION INSERTED RETURN BACK
        if($location == true){
            return back();
        }
    }
}
