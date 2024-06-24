<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnlyOfficeController;

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
Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::resource('/docs', \App\Http\Controllers\DocumentController::class)->middleware('auth');
Route::post('/onlyoffice/callback', [OnlyOfficeController::class, 'callback']);

