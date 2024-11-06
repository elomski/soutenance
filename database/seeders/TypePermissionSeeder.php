<?php

namespace Database\Seeders;

use App\Models\TypePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePermission::create([
            'id' => '1',
            'name' => 'Permission de sortie anticipée',
            'description' => ' Pour quitter le travail avant l\'heure normale de fin de journée.'
        ]);

        TypePermission::create([
            'id' => '2',
            'name' => 'Pause prolongée',
            'description' => ' Demander une pause plus longue que d\'habitude pour des raisons personnelles.'
        ]);
        TypePermission::create([
            'id' => '3',
            'name' => 'Jour de congé pour évènements familiaux',
            'description' => ' Congé pour des événements comme un mariage, un décès, ou une naissance dans la famille.'
        ]);

        TypePermission::create([
            'id' => '4',
            'name' => 'Congé pour rendez-vous médical',
            'description' => '  Autorisation de quitter le travail pour un rendez-vous chez le médecin.'
        ]);
        TypePermission::create([
            'id' => '5',
            'name' => 'Congé exceptionnel',
            'description' => '  Accordé pour des situations imprévues, comme une urgence familiale.'
        ]);
        TypePermission::create([
            'id' => '6',
            'name' => 'Heures supplémentaires compensées',
            'description' => ' Si un employé a travaillé plus d\'heures que prévu, il peut demander des jours ou des heures de repos compensatoires.'
        ]);
        TypePermission::create([
            'id' => '7',
            'name' => 'Congé maladie ',
            'description' => 'Lorsqu\'un employé est malade et ne peut pas travailler.'
        ]);
        TypePermission::create([
            'id' => '8',
            'name' => 'Congé maternité/paternité',
            'description' => ' Pour les nouveaux parents à la naissance ou à l\'adoption d\'un enfant.'
        ]);

    }
}
