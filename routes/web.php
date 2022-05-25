<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\OccurrenceController::class,'listTentatives'])->name('home-page');
Route::get('/{param}', [\App\Http\Controllers\OccurrenceController::class,'index'])->name('list-tentatives');


