<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/dashboard',[PostController::class, 'dashboard'])->middleware();
Route::get('/post/create',[PostController::class, 'create'])->middleware();
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware();
Route::delete('/post/delete/{id}', [PostController::class, 'destroy'])->middleware();
Route::put('/post/update/{id}',[PostController::class, 'update'])->middleware();
Route::post('/post/store',[PostController::class, 'store'])->middleware();
Route::get('/post/{id}',[PostController::class, 'show']);



