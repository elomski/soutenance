<?php

namespace App\interfaces;

interface PersonnelInterface
{
    public function login();

    public function Dlogin(array $data);

    // public function registration(array $data);

    public function list();

    public function show($id);

    // public function chartByCountSaleProduct();

    public function chartPermissionsByMonth();

    public function chartPermissionsByDay();
}
