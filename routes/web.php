<?php

use App\Http\Controllers\auth\LoginFormController;
use App\Http\Controllers\auth\RegisterFormController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Middleware\validUser;
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

Route::get('/', [LoginFormController::class, 'rLogin'])->name('rLogin');
Route::post('/login', [LoginFormController::class, 'login'])->name('login');


Route::get('/register', [RegisterFormController::class, 'rRegister'])->name('rRegister');
Route::post('/register', [RegisterFormController::class, 'register'])->name('register');

Route::middleware(['validate.user'])->group(function(){
    
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::name('categories.')->group(function(){
        Route::get('/categories', [CategoryController::class, 'index'])->name('index');
        Route::get('/add-category', [CategoryController::class, 'create'])->name('create');
        Route::post('/added-category', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/edited-category/{id}', [CategoryController::class, 'update'])->name('update');
        Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/category/{category}', [CategoryController::class, 'show'])->name('show');
    });
    


    Route::name('products.')->group(function(){
        Route::get('/products', [ProductController::class, 'index'])->name('index');
        Route::get('/add-products', [ProductController::class, 'create'])->name('create');
        Route::post('/added-products', [ProductController::class, 'store'])->name('store');
        Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/edited-product/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/delete-product/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/products/search', [ProductController::class, 'search'])->name('search');
        
    });

    Route::name('stocks.')->group( function(){
        Route::get('/stocks/{id}', [StockController::class, 'index'])->name('index');
        Route::get('/add-stock/{product_id}', [StockController::class, 'create'])->name('create');
        Route::post('/added-stock', [StockController::class, 'store'])->name('store');
        Route::post('/remove-stock/{product_id}', [StockController::class, 'removeStock'])->name('removeStock');
    });    

});