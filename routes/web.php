<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Login;
use App\Http\Controllers\components;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecializationController;

use App\Models\Location;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Specialization;


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
        $carts          = DB::table('carts')->get();
        return view('admin.index')->with([
            'patients'      =>  $patients,
            'locations'     =>  $locations,
            'appointments'  =>  $appointments,
            'carts'         =>  $carts
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

// Route::get('/doctors', function(){
//     if(Session::has('user')){
//         return view('components.doctors');
//     }else{
//         return redirect()->route('login');
//     }
// })->name('doctors');

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
        $carts          = DB::table('carts')->get();
        return view('components.uLocations')->with(
            [
                'locations' =>  $locations,
                'carts'     =>  $carts
            ]
        );
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

//Dr Appointment
Route::post('/drAppointment', [AppointmentController::class, 'drAppointment'])->name('drAppointment'); 


// SUBMIT APPOINTMENT
Route::post('/submit_appointment', [AppointmentController::class, 'submitAppointment'])->name('submit_appointment');

Route::post('appointments/appointment_by_doctor',[AppointmentController::class, 'drAppointment'])->name("appointment_by_doctor");

Route::get('getPatientData/{id}',[AppointmentController::class,'getPatientData']);


// APPOITMENTS VIEW
Route::get('/appointments', function(){
    if(Session::has('user')){
        $carts          = DB::table('carts')->get();
        $appointments = Appointment::all();
        return view('components.appointments')->with([
            'appointments'  =>  $appointments,
            'locations'     =>  Location::all(),
            'carts'         =>  $carts
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

// '''''''''''''''''''''''   DOCTORS   '''''''''''''''''''''''
Route::get('admin/doctors', [DoctorController::class, 'index'])->name('doctors');

// ADD DOCTOR
Route::post('admin/doctors/add', [DoctorController::class, 'addDoctor'])->name('add_doctor');
// EDIT DOCTOR POST
Route::post('doctors/update_doctor', [DoctorController::class, "update"])->name('update_doctor');

// EDIT DOCTOR GET
Route::get('admin/doctors/edit_doctor', function(){
    return view('components.doctors.edit_doctor', [
        'doctor'=>Doctor::find(Request::get('doctor_id')),
        'hospitals'=>Location::all(),
        'specializations'=>Specialization::all(),
    ]);
})->name('edit_doctor');

// DELETING DOCTOR
Route::get('admin/doctors/delete_doctor', function(){
    // RETRIEVING DOCTOR.
    $doctor =  Doctor::find(Request::get('doctor_id'));

    // DOCTOR NANE.
    $name = $doctor->first_name." ".$doctor->last_name;

    // DELETEING DOCTOR.
    $deleted = $doctor->delete();
    if($deleted == true){
        return redirect()->route("doctors")->with('deleted', $name." Deleted From Doctors Record.");
    }
})->name('delete_doctor');



// VIEW DOCTOR
Route::get('admin/doctors/view', [DoctorController::class, 'viewDoctor'])->name('view_doctor');




// '''''''''''''''''''''''   SPECIALIZATIONS   '''''''''''''''''''''''
Route::get('admin/specializations', [SpecializationController::class, 'index'])->name('specializations');
Route::post('admin/add_specialization', [SpecializationController::class, 'addSpecialization'])->name('add_specialization');



// ''''''''''''''''''''''  PATIENTS   '''''''''''''''''''''''
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

// **************************** LOCATION ****************************

// Add Location
Route::post('addLocation', [components::class, 'addLocation'] );

// Delete Location
Route::get('delLocation/{id}', [components::class, 'delLocation'] );

//View Location
Route::get('viewLocation', [components::class, 'viewLocation'] );


// EDIT LOCATION
Route::get('{id}/edit_location', [LocationController::class, 'editLocation'])->name('edit_location');

Route::post('update_location', [LocationController::class, 'updateLocation'])->name('update_location');

// **************************** SEND MAIL ****************************
// SEND MAIL
Route::get('appointments/send_mail', [SendMailController::class, 'sendMailToUser'])->name('send_mail');

Route::post('addTmp', [SendMailController::class, 'addTmp']);

// **************************** PHARMACY ****************************
// CATEGORIES
Route::get('pharmacists/categories', [CategoryController::class, 'categories'])->name('categories');
// ADD CATEGORY
route::post('pharmacy/new/add_category', [CategoryController::class, 'addCategory'])->name('add_category');
// DELETE CATEGORY
route::get('pharmacy/delete_category', [CategoryController::class, 'deleteCategory'])->name('delete_category');

// MEDICINES
route::get('pharmacy/medicines', [MedicineController::class, 'medicines'])->name('medicines');
// ADD NEW MEDICINE
route::post('pharmacy/add_new_medicine', [MedicineController::class, 'addMedicine'])->name('add_new_medicine');

// DELETE MEDICINE
route::get('pharmacy/delete_medicine', [MedicineController::class, 'deleteMedicine'])->name('delete_medicine');

// PHARAMCISTS
route::get('pharmacy/pharmacists', [PharmacistController::class, 'pharmacists'])->name('pharmacists');

// ADD PHARMCIST
route::post('pharmacy/pharmacists/add_pharmacist', [PharmacistController::class, 'addPharmacist'])->name('add_pharmacist');

// UPDATE PHARMACIST
route::get('pharmacy/pharmacists/update_view', [PharmacistController::class, 'updateView'])->name('update_view');
route::post('pharmacy/pharmacists/update', [PharmacistController::class, 'update'])->name('update_pharmacist');

route::post('addToCart', [PharmacistController::class, 'addToCart'])->name('addToCart');


// DELETE PHARMACIST
route::get('pharmacy/pharmacists/delete', [PharmacistController::class, 'delete'])->name('delete_pharmacist');





// Add User As Admin
Route::post('addAdmin', [adminController::class, 'addAdmin'] );


// logout
Route::get('logout', [UserController::class, 'logoutUser'])->name('logout');

// SETTINGS
Route::get('settings', [components::class, 'settings']);


//Reports
Route::get('trackingSheet',[reportController::class,'trackingSheet'])->name('trackingSheet');
Route::get('printSheet/{pid}/{lid}/{aid}',[reportController::class,'printSheet']);

