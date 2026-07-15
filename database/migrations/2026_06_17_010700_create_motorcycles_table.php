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
    Schema::create('motorcycles', function (Blueprint $table) {
        $table->id();
        $table->string('category');
        $table->string('name');
        $table->integer('price_per_day');
        $table->string('image')->nullable();
        $table->string('tag')->nullable();
        $table->string('cc')->nullable();
        $table->string('fuel')->nullable();
        $table->string('transmission')->nullable();
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
        Schema::dropIfExists('motorcycles');
    }
};
