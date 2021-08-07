<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\Cart;

class MedicineController extends Controller
{
    // MEDICINES VIEW
    public function medicines(Request $request){
        return view('components.pharmacy.medicines', 
            [
                'medicines'     =>  Medicine::all(), 
                'categories'    =>  Category::all(),
                'carts'         =>  Cart::all()
            ]
        );
    }


    // ADD
    public function addMedicine(Request $request){
        // VALIDATING
        $request->validate([
            'medicine_name'=>'required',
            'category'=>'required',
            'purchase_price'=>'required',
            'sale_price'=>'required',
            'store_box'=>'required',
            'quantity'=>'required',
            'generic_name'=>'required',
            'company'=>'required',
            'effects'=>'required',
            'expire_date'=>'required',
        ]);

        // CREATING MEDICINE
        $medicine_created = Medicine::create([
            'medicine_name'=>$request->medicine_name,
            'category_id'=>$request->category,
            'purchase_price'=>$request->purchase_price,
            'sale_price'=>$request->sale_price,
            'store_box'=>$request->store_box,
            'quantity'=>$request->quantity,
            'generic_name'=>$request->generic_name,
            'company'=>$request->company,
            'effects'=>$request->effects,
            'expire_date'=>$request->expire_date,
        ]);

        if($medicine_created == true){
            return redirect()->route('medicines')->with('medicine_created', "Medicine ".$request->medicine_name." added.");
        }
    }

    // UPDATE
    public function update(Request $request){
        $medicine = Medicine::find($request->id);
        $medicine->medicine_name = $request->medicine_name;
        $medicine->category_id = $request->category;
        $medicine->purchase_price = $request->purchase_price;
        $medicine->sale_price = $request->sale_price;
        $medicine->store_box = $request->store_box;
        $medicine->quantity = $request->quantity;
        $medicine->generic_name = $request->generic_name;
        $medicine->company = $request->company;
        $medicine->effects = $request->effects;
        $medicine->expire_date = $request->expire_date;
        $medicine_updated = $medicine->update();
        if($medicine_updated == true){
            return redirect()->back()->with("medicine_updated", $request->medicine_name." medicine updated.");
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
