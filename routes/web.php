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

Route::get('/', [ProductController::class, "view_all_products"])
    ->name("home");
Route::get('/products', [ProductController::class, "view_all_products"])
    ->name("view-all-products");
Route::get('/products/{id}', [ProductController::class, "view_product"])
    ->whereNumber("id")
    ->name("view-product");
Route::get("/products/add", [ProductController::class, "add_product"])
    ->name("view-add-product-form");
Route::get("/products/{id}/edit", [ProductController::class, "edit_product"])
    ->whereNumber("id")
    ->name("view-edit-product-form");
Route::post("/products/{id}/reviews/add", [ReviewController::class, "add_review"])
    ->whereNumber("id")
    ->name("add_review");

/**
 * Authentication routes
 */
Route::get("/register", function () {
    return view("auth.register");
})
    ->name("register")
    ->middleware("guest");
Route::post("/register", [AuthController::class, "register"]);

Route::get("/login", function () {
    return view("auth.login");
})
    ->name("login")
    ->middleware("guest");
Route::post("/login", [AuthController::class, "login"]);

Route::post("/logout", [AuthController::class, "logout"])
    ->name("logout");

// TODO: Implement the forgot-password feature
