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

// index 1
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

Route::get('/locations', function () {
    if(Session::has('user')){
        return view('components.locations');    
    }else{
        return redirect()->route('login');
    }
})->name('locations');

// index 2
// Route::get('/index2', function(){
//     if(Session::has('user')){
//         return view('admin.index2');
//     }else{
//         return redirect()->route('login');
//     }
// })->name('index2');


// index 3
// Route::get('/index3', function(){
//     // if(Session::has('user')){
//     //     return view('admin.index3');
//     // }else{
//     //     return redirect()->route('login');
//     // }
//     if(Session::has('user')){
//         return view('admin.index3');
//     }
//     return 'index 3';
// })->name('index3');


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



// signup post
Route::post('/sign_up', [UserController::class, 'create_user'])->name('sign_up');

// login post
Route::post('/login', [UserController::class, 'loginUser'])->name('login');

// Add Patient
Route::post('addPatient', [components::class, 'addPatient'] );

// logout
Route::get('logout', [UserController::class, 'logoutUser']);




Route::get('settings', [components::class, 'settings']);
