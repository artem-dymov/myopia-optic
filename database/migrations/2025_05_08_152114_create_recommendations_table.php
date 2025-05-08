<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable()->index();
            $table->json('input_parameters')->nullable(); // збережені вхідні дані (без персональних даних)
            $table->json('recommended_frames')->nullable(); // масив з ID або описом оправ (glasses_frames)
            $table->json('recommended_lenses')->nullable(); // масив з ID або описом лінз
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
