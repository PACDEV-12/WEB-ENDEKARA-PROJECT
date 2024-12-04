<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak/kirim', [ContactController::class, 'send'])->name('contact.send');
Route::post('/pesan-whatsapp', [ProductController::class, 'sendWhatsApp'])->name('order.whatsapp');