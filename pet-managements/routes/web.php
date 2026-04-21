<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

// 🏠 Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 👤 Customers
Route::resource('customers', CustomerController::class);

// 🐶 Pets
Route::resource('pets', PetController::class);

// 🛠 Services

// 📖 Care Guides (Cách nuôi)

// 👨‍💼 Employees (view tĩnh)
Route::get('/employees', function () {
    return view('employees.index');
});