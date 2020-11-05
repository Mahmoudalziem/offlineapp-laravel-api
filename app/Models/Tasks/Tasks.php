<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'subjects';

    protected $fillable = [

        'student', 'instructor', 'path', 'year', 'status'
    ];
}
