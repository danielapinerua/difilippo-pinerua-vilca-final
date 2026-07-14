<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('home_landing.home');
})->name('home');

Route::view('/about', 'pages.about')->name('about');

// RUTA DEL CATÁLOGO PÚBLICO
Route::get('/catalog', [StoreController::class, 'catalog'])->name('store.catalog');

// RUTAS DUMMY PARA CARRITO Y WISHLIST
Route::post('/cart/add/{product}', function() {})->name('cart.add');
Route::post('/wishlist/add/{product}', function() {})->name('wishlist.add');

// RUTA DUMMY PARA EL DETALLE DEL PRODUCTO
Route::get('/products/{product}', [StoreController::class, 'show'])->name('products.show');

// GUEST (no logueado)
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// solo el admin puede acceder acaaaaaaaa nereaaaaaaaaaaaaaaaaaaaaaaaaaaaa
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::patch('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

});