<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PinjamController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth routes
Route::middleware(['web'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Dashboard (akses semua role)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/loans', [LoanController::class, 'loans'])->name('loans');
    Route::get('/return', [LoanController::class, 'returnPage'])->name('return');
    Route::post('/items/borrow', [LoanController::class, 'borrow'])->name('items.borrow');
    Route::put('/loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');
    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::get('/logs/export/pdf', [LogController::class, 'exportPDF'])->name('logs.export.pdf');
    Route::get('/logs/export/excel', [LogController::class, 'exportExcel'])->name('logs.export.excel');
    Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam.index');
    Route::post('/pinjam/store', [PinjamController::class, 'store'])->name('pinjam.store');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::post('/pinjam-barang/{item}', [ItemController::class, 'pinjam'])->name('pinjam');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::match(['get', 'post'], '/users', [UserController::class, 'handle'])->name('users');
    Route::put('/users/{user}', [UserController::class, 'handle'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'handle'])->name('users.delete');

    Route::match(['get', 'post'], '/items', [ItemController::class, 'handle'])->name('items');
    Route::put('/items/{item}', [ItemController::class, 'handle'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'handle'])->name('items.delete');
});
