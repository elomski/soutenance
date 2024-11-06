<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirecteurRequest\LoginDirecteurRequest;
use App\Interfaces\DirecteurInterface;
use App\Models\Permission;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirecteurController extends Controller
{
    private DirecteurInterface $directeurInterface;

    public function __construct(DirecteurInterface $directeurInterface)
    {
        $this->directeurInterface = $directeurInterface;
    }

    // public function DirecLogin(LoginDirecteurRequest $loginDirecteurRequest)
    // {

    //     $data = [
    //         'email' => $loginDirecteurRequest->email,
    //         'password' => $loginDirecteurRequest->password
    //     ];
    //     DB::beginTransaction();

    //     try {
    //         $directeur = $this->directeurInterface->Directeurlogin($data);

    //         if ($directeur) {
    //             DB::commit();

    //             return redirect()->route('directeur.dashboard');
    //         } else {
    //             return back()->with('l\'email ou votre mot de passe sont incorrect!
    //                  Si vous n\'etes pas Responsable des resources humaines vous ne pouvez pas vous connecter ici ');
    //         }
    //     } catch (\Exception $ex) {
    //         DB::rollBack();
    //         return back()->with('l\'erreur est survenue lors du traitement. Reessayer plus tard');
    //     }
    // }

    public function directeurlogin()
    {
        return view('Admin.Directeur.Directeurlogin');
    }

    public function directeurDash(){
        $countPersonnel = count(Personnel::all());
        $countPermission = count(Permission::all());
        $PermissionAccorder = Permission::where('statut_permision_id','2')->get();
        $PermissionRefuser = Permission::where('statut_permision_id','3')->get();
        $countPermissionAccorder = count($PermissionAccorder);
        $countPermissionRefuser = count($PermissionRefuser);



        return view('Admin.Directeur.directDashboard',[
            'page' => 'dashdirecteur',
            'countPersonnel' => $countPersonnel,
            'countPermission' => $countPermission,
            'countPermissionAccorder' => $countPermissionAccorder,
            'countPermissionRefuser' => $countPermissionRefuser,
            'Chart_permissions_by_month' => $this->directeurInterface->chartPermissionsByMonth(),
            'Chart_permissions_by_day' => $this->directeurInterface->chartPermissionsByDay(),
            'Chart_accorder_permissions_by_day' => $this->directeurInterface->chartAccorderPermissionsByDay(),
            'Chart_refuser_permissions_by_day' => $this->directeurInterface->chartRefuserPermissionsByDay()
        ]);
    }

    public function regle(){
        return view('Admin.Directeur.Regleetpolitique', [
            'page' => 'regle'
        ]);
    }




}
