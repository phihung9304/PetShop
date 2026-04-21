<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pet;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $petCount = Pet::count();
        $serviceCount = Service::count(); 
        return view('dashboard', compact(
            'customerCount',
            'petCount',
            'serviceCount' 
        ));
    }
}