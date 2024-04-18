<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    // Survey resource with slug
    Route::get('survey/', [SurveyController::class, 'index'])->name('survey.index');
    Route::post('survey/', [SurveyController::class, 'store'])->name('survey.store');
    Route::get('survey/{survey:slug}', [SurveyController::class, 'show'])->name('survey.show');
    Route::put('survey/{survey:slug}', [SurveyController::class, 'update'])->name('survey.update');
    Route::delete('survey/{survey:slug}', [SurveyController::class, 'destroy'])->name('survey.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/survey/get-by-slug/{survey:slug}', [SurveyController::class, 'getBySlug']);
Route::post('/survey/{survey:slug}/answer', [SurveyController::class, 'storeAnswer']);