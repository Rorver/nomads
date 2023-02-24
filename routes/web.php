<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [HomeController::class, 'index'])
    -> name('home');

Route::get('/detail/{slug}', [DetailController::class, 'index'])
    -> name('detail');

Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
    -> name('checkout_proses')
    -> middleware(['auth', 'verified']);

Route::post('/checkout/{id}', [CheckoutController::class, 'index'])
    -> name('checkout')
    -> middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
    -> name('checkout_create')
    -> middleware(['auth', 'verified']);

Route::post('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
    -> name('checkout_remove')
    -> middleware(['auth', 'verified']);

Route::post('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
    -> name('checkout_success')
    -> middleware(['auth', 'verified']);

Route::prefix('admin') -> controller(DashboardController::class)
    -> middleware(['auth', 'admin'])
    -> group(function () {
        Route::get('/', 'index')
            -> name('dashboard');

        Route::resource('travel-package', TravelPackageController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('transaction', TransactionController::class);
});

Auth::routes(['verify' => true]);
