<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('category')->nullable()->after('id');
            $table->string('name')->nullable()->after('category');
            $table->integer('price_per_day')->default(0)->after('name');
            $table->string('image')->nullable()->after('price_per_day');
            $table->string('tag')->nullable()->after('image');
            $table->string('passenger')->nullable()->after('tag');
            $table->string('service')->nullable()->after('passenger');
            $table->string('purpose')->nullable()->after('service');
            $table->text('description')->nullable()->after('purpose');
            $table->boolean('is_active')->default(true)->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'name',
                'price_per_day',
                'image',
                'tag',
                'passenger',
                'service',
                'purpose',
                'description',
                'is_active',
            ]);
        });
    }
};