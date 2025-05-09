<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
    use HasFactory;
    protected $table = 'lenses';

    protected $fillable = [
        'name',
        'brand',
        'index',
        'material',
        'uv_protection',
        'blue_light_filter',
        'photochromic',
        'anti_scratch',
        'anti_reflective',
        'water_repellent',
        'price',
    ];

    protected $casts = [
        'uv_protection' => 'boolean',
        'blue_light_filter' => 'boolean',
        'photochromic' => 'boolean',
        'anti_scratch' => 'boolean',
        'anti_reflective' => 'boolean',
        'water_repellent' => 'boolean',
    ];
}
