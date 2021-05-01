<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VaccinationController;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
Route::get('vaccinations/{id}',[VaccinationController::class, 'getVaccinationById']);
Route::get('vaccinations/location/{locationId}', [VaccinationController::class, 'getVaccinationsByLocation']);

//login
Route::post('auth/login',[AuthController::class,'login']);

Route::group(['middleware' =>['api','cors','auth.jwt']], function(){
    //Hier kommen alle abgesicherten Routen rein
    Route::post('vaccination',[VaccinationController::class, 'create']);
    Route::put('vaccination/{id}',[VaccinationController::class,'update']);
    Route::delete('vaccination/{id}',[VaccinationController::class,'delete']);
    Route::post('auth/logout',[AuthController::class,'logout']);
    Route::get('users',[UserController::class,'getAllUsers']);
    Route::get('user/{id}',[UserController::class, 'getUserById']);
});


