<?php

namespace App\Providers;

use App\Models\CarBooking;
use App\Policies\CarBookingPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(
            CarBooking::class,
            CarBookingPolicy::class
        );

        View::composer('admin.*', function ($view) {
            $newOrders = CarBooking::where('is_read', false)->count();

            $view->with('newOrders', $newOrders);
        });
    }
}