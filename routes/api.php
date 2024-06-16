<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/**
 * Product Crud
 */
Route::apiResource("products", ProductController::class);


/**
 * Client Crud
 */
Route::apiResource("clients", ClientController::class);