<?php

namespace Database\Seeders;

use App\Models\Personnel;
use Illuminate\Database\Seeder;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personnel::create([

                'id' => '2',
                'user_id' => '3',
                'name' => 'attohdan',
                'email' => 'attohdan@gmail.com',
                'password' => '11111111'

        ]);
    }
}
