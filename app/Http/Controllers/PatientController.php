<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Location;
use App\Models\Appointment;
use App\Models\User;

class PatientController extends Controller
{
    // INDEX
    public function index(Request $request){
        if($request->session()->has("user") == true){
            return view("components.patients.patients", [
                "users" => User::where("role", 'user')->get(),
                "patients" => Patient::all(),
                "doctors" => Doctor::all()
            ]);
        }else{
            return redirect()->route("login");
        }
    }

    // ADD
    public function add(Request $request){
        $request->validate([
            "patient_name" => "required",
            "e_mail" => "required",
            "address" => "required",
            "phone" => "required",
            "sex" => "required",
            "age" => "required",
            "date_of_birth" => "required",
            "blood_group" => "required",
            "image" => "required",
        ]);

        $image_name = time()."-".str_replace(" ", "-", $request->patient_name)."-".$request->image->extension();

        if($request->session()->has("user") == true){
            $patient_registered = Patient::create([
                "user_id" => $request->user_id,
                "name" => $request->patient_name,
                "email" => $request->e_mail,
                "address" => $request->address,
                "phone" => $request->phone,
                "sex" => $request->sex,
                "age" => $request->age,
                "date_of_birth" => $request->date_of_birth,
                "blood_group" => $request->blood_group,
                "doctor_id" => $request->doctor,
                "status" => "new",
                "image" => $image_name,
            ]);

            if($patient_registered == true){
                $request->image->move(public_path("patients_images"), $image_name);
                return redirect()->route("patients")->with("patient_registered", "Pateint ".$request->patient_name." is registered.");
            }
        }else{
            return redirect()->route("login");
        }
    }


    // ADMIT
    public function admit(Request $request){
        if($request->session()->has("user") == true){
            $patient = Patient::find($request->patient_id);
            $patient->status = "admitted";
            $patient_admitted = $patient->update();
            if($patient_admitted == true){
                return redirect()->back()->with("patient_admitted", $patient->name." admitted");
            }            
        }else{
            return redirect()->route("login");
        }
    }

    // ADMITTED
    public function admitted(Request $request){
        if($request->session()->has("user") == true){
            return view("components.patients.admitted", [
                "patients"=>Patient::where("status", "admitted")->get(),
                "doctors"=>Doctor::all()
            ]);  
        }else{
            return redirect()->route("login");
        }
    }

    // DISCHARGE
    public function discharge(Request $request){
        if($request->session()->has("user") == true){
            $patient = Patient::find($request->patient_id);
            $patient->status = "discharged";
            $patient_discharged = $patient->update();
            if($patient_discharged == true){
                return redirect()->back()->with("patient_discharged", "Successfully discharged ".$patient->name);    
            }
        }else{
            return redirect()->route("login");
        }
    }

    // DISCHARGED
    public function discharged(Request $request){
        if($request->session()->has("user") == true){
            return view("components.patients.discharged", [
                "patients"=>Patient::where("status", "discharged")->get(),
                "doctors"=>Doctor::all()
            ]);  
        }else{
            return redirect()->route("login");
        }
    }

    // UPDATE
    public function update(Request $request){
        if($request->session()->has("user") == true){
            $patient = Patient::find($request->patient_id);
            $patient->name = $request->patient_name;
            $patient->email = $request->e_mail;
            $patient->sex = $request->sex;
            $patient->blood_group = $request->blood_group;
            $patient->date_of_birth = $request->date_of_birth;
            $patient->doctor_id = $request->doctor;
            $patient->phone = $request->phone;
            $patient->address = $request->address;
            $patient_updated = $patient->update();
            if($patient_updated == true){
                return redirect()->back()->with("patient_updated", "Patient name ".$request->patient_name." details updated");
            }
        }else{
            return redirect()->route("login");
        }
    }

    // DELETE
    public function delete(Request $request){
        if($request->session()->has("user") == true){
            $patient = Patient::find($request->patient_id);
            $patient_name = $patient->name;
            if($patient->delete() == true){
                return redirect()->route("patients")->with("patient_deleted", "Patient ".$patient_name." deleted.");
            }
        }else{
            return redirect()->route("login");
        }
    }

    // SHOW
    public function show(Request $request){
        // return empty(Appointment::where("patient_id", $request->patient_id)->orWhere("patient_id", Patient::find($request->patient_id)->user_id)->first());
        if($request->session()->has("user") == true){
            return view("components.patients.patient_information", [
                'patient' => Patient::find($request->patient_id),
                'doctors' => Doctor::find(Appointment::where("patient_id", $request->patient_id)->orWhere("patient_id", Patient::find($request->patient_id)->user_id)->first("doctor_id")),
                'appointments' => Appointment::where("patient_id", $request->patient_id)->orWhere("patient_id", Patient::find($request->patient_id)->user_id)->get(),
                'locations' => Location::all(),
            ]);
        }else{
            return redirect()->route("login");
        }
    }
}
