<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;

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

Route::get('/', function () {
    return view('home');
});

//Admin Login
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);


//Admin Dashboard
Route::get('admin', function () {
    return view('dashboard');
});

//RoomType 
Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomTypeController::class);

//Room
Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);
Route::resource('admin/rooms',RoomController::class);

//Customer
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
Route::resource('admin/customer',CustomerController::class);

//Delete Image Room Type
Route::get('admin/roomtypeimage/delete/{id}',[RoomTypeController::class,'destroy_image']);

//Delete Image Room
Route::get('admin/roomimage/delete/{id}',[RoomController::class,'destroy_image']);

//Department
Route::get('admin/department/{id}/delete',[StaffDepartmentController::class,'destroy']);
Route::resource('admin/department',StaffDepartmentController::class);

//Show the specific staff payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payments']);

//Add payment to a specific staff
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment']);

//Save Payment
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment']);

//Delete staff payments
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);

//Staff CRUD
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
Route::resource('admin/staff',StaffController::class);

//Booking
Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);
Route::resource('admin/booking',BookingController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
