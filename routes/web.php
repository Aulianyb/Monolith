<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');

Route::get('/purchase/{id}', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase');

Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');

Route::post('/form/submit/', [App\Http\Controllers\PurchaseController::class, 'submitForm'])->name('form.submit'); 

