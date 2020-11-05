<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\defaultController;

class studentController extends Controller
{
    use defaultController;

    public function __construct()
    {
        auth()->shouldUse('student');
    }
}

