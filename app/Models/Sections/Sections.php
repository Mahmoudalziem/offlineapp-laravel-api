<?php

namespace App\Models\Sections;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'sections';

    protected $fillable = [

        'doctor', 'instructor','year','section'
    ];
}
