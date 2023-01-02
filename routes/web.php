<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');
    Route::get('/roles', function () {
        return view('admin.roles');
    })->name('roles');
    Route::get('/drivers', function () {
        return view('admin.drivers');
    })->name('drivers')->middleware('permission:driver-list');
});
