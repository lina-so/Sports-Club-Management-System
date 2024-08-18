<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Room\RoomController;
use App\Http\Controllers\Dashboard\Sport\SportController;
use App\Http\Controllers\Dashboard\Offers\OfferController;
use App\Http\Controllers\Dashboard\Article\ArticleController;
use App\Http\Controllers\Dashboard\Payment\PaymentController;
use App\Http\Controllers\Dashboard\Facility\FacilityController;
use App\Http\Controllers\Dashboard\Subsecription\SubscriptionController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('dashboard/payment/{subscription_id}/paid', [PaymentController::class, 'update'])->name('subscriptions.paid');

Route::get('articles/tag/{tagName}', [ArticleController::class, 'searchByTag'])->name('articles.searchByTag');



$api_path = '/Api';

include __DIR__ . "{$api_path}/sports/sport.php";
include __DIR__ . "{$api_path}/rooms/room.php";
include __DIR__ . "{$api_path}/facilities/facility.php";
include __DIR__ . "{$api_path}/offers/offer.php";
include __DIR__ . "{$api_path}/subscription/subscription.php";
