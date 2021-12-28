<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Cart;
use App\Models\Doctor;
use App\Models\Specialization;
use DB;

class AppointmentController extends Controller{
    public function showAppointmentsToAdmin(){
        return view('admin.appointments.index', [
            'appointments' => Appointment::all(),
            'users' => User::all(),
        ]);    
    }

    public function show(){
        return view('components.appointments', [
            'appointments' => Appointment::all(),
            'users' => User::all(),
        ]);
    }

    // APPOINTMENT VIEW
    public function appointmentView(Request $request){
        $patient = $request->session()->get('user');
        return view('users.appointment', [
            'doctors' =>  User::where("role", "doctor")->get(),
        ]);
    }

    // Send Appointment
    public function sendAppointment(Request $request){
        $request->validate(['doctor' => 'required']);

        Appointment::create([
            'sender_id' => $request->session()->get('user')->id,
            'doctor_id'=> $request->doctor
        ]);   
        return back()->with('success', 'Appointment sent.');
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
    // public function delete(Request $request){
    //     $force_detele_appointment = Appointment::withTrashed()->find($request->id)->forceDelete();
    //     if($request->session()->has('user')){
    //         if($force_detele_appointment == true){
    //             return back()->with('appintment_force_deleted', "Appointment deleted from record!");
    //         }
    //     }else{
    //         return redircet()->route('login');
    //     }
        
    // }

    public function delete(Request $request){
        Appointment::find($request->id)->delete();
        return back()->with('error', 'Appointment deleted.');

    }

    public function getAppointmentForDoctor($id){
        return Appointment::join('users', 'appointments.sender_id', 'users.id')
            ->select(
                'users.*',
            )
            ->where('appointments.id', $id)
            ->first();
    }
}
