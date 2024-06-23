<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/room', [RoomController::class, 'index']);
Route::post('/room', [RoomController::class, 'store']);
Route::put('/room/{id}', [RoomController::class, 'update']);
Route::delete('/room/{id}', [RoomController::class, 'destroy']);

Route::get('/patient', [PatientController::class,'index']);
Route::post('/patient/checkin', [PatientController::class,'checkin']);
Route::delete('/patient/checkout/{id}', [PatientController::class, 'checkout']);
