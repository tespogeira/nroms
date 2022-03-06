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

//RBU

Route::controller(ControllerReachBackUser::class)->group(function () {
    Route::get('rbu', 'index');
    Route::get('rbu/new', 'create');
    Route::get('/rbu/{id}/delete', 'destroy');
    Route::get('/rbu/{id}/edit', 'edit');
    Route::post('/rbu', 'store');
    Route::post('/rbu/{id}', 'update');
    Route::get('/rbu/{id}/download/{sa_signed_local}', 'download');
});
