<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes - QuantumMart Admin Version (Purple Theme Ready)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/* --- SISTEM LOGIN & LOGOUT MANUAL --- */
Route::get('/login', function () { 
    return view('auth.login'); 
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard');
    }
    return back()->withErrors(['email' => 'Login gagal, periksa email/password.']);
});

Route::match(['get', 'post'], '/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


/* --- GRUP MENU ADMIN --- */
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // 1. Menu Kategori
    Route::resource('category', CategoryController::class);
    Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');

    // 2. Menu Produk
    Route::resource('product', ProductController::class);
    Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
    Route::get('/auth/product', [ProductController::class, 'index']); 

    // 3. Menu Pesanan & Order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/index', [OrderController::class, 'index']); 
    
    // ACTION: UPDATE STATUS & DELETE (Pastikan URL dan Nama Route Sesuai)
    Route::post('/orders/status/{id}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    
    // 4. Menu Laporan
    Route::get('/reports', [OrderController::class, 'reports'])->name('reports.index');
    Route::get('/laporan', [OrderController::class, 'reports'])->name('laporan.index');
});