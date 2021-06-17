<?php

use App\Http\Controllers\Api\Property\PropertyPostController;
use App\Http\Controllers\Api\Property\PropertyPutController;
use App\Http\Controllers\Api\Tour\TourGetController;
use App\Http\Controllers\Api\Tour\TourPostController;
use App\Http\Controllers\Api\Tour\TourPutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/property/add', PropertyPostController::class);

Route::put('/property/update', PropertyPutController::class);

Route::post('/tour/add', TourPostController::class);

Route::put('/tour/update', TourPutController::class);

Route::get('/property/{propertyId}/tours', TourGetController::class);
