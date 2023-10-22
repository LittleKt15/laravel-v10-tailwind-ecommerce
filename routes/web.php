<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\{AdminController, CategoryController, ProductController, PurchaseController, UserController, SupplierController};
use App\Http\Controllers\user\{IndexController, CartController, CheckoutController};
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

// Home Page
Route::get('/', [IndexController::class, 'index']);

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
});

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/carts', [CartController::class, 'index']);
    Route::post('/carts/create', [CartController::class, 'cart']);
    Route::get('/carts/delete/{cart}', [CartController::class, 'delete']);
    Route::get('/product-details/{product}', [CartController::class, 'detail']);

    Route::get('/checkouts/{id}', [CheckoutController::class, 'index']);
    Route::post('/checkouts', [CheckoutController::class, 'checkout']);
});
