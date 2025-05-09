<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaceShape extends Model
{
    use HasFactory;
    protected $table = 'face_shapes';

    protected $fillable = [
        'name',
        'description',
    ];

    // Визначення зв’язків, якщо потрібно
    public function glassesFrameShapes()
    {
        return $this->belongsToMany(GlassesFrameShape::class, null, 'face_shape_id', 'glasses_frame_shape_id');
        // Якщо використовуємо pivot таблицю, інакше можна працювати з JSON у glasses_frame_shapes
    }
}
