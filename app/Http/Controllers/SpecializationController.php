<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function index(Request $request){
        // returning specializations to view.
        return view('admin.specializations.index', ['specializations'=>Specialization::all()]);
    }

    public function create(Request $request){
        // validating
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // creating specialization
        $created = Specialization::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('admin.specializations')->with('created', "Spcialization ".$request->name." created" );
    }

    public function delete(Request $request){
        Specialization::find($request->id)->delete();
        return back()->with("failed", "Specialization deleted");
    }
}
