<?php

use App\Http\Controllers\ShopifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/shopify/products', [ShopifyController::class, 'getAllProducts']);