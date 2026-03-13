<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });



    Route::get('stations', [StationController::class, 'index']);
    Route::get('stations/{station}', [StationController::class, 'show']);

    Route::middleware('admin')->group(function () {
        Route::post('stations', [StationController::class, 'store']);
        Route::put('stations/{station}', [StationController::class, 'update']);
        Route::delete('stations/{station}', [StationController::class, 'destroy']);
    });




    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);
