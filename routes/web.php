<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WalletsController;
use App\Http\Controllers\Admin\WalletTransactionController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::get('/wallets', [WalletsController::class, 'index'])->name('wallets');
    Route::get('/wallets/add', [WalletsController::class, 'create'])->name('wallet_add');
    Route::get('/wallets/{id}', [WalletsController::class, 'edit'])->name('wallet_edit');
    Route::post('/wallets', [WalletsController::class, 'store'])->name('wallet_store');
    Route::post('/wallets/{id}', [WalletsController::class, 'update'])->name('wallet_update');

    Route::get('/transaction/{type}/{id}', [WalletTransactionController::class, 'create'])->name('transaction_add');
    Route::post('/transaction', [WalletTransactionController::class, 'store'])->name('transaction_store');
    Route::get('/wallets/transaction/{id}', [WalletTransactionController::class, 'index'])->name('wallet_transaction');

    Route::middleware(['permission:users'])->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::get('/users/wallet/{id}', [UsersController::class, 'wallets'])->name('user_wallets');
    });
});

