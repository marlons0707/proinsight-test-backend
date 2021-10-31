<?php

use App\Http\Controllers\API\Access\UserController;
use App\Http\Controllers\API\Catalogs\CategoryController;
use App\Http\Controllers\API\Catalogs\ContainerController;
use App\Http\Controllers\API\Catalogs\PriceController;
use App\Http\Controllers\API\Catalogs\ProductController;
use App\Http\Controllers\API\Catalogs\UnitController;
use App\Http\Controllers\API\Contacts\SupplierController;
use App\Http\Controllers\API\Transactions\PurchaseController;
use App\Http\Controllers\AuthController;
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
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // System
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('register', [AuthController::class, 'register']);
    Route::apiResource('user', UserController::class);

    // Contacts
    // ===========================================================================
    Route::apiResource('supplier', SupplierController::class);

    // Catalogs
    // ===========================================================================
    Route::apiResource('product', ProductController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('unit', UnitController::class);
    Route::apiResource('price', PriceController::class);
    Route::apiResource('container', ContainerController::class);

    // Purchase
    Route::apiResource('purchase', PurchaseController::class);
    Route::put('purchase/cancel/{id}', [PurchaseController::class, 'cancelPurchase']);
});
