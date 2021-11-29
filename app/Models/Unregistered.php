<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unregistered extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function visiting()
    {
        return $this->morphToMany('App\Models\Conference', 'conference_visitors')->using(ConferenceVisitorPivot::class)->withPivot(['status', 'id'])->withTimestamps();
    }
}
