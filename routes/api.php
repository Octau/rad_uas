<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SupplierController, ProductTypeController, ProductController, OrderController, PurchaseController
};
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'supplier', 'as' => 'supplier.'], function(){
    Route::get('{name?}', [SupplierController::class, 'read'])->name('read');
    Route::post('create', [SupplierController::class, 'create'])->name('create');
    Route::put('{id}/update', [SupplierController::class, 'update'])->name('update');
    Route::delete('{id}/delete/', [SupplierController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'product_type', 'as' => 'product_type.'], function(){
    Route::get('{name?}', [ProductTypeController::class, 'read'])->name('read');
    Route::post('create', [ProductTypeController::class, 'create'])->name('create');
    Route::put('{id}/update', [ProductTypeController::class, 'update'])->name('update');
    Route::delete('{id}/delete', [ProductTypeController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
    Route::get('{name?}', [ProductController::class, 'read'])->name('read');
    Route::post('create', [ProductController::class, 'create'])->name('create');
    Route::put('{id}/update', [ProductController::class, 'update'])->name('update');
    Route::delete('{id}/delete', [ProductController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'order', 'as' => 'order.'], function(){
    Route::get('{id?}', [OrderController::class, 'read'])->name('read');
    Route::post('create', [OrderController::class, 'create'])->name('create');
    // Route::put('{id}/update', [OrderController::class, 'update'])->name('update');
    Route::delete('{id}/delete', [OrderController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'purchase', 'as' => 'purchase.'], function(){
    Route::get('{id?}', [PurchaseController::class, 'read'])->name('read');
    Route::post('create', [PurchaseController::class, 'create'])->name('create');
    // Route::put('{id}/update', [PurchaseController::class, 'update'])->name('update');
    Route::delete('{id}/delete', [PurchaseController::class, 'delete'])->name('delete');
});