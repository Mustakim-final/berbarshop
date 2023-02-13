<?php

use App\Http\Controllers\AdminBarberController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.home')->middleware('isAdmin');

Route::get('/home/berbar', [App\Http\Controllers\HomeController::class, 'berbarhome'])->name('berbar.home')->middleware('isBarber');

//Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customerhome'])->name('customer.home');
//admin
Route::get('home/admin/barber',[AdminBarberController::class,'index'])->name('admin.barbarindex')->middleware('isAdmin');
Route::get('home/admin/barber/schedul/{id}',[AdminBarberController::class,'setschedul'])->name('admin.barbarschedul')->middleware('isAdmin');

Route::post('home/admin/barber/schedul/post/{id}',[AdminBarberController::class,'post'])->name('admin.barbarschedulpost')->middleware('isAdmin');

Route::get('home/admin/barber/schedulshow',[AdminBarberController::class,'show'])->name('admin.barbarschedulshow')->middleware('isAdmin');


//customer

Route::get('/home/customer',[CustomerController::class,'index'])->name('customer.home');
Route::get('home/customer/barber/apointment/page/{id}',[CustomerController::class,'apointmentpage'])->name('customer.apointmentpage');
Route::post('home/customer/barber/apointment/post/{id}',[CustomerController::class,'post'])->name('customer.apointmentpost');
Route::get('home/customer/barber/apointment/my',[CustomerController::class,'apointment'])->name('customer.apointment');
Route::get('home/customer/barber/apointment/cancel/my/{id}',[CustomerController::class,'delete'])->name('customer.apointmentdelete');
Route::get('home/customer/barber/apointment/updatepage/my/{id}/{b_id}',[CustomerController::class,'apointmentupdate'])->name('customer.apointmentupdatepage');
Route::post('home/customer/barber/update/my/apointment/{id}',[CustomerController::class,'apointmentupdatepost'])->name('customer.apointmentupdate');
Route::get('/home/customer/profile/update',[CustomerController::class,'update'])->name('customer.profile');
Route::post('home/customer/prodile/update/post',[CustomerController::class,'updateprofile'])->name('customer.profileupdate');
