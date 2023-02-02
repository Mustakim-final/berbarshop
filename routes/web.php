<?php

use App\Http\Controllers\AdminBarberController;
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

//admin
Route::get('home/admin/barber',[AdminBarberController::class,'index'])->name('admin.barbarindex');
Route::get('home/admin/barber/schedul/{id}',[AdminBarberController::class,'setschedul'])->name('admin.barbarschedul');

Route::post('home/admin/barber/schedul/post/{id}',[AdminBarberController::class,'post'])->name('admin.barbarschedulpost');
