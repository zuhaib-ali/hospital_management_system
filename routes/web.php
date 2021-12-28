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
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;

use App\Models\Location;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Specialization;
use App\Models\Patient;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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


Route::group(['prefix'=>'admin', "middleware" => "adminAuth"], function () {

    Route::get('/', function(){
        return view('admin.index', [
            "appointments" => Appointment::all()->count(),
            "doctors" => User::where("role", "doctor")->get()->count(),
            "locations" => Location::all()->count(),
            "patients" => Patient::where("status", "admitted")->get()->count(),
            "specializations" => Specialization::all()->count(),
            "carts" => Cart::all()->count(),
            "users" => User::where('role', "!=", 'admin')->get()->count(),
        ]);
    })->name('admin.index');

    // '''''''''''''''''''''''   APPOINTMENTS   '''''''''''''''''''''''
    Route::get('/appointments', [AppointmentController::class, 'showAppointmentsToAdmin'])->name('admin.appointments');

    // '''''''''''''''''''''''   BRANCHES   '''''''''''''''''''''''
    Route::get('/branches', [LocationController::class, 'index'])->name('admin.branches');
    Route::get('/{id}/edit_location', [LocationController::class, 'edit'])->name('admin.edit_location');
    Route::post('/update_location', [LocationController::class, 'update'])->name('admin.update_location');
    Route::post('/branch/create', [LocationController::class, 'create'])->name("admin.create_branch");
    Route::get('/branch/delete', [LocationController::class, 'delete'])->name("admin.delete_branch");

    // '''''''''''''''''''''''   SPECIALIZATIONS   '''''''''''''''''''''''
    Route::get('/specializations', [SpecializationController::class, 'index'])->name('admin.specializations');
    Route::post('/add_specialization', [SpecializationController::class, 'create'])->name('admin.add_specialization');
    Route::post('/specialization/update', [SpecializationController::class, 'addSpecialization'])->name('admin.update-specialization');
    Route::get('/specialization/delete', [SpecializationController::class, 'delete'])->name('admin.delete-specialization');


    // '''''''''''''''''''''''   DOCTORS   '''''''''''''''''''''''
    Route::get('/doctors', [DoctorController::class, 'index'])->name('admin.doctors');
    Route::post('/doctors/add', [DoctorController::class, 'addDoctor'])->name('admin.add_doctor');
    Route::post('/doctors/update_doctor', [DoctorController::class, "update"])->name('admin.update_doctor');
    Route::get('/doctors/view', [DoctorController::class, 'viewDoctor'])->name('admin.view_doctor');
    Route::get("/doctor/delete", [DoctorController::class, "delete"])->name("admin.delete_doctor");

    // ''''''''''''''''''''''  PATIENTS   '''''''''''''''''''''''
    Route::get("/patients", [PatientController::class, "index"])->name("admin.patients");
    Route::post("/patients/add-new-patients", [PatientController::class, "add"])->name("admin.add_new_patient");
    Route::post("/patients/update-patient", [PatientController::class, "update"])->name("admin.update_patient");
    Route::get("patients/delete-patient", [PatientController::class, "delete"])->name("admin.delete_patient");
    Route::get("patients/admit-patients", [PatientController::class, "admit"])->name("admin.admit_patient");
    Route::get("patients/admitted-patients", [PatientController::class, "admitted"])->name('admin.admitted_patients');
    Route::get("patients/discharge-patient", [PatientController::class, "discharge"])->name('admin.discharge_patient');
    Route::get("patients/discharged-patients", [PatientController::class, "discharged"])->name('admin.discharged_patients');
    Route::get("patients/patient-information", [PatientController::class, "show"])->name('admin.patinet_information');
    Route::get("/show/patients", [PatientController::class, "showPatientsToDoctor"])->name('admin.show_patients_to_doctor');

    // LAB REPORTS VIEW
    route::get('lab-test/lab-reports', [LabtestController::class, "labReports"])->name("admin.lab_reports");    
    route::post('admin/lab-test/addLab', [LabtestController::class, "addLab"])->name("admin.addLab");


    // *************************************** Staff *********************************
    Route::get('/aUsers', function () {
        $staffs = DB::table('users')
            ->where('role', '!=', 'admin')
            ->get();
        $roles = DB::table('roles')->get();

        return view('admin.users.index')->with([
            'staffs' => $staffs,
            'roles' =>  $roles
        ]);
    })->name('admin.users');
    Route::post('/add-staff', [UserController::class, 'addStaff'])->name('admin.add-staff');
    Route::get("/edit-staff", [UserController::class, 'editStaff'])->name('admin.edit-staff');
    Route::post("/edit-staff/update", [UserController::class, 'updateStaff'])->name('admin.update-staff');
    Route::get("/delete-staff/{id}", [UserController::class, 'deleteStaff'])->name('admin.delete-staff');

    // // **************************** LOCATION ****************************

    // Route::post('addLocation', [components::class, 'addLocation']);
    // Route::get('delLocation/{id}', [components::class, 'delLocation']);
    // Route::get('viewLocation', [components::class, 'viewLocation']);
    // Route::get('{id}/edit_location', [LocationController::class, 'editLocation'])->name('edit_location');
    // Route::post('update_location', [LocationController::class, 'updateLocation'])->name('update_location');
    
    // // Add mail template view.
    // Route::get('addLetter', function () {
    //     $tmp = DB::table('templates')->get();
    //     return view('mail.add_letter')->with([
    //         'data'  =>  $tmp
    //     ]);
    // })->name('addLetter');

    // // *************************************** Permissions *********************************
    // Route::get("/permissions", [PermissionController::class, "index"]);
    // Route::get("/delete_prm/{id}", [PermissionController::class, "delete"]);
    // Route::get("/edit_prm/{id}", [PermissionController::class, "edit"]);
    // Route::post("/add_permission", [PermissionController::class, "store"]);
    // Route::post("/update_prm", [PermissionController::class, "update"]);


    // // *************************************** Roles *********************************
    // Route::get("/roles", [RolesController::class, "index"]);
    // Route::get("/add_role_form", [RolesController::class, "create"]);
    // Route::post("/add_role", [RolesController::class, "store"]);
    // Route::get("/edit_role/{id}", [RolesController::class, "edit"]);
    // Route::post("/update_role", [RolesController::class, "update"]);
    // Route::get("/delete_role/{id}", [RolesController::class, "delete"]);
});


