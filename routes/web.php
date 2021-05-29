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
Route::get('index', function () {
    if(Session::has('user')){
        return view('admin.index');    
    }else{
        return redirect()->route('login');
    }
<<<<<<< HEAD
});
=======
})->name('index');

Route::get('/departments', function () {
    if(Session::has('user')){
        return view('admin.departments');    
    }else{
        return redirect()->route('login');
    }
})->name('departments');

Route::get('/doctors', function () {
    if(Session::has('user')){
        return view('admin.doctors');    
    }else{
        return redirect()->route('login');
    }
})->name('doctors');

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
>>>>>>> 18418afa982e8ce8f4e74f639878c87e982a42fe


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

Route::get('departments', function()
{
    return view('components.departments');
});

// signup post
Route::post('/sign_up', [UserController::class, 'create_user'])->name('sign_up');

// login post
Route::post('/login', [UserController::class, 'loginUser'])->name('login');

// logout
Route::get('logout', [UserController::class, 'logoutUser']);


Route::get('departments', [components::class, 'departments']);

Route::get('settings', [components::class, 'settings']);
