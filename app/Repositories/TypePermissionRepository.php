<?php

namespace App\Repositories;

use App\Interfaces\TypePermissionInterface;
use App\Models\TypePermission;

class TypePermissionRepository implements TypePermissionInterface
{
    public function index(){
        return TypePermission::all();
    }

    public function store(array $data){
        return TypePermission::create($data);
    }

    public function update(array $data, $id){
        return TypePermission::findOrFail($id)->update($data);
    }

    public function delete($id){
        return TypePermission::destroy($id);
    }
    public function show($id){
        return TypePermission::findOrFail($id);
    }
}
