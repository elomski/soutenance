<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'id'=> '1',
        //     'name' => 'elom',
        //     'email' => 't@exampl.com',
        //     'password' => '11111111'
        // ]);
        // User::factory()->create([
        //     'id'=> '2',
        //     'name' => 'elom',
        //     'email' => 't@examp.com',
        //     'password' => '11111111'
        // ]);

        User::factory()->create([
            'id' => '10',
            'name' => 'directeurgenerale',
            'email' => 'directeurgenerale@gmail.com',
            'password' => '123456789'
        ]);

    }
}
