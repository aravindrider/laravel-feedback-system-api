<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;

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
    Route::resource('/feedback', \App\Http\Controllers\FeedbackController::class);
    Route::get('/dashboard', [DashBoardController::class, 'index']);
    Route::get('/feedback/{feedback}/answer', [\App\Http\Controllers\FeedbackController::class, 'showAnswer']);
});

Route::get('/feedback-by-slug/{feedback:slug}', [\App\Http\Controllers\FeedbackController::class, 'showForGuest']);

Route::post('/feedback/{feedback}/answer', [\App\Http\Controllers\FeedbackController::class, 'storeAnswer']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
