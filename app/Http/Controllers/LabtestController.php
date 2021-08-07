<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Labtest;
use App\Models\Lab;
use App\Models\Location;

class LabtestController extends Controller
{


    public function labReports(){
        return view("components.lab.lab_reports", [
            "patients"      => Patient::all(),
            "doctors"       => Doctor::all(),
            "lab_tests"     => Labtest::all(),
            "labs"          => Lab::all(),
            "locations"     => Location::all(),

        ]);
    }
    
    // ADD
    public function add(Request $request){
        return $request->patient_id;
        $request->validate([
            'date'=>['required'],
            'patient'=>['required'],
            'refered_by_doctor'=>['required'],
            'report'=>['required'],
        ]);
        $labtest_created = Labtest::create([
            "date"=>$request->date,
            "patient"=>$request->patient,
            "refered_by_doctor"=>$request->refered_by_doctor,
            "report"=>$request->report,
            "template"=>$request->template,
        ]);

        if($labtest_created == true){
            return redirect()->route("lab_reports")->with("labtest_created", "Lab test created successfully for patient ". $request->patient);
        }
    }


    public function addLab(Request $request)
    {
        $labCreated = Lab::create([
            "name"=>$request->name,
            "hospital"=>$request->hospital,
            "from"=>$request->from,
            "to"=>$request->to,
        ]);

        if($labCreated == true){
            return redirect()->route("lab_reports")->with("labCreated", "Lab Created Successfully For Hospital ". $request->hospital);
        }
    }

    // DELETE
    public function delete(Request $request){
        
        if($request->session()->has("user") == true){
            if(Labtest::find($request->lab_test_id)->delete() == true){
                return redirect()->route("lab_reports")->with("lab_test_deleted", "Lab test deleted successfully from database.");
            }
        }else{
            return redirect()->route("login");
        }
        
    }

    // EIDT
    public function edit(Request $request){
        return view("components.lab.edit", [
            "lab_test"=>Labtest::find($request->lab_test_id),
            "doctors"=>Doctor::all(),
            "patients"=>Patient::all(),
        ]);
    }

    // UPDATE
    public function update(Request $request){
        if($request->session()->has("user") === true){
            $lab_test = Labtest::find($request->lab_test_id);

            $lab_test->date = $request->date;
            $lab_test->patient = $request->patient;
            $lab_test->refered_by_doctor = $request->refered_by_doctor;
            $lab_test->template = $request->template;
            $lab_test->report = $request->report;
            // IF UPDATED
            if($lab_test->update() == true){
                return redirect()->route("lab_reports")->with("lab_test_updated", $request->patient." lab test updated.");
            }
        }else{
            return redirect()->route("login");
        }
        
    }
}
