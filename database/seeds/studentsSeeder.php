<?php

use Illuminate\Database\Seeder;
use App\Models\Student\Students;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Students::create([
            'name' => 'mahmoud Abd Alziem',
            'email' => 'student@fci.com',
            'password' => bcrypt('student1234'),
            'year' => 2,
            'department' => 'it',
            'section' => 14
        ]);
    }
}
