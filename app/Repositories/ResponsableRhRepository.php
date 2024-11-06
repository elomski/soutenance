<?php

namespace App\Repositories;

use App\Charts\PermissionChart;
use App\Interfaces\ResponsableRhInterface;
use App\Models\Permission;
use App\Models\ResponsableRh;
use Illuminate\Support\Facades\Hash;

class ResponsableRhRepository implements ResponsableRhInterface
{
   public function Responsablelogin(array $data){
        $responsable = ResponsableRh::where('email', $data['email'])->first();


        if(!$responsable){
            return false;
        }

        if(Hash::check($data['password'] !== $responsable->password)){
            return false;
        }

        return $responsable;
   }


   public function RespoPagelogin(){
    return view('Admin.responsableLogin');
   }






public function chartPermissionsByType()
{
    // Sélectionner les permissions par type
    $permissions = Permission::join('type_permissions', 'permissions.type_permission_id', '=', 'type_permissions.id')
                             ->selectRaw('type_permissions.name as type, COUNT(*) as total')
                             ->groupBy('type')
                             ->get();

    // Préparer les données pour le graphique
    $types = [];
    $totals = [];

    foreach ($permissions as $item) {
        $types[] = $item->type; // Ajouter le nom du type de permission
        $totals[] = $item->total; // Ajouter le total de demandes pour ce type
    }

    // Créer le graphique en secteurs (pie chart)
    $chart = new PermissionChart();
    $chart->labels($types);
    $chart->dataset('Répartition des permissions par type', 'pie', $totals)->options([
        'backgroundColor' => [
            'rgba(255, 99, 132, 0.2)',  // Couleur 1
            'rgba(54, 162, 235, 0.2)',  // Couleur 2
            'rgba(255, 206, 86, 0.2)',  // Couleur 3
            'rgba(75, 192, 192, 0.2)',  // Couleur 4
            'rgba(153, 102, 255, 0.2)', // Couleur 5
            'rgba(255, 159, 64, 0.2)',  // Couleur 6
            'rgba(201, 203, 207, 0.2)', // Couleur 7
            'rgba(100, 99, 132, 0.2)'   // Couleur 8 (pour inclure tous les types)
        ],
        'borderColor' => [
            'rgba(255, 99, 132, 1)',  // Bordure couleur 1
            'rgba(54, 162, 235, 1)',  // Bordure couleur 2
            'rgba(255, 206, 86, 1)',  // Bordure couleur 3
            'rgba(75, 192, 192, 1)',  // Bordure couleur 4
            'rgba(153, 102, 255, 1)', // Bordure couleur 5
            'rgba(255, 159, 64, 1)',  // Bordure couleur 6
            'rgba(201, 203, 207, 1)', // Bordure couleur 7
            'rgba(100, 99, 132, 1)'   // Bordure couleur 8
        ],
        'borderWidth' => 1,
    ]);

    return $chart;
}



}
