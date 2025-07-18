<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/categories/{category}/products', [ProductController::class, 'productsByCategory'])->name('products.by.category');

Route::get('/categories-view', [CategoryController::class, 'productView'])->name('categories.view');

// Produk per kategori
Route::get('/category/{id}/produk', [CategoryController::class, 'show'])->name('category.products');

Route::get('/products-view', [ProductController::class, 'view'])->name('products.view');

// Detail produk
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/register', fn () => redirect()->route('register.user.form'))->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/user', [AuthController::class, 'showUserRegisterForm'])->name('register.user.form');
Route::post('/register/user', [AuthController::class, 'registerUser'])->name('register.user');

Route::get('/register/admin', [AuthController::class, 'showAdminRegisterForm'])->name('register.admin.form');
Route::post('/register/admin', [AuthController::class, 'registerAdmin'])->name('register.admin');

Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Produk CRUD
    Route::resource('/products', ProductController::class);

    // Kategori
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
});
