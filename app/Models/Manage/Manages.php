<?php

namespace App\Models\Manage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Manages extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'manages';

    protected $fillable  = [
        'name','email','password'
    ];

    protected $hidden = [
        'remember_token','password'
    ];

    protected $guarded = [];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
