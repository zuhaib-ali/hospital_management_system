<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // APPOINTMENT VIEW
    public function appointmentView(Request $request){
        $locations = Location::all();
        if($request->session()->has('user')){
            return view('components.add_appointment', ['locations'=>$locations]);
        }else{
            return redirect()->route('login');
        }
    }
    
    // ADD APPOINTMENT
    public function addAppointment(Request $request){
        return $request->all();
        // Appointment::create([
        //     'type' => $request->appointment_type,
        //     'patient_id' => $request->user_id
        // ]);   
    }
}
