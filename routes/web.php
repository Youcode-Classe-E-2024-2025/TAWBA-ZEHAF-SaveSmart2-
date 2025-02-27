<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Registration
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return view('welcome');
// });
