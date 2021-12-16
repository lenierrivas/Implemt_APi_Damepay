<?php

use App\Http\Controllers\Home;
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


Route::get('/', [App\Http\Controllers\Home::class, 'index'])->name('/');
Route::post('consultar', [App\Http\Controllers\Home::class, 'getStatusFlutterwave'])->name('consultar');
Route::post('createpostdame', [App\Http\Controllers\Home::class, 'createpostdame'])->name('createpostdame');