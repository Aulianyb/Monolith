<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//NOTICE : DELETE NTAR
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('register', [App\Http\Controllers\AuthController::class, 'register_index'])->name('register_view');
Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('register_api');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login_api');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login_index'])->name('login');


Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [App\Http\Controllers\AuthController::class, 'user'])->name('user');
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout_api');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
    Route::get('/purchase/{id}', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase');
    Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
    Route::post('/form/submit/', [App\Http\Controllers\PurchaseController::class, 'submitForm'])->name('form.submit'); 
    Route::get('/success/{nama}/{total}/{jumlah}', [App\Http\Controllers\PurchaseController::class, 'success_page'])->name('success');
}); 
