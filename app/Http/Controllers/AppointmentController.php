<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Appointment;
use App\Models\User;


use DB;


class AppointmentController extends Controller
{
    // APPOINTMENT VIEW
    public function appointmentView(Request $request){
        $locations = Location::all();
        $patient = $request->session()->get('user');

        if($request->session()->has('user')){
            return view('components.add_appointment', [
                'locations' =>$locations,
                'patient'   =>$patient
            ]);
        }else{
            return redirect()->route('login');
        }
    }
    
    // SUBMIT APPOINTMENT
    public function submitAppointment(Request $request){
        $request->validate([
            'appointment_type' => 'required',
            'location' => 'required',
            'form_note' => 'required',
        ]);

        $appointment = Appointment::create([
            'type' => $request->appointment_type,
            'patient_id' => $request->user_id,
            'patientname' => $request->patient_name,
            'location' => $request->location,
            'note' => $request->form_note,
        ]);   

        if($appointment == true){
            return back()->with('success', 'Your appointment successfully added!');
        }else{
            return back()->with('failed', 'Failed to sent appointment!');
        }

    }

    public function getPatientData($id)
     {
        $data       =   User::where('id',$id)->first();
        $appData    =   Appointment::where('patient_id',$id)->first();
        return view('components.patientData')->with([
            'patient'   =>      $data,
            'app'       =>      $appData

            ]
        );
     } 
}