// Doctors routing
Route::group(['prefix'=>'doctor', 'middleware'=>'doctorAuth'], function(){
    Route::get('/', function(){
        return view('doctors.index', [
            'patients' => Patient::where('doctor_id', session()->get('user')->id)->get()->count(),
            'appointments' => Appointment::where('doctor_id', session()->get('user')->id)->get()->count(),
        ]);
    })->name('doctor.index');

    // **************************** Appointments ****************************
    Route::get('/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments');
    Route::get('/appointment/delete', [AppointmentController::class, 'delete'])->name('doctor.delete_appointment');
    Route::get('/get-appointment-for-doctor/{id}', [AppointmentController::class, 'getAppointmentForDoctor'])->name('doctor.delete_appointment');


    // **************************** SEND MAIL ****************************
    Route::post('appointments/send-mail/{sender}/{doctor}', [SendMailController::class, 'sendMail']);
    // Route::get('appointments/send_mail/{}', [SendMailController::class, 'sendMailToUser'])->name('send_mail');
    // Route::post('/addLetterTemplate', [SendMailController::class, 'addLetterTemplate'])->name('addLetterTemplate');
    // Route::post('addTmp', [SendMailController::class, 'addTmp']);
    // Route::get('/emailLetter', function () {
    //     if (Session::has('user')) {
    //         $tmp = DB::table('templates')->where('id', '1')->first();
    //         return view('components.emailLetter')->with(['data' => $tmp]);
    //     } else {
    //         return redirect()->route('login');
    //     }
    // })->name('emailLetter');

    // **************************** Patients ****************************
    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get("/patients/patient-information", [PatientController::class, "show"])->name('doctor.patinet_information');
    Route::get("/patients/delete-patient", [PatientController::class, "delete"])->name("doctor.delete_patient");
});



// User Routing
Route::group(['prefix'=>'user', 'middleware'=>'userAuth'], function(){
    Route::get('/', function(){
        return view('users.index',[
            'doctors' => User::where('role', 'doctor')->get(),
        ]);
    })->name('user.index');

    // ***************** Appointments *******************
    Route::post('appointments/send-appointment', [AppointmentController::class, 'sendAppointment'])->name("user.send-appointment");
    Route::get('/appointment', [AppointmentController::class, 'appointmentView'])->name('user.appointment');

    // ***************** Settings *******************
    Route::get('/settings/edit', [UserController::class, 'edit'])->name('user.settings');
    Route::post('/settings/update', [UserController::class, 'update'])->name('user.update_user');

    // ***************** Doctor detail *******************
    Route::get('/get-doctor-for-appointment/{id}', [DoctorController::class, "getDoctor"]);
});


