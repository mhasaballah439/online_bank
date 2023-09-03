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

Route::get('/', [\App\Http\Controllers\WebsiteController::class,'home'])->name('home');
Route::get('/accounts', [\App\Http\Controllers\WebsiteController::class,'userAccounts'])->name('user.accounts');
Route::get('/transactions/{id}', [\App\Http\Controllers\WebsiteController::class,'userTransactions'])->name('user.transactions');
Route::post('/update-balance', [\App\Http\Controllers\WebsiteController::class,'updateBalance'])->name('update_balance');
Route::post('/update-type', [\App\Http\Controllers\WebsiteController::class,'updateType'])->name('update_type');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
