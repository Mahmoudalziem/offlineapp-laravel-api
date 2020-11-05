<?php

namespace App\Models\Student;

use App\Models\Student\Students;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class Imports implements ToModel, WithCustomCsvSettings
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function importStudent(array $row)
    {
        return new Students([
            'name'     => $row[0],
            'email'    => $row[1],
            'password' => bcrypt($row[2]),
            'department' => $row[3],
            'section' => $row[4]
        ]);
    }
}
