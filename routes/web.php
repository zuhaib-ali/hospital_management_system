<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\components;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// INDEX 2 FOR ADMIN 
Route::get('/', function () {
    if(Session::has('user')){
        $patients = DB::table('patients')->get();
        return view('admin.index')->with([
            'patients'  =>  $patients
        ]);    
    }else{
        return redirect()->route('login');
    }
})->name('index');

Route::get('/appointments', function () {
    if(Session::has('user')){
        return view('components.appointments');    
    }else{
        return redirect()->route('login');
    }
})->name('appointments');

Route::get('/addPatients', function () {
    if(Session::has('user')){
        return view('components.addPatients');    
    }else{
        return redirect()->route('login');
    }
})->name('addPatients');

Route::get('/patients', function () {
    if(Session::has('user')){
        $patients = DB::table('patients')->where('status','admitted')->get();
        return view('components.patients')->with([
            'patients'  =>  $patients,
        ]);    
    }else{
        return redirect()->route('login');
    }
})->name('patients');

Route::get('/dpatients', function () {
    if(Session::has('user')){
        $patients = DB::table('patients')->where('status','discharged')->get();
        return view('components.dPatients')->with([
            'patients'  =>  $patients,
        ]);    
    }else{
        return redirect()->route('login');
    }
})->name('dpatients');

// INDEX 2 FOR DOCTOR 
Route::get('/index2', function(){
    if(Session::has('user')){
        return view('doctor.index');
    }else{
        return redirect()->route('login');
    }
})->name('index2');


// INDEX 3 FOR PATIENT 
Route::get('/index3', function(){
    if(Session::has('user')){
        return view('patient.index');
    }else{
        return redirect()->route('login');
    }
})->name('index3');


// login view
Route::get('/login', function(){
    if(Session::has('user')){
        return back();
    }else{
        return view('login');
    }
})->name('login');

// signup view
Route::get('/sign_up', function(){
    if(Session::has('user')){
        return back();
    }else{
        return view('sign_up');
    }
})->name('signUp');

Route::get('/doctors', function(){
    if(Session::has('user')){
        return view('components.doctors');
    }else{
        return redirect()->route('login');
    }
})->name('doctors');

Route::get('/edit_profile', function(){
    if(Session::has('user')){
        return view('components.edit_profile');
    }else{
        return redirect()->route('login');
    }
})->name('edit_profile');

Route::get('/locations', function(){
    if(Session::has('user')){
        $locations = DB::table('locations')->get();
        return view('components.locations')->with(['locations'=>$locations]);
    }else{
        return redirect()->route('login');
    }
})->name('locations');





Route::post('/edit_profile', [UserController::class, 'editProfile'])->name('edit_profile');


// signup post
Route::post('/sign_up', [UserController::class, 'create_user'])->name('sign_up');

// login post
Route::post('/login', [UserController::class, 'loginUser'])->name('login');

// Add Patient
Route::post('addPatient', [components::class, 'addPatient'] );

// Discharge Patient
Route::get('dicharge/{id}', [components::class, 'dicharge'] );

//Erase Patient Record
Route::get('erase/{id}', [components::class, 'erase'] );

// Add Location
Route::post('addLocation', [components::class, 'addLocation'] );

// Delete Location
Route::get('delLocation/{id}', [components::class, 'delLocation'] );





// logout
Route::get('logout', [UserController::class, 'logoutUser']);




Route::get('settings', [components::class, 'settings']);
