<?php

use Illuminate\Database\Seeder;
use App\Models\Lecture\Lectures;
class lectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lectures::create([
            'name' => 'Ahmed Reda Hamza',
            'email' => 'lecture@fci.com',
            'password' => bcrypt('lecture1234'),
            'department' => 'it'
        ]);
    }
}
