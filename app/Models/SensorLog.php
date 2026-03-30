<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    protected $fillable = [
        'capacity_organik',
        'capacity_non_organik',
        'is_full_organik',
        'is_full_non_organik',
        'recorded_at',
    ];
}
