<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('glasses_frames', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->foreignId('shape_id')->constrained('glasses_frame_shapes')->cascadeOnDelete();
            $table->string('material');
            $table->integer('width'); // мм
            $table->integer('bridge_width'); // мм
            $table->integer('temple_length'); // мм
            $table->integer('lens_height')->nullable(); // мм
            $table->string('color')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('glasses_frames');
    }
};
