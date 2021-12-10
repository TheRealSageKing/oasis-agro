<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\PortfolioController;
use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\InvestmentController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\DashboardController as ClientController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\InvestmentController as AdminInvestmentController;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\CustomerController;

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
Route::get('/our-products', function () {
    return view('products');
})->name('products');

Route::get('/our-products/maize', function () {
    return view('products.maize');
})->name('products.maize');

Route::get('/our-products/cassava', function () {
    return view('products.cassava');
})->name('products.cassava');

Route::get('/our-products/palm-oil', function () {
    return view('products.palmoil');
})->name('products.palmoil');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact-us');

Auth::routes();

Route::get('/dashboard', [ClientController::class, 'index'])->name('client.index')->middleware('role:Client');;
Route::get('/oasis-admin/dashboard', [DashboardController::class, 'index'])->name('admin.index')->middleware('role:Administrator');;
Route::get('/super/dashboard', [DashboardController::class, 'super'])->name('super.index')->middleware('role:Super Administrator');

//Client
Route::group(['middleware' => ['auth', 'role:Client'], 'prefix' => 'dashboard'], function(){
    Route::get('/my-portfolio', [PortfolioController::class, 'index'])->name('client.portfolio.index');
    Route::get('/payments', [PaymentController::class, 'index'])->name('client.payments.index');
    Route::get('/payments/history', [PaymentController::class, 'history'])->name('client.payments.history');
    Route::post('/payments/request', [PaymentController::class, 'request'])->name('client.payments.request');
    Route::get('/invest', [InvestmentController::class, 'index'])->name('client.investments.index');
    Route::get('/my-account', [AccountController::class, 'index'])->name('client.account.index');

    Route::get('/packages', [PackageController::class, 'list'])->name('client.packages.index');
    Route::get('/packages/detail/{id}', [PackageController::class, 'edit'])->name('client.packages.detail');

    Route::get('/investment/create', [InvestmentController::class, 'create'])->name('client.investments.create');
    Route::post('/investment/create', [InvestmentController::class, 'store'])->name('client.investments.store');
    Route::post('/investment/cancel/{id}', [InvestmentController::class, 'cancel'])->name('client.investments.cancel');
});

//Administrator
Route::group(['middleware' => ['auth', 'role:Administrator'], 'prefix' => 'oasis-admin'], function(){
    Route::get('/packages', [PackageController::class, 'index'])->name('admin.packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('admin.packages.create');
    Route::post('/packages/create', [PackageController::class, 'store'])->name('admin.packages.store');
    Route::get('/packages/edit/{id}', [PackageController::class, 'edit'])->name('admin.packages.edit');
    Route::post('/packages/edit/{id}', [PackageController::class, 'update'])->name('admin.packages.update');
    Route::delete('/packages/delete/{id}', [PackageController::class, 'destroy'])->name('admin.packages.destroy');
    Route::get('/packages/{id}', [PackageController::class, 'show'])->name('admin.packages.show');

    Route::get('/investments', [AdminInvestmentController::class, 'index'])->name('admin.investments.index');
    Route::get('/investments', [AdminInvestmentController::class, 'index'])->name('admin.investments.index');
    Route::get('/investments/{id}', [AdminInvestmentController::class, 'show'])->name('admin.investments.show');

    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('admin.customers.show');

    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/request', [AdminPaymentController::class, 'create'])->name('admin.payments.requests');
    Route::post('/payments/fulfilled', [AdminPaymentController::class, 'store'])->name('admin.payments.fulfilled');
    Route::get('/payments/{id}', [AdminPaymentController::class, 'show'])->name('admin.payments.show');

    Route::get('/my-account', [AdminAccountController::class, 'index'])->name('admin.account.index');
    Route::post('/update', [AdminAccountController::class, 'update'])->name('admin.account.update');
    Route::post('/update-password', [AdminAccountController::class, 'updatePassword'])->name('admin.account.update_password');
});
