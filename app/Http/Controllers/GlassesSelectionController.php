<?php

namespace App\Http\Controllers;
use App\Models\GlassesFrame;
use App\Models\GlassesFrameShape;
use App\Models\Lens;
use App\Models\Recommendation;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class GlassesSelectionController extends Controller
{
    public function index() : View {
        // Тимчасові дані для передачі у вьюшку
        $lensTypes = [
            'single_vision' => 'Однофокусні',
            'progressive' => 'Прогресивні',
            'bifocal' => 'Біфокальні',
        ];

        $faceShapes = [
            'oval' => 'Овальна',
            'round' => 'Кругла',
            'square' => 'Квадратна',
            'heart' => 'Серцеподібна',
            'diamond' => 'Ромбоподібна',
        ];

        $frameStyles = [
            'classic' => 'Класичний',
            'modern' => 'Сучасний',
            'sport' => 'Спортивний',
            'retro' => 'Ретро',
        ];

        $placeholders = [
            'myopia_strength' => '-0.25, -1.00, -2.50',
            'frame_color' => 'Наприклад: чорний, коричневий',
        ];

        return view('glasses-selection', compact('lensTypes', 'faceShapes', 'frameStyles', 'placeholders'));
    }

    public function selectGlasses(Request $request)
    {
        // 1. Отримання вхідних параметрів
        $validatedData = $request->validate([
            'right_eye_diopters' => 'required|numeric|min:-15|max:0',
            'left_eye_diopters' => 'required|numeric|min:-15|max:0',
            'pupillary_distance' => 'required|integer|min:40|max:80',
            'face_shape' => 'required|string',
            'lifestyle' => 'required|string',
            'preferred_frame_materials' => 'required|array',
            'blue_light_sensitivity' => 'required|boolean',
        ]);

        $rightEyeDiopters = (float) $validatedData['right_eye_diopters'];
        $leftEyeDiopters = (float) $validatedData['left_eye_diopters'];
        $pupillaryDistance = (int) $validatedData['pupillary_distance'];
        $faceShape = $validatedData['face_shape'];
        $lifestyle = $validatedData['lifestyle'];
        $preferredFrameMaterials = $validatedData['preferred_frame_materials'];
        $blueLightSensitivity = (bool) $validatedData['blue_light_sensitivity'];

        // 2. Розрахунок рекомендованого індексу заломлення
        $maxDiopter = max(abs($rightEyeDiopters), abs($leftEyeDiopters));

        $lensIndex = match (true) {
            $maxDiopter <= 2.0 => 1.5,
            $maxDiopter <= 4.0 => 1.6,
            $maxDiopter <= 6.0 => 1.67,
            default => 1.74,
        };

        // 3. Визначення матеріалу лінз
        $lensMaterial = ($lifestyle === 'active') ? 'polycarbonate' : 'plastic';

        // 4. Визначення додаткових опцій
        $uvProtection = true;
        $blueLightFilter = $blueLightSensitivity;

        // 5. Оцінка товщини лінз (приблизно)
        $baseThickness = 1.0; // мм
        $avgFrameSize = 50; // мм
        $thicknessCoefficient = 1.5 / $lensIndex;
        $lensThickness = $baseThickness + $maxDiopter * $thicknessCoefficient * ($avgFrameSize / 50);

        // 6. Відбір оправ за формою обличчя
        $suitableFrameShapes = GlassesFrameShape::whereJsonContains('suitable_face_shapes', $faceShape)->pluck('id');

        // 7. Відбір оправ за матеріалом
        $filteredFrames = GlassesFrame::whereIn('shape_id', $suitableFrameShapes)
            ->whereIn('material', $preferredFrameMaterials)
            ->get();

        // 8. Відбір рекомендованих лінз
        $filteredLenses = Lens::where('index', $lensIndex)
            ->where('material', $lensMaterial)
            ->where('uv_protection', $uvProtection)
            ->when($blueLightFilter, function ($query) {
                return $query->where('blue_light_filter', true);
            })
            ->get();

        // 9. Формування результатів
        $recommendedLenses = $filteredLenses->map(function ($lens) use ($lensThickness) {
            return [
                'name' => $lens->name,
                'index' => $lens->index,
                'material' => $lens->material,
                'uv_protection' => $lens->uv_protection,
                'blue_light_filter' => $lens->blue_light_filter,
                'estimated_thickness_mm' => round($lensThickness, 2),
                'price' => $lens->price,
            ];
        });

        $recommendedFrames = $filteredFrames->map(function ($frame) {
            return [
                'name' => $frame->name,
                'shape' => $frame->shape->name,
                'material' => $frame->material,
                'width' => $frame->width,
                'bridge_width' => $frame->bridge_width,
                'temple_length' => $frame->temple_length,
                'color' => $frame->color,
                'price' => $frame->price,
            ];
        });

        // 10. Підготовка відповіді
        $summary = sprintf(
            "Рекомендовано лінзи з індексом заломлення %.2f, матеріал %s. Товщина лінз по краях приблизно %.2f мм. Підібрано оправи, сумісні з формою обличчя '%s' та вашими перевагами по матеріалу.",
            $lensIndex,
            $lensMaterial,
            round($lensThickness, 2),
            $faceShape
        );

        return response()->json([
            'recommended_lenses' => $recommendedLenses,
            'recommended_frames' => $recommendedFrames,
            'summary' => $summary,
        ]);
    }

}
