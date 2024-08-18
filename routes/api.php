<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Room\RoomController;
use App\Http\Controllers\Dashboard\Sport\SportController;
use App\Http\Controllers\Dashboard\Offers\OfferController;
use App\Http\Controllers\Dashboard\Payment\PaymentController;
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


// Route::middleware('auth:sanctum')->group(function () {
    Route::post('dashboard/subscriptions/{subscription}/accept', [SubscriptionController::class, 'accept'])->name('subscriptions.accept');
    Route::post('dashboard/subscriptions/{subscription}/reject', [SubscriptionController::class, 'reject'])->name('subscriptions.reject');
    Route::post('dashboard/subscriptions/{subscription}/renew', [SubscriptionController::class, 'renew_the_subscription'])->name('subscriptions.renew');
    Route::post('dashboard/subscriptions/{subscription}/suspend', [SubscriptionController::class, 'suspend'])->name('subscriptions.suspend');
    Route::post('dashboard/payment/{subscription_id}/paid', [PaymentController::class, 'update'])->name('subscriptions.paid');



// });


