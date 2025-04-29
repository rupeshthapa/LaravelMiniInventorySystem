<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'rLogin'])->name('rLogin');
Route::post('/login', [FormController::class, 'login'])->name('login');


Route::get('/register', [PageController::class, 'rRegister'])->name('rRegister');
Route::post('/register', [FormController::class, 'register'])->name('register');

Route::middleware(['validate.user'])->group(function(){
    
    
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [FormController::class, 'logout'])->name('logout');
    
    Route::get('/category/{catgeory}', [PageController::class, 'productAsCategory'])->name('productsAsCategory');
    Route::get('/categories', [PageController::class, 'categories'])->name('categories');
    Route::post('/add-category', [FormController::class, 'addCategory'])->name('add-category');
    Route::get('/edit-category/{id}', [PageController::class, 'editCategory'])->name('edit-category');
    Route::post('/edited-category/{id}', [FormController::class, 'editedCategory'])->name('edited-category');
    Route::post('/deleted-category/{id}', [FormController::class, 'deletedCategory'])->name('deleted-category');

    Route::get('/reports', [PageController::class, 'reports'])->name('reports');
    
    Route::get('/products', [PageController::class, 'products'])->name('products');
    Route::post('/add-products', [FormController::class, 'addProduct'])->name('add-product');
    Route::get('/edit-product/{id}', [PageController::class, 'editProduct'])->name('edit-product');
    Route::post('/edited-product/{id}', [FormController::class, 'editedProduct'])->name('edited-product');
    Route::post('deleted-product/{id}', [FormController::class, 'deletedProduct'])->name('deleted-product');
});