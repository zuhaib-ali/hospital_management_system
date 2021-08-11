<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacist;
use App\Models\Location;
use App\Models\Cart;

class PharmacistController extends Controller
{
    public function pharmacists(){
        return view("components.pharmacy.pharmacists", ['pharmacists'=>Pharmacist::all(), 'locations'=>Location::all()]);
    }

    // ADD PHARMACIST
    public function addPharmacist(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'location'=>'required',
        ]);

        $pharmacist_created = Pharmacist::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'location_id' => $request->location
        ]);

        if($pharmacist_created == true){
            return redirect()->route('pharmacists')->with('pharmacist_created', $request->first_name." ".$request->last_name." pharmacist added to record.");
        }
    }

    // UPDATE VIEW
    public function updateView(Request $request){
        return view('components.pharmacy.update_pharmacist', ['pharmacist' => Pharmacist::find($request->pharmacist_id), 'locations'=>Location::all()]);
    }

    // UPDATE
    public function update(Request $request){
        $pharmacist = Pharmacist::find($request->pharmacist_id);
        $pharmacist->first_name = $request->first_name;
        $pharmacist->last_name = $request->last_name;
        $pharmacist->address = $request->address;
        $pharmacist->phone = $request->phone;
        $pharmacist->location_id = $request->location;

        // UPDATING
        $pharmacist_updated = $pharmacist->update();

        if($pharmacist_updated == true){
            return redirect()->route('pharmacists')->with('pharmacist_updated', $request->first_name." ".$request->last_name." pharmacist record updated successfully!");
        }
    }

    // DELETE
    public function delete(Request $request){
        // RETRIEVING PHARMACISTS
        $pharmacist = Pharmacist::find($request->pharmacist_id);

        // FIRST NAME
        $first_name = $pharmacist->first_name;

        // LAST NAME
        $last_name = $pharmacist->last_name;

        // DELETING
        $pharmacist_deleted = $pharmacist->delete();

        if($pharmacist_deleted == true){
            return redirect()->route('pharmacists')->with('pharmacist_deleted', $first_name." ".$last_name." pharmacist deleted successfully from record!");
        }
    }



    public function addToCart(Request $request){   
        $addToCart = Cart::create([
            'medicine_name' => $request->medicine_name,
            'category' => $request->category,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        if($addToCart == true){
            return back()->with('added', $request->medicine_name.' medicine added to cart.');
        }else{
            return back()->with('failed','Failed To Add');

        }
    }
}
