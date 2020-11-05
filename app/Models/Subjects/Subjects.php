<?php

namespace App\Models\Subjects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class Subjects extends Model
{
    protected $table = 'subjects';

    protected $fillable = [

        'name', 'year', 'desc','doctor','another'
    ];
}
