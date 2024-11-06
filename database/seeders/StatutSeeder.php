<?php

namespace Database\Seeders;

use App\Models\StatutPermision;
use App\Models\statutPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatutPermision::create([
                'id' => 1,
            'name' => 'En cours...'
        ]);

        StatutPermision::create([
            'id' => 3,
            'name' => 'Refus'
        ]);

        StatutPermision::create([
            'id' => 2,
            'name' => 'Accord'
        ]);


    }
}
