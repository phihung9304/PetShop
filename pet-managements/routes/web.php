<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CareGuideController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RevenueController;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('customers', CustomerController::class);

Route::resource('pets', PetController::class);

Route::resource('services', ServiceController::class);

Route::resource('care-guides', CareGuideController::class);

Route::resource('employees', EmployeeController::class);

Route::resource('products', ProductController::class);

Route::resource('inventories', InventoryController::class);

Route::resource('invoices', InvoiceController::class);

Route::get('/revenue', [RevenueController::class, 'index']);