Route::get('/addPatients', function () {
    if (Session::has('user')) {
        return view('components.addPatients');
    } else {
        return redirect()->route('login');
    }
})->name('addPatients');


Route::get('/users', function () {
    if (Session::has('user')) {
        $users = DB::table('users')->where('role', 'user')->get();
        return view('components.users2')->with(['users' => $users]);
    } else {
        return redirect()->route('login');
    }
})->name('users');


Route::get('uLabs', function () {
    $carts          = DB::table('carts')->get();
    $labs           = DB::table('labs')->get();

    return view('components.lab.uLabs')->with(
        [
            'carts' =>  $carts,
            'labs'  =>  $labs
        ]
    );
});


Route::get('/pateints/data', function () {
    return json_encode(array('data' => User::where("role", "user")->get()));
})->name("patients_data");

// EDIT PROFILE GET
Route::get('/edit_profile', [UserController::class, 'editProfile'])->name('edit_profile');

// UPDATE PROFILE POST
Route::post('/update_profile', [UserController::class, 'updateProfile'])->name('update_profile');


Route::get('getPatientData/{id}', [AppointmentController::class, 'getPatientData']);

// ERASE APPOINTMENT
Route::get('appointments/trash_appointment', [AppointmentController::class, 'trash'])->name('trash_appointment');

// TRASHED APPOINTMENTS VIEW
Route::get('appointments/trashed_appointments', [AppointmentController::class, 'trashedAppointments'])->name('trashed_appointments');

// RESTORE APPOINTMENT
Route::get('appointments/trashed_appointments/restore_appointment', [AppointmentController::class, 'restore'])->name('restore_appointment');

// DELETE APPOINTMENT
Route::get('appointments/trashed_appointments/delete', [AppointmentController::class, 'delete'])->name('delete_appointment');


#Route::post('/edit_profile', [UserController::class, 'editProfile'])->name('edit_profile');


// SIGNUP
Route::get('/sign_up', function () {
    if (Session::has('user')) {
        return back();
    }
    return view('sign_up');
})->name('signup');
Route::post('/sign_up', [UserController::class, 'create_user'])->name('register');

// LOGIN
Route::get('/', function () {
    if (Session::has('user')) {
        return back();
    } else {
        return view('login');
    }
})->name('login_view');
Route::post('/login', [Login::class, 'loginUser'])->name('login');

// Logout
Route::get('/logout', function(){
    session()->forget('user');
    return redirect()->route('login_view');
})->name('logout');


// '''''''''''''''''''''''   DEPARTMENTS   '''''''''''''''''''''''
Route::get("admin/departments", [DepartmentController::class, 'index'])->name("departments");
Route::get("admin/departments/delete", [DepartmentController::class, "destroy"])->name("delete_department");
Route::get("admin/departments/edit", [DepartmentController::class, "edit"])->name("edit_department");
Route::post("admin/departments/add-new-department", [DepartmentController::class, "add"])->name("add_new_department");




// Add Patient
Route::post('addPatient', [components::class, 'addPatient']);

// Discharge Patient
Route::get('dicharge/{id}', [components::class, 'dicharge']);

//Erase Patient Record
Route::get('erase/{id}', [components::class, 'erase']);


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

// ADD LAB REPORT
route::post("add_lab_report", [LabtestController::class, "add"])->name("add_lab_report");
// DELETE LAB TEST
route::get("admin/lab-test/delete-lab-test", [LabtestController::class, "delete"])->name("delete_lab_test");
// EDIT LAB TEST VIEW
route::get("admin/lab-test/edit-lab-test", [LabtestController::class, "edit"])->name("edit_lab_test");
// UPDATE LAB TEST
route::post("admin/lab-test/update-lab-test", [LabtestController::class, "update"])->name("update_lab_report");


// SETTINGS
Route::get('settings', [components::class, 'settings']);


//Reports
Route::get('trackingSheet', [reportController::class, 'trackingSheet'])->name('trackingSheet');
Route::get('printSheet/{pid}/{lid}/{aid}', [reportController::class, 'printSheet']);
