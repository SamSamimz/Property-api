<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/register', [AuthController::class,'register'])->name('register');

// Brokers 
Route::get('/brokers', [BrokerController::class,'index'])->name('brokers.index');
Route::get('/brokers/{broker}', [BrokerController::class,'show'])->name('brokers.show');
// Properties
Route::apiResource('/properties', PropertyController::class);
// Protected Routes
Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('/brokers', BrokerController::class)->only([
        'store','update','destroy'
    ]);
    Route::resource('/tasks', TaskController::class);
    Route::delete('/logout', [AuthController::class,'logout'])->name('logout');
});


