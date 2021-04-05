<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VaccinationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vaccinations',[VaccinationController::class,'getAllVaccinations']);
Route::get('vaccinations/{id}',[VaccinationController::class,'findById']);
Route::get('vaccinations/{id}',[VaccinationController::class,'findById']);
Route::get('vaccinations/location/{locationId}', [VaccinationController::class, 'findByLocation']);

