<?php

namespace App\Http\Controllers;

use App\Classe\ResponseClass;
use App\Http\Requests\ResponsableRhRequest\LoginRhRequest;
use App\Interfaces\DirecteurInterface;
use App\Interfaces\ResponsableRhInterface;
use App\Models\Permission;
use App\Models\Personnel;
use App\Models\ResponsableRh;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ResponsableRhController extends Controller
{

    private ResponsableRhInterface $responsableRhInterface;
    private DirecteurInterface $directeurInterface;

    public function __construct(ResponsableRhInterface $responsableRhInterface, DirecteurInterface $directeurInterface)
    {
        $this->responsableRhInterface = $responsableRhInterface;
        $this->directeurInterface = $directeurInterface;
    }

    // public function DoRespoLogin(LoginRhRequest $loginRhRequest){

    //     $data = [
    //         'email' => $loginRhRequest->email,
    //         'password' => $loginRhRequest->password
    //     ];


    //     DB::beginTransaction();

    //     try
    //         {
    //             $directeur = $this->responsableRhInterface->Responsablelogin($data);

    //             if($directeur){
    //                 DB::commit();

    //                 return redirect()->route('responsable.dashboard');
    //             } else{
    //                 return back()->with('l\'email ou votre mot de passe sont incorrect!
    //                  Si vous n\'etes pas directeur vous ne pouvez pas vous connecter ici ');
    //             }

    //         }catch(\Exception $ex){
    //             DB::rollBack();
    //             return back()->with('l\'erreur est survenue lors du traitement. Reessayer plus tard');

    //         }

    // }

    public function responsablelogin()
    {
        return view('Admin.ResponsableRh.responsableLogin');
    }

    public function responsableDash()
    {

        $personnels = Personnel::count();
        $Permissions = Permission::count();
        // $permissions = Permission::all();

        $PermissionAccorder = Permission::where('statut_permision_id', 2)->get();
        $PermissionRefuser = Permission::where('statut_permision_id', 3)->get();

        // $today = now()->format('Y-m-d'); // Obtient la date d'aujourd'hui au format Y-m-d
        $PermissionEnAttentes = Permission::where('statut_permision_id', 1)
            // ->whereDate('date', $today)
            ->get();
        $countPermissionAccorder = count($PermissionAccorder);
        $countPermissionRefuser = count($PermissionRefuser);



        return view('Admin.ResponsableRh.responsableRhDashbord', [
            'page' => 'rhdashbord',
            'personnels' => $personnels,
            'Permissions' => $Permissions,
            // 'permissions' => $permissions,
            'PermissionEnAttentes' => $PermissionEnAttentes,
            'countPermissionAccorder' => $countPermissionAccorder,
            'countPermissionRefuser' => $countPermissionRefuser,
            'Chart_permissions_by_type' => $this->responsableRhInterface->chartPermissionsByType(),
            'Chart_permissions_by_month' => $this->directeurInterface->chartPermissionsByMonth(),
            'Chart_permissions_by_day' => $this->directeurInterface->chartPermissionsByDay(),
            'Chart_accorder_permissions_by_day' => $this->directeurInterface->chartAccorderPermissionsByDay(),
            'Chart_refuser_permissions_by_day' => $this->directeurInterface->chartRefuserPermissionsByDay()
        ]);
    }






    public function VoirPermission($id){

        $permission = Permission::findOrFail($id);

        return view('PermissionShow',[
            'permission' => $permission
        ]);
    }


    public function index()
    {

        $responsables = ResponsableRh::all();

        return view('Admin.ResponsableRh.list', [
            'page' => 'admin.responsablerh.list',
            'responsables' => $responsables
        ]);
    }


    public function ResponsableRegistrer(Request $request)
    {




        $data = [
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => $request->password, // Sécurise le mot de passe
            'function' => $request->function,
            'address' => $request->address,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'image' => $request->image
        ];
        DB::beginTransaction();

        try {
            // Création de l'utilisateur
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'] // Sécurisation du mot de passe
            ]);

            $data['user_id'] = $user->id;

            // Si une image est présente dans les données
            if (isset($data['image'])) {
                // Utilisation de la méthode Laravel pour stocker l'image dans un dossier public
                $imagePath = $data['image']->store('products', 'public');
            } else {
                $imagePath = ''; // Image par défaut ou vide si aucune image
            }

            // Création du personnel
            $responsable = ResponsableRh::create([
                'user_id' => $data['user_id'],
                'firstname' => $data['firstname'],
                'function' => $data['function'],
                'address' => $data['address'],
                'sex' => $data['sex'],
                'phone' => $data['phone'],
                'image' => $imagePath // Ajout du chemin de l'image ici
            ]);

            DB::commit();
            // return $personnel;
            return ResponseClass::success();
        } catch (Throwable $th) {
            // En cas d'erreur, on rollback la transaction
            DB::rollback();
            throw $th;
        }
    }




    public function ResponsableUpdate(Request $request, $id)
    {


        // Valider les données d'entrée
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id, // Ignorer l'email de l'utilisateur actuel
            'function' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'sex' => 'required|string',
            'phone' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Image optionnelle
        ]);

        DB::beginTransaction();

        try {
            // Trouver l'utilisateur et le personnel à mettre à jour
            $responsable = ResponsableRh::findOrFail($id);
            $user = User::findOrFail($responsable->user_id);

            // Mise à jour des informations de l'utilisateur
            $user->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);

            // Mise à jour de l'image si une nouvelle image est fournie
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($responsable->image && Storage::disk('public')->exists($responsable->image)) {
                    Storage::disk('public')->delete($responsable->image);
                }

                // Stocker la nouvelle image
                $imagePath = $request->file('image')->store('personnel_images', 'public');
            } else {
                $imagePath = $responsable->image; // Garder l'ancienne image
            }

            // Mise à jour des informations du personnel
            $responsable->update([
                'firstname' => $data['firstname'],
                'function' => $data['function'],
                'address' => $data['address'],
                'sex' => $data['sex'],
                'phone' => $data['phone'],
                'image' => $imagePath
            ]);

            DB::commit();

            // Retourne une réponse de succès
            return ResponseClass::success();
        } catch (Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }








    public function responsableRegisterview()
    {


        return view('Admin.ResponsableRh.create', [
            'page' => 'admin.responsable.create'
        ]);
    }


    public function responsableEdit($id)
    {

        $responsable = ResponsableRh::findOrFail($id);


        return view('Admin.ResponsableRh.edit', [
            'responsable' => $responsable
        ]);
    }


    public function permissionstatut()
    {


        $permissions = Permission::whereIn('statut_permision_id', [2, 3])
            ->orderBy('created_at', 'desc') // Trier par date
            ->get();


        return view('Permissionstatut', [

            'page' => 'permission.statut',
            'permissions' => $permissions

        ]);
    }


    public function listePersonnels()
    {

        $personnels = Personnel::all();
        return view('ListePersonnels', [
            'page' => 'list.personnels',
            'personnels' => $personnels
        ]);
    }
}
