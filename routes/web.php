<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $cars = \App\Models\Car::take(6)->get();
    return view('home', compact('cars'));
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/my-rentals', function () {
        $rentals = \App\Models\Rental::where('user_id', Auth::id())->with('car')->latest()->get();
        return view('my-rentals', compact('rentals'));
    });
    
    Route::post('/rentals', [RentalController::class, 'store']);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::post('/users', [AdminController::class, 'createUser']);
    Route::patch('/users/{id}/toggle-admin', [AdminController::class, 'toggleAdmin']);
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);
    
    Route::get('/cars', [AdminController::class, 'cars']);
    Route::get('/cars/create', [AdminController::class, 'createCarForm']);
    Route::post('/cars', [AdminController::class, 'storeCar']);
    Route::delete('/cars/{id}', [AdminController::class, 'deleteCar']);
});

Route::resource('cars', CarController::class);
Route::resource('customers', CustomerController::class);
Route::resource('rentals', RentalController::class);
