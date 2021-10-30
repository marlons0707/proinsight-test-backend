<?php

use App\Http\Controllers\API\Catalogs\CategoryController;
use App\Http\Controllers\API\Catalogs\ProductController;
use App\Http\Controllers\API\Catalogs\UnitController;
use App\Http\Controllers\API\Contacts\CustomerController;
use App\Http\Controllers\API\Contacts\SupplierController;
use App\Http\Controllers\API\Settings\LocationController;
use App\Http\Controllers\API\Settings\StoreController;
use App\Http\Controllers\API\Transactions\PurchaseController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // System
    Route::post('logout', [AuthController::class, 'logout']);

    // Contacts
    // ===========================================================================
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('supplier', SupplierController::class);

    // Catalogs
    // ===========================================================================
    Route::apiResource('product', ProductController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('unit', UnitController::class);

    // Settings
    Route::apiResource('store', StoreController::class);
    Route::apiResource('location', LocationController::class);

    // Purchase
    Route::apiResource('purchase', PurchaseController::class);
    Route::put('purchase/cancel/{id}', [PurchaseController::class, 'cancelPurchase']);
    
});
