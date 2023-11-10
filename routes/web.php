<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/',[IndexController::class, 'index' ]);
Route::get('/index',[IndexController::class, 'index' ])->name('index');
Route::get('/home',[HomeController::class, 'home' ]);
Route::get('/login',[IndexController::class, 'login' ]);
Route::post('/store',[IndexController::class, 'store' ])->name('register');
Route::post('/logincheck',[IndexController::class,'logincheck'])->name('logincheck');