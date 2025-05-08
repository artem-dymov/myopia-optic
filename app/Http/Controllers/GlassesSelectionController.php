<?php

namespace App\Http\Controllers;

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
}
