<?php

namespace App\Http\Controllers;
use App\Models\GlassesFrame;
use App\Models\GlassesFrameShape;
use App\Models\Lens;
use App\Models\FaceShape;
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
        $validatedData = $request->validate([
            'right_eye_diopters' => 'required|numeric|min:-15|max:0',
            'left_eye_diopters' => 'required|numeric|min:-15|max:0',
            'pupillary_distance' => 'required|integer|min:40|max:80',
            'face_shape' => 'required|string',
            'lifestyle' => 'required|string',
            'preferred_frame_materials' => 'required|array',
            'blue_light_sensitivity' => 'required|boolean',
        ]);

        // Отримання даних
        $rightEyeDiopters = (float)$validatedData['right_eye_diopters'];
        $leftEyeDiopters = (float)$validatedData['left_eye_diopters'];
        $pupillaryDistance = (int)$validatedData['pupillary_distance'];
        $faceShape = $validatedData['face_shape'];
        $lifestyle = $validatedData['lifestyle'];
        $preferredFrameMaterials = $validatedData['preferred_frame_materials'];
        $blueLightSensitivity = (bool)$validatedData['blue_light_sensitivity'];

        // Розрахунок індексу заломлення
        function calculateRefractiveIndex($leftDiopter, $rightDiopter, $nMin = 1.50, $nMax = 1.74, $dMax = 10.0) {
            $D = max(abs($leftDiopter), abs($rightDiopter));
            
            if ($D >= $dMax) {
                return $nMax;
            }

            // лінійна інтерполяція
            $n = $nMin + ($nMax - $nMin) * ($D / $dMax);
            return round($n, 2);
        }

        $lensIndex = calculateRefractiveIndex($leftEyeDiopters, $rightEyeDiopters);

        // Визначення матеріалу лінз
        $lensMaterial = ($lifestyle === 'active') ? 'polycarbonate' : 'plastic';

        // Фільтрація лінз
        $filteredLenses = Lens::where('index', $lensIndex)
            ->where('material', $lensMaterial)
            ->where('uv_protection', true)
            ->when($blueLightSensitivity, fn($q) => $q->where('blue_light_filter', true))
            ->limit(20)
            ->get();

        // Фільтрація оправ
        $suitableFrameShapes = GlassesFrameShape::whereJsonContains(
                'suitable_face_shapes',
                FaceShape::where('name', '=', $faceShape)->pluck('id')
            )
            ->pluck('id');

        // Врахування міжзіничної відстані
        $minBridgeWidth = $pupillaryDistance - 2;
        $maxBridgeWidth = $pupillaryDistance + 2;

        $filteredFrames = GlassesFrame::whereIn('shape_id', $suitableFrameShapes)
            ->whereIn('material', $preferredFrameMaterials)
            ->whereBetween('bridge_width', [$minBridgeWidth, $maxBridgeWidth])
            ->limit(20)
            ->get();

        $filteredFrames->transform(function ($frame) {
            $frame->shape_name = $frame->shape ? $frame->shape->name : 'Невідома форма';
            return $frame;
        });

        // Збереження рекомендації
        Recommendation::create([
            'user_id' => Auth::id(),
            'input_parameters' => $validatedData,
            'recommended_frames' => $filteredFrames,
            'recommended_lenses' => $filteredLenses
        ]);

        return response()->json([
            'recommended_lenses' => $filteredLenses,
            'recommended_frames' => $filteredFrames,
            'summary' => "Підбір успішний. Знайдено лінз: " . $filteredLenses->count() . ", оправ: " . $filteredFrames->count()
        ]);
    }


}
