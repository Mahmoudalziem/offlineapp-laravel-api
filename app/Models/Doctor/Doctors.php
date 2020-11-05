<?php

namespace App\Models\Doctor;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Doctors extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'doctors';

    protected $fillable  = [
        'name','email','password','subtitle','department'
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
