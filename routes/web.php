<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\IndexController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/carts', [CartController::class, 'index']);
Route::post('/carts/create', [CartController::class, 'cart']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboards', [AdminController::class, 'index']);

    Route::resource('/categories', CategoryController::class);
    Route::get('/search-categories', [CategoryController::class, 'search']);

    Route::resource('/products', ProductController::class);
    Route::get('/search-products', [ProductController::class, 'search']);

    Route::resource('/suppliers', SupplierController::class);

    Route::resource('/purchases', PurchaseController::class);
    Route::post('/purchases/status/{id}', [PurchaseController::class, 'statusUpdate']);

    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit']);
    Route::post('/roles/{id}', [RoleController::class, 'update']);
    Route::get('/roles/{id}', [RoleController::class, 'destory']);
    Route::get('/search-roles', [RoleController::class, 'search']);
});

require __DIR__.'/auth.php';
