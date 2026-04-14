<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name',
        'main_area',
        'sub_area',
        'device_uid',
        'status',
    ];
}
