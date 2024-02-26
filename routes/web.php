<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellerController;
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

Route::resource('/sellers', SellerController::class);

Route::get('/sellers/{sellerId}/sales', [SaleController::class, 'show'])->name('sales.show');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/mail/{sellerId}', [SaleController::class, 'report']);

Route::get('/', function () {
    return redirect()->route('sellers.index');
})->name('home');
