<?php

namespace App\Repositories;

use App\Charts\PermissionChart;
use App\Interfaces\PermissionInterface;
use App\interfaces\PersonnelInterface;
use App\Models\Permission;
use Illuminate\Container\Attributes\Auth;

class PermissionRepository implements PermissionInterface
{
   public function index(){
    return Permission::all();
   }

   public function store(array $data){
    // return Permission::create($data);


    Permission::create([
        "personnel_id" => Auth()->user()->personnel->id,
        "type_permission_id" => $data['type_permission_id'],
        "statut_permision_id" => 1,
        "user_email" => Auth()->user()->email,
        "description" => $data['description'],
        "date_debut" => $data['date_debut'],
        "date_fin" => $data['date_fin']
    ]);
   }

   public function show($id){
    return Permission::findOrFail($id);
   }

   public function delete($id){
    return Permission::destroy($id);
   }

   public function update(array $data, $id){
    return Permission::findOrFail($id)->update($data);
   }





}
