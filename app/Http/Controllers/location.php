<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class location extends Controller
{
    //
    public function addLocations()
    {
        # code...
        $locations = DB::table('locations')->get();
        return view('components.locations')->with([
            'locations'  =>  $locations
        ]);

    }

}

