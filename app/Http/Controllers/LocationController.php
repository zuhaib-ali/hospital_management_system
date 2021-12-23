<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Location;


class LocationController extends Controller
{

    public function index(){
        return view('admin.branches.index', [
            'branches' => Location::all()
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'hospital' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);

        DB::table('locations')->insert([
            'hospital' => $request->hospital,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'email' => $request->email,
            'contact' => $request->contact
        ]);
        return back()->with('success', $request->hospital." branch created.");
    }

    public function delete(Request $request){
        Location::find($request->id)->delete();
        return back()->with('failed', "Branch deleted successfully");
    }


    // EDIT LOCATION VIEW
    public function edit(Request $request){
        $location = Location::find($request->id);
        return view('admin.branches.edit', ['location'=>$location]);
    }

    // UPDATE LOCATION
    public function update(Request $request){
        $request->validate([
            'hospital' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);
        
        // RETRIEVING LOCATION BY ID.
        $location = Location::find($request->id);
        
        // ASSINGING NEW VALUE.
        $location->hospital = $request->hospital;
        $location->city = $request->city;
        $location->zip_code = $request->zip_code;
        $location->address = $request->address;
        $location->email = $request->email;
        $location->contact = $request->contact;

        if($location->update()){
            return redirect()->route('admin.branches')->with('update_message', "Location updated successfully!");
        }
    }
}
