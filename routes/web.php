<?php

use App\Http\Controllers\AdminBarberController;
use App\Http\Controllers\BarberController;
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
//set barber for admin
Route::get('/home/admin/barbers', [App\Http\Controllers\HomeController::class, 'barberindex'])->name('admin.barberuser')->middleware('isAdmin');
Route::get('/home/admin/barbers/confirm/{id}', [App\Http\Controllers\HomeController::class, 'barberconfirm'])->name('admin.barberconfirm')->middleware('isAdmin');

Route::get('/home/admin/barbers/unconfirm/{id}', [App\Http\Controllers\HomeController::class, 'barberunconfirm'])->name('admin.barberunconfirm')->middleware('isAdmin');

//admin booking check

Route::get('home/admin/customer/current/booking',[AdminBarberController::class,'currentbook'])->name('admin.customerbooking')->middleware('isAdmin');
Route::get('home/admin/customer/old/booking',[AdminBarberController::class,'oldbook'])->name('admin.customeroldbooking')->middleware('isAdmin');
Route::get('home/admin/customer/current/booking/confirm/{id}',[AdminBarberController::class,'confirm'])->name('admin.customerbookingconfirm')->middleware('isAdmin');
Route::get('home/admin/customer/current/booking/cancel/{id}',[AdminBarberController::class,'cancel'])->name('admin.customerbookingcancel')->middleware('isAdmin');
Route::get('home/admin/customer/current/booking/rescheduling',[AdminBarberController::class,'reschedul'])->name('admin.bookingreschedul')->middleware('isAdmin');

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

//barber

Route::get('/home/barber/profile/update',[BarberController::class,'update'])->name('barber.profile')->middleware('isBarber');
Route::post('home/barber/prodile/update/post',[BarberController::class,'updateprofile'])->name('barber.profileupdate')->middleware('isBarber');

Route::get('/home/barber/allschedul',[BarberController::class,'index'])->name('barber.allschedul')->middleware('isBarber');
Route::get('/home/barber/myschedul/page',[BarberController::class,'myschedulpage'])->name('barber.myschedulpage')->middleware('isBarber');
Route::post('/home/barber/myschedul/post',[BarberController::class,'myschedul'])->name('barber.myschedulpost')->middleware('isBarber');

Route::get('/home/barber/myschedul/all/page',[BarberController::class,'shcedulpage'])->name('barber.schedulpage')->middleware('isBarber');
Route::get('/home/barber/myschedul/update/page/{id}',[BarberController::class,'shcedulupdatepage'])->name('barber.schedulupdatepage')->middleware('isBarber');
Route::post('/home/barber/myschedul/update/post/{id}',[BarberController::class,'shcedulupdate'])->name('barber.schedulupdate')->middleware('isBarber');
Route::get('/home/barber/myschedul/delete/post/{id}',[BarberController::class,'delete'])->name('barber.scheduldelete')->middleware('isBarber');

Route::get('/home/barber/myapointment',[BarberController::class,'myapointment'])->name('barber.myschedul')->middleware('isBarber');
Route::get('home/barber/booking/confirm/{id}',[BarberController::class,'confirm'])->name('barber.customerbookingconfirm')->middleware('isBarber');
Route::get('home/barber/booking/cancel/{id}',[BarberController::class,'cancel'])->name('barber.customerbookingcancel')->middleware('isBarber');
Route::get('/home/barber/profile/deactive',[BarberController::class,'deactive'])->name('barber.profiledeactive')->middleware('isBarber');
Route::get('/home/barber/profile/active',[BarberController::class,'active'])->name('barber.profileactive')->middleware('isBarber');
