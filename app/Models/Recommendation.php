<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    protected $table = 'recommendations';

    protected $fillable = [
        'session_id',
        'input_parameters',
        'recommended_frames',
        'recommended_lenses',
    ];

    protected $casts = [
        'input_parameters' => 'array',
        'recommended_frames' => 'array',
        'recommended_lenses' => 'array',
    ];
}
