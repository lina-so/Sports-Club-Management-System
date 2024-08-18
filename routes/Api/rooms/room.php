<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Room\RoomController;

Route::apiResource('dashboard/rooms',RoomController::class);
