<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlassesFrame extends Model
{
    protected $table = 'glasses_frames';

    protected $fillable = [
        'name',
        'brand',
        'shape_id',
        'material',
        'width',
        'bridge_width',
        'temple_length',
        'lens_height',
        'color',
        'price',
        'image_url',
    ];

    public function shape()
    {
        return $this->belongsTo(GlassesFrameShape::class, 'shape_id');
    }
}
