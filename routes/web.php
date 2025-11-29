<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/signout', [LoginController::class, 'signout'])->name('signout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');
});
