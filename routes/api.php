<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\ReservasController;

Route::apiResource('menu-items', MenuItemController::class);
Route::apiResource('reservas', ReservasController::class);
