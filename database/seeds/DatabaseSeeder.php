<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $this->call(usersSeeder::class);
        $this->call(doctorSeeder::class);
        $this->call(manageSeeder::class);
        $this->call(lectureSeeder::class);
    }
}
