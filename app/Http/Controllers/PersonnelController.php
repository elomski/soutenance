<?php

namespace App\Http\Controllers;

use App\Classe\ResponseClass;
use App\Http\Requests\PersonnelRequest\LoginRequest;
use App\Http\Requests\PersonnelRequest\RegisterRequest;
use App\interfaces\PersonnelInterface;
use App\Models\Directeur;
use App\Models\Permission;
use App\Models\Personnel;
use App\Models\ResponsableRh;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Throwable;

use function PHPUnit\Framework\returnSelf;

class PersonnelController extends Controller
{

    private PersonnelInterface $personnelInterface;

    public function __construct(PersonnelInterface $personnelInterface){
        $this->personnelInterface = $personnelInterface;
    }






    public function Dologin(Request $request) {
        // Validation des données d'entrée
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Récupération de l'utilisateur par email
        $user = User::where('email', $request->email)->first();

        // Vérification de l'utilisateur
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'L\'adresse email ou mot de passe invalide']);
        }


        // Vérification des rôles
        $personnel = Personnel::where('user_id', $user->id)->first();
        $directeur = Directeur::where('user_id', $user->id)->first();
        $responsable = ResponsableRh::where('user_id', $user->id)->first();

        // Authentification réussie, on tente la connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirection en fonction du rôle
            if ($directeur) {
                return redirect()->route('directeur.dashboard');
            } elseif ($personnel) {
                return redirect()->route('dashboard');
            } elseif ($responsable) {
                return redirect()->route('responsable.dashboard');
            }
        }

        // Si aucun rôle correspondant n'est trouvé
        return back()->withErrors(['email' => 'Accès non autorisé']);
    }











    public function login(){

        return view('Personnels.Auth.login');
    }


    public function dashboard(){
        Auth::check();

        $countPermission = Permission::where('personnel_id', Auth::user()->personnel->id)->get();
        $countPermissions = count($countPermission);

        return view('Personnels.dashboard',[
            'page' => 'dashboard',
            'countPermissions' => $countPermissions,
            // "Chart_by_count_sale_product" => $this->personnelInterface->chartByCountSaleProduct(),
            "Chart_permissions_by_month" => $this->personnelInterface->chartPermissionsByMonth(),
            "Chart_permissions_by_day" => $this->personnelInterface->chartPermissionsByDay()
        ]);
        // return $countPermission;
    }


public function register(RegisterRequest $request)
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
        $personnel = Personnel::create([
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


public function updatePersonnel(Request $request, $id)
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
        $personnel = Personnel::findOrFail($id);
        $user = User::findOrFail($personnel->user_id);

        // Mise à jour des informations de l'utilisateur
        $user->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);

        // Mise à jour de l'image si une nouvelle image est fournie
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($personnel->image && Storage::disk('public')->exists($personnel->image)) {
                Storage::disk('public')->delete($personnel->image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('personnel_images', 'public');
        } else {
            $imagePath = $personnel->image; // Garder l'ancienne image
        }

        // Mise à jour des informations du personnel
        $personnel->update([
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


public function edit($id){

    $personnel = Personnel::findOrFail($id);

    return view('Personnels.edit',[
        'page' => 'editPersonnel',
        'personnel' => $personnel
    ]);
}






    public function index(){
        $personnels = Personnel::all();

        return view('Admin.ResponsableRh.Function.personnelList',[
            'page' => 'list',
            'personnels' => $personnels
        ]
        );
    }





public function listDesPermission(){

    $permissions = Permission::where('user_email', Auth::user()->email )->get();



        return view('Personnels.listPermission', [
            'page' => 'personnalPermission',
            'permissions' => $permissions
        ]);


}

public function registerview(){

    return view('Admin.ResponsableRh.authentication.register',[
        'page' => 'enregistrer'
    ]);
}




}
