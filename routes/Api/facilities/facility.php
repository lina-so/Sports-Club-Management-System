<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Facility\FacilityController;

Route::apiResource('dashboard/facilities',FacilityController::class);
