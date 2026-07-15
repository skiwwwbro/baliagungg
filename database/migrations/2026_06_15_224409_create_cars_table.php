<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('category');
            $table->string('name');
            $table->integer('price_per_day');

            $table->string('image')->nullable();
            $table->string('tag')->nullable();
            $table->string('passenger')->nullable();
            $table->string('service')->nullable();
            $table->string('purpose')->nullable();

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};