<?php

namespace Database\Factories;

use App\Models\GlassesFrameShape;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlassesFrameFactory extends Factory
{
    protected $model = \App\Models\GlassesFrame::class;

    public function definition()
    {
        // Вибираємо випадковий shape_id з наявних форм оправ
        $shapeId = GlassesFrameShape::inRandomOrder()->value('id') ?? null;

        $materials = ['metal', 'plastic', 'titanium'];
        $colors = ['black', 'brown', 'silver', 'gold', 'blue', 'red'];

        return [
            'name' => 'Frame ' . $this->faker->unique()->word(),
            'brand' => $this->faker->company(),
            'shape_id' => $shapeId,
            'material' => $this->faker->randomElement($materials),
            'width' => $this->faker->numberBetween(120, 150),
            'bridge_width' => $this->faker->numberBetween(14, 24),
            'temple_length' => $this->faker->numberBetween(135, 150),
            'lens_height' => $this->faker->numberBetween(30, 50),
            'color' => $this->faker->randomElement($colors),
            'price' => $this->faker->randomFloat(2, 500, 5000),
            'image_url' => $this->faker->imageUrl(400, 300, 'fashion', true),
        ];
    }
}
