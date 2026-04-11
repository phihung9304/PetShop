<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pet;

class DashboardController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $petCount = Pet::count();

        return view('dashboard', compact('customerCount', 'petCount'));
    }
}