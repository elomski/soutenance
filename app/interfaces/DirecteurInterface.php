<?php

namespace App\Interfaces;

interface DirecteurInterface
{
    public function DirecPagelogin();

    public function Directeurlogin(array $data);

    public function chartPermissionsByMonth();

    public function chartPermissionsByDay();

    public function chartRefuserPermissionsByDay();

    public function chartAccorderPermissionsByDay();

}
