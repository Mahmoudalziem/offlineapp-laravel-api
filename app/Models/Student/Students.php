<?php

namespace App\Models\Student;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Students extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'students';

    protected $fillable  = [
        'name', 'email', 'password', 'year','avatar', 'department', 'section'
    ];

    protected $hidden = [
        'remember_token', 'password', 'id', 'created_at', 'updated_at'
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
