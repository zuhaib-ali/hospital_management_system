<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('user')==true && $request->session()->get('user')->role == 'admin'){
            
            // returning specializations to view.
            return view('components.specializations.index', ['specializations'=>Specialization::all()]);
        }else{
            return redirect()->route('login');
        }
        
    }

    public function addSpecialization(Request $request){
        if($request->session()->has('user') == true && $request->session()->get('user')->role == 'admin'){

            // validating
            $request->validate([
                'specialization_name' => 'required|max:255',
                'description' => 'required',
            ]);

            // creating specialization
            $created = Specialization::create([
                'name' => $request->specialization_name,
                'description' => $request->description
            ]);

            // redirectin to specialization page.
            if($created == true){
                return redirect()->route('specializations')->with('created', "Spcialization ".$request->specialization_name." added to database successfully." );
            }
        }else{
            return redirect()->route('login');
        }
    }
}
