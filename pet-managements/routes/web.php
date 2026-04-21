<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CareGuideController;

// 🏠 Dashboard
Route::get('/', [DashboardController::class, 'index']);

// 👤 Customers
Route::resource('customers', CustomerController::class);

// 🐶 Pets
Route::resource('pets', PetController::class);

// 👨‍💼 Employees (view tĩnh)
Route::get('/employees', function () {
    return view('employees.index');
});

Route::resource('care-guides', CareGuideController::class);

Route::resource('services', ServiceController::class);