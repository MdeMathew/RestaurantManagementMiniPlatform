<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;

Route::apiResource('menu-items', MenuItemController::class);

