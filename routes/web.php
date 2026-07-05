<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCatalogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RoleSelectionController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductCatalogController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductCatalogController::class, 'show'])->name('products.show');
Route::get('/stores/{id}', [ProductCatalogController::class, 'showStore'])->name('stores.show');
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Guest only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/select-role', [RoleSelectionController::class, 'show'])->name('select-role');
    Route::post('/select-role', [RoleSelectionController::class, 'select'])->name('select-role.store');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Dashboard routes protected by active role middleware
    Route::middleware(['ensure_role'])->group(function () {
        Route::get('/dashboard/buyer', function () {
            return view('dashboard.buyer.index');
        })->middleware('role:buyer')->name('dashboard.buyer');

        Route::get('/dashboard/seller', function () {
            return view('dashboard.seller.index');
        })->middleware('role:seller')->name('dashboard.seller');

        Route::get('/dashboard/driver', function () {
            return view('dashboard.driver.index');
        })->middleware('role:driver')->name('dashboard.driver');

        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin.index');
        })->middleware('role:admin')->name('dashboard.admin');

        // Seller Specific Management Routes
        Route::middleware('role:seller')->group(function () {
            Route::get('/seller/store/create', [StoreController::class, 'create'])->name('seller.store.create');
            Route::post('/seller/store', [StoreController::class, 'store'])->name('seller.store.store');
            Route::get('/seller/store/edit', [StoreController::class, 'edit'])->name('seller.store.edit');
            Route::put('/seller/store', [StoreController::class, 'update'])->name('seller.store.update');

            Route::resource('/seller/products', ProductController::class)->names('seller.products');
        });
    });
});
