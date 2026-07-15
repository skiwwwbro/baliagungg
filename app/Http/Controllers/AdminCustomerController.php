<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('is_admin', 0)
            ->latest()
            ->paginate(12);

        return view('admin.customers.index', compact('customers'));
    }
}