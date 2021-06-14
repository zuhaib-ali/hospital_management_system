<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Appointment;
use DB;

class AppointmentController extends Controller
{
    // APPOINTMENT VIEW
    public function appointmentView(Request $request){
        $locations = Location::all();
        $patient = $request->session()->get('user');

        if($request->session()->has('user')){
            return view('components.add_appointment', [
                'locations'=>$locations,
                'patient'   =>$patient
            ]);
        }else{
            return redirect()->route('login');
        }
    }
    
    // ADD APPOINTMENT
    public function addAppointment(Request $request){
        $request->validate([
            'type' => 'required',
            'patient_id' => 'required',
            'patientname' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        $appointment = Appointment::create([
            'type' => $request->appointment_type,
            'patient_id' => $request->user_id,
            'patientname' => $request->patient_name,
            'location' => $request->location,
            'note' => $request->form_note,
        ]);   

        if(false){
            return back()->with('success', 'APPOINTMENT SUCCESSFULLY CREATED');
        }else{
            return back()->with('failed', 'UNSUCCESSFULL TO CREATE APPOINTMENT');
        }

    } 
}
