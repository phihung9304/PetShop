<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CareGuideController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

// 🏠 Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 👤 Customers
Route::resource('customers', CustomerController::class);

// 🐶 Pets
Route::resource('pets', PetController::class);

// 🛠 Services
Route::resource('services', ServiceController::class);

// 📖 Care Guides 
Route::resource('care-guides', CareGuideController::class);

// 👨‍💼 Employees 
Route::resource('employees', EmployeeController::class);

// Product
Route::resource('products', ProductController::class);
