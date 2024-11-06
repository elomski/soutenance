<?php

namespace App\Http\Controllers;

use App\Classe\ResponseClass;
use App\Http\Requests\TypeRequest\TypeRequest;
use App\Interfaces\TypePermissionInterface;
use App\Models\TypePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class TypeController extends Controller
{


    private TypePermissionInterface $typePermissionInterface;

    public function __construct(TypePermissionInterface $typePermissionInterface)
    {
        $this->typePermissionInterface = $typePermissionInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = $this->typePermissionInterface->index();

        return view('typePermissions.list', [
            'page' => 'type',
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typePermissions.create',[
            'page' => 'type.create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        DB::beginTransaction();

        try{


         $this->typePermissionInterface->store($data);
         DB::commit();
          return ResponseClass::success();
        }catch(Throwable $th){
            return ResponseClass::rollback();

        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = $this->typePermissionInterface->show($id);
        return view('typePermissions.edit',[
             'page' => 'type.edit',
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name
        ];
        DB::beginTransaction();
        try{
            $this->typePermissionInterface->update($data, $id);

            return ResponseClass::success();
        }catch(Throwable $th){
            return ResponseClass::rollback();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->typePermissionInterface->delete($id);
        return ResponseClass::success();
    }
}
