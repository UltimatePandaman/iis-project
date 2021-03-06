<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    public function conference(){
        return $this->belongsTo('App\Models\Conference');
    }

    public function attendance(){
        return $this->belongsToMany(User::class);
    }
}
