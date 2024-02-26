<?php

use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\SellerControler;
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

Route::resource('/sellers', SellerControler::class);


Route::get('/sellers/{sellerId}/sales', [SaleController::class, 'show'])->name('sales.show');
Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');
