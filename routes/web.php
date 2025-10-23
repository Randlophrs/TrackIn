<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return redirect()->route('login');
});

# Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

# Items
Route::get('/items', [ItemController::class, 'index'])->name('items.index')->middleware('auth');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show')->middleware('auth');
Route::post('/items/{id}/loan', [LoanController::class, 'store'])->name('items.loan')->middleware('auth');

# User
Route::get('/loan', [LoanController::class, 'index'])->name('loan')->middleware('auth');
Route::post('/loans/{loan}/return', [LoanController::class, 'returnLoan'])->name('loans.return');

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
Route::get('/history', [UserController::class, 'ShowHistory'])->name('history')->middleware('auth');

Route::get('/notifications', [UserController::class, 'showNotifications'])->name('notification')->middleware('auth');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');