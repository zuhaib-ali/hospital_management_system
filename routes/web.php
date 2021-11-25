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
use App\Http\Controllers\LabtestController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientController;

use App\Models\Location;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Specialization;
use App\Models\Patient;
use App\Models\Cart;
use App\Models\User;


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


Route::group(["middleware" => "user_auth"], function(){
    
    Route::get("/", function(){
        return view("admin.index", [
            "patients" => Patient::where("status", "admitted")->get(),
            "locations" => Location::all(),
            "appointments" => Appointment::all(),
            "doctors" => User::where("role", "doctor")->get(),
            "specializations" => Specialization::all(),
            "carts" => Cart::all(),
        ]);
    })->name("index");

    // '''''''''''''''''''''''   SPECIALIZATIONS   '''''''''''''''''''''''
    Route::get('specializations', [SpecializationController::class, 'index'])->name('specializations');
    Route::post('add_specialization', [SpecializationController::class, 'addSpecialization'])->name('add_specialization');
    Route::post('specialization/update', [SpecializationController::class, 'addSpecialization'])->name('update-specialization');
    Route::get('specialization/delete', [SpecializationController::class, 'delete'])->name('delete-specialization');

    // '''''''''''''''''''''''   DOCTORS   '''''''''''''''''''''''
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
    Route::post('/doctors/add', [DoctorController::class, 'addDoctor'])->name('add_doctor');
    Route::post('/doctors/update_doctor', [DoctorController::class, "update"])->name('update_doctor');
    Route::get('/doctors/view', [DoctorController::class, 'viewDoctor'])->name('view_doctor');
    Route::get("doctors/delete", [DoctorController::class, "delete"])->name("delete_doctor");



    // ''''''''''''''''''''''  PATIENTS   '''''''''''''''''''''''
    Route::post("admin/patients/add-new-patients", [PatientController::class, "add"])->name("add_new_patient");
    Route::post("admin/patients/update-patient", [PatientController::class, "update"])->name("update_patient");
    Route::get("patients", [PatientController::class, "index"])->name("patients");
    Route::get("patients/delete-patient", [PatientController::class, "delete"])->name("delete_patient");
    Route::get("patients/admit-patients", [PatientController::class, "admit"])->name("admit_patient");
    Route::get("patients/admitted-patients", [PatientController::class, "admitted"])->name('admitted_patients');
    Route::get("patients/discharge-patient", [PatientController::class, "discharge"])->name('discharge_patient');
    Route::get("patients/discharged-patients", [PatientController::class, "discharged"])->name('discharged_patients');
    Route::get("patients/patinet-information", [PatientController::class, "show"])->name('patinet_information');



    // *************************************** Staff *********************************
    Route::get('/aUsers', function(){
        $staffs = DB::table('users')
            ->where('role', '!=', 'admin')
            ->where("role", "!=", "user")
            ->where("role", "!=", "doctor")
            ->get();

        return view('components.users')->with([
            'staffs'=>$staffs
        ]);
    })->name('aUsers');

    Route::post('/add-staff', [UserController::class, 'addStaff'] )->name('add-staff');
    Route::get("/edit-staff", [UserController::class, 'editStaff'])->name('edit-staff');
    Route::post("/edit-staff/update", [UserController::class, 'updateStaff'])->name('update-staff');
    Route::get("/delete-staff", [UserController::class, 'deleteStaff'])->name('delete-staff');
    



    // **************************** LOCATION ****************************
    // Admin Locations
    Route::get('/locations', function(){
        $locations = DB::table('locations')->get();
        return view('components.locations')->with(['locations'=>$locations]);
    })->name('locations');
    
    Route::post('addLocation', [components::class, 'addLocation'] );
    Route::get('delLocation/{id}', [components::class, 'delLocation'] );
    Route::get('viewLocation', [components::class, 'viewLocation'] );
    Route::get('{id}/edit_location', [LocationController::class, 'editLocation'])->name('edit_location');
    Route::post('update_location', [LocationController::class, 'updateLocation'])->name('update_location');

    //User Locations
    Route::get('/uLocations', function(){
        $locations = DB::table('locations')->get();
        $carts          = DB::table('carts')->get();
        return view('components.uLocations')->with(
            [
                'locations' =>  $locations,
                'carts'     =>  $carts
            ]
        );
    })->name('uLocations');
});

// INDEX VIEW
// Route::get('/', function () {
//     if(Session::has('user')){
//         $patients       = DB::table('patients')->where('status','admitted')->get();
//         $locations      = DB::table('locations')->get();
//         $appointments   = DB::table('appointments')->get();
//         $carts          = DB::table('carts')->get();
//         return view('admin.index')->with([
//             'patients'      =>  $patients,
//             'locations'     =>  $locations,
//             'appointments'  =>  $appointments,
//             'carts'         =>  $carts
//         ]);    
//     }else{
//         return redirect()->route('login');
//     }
// })->name('index');


Route::get('/addPatients', function () {
    if(Session::has('user')){
        return view('components.addPatients');    
    }else{
        return redirect()->route('login');
    }
})->name('addPatients');

// login view
Route::get('/login', function(){
    if(Session::has('user')){
        return back();
    }else{
        return view('login');
    }
})->name('login');

