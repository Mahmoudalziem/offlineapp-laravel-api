<?php

use Illuminate\Database\Seeder;
use App\Models\Doctor\Doctors;
class doctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctors::create([
            'name' => 'Ahmed Reda Hamza',
            'email' => 'doctor@fci.com',
            'password' => bcrypt('doctor1234'),
            'subtitle'  => 'Hello come Back',
            'department' => 'it'
        ]);
    }
}
