<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//on crée une route qui se chargera d'appeler notre controleur Register et la methode __invoke sera appeler
//par default
Route::post('auth/register', \App\Http\Controllers\Api\V1\Auth\RegisterController::class);
Route::post('auth/login', \App\Http\Controllers\Api\V1\Auth\LoginController::class);
Route::get('companies', [\App\Http\Controllers\Api\V1\companies\CompanyController::class, 'index']);
Route::post('auth/logout', \App\Http\Controllers\Api\V1\Auth\LogoutController::class)->middleware('auth');

