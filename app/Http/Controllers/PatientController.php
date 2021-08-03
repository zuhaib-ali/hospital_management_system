<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;

class PatientController extends Controller
{
    // INDEX
    public function index(Request $request){
        if($request->session()->has("user") == true){
            return view("components.patients.patients", [
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
            "date_of_birth" => "required",
            "blood_group" => "required",
            "image" => "required",
        ]);

        $image_name = time()."-".str_replace(" ", "-", $request->patient_name)."-".$request->image->extension();

        if($request->session()->has("user") == true){
            $patient_registered = Patient::create([
                "name" => $request->patient_name,
                "email" => $request->e_mail,
                "address" => $request->address,
                "phone" => $request->phone,
                "sex" => $request->sex,
                "date_of_birth" => $request->date_of_birth,
                "blood_group" => $request->blood_group,
                "doctor_id" => $request->doctor,
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

    // EDIT
    public function edit(Request $request){
        if($request->session()->has("user") == true){
            return "edit";
        }else{
            return redirect()->route("login");
        }
    }

    // UPDATE
    public function update(Request $request){
        if($request->session()->has("user") == true){
            return "update";
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
}
