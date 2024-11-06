<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutPermision extends Model
{
    use HasFactory;

    public function permission(){
        return $this->hasOne(Permission::class);
    }
}
