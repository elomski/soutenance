<?php

namespace App\Interfaces;

interface PermissionInterface
{
    public function store(array $data);
    public function index();
    public function delete($id);
    public function update(array $data, $id);
    public function show($id);


  
}