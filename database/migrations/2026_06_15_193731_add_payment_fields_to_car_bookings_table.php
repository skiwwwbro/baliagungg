<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('car_bookings', function (Blueprint $table) {
        $table->string('booking_code')->nullable()->after('id');
        $table->integer('deposit_amount')->default(100000);
        $table->string('payment_status')->default('unpaid');
        $table->string('snap_token')->nullable();
        $table->string('midtrans_order_id')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_bookings', function (Blueprint $table) {
            //
        });
    }
};
