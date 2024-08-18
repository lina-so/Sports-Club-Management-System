<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Sport\SportController;


Route::apiResource('dashboard/sports',SportController::class);
