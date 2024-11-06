<?php

namespace App\Repositories;

use App\Charts\PermissionChart;
use App\interfaces\PersonnelInterface;
use App\Models\Permission;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PersonnelRepository implements PersonnelInterface
{
    public function Dlogin(array $data)
    {

        $user = User::firstWhere('email', $data['email']);




        if(!$user){
            return false;
        }



        if(Auth::attempt($data)){
            return $user;
        }

        return false;
    }


    public function login()
    {
        return view('authentication.login');
    }



    public function list()
    {
        return Personnel::all();
    }

    public function show($id)
    {
        return Personnel::findOrFail($id);
    }



public function chartPermissionsByMonth()
{
    // Récupérer les permissions groupées par mois
    $permissions = Permission::selectRaw('strftime("%m", created_at) as month, COUNT(*) as total')
    ->where('personnel_id', Auth::user()->personnel->id)
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    // Mois de l'année
    $names = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Initialiser les totaux à 0 pour chaque mois
    $total = array_fill(0, 12, 0);

    // Remplir les totaux pour chaque mois où il y a des permissions
    foreach ($permissions as $item) {
        $month = (int)$item->month - 1; // Indice de 0 à 11
        $total[$month] = $item->total;
    }

    // Créer le graphique
    $chart = new PermissionChart();
    $chart->labels($names);
    $chart->dataset('Permissions par mois', 'bar', array_values($total))->options([
        'backgroundColor' => [
            '#046e24', '#dd4c09', '#0b7ad4', '#b20bd4', '#d1163e',
            '#178897', '#587512', 'red', 'blue', 'yellow', '#ccc', 'black'
        ],
    ]);

    return $chart;
}



   public function chartPermissionsByDay()
   {
       // Récupérer les permissions groupées par jour pour l'année en cours
       $permissions = Permission::selectRaw('DATE(created_at) as day, COUNT(*) as total')
                                ->where('personnel_id', Auth::user()->personnel->id)
                                ->whereYear('created_at', now()->year)
                                ->groupBy('day')
                                ->orderBy('day')
                                ->get();

       // Extraire les jours et les totaux des permissions
       $days = $permissions->pluck('day')->toArray();
       $totals = $permissions->pluck('total')->toArray();

       // Créer le graphique
       $chart = new PermissionChart();
       $chart->labels($days);
       $chart->dataset('Permissions par jour', 'line', $totals)->options([
           'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
           'borderColor' => 'rgba(54, 162, 235, 1)',
           'fill' => false,
       ]);

       return $chart;
   }




}

