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
    Schema::create('helicopter_tours', function (Blueprint $table) {
        $table->id();
        $table->string('category');
        $table->string('package_name');
        $table->integer('price');
        $table->string('image')->nullable();
        $table->string('tag')->nullable();
        $table->string('duration')->nullable();
        $table->string('passenger')->nullable();
        $table->string('route')->nullable();
        $table->text('description')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helicopter_tours');
    }
};
