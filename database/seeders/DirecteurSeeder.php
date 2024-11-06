<?php

namespace Database\Seeders;

use App\Models\Directeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Directeur::create([

                'id' => '1',
                'user_id' => '10',
                'firstname' => 'directeur',
                'phone' => '90016113',
        ]);
    }

}
