<?php

use Illuminate\Database\Seeder;
use App\Models\Manage\Manages;
class manageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manages::create([
            'name' => 'Ahmed Reda Hamza',
            'email' => 'manage@fci.com',
            'password' => bcrypt('manage1234')
        ]);
    }
}
