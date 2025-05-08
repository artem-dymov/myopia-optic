<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->decimal('index', 3, 2); // індекс заломлення, наприклад 1.5, 1.67
            $table->string('material');
            $table->boolean('uv_protection')->default(true);
            $table->boolean('blue_light_filter')->default(false);
            $table->boolean('photochromic')->default(false);
            $table->boolean('anti_scratch')->default(false);
            $table->boolean('anti_reflective')->default(false);
            $table->boolean('water_repellent')->default(false);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lenses');
    }
};
