<?php

namespace App\Models\Marks;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $table = 'marks';

    protected $fillable = [

        'student','year','midterm','oral', 'practical','semester'
    ];
}
