<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';

    protected $fillable  = [
        'name', 'subtitle', 'year', 'department', 'description','pre','path','image'
    ];
}
