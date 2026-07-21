<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;

// GUEST (no logueado)
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::view('/login', 'auth.login')->name('login');

    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::view('/register', 'auth.register')->name('register');
});

Route::get('/', function () {
    return view('home_landing.home');
})->name('home');

Route::view('/about', 'pages.about')->name('about');

// RUTA DEL CATÁLOGO PÚBLICO
Route::get('/catalog', [StoreController::class, 'catalog'])->name('store.catalog');

use App\Http\Controllers\WishlistController;

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increment/{product}', [CartController::class, 'increment'])->name('cart.increment');
Route::post('/cart/decrement/{product}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

use App\Http\Controllers\CheckoutController;

Route::middleware('auth')->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

// RUTA DUMMY PARA EL DETALLE DEL PRODUCTO
Route::get('/products/{product}', [StoreController::class, 'show'])->name('products.show');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// solo el admin puede acceder acaaaaaaaa nereaaaaaaaaaaaaaaaaaaaaaaaaaaaa
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

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

    // USUARIOS (ADMIN)
    Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    
    // PEDIDOS (ADMIN)
    Route::get('/orders', [App\Http\Controllers\AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}/status', [App\Http\Controllers\AdminOrderController::class, 'update'])->name('admin.orders.update');

});