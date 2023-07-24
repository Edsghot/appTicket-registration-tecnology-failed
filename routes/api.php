<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teachers', [TeacherController::class, 'actionGetAll']);
Route::post('/teachers/insert', [TeacherController::class, 'actionInsert']);
