<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;


Route::get('/players', [PlayerController::class , 'index']);