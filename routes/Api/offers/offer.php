<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Offers\OfferController;


Route::apiResource('dashboard/offers',OfferController::class);
