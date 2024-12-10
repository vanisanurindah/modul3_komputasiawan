<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminSatuanController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('shop');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/katalog', [App\Http\Controllers\KatalogController::class, 'index'])->name('katalog');
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware(['auth', 'admin.access']);
Route::resource('adminproduk', AdminProdukController::class)->middleware(['auth', 'admin.access']);
Route::resource('adminsatuan', AdminSatuanController::class)->middleware(['auth', 'admin.access']);
Route::get('export/adminproduk/excel', [ExportController::class, 'exportExcel'])->name('adminproduk.export.excel')->middleware(['auth', 'admin.access']);
Route::get('export/adminproduk/pdf', [ExportController::class, 'exportPDF'])->name('adminproduk.export.pdf')->middleware(['auth', 'admin.access']);
Route::get('export/pembelian/excel', [ExportController::class, 'exportPembelianExcel'])->name('pembelian.export.excel')->middleware(['auth', 'admin.access']);
Route::get('export/pembelian/pdf', [ExportController::class, 'exportPembelianPDF'])->name('pembelian.export.pdf');
Route::resource('admintransaksi', AdminTransaksiController::class)->middleware(['auth', 'admin.access']);
Route::resource('checkout', CheckoutController::class);

Route::get('/checkout/create/{product_id}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('auth');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('checkout', CheckoutController::class);
    Route::get('/checkout/view', [CheckoutController::class, 'viewOnly'])->name('checkout.view');
    Route::get('export/excel', [ExportController::class, 'exportExcel'])->name('export.excel');
    Route::get('export/pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/cetak-struk', [ReceiptController::class, 'index'])->name('receipt.index');
    Route::post('/order/create', [ReceiptController::class, 'createOrder'])->name('order.create');
    Route::delete('/order/{id}/cancel', [ReceiptController::class, 'cancelOrder'])->name('order.cancel');

    Route::get('/checkout/{id}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::resource('adminproduk', AdminProdukController::class)->middleware(['auth', 'admin.access']);
    Route::get('/cetak-struk', [ReceiptController::class, 'index'])->name('receipt.index');
    Route::delete('/order/{id}/cancel', [ReceiptController::class, 'cancelOrder'])->name('order.cancel');
});

