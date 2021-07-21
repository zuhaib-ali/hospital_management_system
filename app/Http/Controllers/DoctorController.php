<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Doctor;
use App\Models\Specialization;

class DoctorController extends Controller
{
    // INDEX
    public function index(Request $request){
        if($request->session()->has('user') == true ){
            return view('components.doctors.index', [
                'hospitals'=>Location::all(),
                'specializations'=>Specialization::all(),
                'doctors'=>Doctor::all(),
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    // ADD DOCTOR
    public function addDoctor(Request $request){
        if($request->session()->has('user') == true){
            // VALIDATING DOCTOR REQUIRED INFORMATION
            $request->validate([
                'first_name' => 'required|max:12',
                'last_name' => 'required|max:12',
                'e_mail' => 'required',
                'degree' => 'required',
                'hospital_id' => 'required',
                'specialist' => 'required',
                'phone' => 'required|max:12',
                'visiting_charge' => 'required|max:4',
                'avater' => 'required',
                'from' => 'required',
                'to' => 'required',
                'address' => 'required',
                'gender' => 'required',
            ]);

            // AVATAR NEW NAME
            $avater_name = time().'-'.$request->first_name.'-'.$request->last_name.'.'.$request->avater->extension();

            // CREATING DOCTOR
            $doctor_created = Doctor::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->e_mail,
                'degree' => $request->degree,
                'hospital_id' => $request->hospital_id,
                'specialist' => $request->specialist,
                'phone' => $request->phone,
                'visiting_charge' => $request->visiting_charge,
                'gender' => $request->gender,
                'from' => $request->from,
                'to' => $request->to,
                'address' => $request->address,
                'avater' => $avater_name,
                'closing_days' => $request->sunday
            ]);

            if($doctor_created == true){
                // SAVING IMAGE TO PUBLIC PATH
                $request->avater->move(public_path('doctors_avatar'), $avater_name);

                // REDIRECTING TO DOCTORS VIEW
                return redirect()->route('doctors')->with('doctor_created', "Doctor ". $request->first_name." ".$request->last_name." added to database successfully");
            }else{
                return back();
            }
        }else{
            return redirect()->route("login");
        }
    }


    public function viewDoctor(Request $request){
        return view('components.doctors.view_doctor', [
            'doctor'=>Doctor::find($request->doctor_id),
            'specializations'=>Specialization::all(),
            'locations'=>Location::all(),
        ]);
    }

    public function update(Request $request){
        $locations_id = Location::where('name', $request->hospital)->first("id");
        $specialization_id = Specialization::where('name', $request->specialization)->first('id');

        $doctor = Doctor::find($request->doctor_id);
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->email = $request->e_mail;
        $doctor->degree = $request->degree;
        $doctor->specialist = $specialization_id->id;
        $doctor->visiting_charge = $request->visiting_charge;
        $doctor->gender = $request->gender;
        $doctor->phone = $request->phone;
        $doctor->from = $request->from;
        $doctor->to = $request->to;
        $doctor->closing_days = $request->closing_days;
        $doctor->hospital_id = $locations_id->id;
        $doctor->address = $request->address;
        $updated = $doctor->update();
        if($updated == true){
            return redirect()->route('doctors')->with('updated', "Record updated for ".$request->first_name." ".$request->last_name);
        }else{
            return back();
        }
        
    }
}
