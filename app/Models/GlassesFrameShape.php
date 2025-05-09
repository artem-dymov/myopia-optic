<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlassesFrameShape extends Model
{
    use HasFactory;
    protected $table = 'glasses_frame_shapes';

    protected $fillable = [
        'name',
        'description',
        'suitable_face_shapes', // JSON масив
    ];

    protected $casts = [
        'suitable_face_shapes' => 'array',
    ];

    public function glassesFrames()
    {
        return $this->hasMany(GlassesFrame::class, 'shape_id');
    }
}
