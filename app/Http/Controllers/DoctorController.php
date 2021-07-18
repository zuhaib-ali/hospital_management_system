<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // INDEX
    public function index(Request $request){
        return view('components.doctors.index', ['hospitals'=>Location::all()]);
    }

    // ADD DOCTOR
    public function addDoctor(Request $request){

        return $request->all();

        // // IMAGE NEW NAME
        $image_new_name =  time().'-'.$request->first_name.'-'.$request->last_name.'.'.$request->doctor_image->extension();

        // // ADDING NEW DOCTOR RECORD
        // $doctor_added = Doctor::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->e_mail,
        //     'phone' => $request->phone,
        //     'specialization' => $specialization->last_name,
        //     'hospital_id' => $request->hospital_id,
        //     'from' => $request->$request->from,
        //     'to' => $request->$request->to,
        //     'doctor_image' => $request->$image_new_name,
        //     'address' => $request->address
        // ]);

        // // IF DOCTOR ADDED, RETURN BACK TO DOCTOR VIEW.
        // if(doctor_added === true){
        //     $request->doctor_image->move(public_path('doctors_profile'), $image_new_name);
        //     return redirect()->route('doctors');
        // }
    }
}
