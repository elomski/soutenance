<?php

namespace App\Repositories;

use App\Charts\PermissionChart;
use App\Interfaces\DirecteurInterface;
use App\Models\Directeur;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DirecteurRepository implements DirecteurInterface
{
   public function Directeurlogin(array $data){
    $directeur = Directeur::where('email', $data['email'])->first();

   if(!$directeur){
    return false;
   }

    if( Hash::check($data['password'], $directeur->password)){
        return false;
    }
       return $directeur;

   }

   public function DirecPagelogin(){
    return view('Admin.Directeurlogin');
   }

   public function DirecRegister(array $data){
    return Directeur::create($data);
   }


   public function chartPermissionsByMonth(){

    $permission = Permission::selectRaw('strftime("%m", created_at) as month, COUNT(*) as total')
                             ->groupBy('month')
                             ->orderBy('month')
                             ->get()
    ;

       // Préparer les données pour le graphique
       $names = [];
       $total = [];

       // Remplir les mois et les totaux avec des valeurs par défaut
       for ($i = 1; $i <= 12; $i++) {
           $month = date('F', mktime(0, 0, 0, $i, 1));
           $names[] = $month;
           $total[$i] = 0; // Initialiser avec 0
       }

       // Remplir les totaux des ventes pour chaque mois
       foreach ($permission as $item) {
           $month = (int)$item->month; // Convertir le mois en entier
           $total[$month] = $item->total; // Assigner le total du mois
       }


         // Créer le graphique
    $chart = new PermissionChart();
    $chart->labels($names);
    $chart->dataset('Permissions par mois', 'bar', array_values($total))->options([
        'backgroundColor' => [
            '#046e24',
            '#dd4c09',
            '#0b7ad4',
            '#b20bd4',
            '#d1163e',
            '#178897',
            '#587512',
            'red',
            'blue',
            'yellow',
            '#ccc',
            'black'
        ],
    ]);
    return $chart;

}




public function chartPermissionsByDay()
{
    // Sélectionner le jour et le nombre de permissions, grouper par jour
    $permissions = Permission::selectRaw('strftime("%d-%m", created_at) as day, COUNT(*) as total')
                              ->groupBy('day')
                              ->orderBy('day')
                              ->get();

    // Préparer les données pour le graphique
    $days = [];
    $totals = [];

    // Générer une liste de jours pour l'année en cours (365 jours)
    for ($i = 1; $i <= 365; $i++) {
        $day = date('d-m', strtotime("January 1st +$i days"));
        $days[] = $day;
        $totals[$day] = 0; // Initialiser à 0 permission pour chaque jour
    }

    // Remplir les données avec les valeurs réelles
    foreach ($permissions as $item) {
        $totals[$item->day] = $item->total; // Assigner le total de permissions pour chaque jour
    }

    // Créer le graphique
    $chart = new PermissionChart();
    $chart->labels($days);
    $chart->dataset('Permissions par jour', 'line', array_values($totals))->options([
        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
        'borderColor' => 'rgba(75, 192, 192, 1)',
        'fill' => false,
    ]);

    return $chart;
}






public function chartAccorderPermissionsByDay()
{
    // Sélectionner les permissions accordées par jour
    $permissions = Permission::selectRaw('strftime("%d-%m", created_at) as day, COUNT(*) as total')
                              ->where('statut_permision_id', 2) // Filtrer par statut accordé
                              ->groupBy('day')
                              ->orderBy('day')
                              ->get();

    // Préparer les données pour le graphique
    $days = [];
    $totals = [];

    // Générer une liste de jours pour l'année en cours (365 jours)
    for ($i = 1; $i <= 365; $i++) {
        $day = date('d-m', strtotime("January 1st +$i days"));
        $days[] = $day;
        $totals[$day] = 0; // Initialiser à 0 permission pour chaque jour
    }

    // Remplir les données avec les valeurs réelles
    foreach ($permissions as $item) {
        $totals[$item->day] = $item->total; // Assigner le total de permissions pour chaque jour
    }

    // Créer le graphique
    $chart = new PermissionChart();
    $chart->labels($days);
    $chart->dataset('Permissions accordées par jour', 'line', array_values($totals))->options([
        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
        'borderColor' => 'rgba(54, 162, 235, 1)',
        'fill' => false,
    ]);

    return $chart;
}



public function chartRefuserPermissionsByDay()
{
    // Sélectionner les permissions accordées par jour
    $permissions = Permission::selectRaw('strftime("%d-%m", created_at) as day, COUNT(*) as total')
                              ->where('statut_permision_id', 3) // Filtrer par statut accordé
                              ->groupBy('day')
                              ->orderBy('day')
                              ->get();

    // Préparer les données pour le graphique
    $days = [];
    $totals = [];

    // Générer une liste de jours pour l'année en cours (365 jours)
    for ($i = 1; $i <= 365; $i++) {
        $day = date('d-m', strtotime("January 1st +$i days"));
        $days[] = $day;
        $totals[$day] = 0; // Initialiser à 0 permission pour chaque jour
    }

    // Remplir les données avec les valeurs réelles
    foreach ($permissions as $item) {
        $totals[$item->day] = $item->total; // Assigner le total de permissions pour chaque jour
    }

    // Créer le graphique
    $chart = new PermissionChart();
    $chart->labels($days);
    $chart->dataset('Permissions refuser par jour', 'line', array_values($totals))->options([
        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
        'borderColor' => 'rgba(54, 162, 235, 1)',
        'fill' => false,
    ]);

    return $chart;
}




}












