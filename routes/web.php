<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Login;
use App\Http\Controllers\components;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SendMailController;

use App\Models\Location;
use App\Models\Appointment;


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

// INDEX VIEW
Route::get('/', function () {
    if(Session::has('user')){
        $patients       = DB::table('patients')->where('status','admitted')->get();
        $locations      = DB::table('locations')->get();
        $appointments   = DB::table('appointments')->get();
        return view('admin.index')->with([
            'patients'  =>  $patients,
            'locations'  =>  $locations,
            'appointments'  =>  $appointments
        ]);    
    }else{
        return redirect()->route('login');
    }
})->name('index');


Route::get('/addPatients', function () {
    if(Session::has('user')){
        return view('components.addPatients');    
    }else{
        return redirect()->route('login');
    }
})->name('addPatients');

Route::get('/admitted_patients', function () {
    if(Session::has('user')){
        $patients = DB::table('patients')->where('status','admitted')->get();
        return view('components.patients')->with([
            'patients'  =>  $patients,
        ]);    
    }else{
        return redirect()->route('login');
    }
})->name('admitted_patients');

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

// EDIT PROFILE GET
Route::get('/edit_profile', [UserController::class, 'editProfile'])->name('edit_profile');

// UPDATE PROFILE POST
Route::post('/update_profile', [UserController::class, 'updateProfile'])->name('update_profile');

//Admin Locations
Route::get('/locations', function(){
    if(Session::has('user')){
        $locations = DB::table('locations')->get();
        return view('components.locations')->with(['locations'=>$locations]);
    }else{
        return redirect()->route('login');
    }
})->name('locations');

//User Locations
Route::get('/uLocations', function(){
    if(Session::has('user')){
        $locations = DB::table('locations')->get();
        return view('components.uLocations')->with(['locations'=>$locations]);
    }else{
        return redirect()->route('login');
    }
})->name('uLocations');


Route::get('/aUsers', function(){
    if(Session::has('user')){
        $users = DB::table('users')->where('role','admin')->get();
        return view('components.users')->with(['users'=>$users]);
    }else{
        return redirect()->route('login');
    }
})->name('aUsers');


Route::get('/users', function(){
    if(Session::has('user')){
        $users = DB::table('users')->where('role','user')->get();
        return view('components.users2')->with(['users'=>$users]);
    }else{
        return redirect()->route('login');
    }
})->name('users');

Route::get('/emailLetter', function(){
    if(Session::has('user')){
        $tmp = DB::table('templates')->where('id','1')->first();
        return view('components.emailLetter')->with(['data'=>$tmp]);
    }else{
        return redirect()->route('login');
    }
})->name('emailLetter');


// APPOITMENT FIX VIEW
Route::get('/fix_appointment', [AppointmentController::class, 'appointmentView'])->name('fix_appointment');

// SUBMIT APPOINTMENT
Route::post('/submit_appointment', [AppointmentController::class, 'submitAppointment'])->name('submit_appointment');

Route::get('getPatientData/{id}',[AppointmentController::class,'getPatientData']);


// APPOITMENTS VIEW
Route::get('/appointments', function(){
    if(Session::has('user')){
        $appointments = Appointment::all();
        return view('components.appointments')->with([
            'appointments'  =>  $appointments
        ]);    
    }else{
        return redirect()->route('login');
    }
})->name('appointments');

// ERASE APPOINTMENT
Route::get('appointments/trash_appointment', [AppointmentController::class, 'trash'])->name('trash_appointment');

// TRASHED APPOINTMENTS VIEW
Route::get('appointments/trashed_appointments', [AppointmentController::class, 'trashedAppointments'])->name('trashed_appointments');

// RESTORE APPOINTMENT
Route::get('appointments/trashed_appointments/restore_appointment', [AppointmentController::class, 'restore'])->name('restore_appointment');

// DELETE APPOINTMENT
Route::get('appointments/trashed_appointments/delete', [AppointmentController::class, 'delete'])->name('delete_appointment');


#Route::post('/edit_profile', [UserController::class, 'editProfile'])->name('edit_profile');


// signup post
Route::post('/sign_up', [UserController::class, 'create_user'])->name('sign_up');

// login post
Route::post('/login', [Login::class, 'loginUser'])->name('login');

// Add Patient
Route::post('addPatient', [components::class, 'addPatient'] );

// ALL PATIENTS
Route::get('/all_patients', function(){
    $patients = DB::table('patients')->get();
    return view('components.allPatients', ['patients'=>$patients]);
})->name('all_patients');

// Discharge Patient
Route::get('dicharge/{id}', [components::class, 'dicharge'] );

//Erase Patient Record
Route::get('erase/{id}', [components::class, 'erase'] );

// Add Location
Route::post('addLocation', [components::class, 'addLocation'] );

// Delete Location
Route::get('delLocation/{id}', [components::class, 'delLocation'] );

//View Location
Route::get('viewLocation', [components::class, 'viewLocation'] );


// EDIT LOCATION
Route::get('{id}/edit_location', [LocationController::class, 'editLocation'])->name('edit_location');

Route::post('update_location', [LocationController::class, 'updateLocation'])->name('update_location');

// SEND MAIL
Route::get('appointments/send_mail', [SendMailController::class, 'sendMailToUser'])->name('send_mail');

Route::post('addTmp', [SendMailController::class, 'addTmp']);


// Add User As Admin
Route::post('addAdmin', [adminController::class, 'addAdmin'] );


// logout
Route::get('logout', [UserController::class, 'logoutUser'])->name('logout');

// SETTINGS
Route::get('settings', [components::class, 'settings']);
