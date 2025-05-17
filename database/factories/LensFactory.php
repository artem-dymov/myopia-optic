<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LensFactory extends Factory
{
    protected $model = \App\Models\Lens::class;

    public function definition()
    {

        // Генеруємо назву з випадкової кількості слів від 1 до 4
        $wordsCount = $this->faker->numberBetween(1, 4);
        $name = ucfirst($this->faker->words($wordsCount, true)); // true - повертає рядок, не масив

        $materials = ['plastic', 'polycarbonate', 'trivex'];
        return [
            'name' => 'Lens ' . $name,
            'brand' => $this->faker->company(),
            'index' => $this->faker->randomFloat(2, 1.5, 1.74),
            'material' => $this->faker->randomElement($materials),
            'uv_protection' => true,
            'blue_light_filter' => $this->faker->boolean(50),
            'photochromic' => $this->faker->boolean(30),
            'anti_scratch' => $this->faker->boolean(80),
            'anti_reflective' => $this->faker->boolean(70),
            'water_repellent' => $this->faker->boolean(40),
            'price' => $this->faker->randomFloat(2, 200, 1500),
        ];
    }
}
