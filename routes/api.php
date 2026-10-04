<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\TestController;
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

Route::get('/test', [TestController::class, 'index']);

Route::apiResource('projects', ProjectController::class)->middleware('auth:sanctum');

Route::apiResource('tasks', TaskController::class)->middleware('auth:sanctum');

// Registeration
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->middleware('auth:sanctum');

