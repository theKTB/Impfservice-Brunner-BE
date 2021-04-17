<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VaccinationController;
use \App\Http\Controllers\UserController;

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
Route::get('vaccination/{id}',[VaccinationController::class, 'getVaccinationById']);
Route::get('vaccinations/location/{locationId}', [VaccinationController::class, 'getVaccinationsByLocation']);

Route::post('vaccination',[VaccinationController::class, 'create']);
Route::put('vaccination/{id}',[VaccinationController::class,'update']);
Route::delete('vaccination/{id}',[VaccinationController::class,'delete']);

Route::get('users',[UserController::class,'getAllUsers']);
Route::get('user/{socialNumber}',[UserController::class, 'getUserBySocialNumber']);

