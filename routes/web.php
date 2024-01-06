<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BunnyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BunnyController::class)->group(function() {
    Route::get('/','index')->name('index');
    Route::post('/video','upload')->name('upload.video');
    Route::post('/createLibrary','createLibrary')->name('create.library');
    Route::post('/delete','delete')->name('delete.video');
    Route::post('/deleteLibrary','deleteLibrary')->name('delete.library');
});