<?php

namespace App\Repositories;

use App\Interfaces\StatutPermissionInterface;
use App\Models\StatutPermision;


class StatutPermissionRepository implements StatutPermissionInterface
{

        public function store(array $data){
            return StatutPermision::create($data);
        }

        public function index(){
            return StatutPermision::all();
        }

        public function show($id){
            return StatutPermision::FindOrFail($id);
        }

        public function delete($id){
            return StatutPermision::destroy($id);
        }

        public function update( array $data, $id){
            return StatutPermision::FindOrFail($id)->update($data);
        }

}
