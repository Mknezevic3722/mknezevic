<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\isUser;
use App\Http\Middleware\isAdmin;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::middleware('auth')->group(function () {
    Route::middleware('isAdmin')->group(function () {


        Route::get('/admin', function () {
            return view('admin.index');
        })->name('admin');

        Route::get('/admin/product', [ProductController::class, "list"])->name("admin.product");
        Route::get('/admin/product/create', [ProductController::class, "create"])->name("admin.product.create");
        Route::post('/admin/product/insert', [ProductController::class, "insert"])->name("admin.product.insert");
        Route::get('/admin/product/edit/{id}', [ProductController::class, "edit"])->name("admin.product.edit");
        Route::put('/admin/product/update/{id}', [ProductController::class, "update"])->name("admin.product.update");
        Route::delete('/admin/product/delete/{id}', [ProductController::class, "delete"])->name("admin.product.delete");
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/naruci/{product}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/naruci', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/narudzbine', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/narudzbine/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/narudzbine/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});


Route::get('/istaknuto', [ProductController::class, 'istaknuto'])->name('istaknuto');
Route::view('/kontakt', 'kontakt')->name('kontakt');
Route::get('/home', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.product');
    }

    return app(\App\Http\Controllers\ProductController::class)->index();
})->name('home');
Route::get('/{category_id}', [ProductController::class, "category"])->name("product.category");

Route::middleware('auth')->group(function () {
    Route::middleware('isUser')->group(function () {
        Route::get('/product/{product_id}', [ProductController::class, "show"])->name("product.show");
    });
});
