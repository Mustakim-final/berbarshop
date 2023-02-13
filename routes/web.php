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
