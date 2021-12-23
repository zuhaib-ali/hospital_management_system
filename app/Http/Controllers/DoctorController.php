<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;
use App\Models\ClosingDay;

class DoctorController extends Controller
{
    // INDEX
    public function index(Request $request){
        return view('admin.doctors.index', [
            "doctors" => User::leftJoin("locations", "users.hospital_id", "=", "locations.id")
            ->leftJoin("specializations", "users.specialization_id", "=", "specializations.id")
            ->where("role", "doctor")
            ->select(
                "users.*",
                "specializations.name as specialization_name",
                "locations.city as branch",
            )
            ->get(),
            'hospitals'=>Location::all(),
            'specializations'=>Specialization::all(),
        ]);
    }

    // ADD DOCTOR
    public function addDoctor(Request $request){
            // VALIDATING DOCTOR REQUIRED INFORMATION
            $request->validate([
                'first_name' => 'required|max:12',
                'last_name' => 'required|max:12',
                'email' => 'required|unique:doctors',
                'degree' => 'required',
                'hospital_id' => 'required',
                'specialist' => 'required',
                'phone' => 'required|max:12',
                'visiting_charge' => 'required|max:4',
                'from' => 'required',
                'to' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'password' => "required",
                'confirm_password' => "required|same:password",
            ]);

            // AVATAR NEW NAME
            if($request->avater != null){
                $avater_name = time()."_".$request->first_name.'_'.$request->last_name.'.'.$request->avater;
            }else{
                $avater_name = null;
            }

            // CREATING DOCTOR
            $doctor = User::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "username" => $request->first_name." ".$request->last_name,
                'email' => $request->email,
                'mobile' => $request->phone,
                'gender' => $request->gender,
                'profile_img' => $avater_name,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'degree' => $request->degree,
                'specialization_id' => (int)$request->specialist,
                'hospital_id' => $request->hospital_id,
                'visiting_charge' => $request->visiting_charge,
                'from' => $request->from,
                'to' => $request->to,
                
            ]);

            if($doctor){
                ClosingDay::create([
                    "sunday" => $request->sunday,
                    "monday" => $request->monday,
                    "tuesday" => $request->tuesday,
                    "wednesday" => $request->wednesday,
                    "thursday" => $request->thursday,
                    "friday" => $request->friday,
                    "saturday" => $request->saturday,
                    "doctor_id" => $doctor->id,
                ]);
            }

            if($doctor == true){
                // SAVING IMAGE TO PUBLIC PATH
                if($request->avater != null){
                    $request->avater->move(public_path('doctors_avatar'), $avater_name);
                }
                // REDIRECTING TO DOCTORS VIEW
                return redirect()->route('admin.doctors')->with('doctor_created', "Doctor ". $request->first_name." ".$request->last_name);
            }else{
                return back();
            }
    }


    // View doctor
    public function viewDoctor(Request $request){

        return view('admin.doctors.view_doctor', [
            "doctor" => User::leftJoin("locations", "users.hospital_id", "=", "locations.id")
            ->leftJoin("specializations", "users.specialization_id", "=", "specializations.id")
            ->join("closing_days", "users.id", "=", "closing_days.doctor_id")
            ->where("users.id", $request->doctor_id)
            ->select(
                "users.*",
                "specializations.name as specialization_name",
                "specializations.id as specialization_id",
                "specializations.description as specialization_description",
                "locations.id as location_id",
                "locations.hospital as branch_name",
                "locations.city as branch_city",
                "locations.address as branch_address",
                "locations.email as branch_email",
                "locations.contact as branch_phone",
                "closing_days.sunday",
                "closing_days.monday",
                "closing_days.tuesday",
                "closing_days.wednesday",
                "closing_days.thursday",
                "closing_days.friday",
                "closing_days.saturday"
            )
            ->first(),
            'specializations'=>Specialization::all(),
            'branches'=>Location::all(),
        ]);
    }

    // Update
    public function update(Request $request){
        $udpated = false;
        
        $doctor = User::find($request->doctor_id);
        
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->username = $request->first_name." ".$request->last_name;
        $doctor->degree = $request->degree;
        $doctor->visiting_charge = $request->visiting_charge;
        $doctor->gender = $request->gender;
        $doctor->mobile = $request->mobile;
        $doctor->from = $request->from;
        $doctor->to = $request->to;
        $doctor->address = $request->address;
        $doctor->hospital_id = $request->hospital;
        $doctor->specialization_id = $request->specialization;

        if($doctor->update()){    
            $closing_days = ClosingDay::where("doctor_id", $doctor->id)->first();
            $closing_days->sunday = $request->sunday;
            $closing_days->monday = $request->monday;
            $closing_days->tuesday = $request->tuesday;
            $closing_days->wednesday = $request->wednesday;
            $closing_days->thursday = $request->thursday;
            $closing_days->friday = $request->friday;
            $closing_days->saturday = $request->saturday;
            if($closing_days->update()){
                $updated = true;
            }
        }
        if($updated){
            return redirect()->route('admin.doctors')->with('updated', $request->doctor_name." Updated");
        }else{
            return back()->with('updated', "Failed to updated doctor ".$request->doctor_name);
        }   
    }

    public function delete(Request $request){
        $doctor = User::find($request->doctor_id);
        $name = $doctor->username;
        if($doctor->delete()){
            return redirect()->route("admin.doctors")->with('deleted', "Doctor ".$name." deleted.");
        }
    }

    // Get doctor
    public function getDoctor($id){
        return User::leftJoin('specializations', 'users.specialization_id', 'specializations.id')
            ->leftJoin('locations', 'users.hospital_id', 'locations.id')
            ->select(
                'users.*',
                'specializations.name as specialization',
                'specializations.description',
                'locations.name as branch',
                'locations.email as branch_email',
                'locations.address as branch_address',
            )
            ->where('users.id', $id)
            ->first();
    }
}
