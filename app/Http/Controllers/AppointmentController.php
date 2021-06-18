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

    // TRASH APPOINTMENT
    public function trash(Request $request){
        $trash_appointment = Appointment::find($request->id)->delete();
        if($trash_appointment){
            return back()->with('appointment_trashed', "Appointment successfully trashed");
        }
    }

    // TRASHED APPOINTMENTS
    public function trashedAppointments(Request $request){
        if($request->session()->has('user')){
            $trahed_appointments = Appointment::onlyTrashed()->get();
            return view('components.deleted_appointments', ['trahed_appointments'=>$trahed_appointments]);
        }else{
            return redirect()->route('login');
        }
    }

    // RESTORE APPOINTMENT
    public function restore(Request $request){
        if($request->session()->has('user')){
            $restore_appointment = Appointment::withTrashed()->find($request->id);
            if($restore_appointment->restore() == true){
                return back()->with('appointment_restored',"Appointment restored!");
            }
        }else{
            return redirect()->route('login');
        }
    }

    // DELETE APPOINTMENT
    public function delete(Request $request){
        $force_detele_appointment = Appointment::withTrashed()->find($request->id)->forceDelete();
        if($request->session()->has('user')){
            if($force_detele_appointment == true){
                return back()->with('appintment_force_deleted', "Appointment deleted from record!");
            }
        }else{
            return redircet()->route('login');
        }
        
    }
}
