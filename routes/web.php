<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\{AdminController, CategoryController, OrderController, ProductController, PurchaseController, UserController, SupplierController};
use App\Http\Controllers\user\{IndexController, CartController, CheckoutController, OrderHistoryController};
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [IndexController::class, 'index']);
Route::get('/searchs', [IndexController::class, 'search']);

// Login and Logout Routes
Route::get('/registers', [AuthController::class, 'create'])->name('register')->middleware('guest');
Route::post('/registers', [AuthController::class, 'store']);
Route::post('/logouts', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logins', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logins', [AuthController::class, 'authenticate']);

// Admin Routes
Route::middleware('auth', 'isAdmin')->prefix('admin')->group(function () {

    Route::get('/dashboards', [AdminController::class, 'index']);

    Route::resource('/categories', CategoryController::class);

    Route::resource('/products', ProductController::class);

    Route::resource('/suppliers', SupplierController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/purchases', PurchaseController::class);
    Route::post('/purchases/status/{purchase}', [PurchaseController::class, 'statusUpdate']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{checkout}', [OrderController::class, 'show']);
    Route::post('/orders/status/{checkout}', [OrderController::class, 'statusUpdate']);
    Route::delete('/orders/{checkout}', [OrderController::class, 'destroy']);
});

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/carts', [CartController::class, 'index']);
    Route::post('/carts/create', [CartController::class, 'cart']);
    Route::get('/carts/delete/{cart}', [CartController::class, 'delete']);
    Route::get('/product-details/{product}', [CartController::class, 'detail']);

    Route::get('/checkouts/{product}', [CheckoutController::class, 'index']);
    Route::post('/checkouts', [CheckoutController::class, 'checkout']);

    Route::get('/order-histories', [OrderHistoryController::class, 'index']);
    Route::get('/order-histories/{checkout}', [OrderHistoryController::class, 'show']);
});
