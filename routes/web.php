<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;

/*                       TicketController
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [IndexController::class, 'actionIndex']);


Route::get('teacher/getall',[TeacherController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'teacher/insert/', [TeacherController::class, 'actionInsert']);
Route::match(['get', 'post'], 'teacher/login', [TeacherController::class, 'actionLogin']);
Route::get('teacher/delete/{idTeacher}',[TeacherController::class,'actionDelete']);



Route::get('admin/getall',[AdminController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'admin/insert', [AdminController::class, 'actionInsert']);
Route::match(['get', 'post'], 'admin/login', [AdminController::class, 'actionLogin']);
Route::get('admin/delete/{idAdmin}',[AdminController::class,'actionDelete']);



Route::get('ticket/getall',[TicketController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'ticket/insert', [TicketController::class, 'actionInsert']);
Route::get('ticket/delete/{idAdmin}',[TicketController::class,'actionDelete']);