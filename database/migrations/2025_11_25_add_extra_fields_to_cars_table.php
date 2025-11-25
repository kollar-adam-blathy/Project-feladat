<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('transmission')->nullable()->after('license_plate');
            $table->string('fuel_type')->nullable()->after('transmission');
            $table->integer('seats')->nullable()->after('fuel_type');
            $table->string('color')->nullable()->after('seats');
            $table->integer('mileage')->nullable()->after('color');
            $table->text('description')->nullable()->after('mileage');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['transmission', 'fuel_type', 'seats', 'color', 'mileage', 'description']);
        });
    }
};
