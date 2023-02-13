<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){ return view('login'); });
Route::get('/sign-up',function(){ return view('register'); });

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);

Route::get('/task',[TaskController::class,'index']);
Route::post('/addtask',[TaskController::class,'add_task']);
Route::get('/task_status{task}',[TaskController::class,'task_status_change']);
Route::get('/task/{task}/delete',[TaskController::class,'delete_task']);




