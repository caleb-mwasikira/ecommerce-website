<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
})->name("home");

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