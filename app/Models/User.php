<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'username',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($user){
            $user->profile()->create();
        });
    }

    public function conferences(){
        return $this->hasMany('App\Models\Conference');
    }

    public function presentations(){
        return $this->hasMany('App\Models\Presentation');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    /**
     * Na které konference je přihlášen.
     */
    public function visiting()
    {
        return $this->morphToMany('App\Models\Conference', 'conference_visitors')->using(ConferenceVisitorPivot::class)->withPivot(['status', 'id'])->withTimestamps();
    }

    /**
     * Na které přednášky hodlá jít. TODO
     */
    public function attending()
    {
        return $this->belongsToMany(Presentation::class);
    }
}
