<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', [studentController::class, 'index']);
Route::get('/students/{id}', [studentController::class, 'show']);
Route::post('/students', [studentController::class, 'store']);
Route::put('/students', [studentController::class, 'update']);
Route::put('students/delete/{id}', [studentController::class, 'destroy']);