<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class ConferenceVisitorPivot extends MorphPivot
{
    protected $casts = [
        'is_primary' => 'boolean'
    ];
}