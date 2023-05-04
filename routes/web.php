<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Select\SelectController;
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

Route::get('select/user', [SelectController::class, 'users'])->name('select.user');
Route::get('select/product', [SelectController::class, 'products'])->name('select.product');

Route::get('/', [ClientController::class, 'index'])->name('index')->middleware('auth');
Route::get('/detail-product/{id}', [ClientController::class, 'show'])->name('product.detail')->middleware('auth');
Route::get('/detail-product/{id}/checkout', [ClientController::class, 'checkout'])->name('product.checkout')->middleware('auth');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::post('/report', [ReportController::class, 'show'])->name('report.detail');


require __DIR__ . '/auth.php';
