<?php

namespace App\Console\Commands;

use App\Models\CarBooking;
use App\Models\User;
use Illuminate\Console\Command;

class SyncBookingUsers extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'sync:booking-users';

    /**
     * The console command description.
     */
    protected $description = 'Sync existing bookings with users';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $count = 0;

        foreach (CarBooking::all() as $booking) {

            $user = User::where('email', $booking->customer_email)->first();

            if ($user) {
                $booking->user_id = $user->id;
                $booking->save();

                $count++;
            }
        }

        $this->info("{$count} booking berhasil di-update.");

        return self::SUCCESS;
    }
}