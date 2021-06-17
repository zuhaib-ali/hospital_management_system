<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    // TRASH APPOINTMENT
    public function trash(Request $request){
        $trashed = Appointment::find($request->id);
        $patientname = $trashed->patientname;
        if($trashed->delete() == true){
            return back()->with('trashed', 'Appointment with '.$patientname.' patient name trashed!');
        }else{
            return back()->with('trashed', 'Failed to erase appointment!');
        }
    }

    // SHOW DELETED APPOINTMETNS
    public function deleted(Request $request){
        $trahed_appointments = Appointment::onlyTrashed()->get();
        if($request->session()->has('user')){
            return view('components.deleted_appointments', ["trahed_appointments"=>$trahed_appointments]);
        }else{
            return back();
        }
    }

    // RESTORE
    public function restore(Request $request){
        $trashed_appointment = Appointment::withTrashed()->find($request->id);
        $patient_name = $trashed_appointment->patientname;
        if($trashed_appointment->restore() == true){
            return redirect()->route('deleted_appointments')->with('restored', "Appointment with patient named as ".$patient_name." successfully restored ");
        }
    }
}
