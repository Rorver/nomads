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

Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/detail', [DetailController::class, 'index']) -> name('detail');
Route::get('/checkout', [CheckoutController::class, 'index']) -> name('checkout');
Route::get('/checkout/success', [CheckoutController::class, 'success']) -> name('success');

Route::prefix('admin') -> controller(DashboardController::class) -> middleware(['auth', 'admin']) -> group(function () {
    Route::get('/', 'index') -> name('dashboard');

    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
});



// Route::prefix('admin') -> namespace('Admin') -> group(function() {
//     Route::get('/', 'DashboardController@index') -> name('dashboard');
// });

Auth::routes(['verify' => true]);
