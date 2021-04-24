<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'socialNumber', 'firstName', 'lastName', 'gender', 'email', 'password', 'street', 'houseNumber', 'zipCode', 'city', 'phone', 'admin', 'vaccinated', 'vaccination_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //location has many vaccinations; vaccination belongs to one location (1:N)
    public function vaccination() : BelongsTo {
        return $this->belongsTo(Vaccination::class);

    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        //TODO: Check was i da gemacht hab
        return ['user'=>['socialNumber' => $this->socialNumber, 'admin' => $this->admin, 'vaccinated' => $this->vaccinated]];
    }

}