// Signup view
Route::get('/sign_up', function(){
    if(Session::has('user')){
        return back();
    }
    return view('sign_up');
})->name('signUp');









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

Route::get('addLetter', function(){
    $tmp = DB::table('templates')->get();
    return view('components.mail.Add_letter')->with([
        'data'  =>  $tmp
    ]);
})->name('addLetter');


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



// ALL PATIENTS
// Route::get('/all_patients', function(){
//     $patients = DB::table('patients')->get();
//     return view('components.allPatients', ['patients'=>$patients]);
// })->name('all_patients');


Route::get('uLabs', function(){
    $carts          = DB::table('carts')->get();
    $labs           = DB::table('labs')->get();

    return view('components.lab.uLabs')->with(
        [
            'carts' =>  $carts,
            'labs'  =>  $labs
        ]
    );
});


Route::get('/pateints/data', function(){
    return json_encode(array('data'=>User::where("role", "user")->get()));
})->name("patients_data");





// EDIT PROFILE GET
Route::get('/edit_profile', [UserController::class, 'editProfile'])->name('edit_profile'); 

// UPDATE PROFILE POST
Route::post('/update_profile', [UserController::class, 'updateProfile'])->name('update_profile');

 

// APPOITMENT FIX VIEW
Route::get('/fix_appointment', [AppointmentController::class, 'appointmentView'])->name('fix_appointment'); 

//Dr Appointment
Route::post('/drAppointment', [AppointmentController::class, 'drAppointment'])->name('drAppointment'); 


// SUBMIT APPOINTMENT
Route::post('/submit_appointment', [AppointmentController::class, 'submitAppointment'])->name('submit_appointment');

Route::post('appointments/appointment_by_doctor',[AppointmentController::class, 'drAppointment'])->name("appointment_by_doctor");

Route::get('getPatientData/{id}',[AppointmentController::class,'getPatientData']);



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


// '''''''''''''''''''''''   DEPARTMENTS   '''''''''''''''''''''''
Route::get("admin/departments", [DepartmentController::class, 'index'])->name("departments");
Route::get("admin/departments/delete", [DepartmentController::class, "destroy"])->name("delete_department");
Route::get("admin/departments/edit", [DepartmentController::class, "edit"])->name("edit_department");
Route::post("admin/departments/add-new-department", [DepartmentController::class, "add"])->name("add_new_department");




// Add Patient
Route::post('addPatient', [components::class, 'addPatient'] );

// Discharge Patient
Route::get('dicharge/{id}', [components::class, 'dicharge'] );

//Erase Patient Record
Route::get('erase/{id}', [components::class, 'erase'] );


// **************************** SEND MAIL ****************************
// SEND MAIL
Route::get('appointments/send_mail', [SendMailController::class, 'sendMailToUser'])->name('send_mail');

Route::post('/addLetterTemplate', [SendMailController::class, 'addLetterTemplate'])->name('addLetterTemplate');

Route::post('addTmp', [SendMailController::class, 'addTmp']);

// **************************** PHARMACY ****************************
// CATEGORIES
Route::get('pharmacists/categories', [CategoryController::class, 'categories'])->name('categories');
// ADD CATEGORY
route::post('pharmacy/new/add_category', [CategoryController::class, 'addCategory'])->name('add_category');
// DELETE CATEGORY
route::get('pharmacy/delete_category', [CategoryController::class, 'deleteCategory'])->name('delete_category');


// ***************************** MEDICINES *****************************************
// MEDICINES
route::get('pharmacy/medicines', [MedicineController::class, 'medicines'])->name('medicines');

// ADD NEW MEDICINE
route::post('pharmacy/add-new-medicine', [MedicineController::class, 'addMedicine'])->name('add_new_medicine');
route::post('pharmacy/update-medicine', [MedicineController::class, 'update'])->name('update_medicine');

// DELETE MEDICINE
route::get('pharmacy/delete-medicine', [MedicineController::class, 'deleteMedicine'])->name('delete_medicine');

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


// --------------------- LAB TESTS -------------------------
// LAB REPORTS VIEW
route::get('admin/lab-test/lab-reports', [LabtestController::class, "labReports"])->name("lab_reports");

//Add Lab
route::post('admin/lab-test/addLab', [LabtestController::class, "addLab"])->name("addLab");

// ADD LAB REPORT
route::post("add_lab_report", [LabtestController::class, "add"])->name("add_lab_report");
// DELETE LAB TEST
route::get("admin/lab-test/delete-lab-test", [LabtestController::class, "delete"])->name("delete_lab_test");
// EDIT LAB TEST VIEW
route::get("admin/lab-test/edit-lab-test", [LabtestController::class, "edit"])->name("edit_lab_test");
// UPDATE LAB TEST
route::post("admin/lab-test/update-lab-test", [LabtestController::class, "update"])->name("update_lab_report");

// logout
Route::get('logout', [UserController::class, 'logoutUser'])->name('logout');

// SETTINGS
Route::get('settings', [components::class, 'settings']);


//Reports
Route::get('trackingSheet',[reportController::class,'trackingSheet'])->name('trackingSheet');
Route::get('printSheet/{pid}/{lid}/{aid}',[reportController::class,'printSheet']);