<?php

namespace Database\Seeders;

use App\Models\ResponsableRh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsableRhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResponsableRh::create([
            'id' => '2',
            'user_id' => '2',
            'firstname' => 'elomkha',
            'lastname' => 'elomkha',
            'email' => 'elomkh@gmail.com',
            'password' => '1111111111'
        ]);
    }
}
