<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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

/**
 * Product routes
 */

Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'view_all_products')
        ->name("home");
    Route::get('/products', 'view_all_products')
        ->name("view-all-products");
    Route::get("/products/{id}", "view_product")
        ->whereNumber("id")
        ->name("view-product");
    Route::get("/products/add", "add_product")
        ->name("view-add-product-form");
    Route::get("/products/{id}/edit", "edit_product")
        ->whereNumber("id")
        ->name("view-edit-product-form");
});

/**
 * Review routes
 */
Route::controller(ReviewController::class)->group(function () {
    Route::post("/reviews", "add_review")
        ->name("add-review");
    Route::delete("/reviews/{review_id}", "delete_review")
        ->whereNumber("review_id")
        ->name("delete-review");
});

/**
 * Authentication routes
 */
Route::view("/register", "auth.register")
    ->name("register")
    ->middleware("guest");
Route::view("/login", "auth.login")
    ->name("login")
    ->middleware("guest");

Route::controller(AuthController::class)->group(function () {
    Route::post("/register", "register");
    Route::post("/login", "login");
    Route::post("/logout", "logout")
        ->name("logout");
});

// TODO: Implement the forgot-password feature
