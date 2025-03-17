<?php

use App\Http\Controllers\api\DiseaseController;
use App\Http\Controllers\api\PatientController;
use App\Http\Controllers\api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/diseases', [DiseaseController::class, 'index']);
Route::get('/patients', [PatientController::class, 'patients']);
Route::get('/patient', [PatientController::class, 'patient']);
Route::get('/patientdisease', [PatientController::class, 'PatientDisease']);
Route::post('/login', [UserController::class, 'Login']);
Route::post('/register', [UserController::class, 'Register']);






