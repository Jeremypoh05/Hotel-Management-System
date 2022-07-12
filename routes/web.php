<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffDepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\HomeController;

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
Route::get('/home', [HomeController::class,'homepage']);

//Admin Login
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);


//Admin Dashboard
Route::get('admin',[AdminController::class,'dashboard']);

//RoomType 
Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomTypeController::class);

//Room
Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);
Route::resource('admin/rooms',RoomController::class);

//Customer
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
Route::resource('admin/customer',CustomerController::class);

//Gallery
Route::get('admin/gallery/{id}/delete',[GalleryController::class,'destroy']);
Route::resource('admin/gallery',GalleryController::class);

//Delete Image Room Type
Route::get('admin/roomtypeimage/delete/{id}',[RoomTypeController::class,'destroy_image']);

//Delete Image Room
Route::get('admin/roomimage/delete/{id}',[RoomController::class,'destroy_image']);

//Department
Route::get('admin/department/{id}/delete',[StaffDepartmentController::class,'destroy']);
Route::resource('admin/department',StaffDepartmentController::class);

//--------------- Payment -----------------//
    //Show the specific staff payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payments']);
        //Add payment to a specific staff
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment']);
                //Save Payment
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment']);
            //Delete staff payments
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);
//---------x------ Payment ---------x--------//

//Staff 
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
Route::resource('admin/staff',StaffController::class);

//Booking
Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);
Route::resource('admin/booking',BookingController::class);

//Service
Route::get('admin/service/{id}/delete',[ServiceController::class,'destroy']);
Route::resource('admin/service',ServiceController::class);

//-------------------------------- Frontend Login ------------------------------------
//Frontend Login
Route::get('customer/login',[CustomerController::class,'login']);
Route::post('customer/login',[CustomerController::class,'customer_login']);
//Frontend Register
Route::get('customer/register',[CustomerController::class,'register']);
//Frontend Logout
Route::get('customer/logout',[CustomerController::class,'logout']);
//Frontend Booking 
Route::get('booking',[BookingController::class,'frontend_booking']);
//Frontend Succesfully Booking Page 
Route::get('booking/success',[BookingController::class,'booking_payment_success']);
//Frontend Fail Booking Page 
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);


Route::get('/viewRoom/{slug}/{id}',[HomeController::class, 'roomDetail']);

Auth::routes();

