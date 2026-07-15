<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBooking;
use App\Models\HelicopterTour;
use App\Models\Motorcycle;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $todayRevenue = CarBooking::where('payment_status', 'paid')
            ->whereDate('created_at', today())
            ->sum('total_amount');

        $monthRevenue = CarBooking::where('payment_status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');

        $yearRevenue = CarBooking::where('payment_status', 'paid')
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');

        $totalRevenue = CarBooking::where('payment_status', 'paid')
            ->sum('total_amount');

        $totalBookings = CarBooking::count();
        $pendingBookings = CarBooking::where('status', 'pending')->count();
        $confirmedBookings = CarBooking::where('status', 'confirmed')->count();
        $completedBookings = CarBooking::where('status', 'completed')->count();
        $cancelledBookings = CarBooking::where('status', 'cancelled')->count();

        $paidBookings = CarBooking::where('payment_status', 'paid')->count();
        $unpaidBookings = CarBooking::where('payment_status', 'unpaid')->count();

        $customers = User::where('is_admin', 0)->count();

        $totalCars = Car::count();
        $activeCars = Car::where('is_active', true)->count();

        $totalMotorcycles = Motorcycle::count();
        $activeMotorcycles = Motorcycle::where('is_active', true)->count();

        $totalHelicopterTours = HelicopterTour::count();
        $activeHelicopterTours = HelicopterTour::where('is_active', true)->count();

        $latestBookings = CarBooking::latest()
            ->take(6)
            ->get();

        $topVehicles = CarBooking::select('car_name', DB::raw('COUNT(*) as total'))
            ->where('service_type', 'car')
            ->groupBy('car_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $topMotorcycles = CarBooking::select('car_name', DB::raw('COUNT(*) as total'))
            ->where('service_type', 'motorcycle')
            ->groupBy('car_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $topTours = CarBooking::select('car_name', DB::raw('COUNT(*) as total'))
            ->where('service_type', 'helicopter')
            ->groupBy('car_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $bookingTrendLabels = [];
        $bookingTrendData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $bookingTrendLabels[] = $date->format('d M');
            $bookingTrendData[] = CarBooking::whereDate('created_at', $date)->count();
        }

        return view('admin.dashboard', compact(
            'todayRevenue',
            'monthRevenue',
            'yearRevenue',
            'totalRevenue',
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'cancelledBookings',
            'paidBookings',
            'unpaidBookings',
            'customers',
            'totalCars',
            'activeCars',
            'totalMotorcycles',
            'activeMotorcycles',
            'totalHelicopterTours',
            'activeHelicopterTours',
            'latestBookings',
            'topVehicles',
            'topMotorcycles',
            'topTours',
            'bookingTrendLabels',
            'bookingTrendData'
        ));
    }
}