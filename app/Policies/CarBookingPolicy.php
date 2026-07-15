<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CarBooking;

class CarBookingPolicy
{
    public function view(User $user, CarBooking $booking): bool
    {
        return
            $user->is_admin ||
            $booking->user_id === $user->id;
    }

    public function update(User $user, CarBooking $booking): bool
    {
        return
            $user->is_admin ||
            $booking->user_id === $user->id;
    }

    public function delete(User $user, CarBooking $booking): bool
    {
        return
            $user->is_admin;
    }
}