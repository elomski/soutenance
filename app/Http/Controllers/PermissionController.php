<?php

namespace App\Http\Controllers;

use App\Classe\ResponseClass;
use App\Interfaces\PermissionInterface;
use App\interfaces\PersonnelInterface;
use App\Interfaces\StatutPermissionInterface;
use App\Interfaces\TypePermissionInterface;
use App\Models\Permission;
use App\Models\StatutPermision;
use App\Models\TypePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;
use PHPUnit\Event\Code\Throwable;

class PermissionController extends Controller
{

    private PermissionInterface $permissionInterface;
    private PersonnelInterface $personnelInterface;
    private TypePermissionInterface $typePermissionInterface;
    private StatutPermissionInterface $statutPermissionInterface;

    public function __construct(
        PermissionInterface $permissionInterface,
        PersonnelInterface $personnelInterface,
        TypePermissionInterface $typePermissionInterface,
        StatutPermissionInterface $statutPermissionInterface
    ) {
        $this->permissionInterface = $permissionInterface;
        $this->personnelInterface = $personnelInterface;
        $this->typePermissionInterface = $typePermissionInterface;
        $this->statutPermissionInterface = $statutPermissionInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionInterface->index();

        return view('permissions.list', [
            'page' => 'permission.list',
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $personnels = $this->personnelInterface->list();
        $type_permissions  = $this->typePermissionInterface->index();
        $statut_permisions = $this->statutPermissionInterface->index();


        return view(
            'permissions.create',
            [
                'page' => 'permission.create',
                // 'personnels' => $personnels,
                'type_permissions' => $type_permissions,
                'statut_permisions' => $statut_permisions
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */






    public function store(Request $request)
    {
        $data = [

            'type_permission_id' => $request->type_permission_id,
            // 'user_email' => $request->user_email,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ];
        DB::beginTransaction();
        try {
            $this->permissionInterface->store($data);
            DB::commit();

            return ResponseClass::success();
        } catch (Throwable $th) {

            return ResponseClass::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $permission = $this->permissionInterface->show($id);
        return view('permissions.show', [
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permissionInterface->show($id);
        $type_permissions = TypePermission::all();
        $statut_permisions = StatutPermision::all();
        return view('permissions.edit', [
            'permission' => $permission,
            'type_permissions' => $type_permissions,
            'statut_permisions' => $statut_permisions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'personnel_id' => $request->personnel_id,
            'type_permission_id' => $request->type_permission_id,
            'statut_permision_id' => $request->statut_permision_id,
            'description' => $request->description,
            'date_demande' => $request->date_demande,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ];
        DB::beginTransaction();

        try {
            $this->permissionInterface->update($data, $id);

            DB::commit();

            return ResponseClass::success();
        } catch (Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permissionInterface->delete($id);
        return ResponseClass::success();
    }

    public function update1(string $id)
    {

        $permission = Permission::findOrFail($id);

        DB::beginTransaction();

        try {

            $permission->update(
                [
                    'statut_permision_id' => 2,
                ]
            );
            DB::commit();
            return ResponseClass::success();
        } catch (Throwable $th) {
            return ResponseClass::rollback();
        }
    }
    public function update2(string $id)
    {

        $permission = Permission::findOrFail($id);

        DB::beginTransaction();

        try {

            $permission->update(
                [
                    'statut_permision_id' => 3,
                ]
            );
            DB::commit();
            return ResponseClass::success();
        } catch (Throwable $th) {
            return ResponseClass::rollback();
        }
    }
}
