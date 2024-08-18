<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\Day\DayController;
use App\Http\Controllers\Dashboard\Room\RoomController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Sport\SportController;
use App\Http\Controllers\Dashboard\Facility\FacilityController;

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::resource('dashboard/users', UserController::class);
Route::get('/user/post/{post}', [UserController::class, 'userPost'])->name('userPost');

/************************ club sport sys*****************************/
// Route::resource('dashboard/sports', SportController::class);
// Route::resource('dashboard/days', DayController::class);
// Route::resource('dashboard/facility', FacilityController::class);
// Route::resource('dashboard/room', RoomController::class);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{page}', [AdminController::class,'index']);
