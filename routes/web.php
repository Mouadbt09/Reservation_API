<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\FController;
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
    return view('Home');
});
Route::get('/add', function () {
    return view('add');
});
Route::get('/edit/{id}',[FController::class,'edit'])->name('edit');

Auth::routes();

Route::put('/flights', [FController::class,'store'])->name('addp');

Route::resource('flights', FController::class);

Route::get('/admin', [FController::class,'index'])->middleware('adminuser');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
