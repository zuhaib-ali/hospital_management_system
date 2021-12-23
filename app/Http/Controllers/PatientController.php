<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Location;
use App\Models\Appointment;
use App\Models\User;
use DB;

class PatientController extends Controller
{
    // INDEX
    public function index(Request $request){
        return view("admin.patients.index", [
            "users" => User::where("role", 'user')->get(),
            "patients" => Patient::all(),
            "doctors" => User::where("role", "doctor")->get(),
        ]);
    }

    // ADD
    public function add(Request $request){
        $image_name = null;
        $request->validate([
            "patient_name" => "required",
            "e_mail" => "required",
            "age" => "required",
            "sex" => "required",
            "blood_group" => "required",
            'doctor'=> 'required',
            "phone" => "required",
            "address" => "required",
        ]);

        if($request->image != null){
            $image_name = time()."-".str_replace(" ", "-", $request->patient_name)."-".$request->image;    
        }
        
        $patient_registered = Patient::create([
            "user_id" => $request->user_id,
            "name" => $request->patient_name,
            "email" => $request->e_mail,
            "address" => $request->address,
            "phone" => $request->phone,
            "sex" => $request->sex,
            "age" => $request->age,
            "blood_group" => $request->blood_group,
            "doctor_id" => $request->doctor,
            "status" => "new",
            "image" => $image_name,
        ]);

        if($patient_registered == true){
            if($request->image != null){
                $request->image->move(public_path("patients_images"), $image_name);
            }
            return redirect()->route("patients")->with("patient_registered", "Pateint ".$request->patient_name." is registered.");
        }
    }


    // ADMIT
    public function admit(Request $request){
        $patient_id = $request->post('patient_id');
        $patient_admitted = DB::table('patients')->where('id',$patient_id)->update(['status'=>'admitted']);
        if($patient_admitted == true){
            return redirect()->back()->with("patient_admitted", "Patient admitted");
        }            
    }

    // Admitted Patients
    public function admitted(Request $request){
        return view("components.patients.admitted", [
            "patients"=>Patient::where("status", "admitted")->get(),
            "doctors"=>User::where("role", "doctor")->get()
        ]);  
    }

    // DISCHARGE
    public function discharge(Request $request){
        $patient = Patient::find($request->patient_id);
        $patient->status = "discharged";
        $patient_discharged = $patient->update();
        if($patient_discharged == true){
            return redirect()->back()->with("patient_discharged", "Successfully discharged ".$patient->name);    
        }
    }

    // Discharged Patients
    public function discharged(Request $request){
        return view("admin.patients.discharged", [
            "patients"=>Patient::where("status", "discharged")->get(),
            "doctors"=>User::where("role", "doctor")->get()
        ]);  
    }

    // UPDATE
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'doctor' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
        ]);

        
        $patient = Patient::find($request->patient_id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->sex = $request->gender;
        $patient->blood_group = $request->blood_group;
        $patient->doctor_id = $request->doctor;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->age = $request->age;
        $patient_updated = $patient->update();
        if($patient_updated == true){
            return redirect()->back()->with("patient_updated", "Patient name ".$request->patient_name." details updated");
        }
    }

    // DELETE
    public function delete(Request $request){
        $patient = Patient::find($request->patient_id);
        $patient_name = $patient->name;
        if($patient->delete() == true){
            return redirect()->route("patients")->with("patient_deleted", "Patient ".$patient_name." deleted.");
        }
    }

    // SHOW
    public function show(Request $request){
        // return empty(Appointment::where("patient_id", $request->patient_id)->orWhere("patient_id", Patient::find($request->patient_id)->user_id)->first());
        return view("admin.patients.patient_information", [
            'patient' => Patient::leftJoin("users", "patients.doctor_id", "=", "users.id")
                ->leftJoin("locations", "users.hospital_id", "=", "locations.id")
                ->where("patients.id", $request->patient_id)
                ->select(
                    "patients.*",
                    "users.id as doctor_id",
                    "users.username as doctor",
                    "users.hospital_id",
                    "locations.hospital as hospital",
                    "locations.city as branch_city"
                )
                ->first(),
            "hospitals" => Location::all(),
            'doctors' => User::where("role", "doctor")->get(),
            // 'appointments' => Appointment::where("patient_id", $request->patient_id)->orWhere("patient_id", Patient::find($request->patient_id)->user_id)->get(),
        ]);
    }

    public function showPatientsToDoctor(Request $request){
        return view("admin.doctors.index", [
            "users" => User::where("role", 'user')->get(),
            "patients" => Patient::where('doctor_id', $request->session()->get('user')->id)->get(),
            "doctors" => User::where("role", "doctor")->get(),
        ]);
    }
}
