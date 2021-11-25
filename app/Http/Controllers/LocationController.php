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

    // EDIT LOCATION VIEW
    public function editLocation(Request $request){
        if($request->session()->has('user')){
            $location = Location::find($request->id);
            return view('components.edit_location', ['location'=>$location]);
        }else{
            return redirect()->route('login');
        }
    }

    // UPDATE LOCATION
    public function updateLocation(Request $request){
        $request->validate([
            "location_name" => "required",
            "e_mail" => "required|email",
            "address" => "required",
            "phone" => "required",
        ]);
        // RETRIEVING LOCATION BY ID.
        $location = Location::find($request->location_id);
        
        // ASSINGING NEW VALUE.
        $location->name = $request->location_name;
        $location->email = $request->e_mail;
        $location->address = $request->address;
        $location->phone = $request->phone;
        if($location->update()){
            return redirect()->route('locations')->with('update_message', "Location Updated Successfully!");
        }
    }
}
