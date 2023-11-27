<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;

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

//User Auth Routes
Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
    Route::middleware('auth')->group(function () {

        //dashoard Route
        Route::get('/', [CollectorController::class, 'index'])->name('admin.index');

        //Property Routes
        Route::get('/select', [PropertyController::class, 'select'])->name('admin.select');
        Route::get('{property}/select', [PropertyController::class, 'session'])->name('admin.session');

        //Accommodation Routes
        Route::get('/report', [AccommodationController::class, 'index'])->name('admin.report');
        Route::get('/report2', [AccommodationController::class, 'index2'])->name('admin.report2');
        Route::post('/report', [AccommodationController::class, 'create'])->name('admin.report.create');
        Route::post('/report/declaration', [AccommodationController::class, 'declaration'])->name('admin.report.declaration');
        Route::post('/report/import', [AccommodationController::class, 'import'])->name('admin.report.import');
        Route::get('/report/{accommodation}/update', [AccommodationController::class, 'index'])->name('admin.report.update');
        Route::put('/report/{accommodation}/update', [AccommodationController::class, 'update'])->name('admin.report.id.update');
        Route::delete('/report/{accommodation}/destroy', [AccommodationController::class, 'destroy'])->name('admin.report.id.destroy');

        //Declaration Routes
        Route::post('/Declaration', [DeclarationController::class, 'store'])->name('admin.declaration.store');
        Route::post('/Declaration/emptypayment', [DeclarationController::class, 'emptyPayment'])->name('admin.declaration.emptypayment');

        //payment Routes
        Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment');
        Route::post('/payment', [PaymentController::class, 'option'])->name('admin.payment.option');
        Route::get('/payment/online-payment', [PaymentController::class, 'bosl'])->name('admin.payment.bosl');
        Route::post('/payment/deposit/{declaration}/{month}/{year}', [PaymentController::class, 'depositStore'])->name('admin.payment.depositStore');
        Route::get('/payment-history', [PaymentController::class, 'history'])->name('admin.history');
        Route::get('/{recepit}/payment', [PaymentController::class, 'recepit'])->name('admin.recepit');
        Route::get('/invoices', [PaymentController::class, 'invoices'])->name('admin.invoices');
        Route::get('/{invoice}/invoice', [PaymentController::class, 'invoice'])->name('admin.invoice');
        Route::get('/{invoice}/invoice/payment', [PaymentController::class, 'invoicePayment'])->name('admin.invoicePayment');

        //User Routes
        Route::get('admin/user/create', [UserController::class, 'index'])->name('user.index');
        Route::post('admin/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('admin/user/create2', [UserController::class, 'create2'])->name('user.create2');
        Route::get('admin/user/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
        Route::put('admin/user/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
    });
});
