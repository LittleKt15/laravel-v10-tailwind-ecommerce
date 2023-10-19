<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\IndexController;
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

Route::get('/', [IndexController::class, 'index']);

Route::middleware('auth', 'isAdmin')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboards', [AdminController::class, 'index']);

    Route::resource('/categories', CategoryController::class);

    Route::resource('/products', ProductController::class);

    Route::resource('/suppliers', SupplierController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/purchases', PurchaseController::class);
    Route::post('/purchases/status/{purchase}', [PurchaseController::class, 'statusUpdate']);

    // User Routes
    Route::get('/carts', [CartController::class, 'index']);
    Route::post('/carts/create', [CartController::class, 'cart']);
    Route::get('/product-details/{id}', [CartController::class, 'detail']);
    Route::get('/carts/delete/{id}', [CartController::class, 'delete']);

    Route::get('/checkouts/{id}', [CheckoutController::class, 'index']);
    Route::post('/checkouts', [CheckoutController::class, 'checkout']);
});

require __DIR__ . '/auth.php';
