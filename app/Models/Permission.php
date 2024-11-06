<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class Permission extends Model
{
    use HasFactory;

    public function typePermission(){
        return $this->belongsTo(TypePermission::class);
    }

    public function statutPermision(){
        return $this->belongsTo(StatutPermision::class);
    }

    public function personnel(){
        return $this->belongsTo(Personnel::class);
    }


    protected $fillable = [
        'personnel_id',
        'type_permission_id',
        'statut_permision_id',
        'description',
        'user_email',
        'date_debut',
        'date_fin',
    ];



    protected $dates = ['created_at', 'updated_at','date_debut', 'date_fin'];




}
