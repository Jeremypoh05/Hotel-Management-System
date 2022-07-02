<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;

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
Route::resource('admin/roomtype',RoomTypeController::class);
Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
Auth::routes();

//Room
Route::resource('admin/rooms',RoomController::class);
Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);

//Customer
Route::resource('admin/customer',CustomerController::class);
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);

//Delete Image
Route::get('admin/roomtypeimage/delete/{id}',[RoomTypeController::class,'destroy_image']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
