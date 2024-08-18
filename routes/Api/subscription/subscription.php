<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Subsecription\SubscriptionController;

Route::apiResource('dashboard/subscription',SubscriptionController::class);



Route::controller(SubscriptionController::class)
    ->prefix('dashboard/subscriptions')
    ->group(function(){

        Route::middleware('auth:sanctum','is_admin')
        ->group(function(){
            Route::post('/{subscription}/accept','accept')->name('subscriptions.accept');
            Route::post('/{subscription}/reject', 'reject')->name('subscriptions.reject');
            Route::post('/{subscription}/renew', 'renew_the_subscription')->name('subscriptions.renew');
            Route::post('/{subscription}/suspend',  'suspend')->name('subscriptions.suspend');
        });

    });
