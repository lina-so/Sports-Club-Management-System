<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Room\RoomController;
use App\Http\Controllers\Dashboard\Sport\SportController;
use App\Http\Controllers\Dashboard\Offers\OfferController;
use App\Http\Controllers\Dashboard\Facility\FacilityController;
use App\Http\Controllers\Dashboard\Subsecription\SubscriptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('dashboard/sports',SportController::class);
Route::apiResource('dashboard/rooms',RoomController::class);
Route::apiResource('dashboard/facilities',FacilityController::class);
Route::apiResource('dashboard/offers',OfferController::class);
Route::apiResource('dashboard/subscription',SubscriptionController::class);





