<?php

use App\Http\Controllers\ControllerReachBackUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rbu', [ControllerReachBackUser::class, 'index']);
Route::get('/rbu/new', [ControllerReachBackUser::class, 'create']);
Route::post('/rbu', [ControllerReachBackUser::class, 'store']);
Route::post('/rbu/{id}', [ControllerReachBackUser::class, 'update']);
Route::get('/rbu/delete/{id}', [ControllerReachBackUser::class, 'destroy']);
Route::get('/rbu/edit/{id}', [ControllerReachBackUser::class, 'edit']);
