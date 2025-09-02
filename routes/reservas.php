<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasController;

Route::apiResource('reservas', ReservasController::class);