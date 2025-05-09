<?php

namespace Database\Seeders;

use App\Models\FaceShape;
use App\Models\GlassesFrameShape;
use Illuminate\Database\Seeder;

class FaceAndFrameShapesSeeder extends Seeder
{
    public function run()
    {
        // Форми обличчя
        $faceShapes = [
            ['name' => 'oval', 'description' => 'Овальна форма обличчя'],
            ['name' => 'round', 'description' => 'Кругла форма обличчя'],
            ['name' => 'square', 'description' => 'Квадратна форма обличчя'],
            ['name' => 'diamond', 'description' => 'Ромбоподібна форма обличчя'],
            ['name' => 'triangle', 'description' => 'Трикутна форма обличчя'],
        ];

        foreach ($faceShapes as $fs) {
            FaceShape::updateOrCreate(['name' => $fs['name']], $fs);
        }

        // Форми оправ з сумісністю (масив ID форм обличчя)
        $faceShapeIds = FaceShape::pluck('id', 'name')->toArray();

        $frameShapes = [
            [
                'name' => 'oval',
                'description' => 'Овальна форма оправи',
                'suitable_face_shapes' => json_encode([
                    $faceShapeIds['oval'] ?? null,
                    $faceShapeIds['round'] ?? null,
                    $faceShapeIds['square'] ?? null,
                ]),
            ],
            [
                'name' => 'round',
                'description' => 'Кругла форма оправи',
                'suitable_face_shapes' => json_encode([
                    $faceShapeIds['square'] ?? null,
                    $faceShapeIds['diamond'] ?? null,
                ]),
            ],
            [
                'name' => 'rectangular',
                'description' => 'Прямокутна форма оправи',
                'suitable_face_shapes' => json_encode([
                    $faceShapeIds['round'] ?? null,
                    $faceShapeIds['triangle'] ?? null,
                ]),
            ],
            // Додайте інші форми за потребою
        ];

        foreach ($frameShapes as $fs) {
            GlassesFrameShape::updateOrCreate(['name' => $fs['name']], $fs);
        }
    }
}
