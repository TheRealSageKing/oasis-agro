<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\PortfolioController;
use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\InvestmentController;
use App\Http\Controllers\Client\PaymentController;

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
    return view('index');
})->name('base');
Route::get('/about-us', function () {
    return view('about');
})->name('about');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/contact-us', function () {
    return view('contact');
})->name('contact-us');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('client.index');
Route::get('/oasis-admin', [HomeController::class, 'administrator'])->name('admin.index');

//Client
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function(){
    Route::get('/my-portfolio', [PortfolioController::class, 'index'])->name('client.portfolio.index');
    Route::get('/payments', [PaymentController::class, 'index'])->name('client.payments.index');
    Route::get('/invest', [InvestmentController::class, 'index'])->name('client.investments.index');
    Route::get('/my-account', [AccountController::class, 'index'])->name('client.account.index');
    Route::get('/logout', [AccountController::class, 'logout'])->name('client.account.logout');
});
