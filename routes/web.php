<?php

use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\HomeController;
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

Route::get('/online-booking', function () {
    return view('frontend.booking');
});

Route::get('/square-payment/{booking_id}', [PaymentController::class, 'squarePayment'])->name('booking.square-payment');
Route::get('square-payment-success', [PaymentController::class, 'squarePaymentSuccess'])->name('booking.square-payment.success');
Route::get('success', [PaymentController::class, 'success'])->name('success');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users')->middleware('permission:user-list');

    Route::get('/roles', function () {
        return view('admin.roles');
    })->name('roles')->middleware('permission:role-list');

    Route::get('/drivers', function () {
        return view('admin.drivers');
    })->name('drivers')->middleware('permission:driver-list');

    Route::get('/bookings', function () {
        return view('admin.bookings');
    })->name('bookings')->middleware('permission:booking-list');

    Route::get('/bookings/create', function () {
        return view('admin.bookings.create');
    })->name('bookings.create')->middleware('permission:booking-list');

    Route::get('/customers', function () {
        return view('admin.customers');
    })->name('customers')->middleware('permission:customer-list');

    Route::get('/coupons', function () {
        return view('admin.coupons');
    })->name('coupons')->middleware('permission:coupon-list');

    Route::get('/vehicles', function () {
        return view('admin.vehicles');
    })->name('vehicles')->middleware('permission:vehicle-list');

    Route::get('/booking-extras', function () {
        return view('admin.booking-extras');
    })->name('booking-extras')->middleware('permission:booking-extra-list');
});



// Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
// Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
