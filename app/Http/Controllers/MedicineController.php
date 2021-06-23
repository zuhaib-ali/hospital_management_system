<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;

class MedicineController extends Controller
{
    // MEDICINES VIEW
    public function medicines(Request $request){
        return view('components.pharmacy.medicines', ['medicines'=>Medicine::all(), 'categories'=>Category::all()]);
    }

    public function addMedicine(Request $request){
        // VALIDATING
        $request->validate([
            'medicine_name'=>'required',
            'category'=>'required',
            'company'=>'required',
            'composition'=>'required',
            'group'=>'required',
        ]);

        // CREATING MEDICINE
        $medicine_created = Medicine::create([
            'medicine_name'=>$request->medicine_name,
            'category_id'=>$request->category,
            'company'=>$request->company,
            'composition'=>$request->composition,
            'group'=>$request->group,
        ]);

        if($medicine_created == true){
            return redirect()->route('medicines')->with('medicine_created', "Medicine named ".$request->medicine_name." created successfully!");
        }
    }

    // DELETE MEDICINE
    public function deleteMedicine(Request $request){
        if($request->session()->has('user')){
            // RETRIEVING MEDICINE
            $medicine = Medicine::find($request->medicine_id);

            // MEDICINE NAME
            $medicine_name = $medicine->medicine_name;

            // DELETING MEDICINE
            $medicine_deleted = $medicine->delete();
            if($medicine_deleted == true){
                return redirect()->route('medicines')->with('medicine_deleted', "Medicine named ".$medicine_name." deleted successfully!");
            }
        }       
    }
}
