<?php

use App\Http\Controllers\api\DiseaseController;
use App\Http\Controllers\api\NotificationsController;
use App\Http\Controllers\api\PatientController;
use App\Http\Controllers\api\UserController;
use App\Models\HealthIndicator;
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
Route::post('/savedisease', [HealthIndicator::class, 'SaveDisease']);
Route::get('/patients', [PatientController::class, 'patients']);
Route::get('/patient', [PatientController::class, 'patient']);
Route::get('/getpatientdisease', [PatientController::class, 'GetPatientDisease']);
Route::post('/login', [UserController::class, 'Login']);
Route::post('/register', [PatientController::class, 'Register']);
Route::post('/savepatientdisease', [PatientController::class, 'SavePatientDisease']);
Route::get('/gethealthindicator', [HealthIndicator::class, 'GetHealthIndicators']);
Route::post('/savehealthindicator', [HealthIndicator::class, 'SaverHealthIndicators']);
Route::post('/savenotification', [NotificationsController::class, 'SaveNotification']);
Route::get('/getnotifications', [NotificationsController::class, 'GetNotifications']);
Route::post('/savedietartplan', [HealthIndicator::class, 'SaveDietaryPlan']);
Route::get('/getdietaryplan', [HealthIndicator::class, 'GetDietaryPlans']);













