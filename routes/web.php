<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register-post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');

Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/items', [ItemController::class, 'index'])->name('items.index')->middleware('auth');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create')->middleware('auth');
Route::post('/items', [ItemController::class, 'store'])->name('items.store')->middleware('auth');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show')->middleware('auth');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit')->middleware('auth');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update')->middleware('auth');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy')->middleware('auth');

Route::get('/history', [LoanController::class, 'history'])->name('history')->middleware('auth');

Route::get('/loan', [LoanController::class, 'index'])->name('loan')->middleware('auth');
Route::post('/loans/{loan}/return', [LoanController::class, 'returnLoan'])->name('loans.return');

Route::get('/notifications', [AuthController::class, 'showNotifications'])->name('notification')->middleware('auth');