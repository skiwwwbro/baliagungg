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
    Schema::create('car_bookings', function (Blueprint $table) {
        $table->id();

        $table->string('car_name');
        $table->string('car_category')->nullable();
        $table->string('price')->nullable();

        $table->string('customer_name');
        $table->string('customer_phone');
        $table->string('customer_email')->nullable();

        $table->date('pickup_date');
        $table->time('pickup_time')->nullable();
        $table->date('return_date')->nullable();

        $table->string('pickup_location');
        $table->text('note')->nullable();

        $table->string('status')->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_bookings');
    }
};
