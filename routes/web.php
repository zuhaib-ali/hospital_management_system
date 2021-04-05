<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// index view
Route::get('/', function () {
    return view('welcome');
})->middleware('user_authenticate')->name('index');

// login view
Route::view('/login', 'login')->name('login');

// signup view
Route::view('/sign_up', 'sign_up')->name('signUp');

// sign post
Route::post('/sign_up', [UserController::class, 'create_user'])->name('sign_up');

// login post
Route::post('/login', [UserController::class, 'loginUser'])->name('login');

// logout
Route::get('/logout', [UserController::class, 'logoutUser'])->name('logout');