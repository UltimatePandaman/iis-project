<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }

    public function presentations(){
        return $this->hasMany('App\Models\Presentation');
    }
}
