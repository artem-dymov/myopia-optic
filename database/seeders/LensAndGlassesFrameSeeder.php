<?php

namespace Database\Seeders;

use App\Models\GlassesFrame;
use App\Models\Lens;
use Illuminate\Database\Seeder;

class LensAndGlassesFrameSeeder extends Seeder
{
    public function run()
    {
        // Генеруємо 10 лінз
        Lens::factory()->count(200)->create();

        // Генеруємо 10 оправ
        GlassesFrame::factory()->count(200)->create();
    }
}
