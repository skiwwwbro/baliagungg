<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;
use Carbon\Carbon;

class AdminRevenueController extends Controller
{
    public function index()
    {
        return view('admin.revenue.index', [
            'totalRevenue' => CarBooking::where('payment_status', 'paid')->sum('total_amount'),
            'monthRevenue' => CarBooking::where('payment_status', 'paid')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total_amount'),
            'paidBookings' => CarBooking::where('payment_status', 'paid')->count(),
            'unpaidBookings' => CarBooking::where('payment_status', 'unpaid')->count(),
            'latestPaidBookings' => CarBooking::where('payment_status', 'paid')
                ->latest()
                ->paginate(10),
        ]);
    }
}