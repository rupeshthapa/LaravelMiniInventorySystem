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

Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(validUser::class)->name('dashboard');

Route::get('/logout', [FormController::class, 'logout'])->name('logout');