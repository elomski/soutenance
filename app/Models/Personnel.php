<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Personnel extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function permission(){
        return $this->hasMany(Personnel::class);
    }

    protected $fillable = [
        'user_id',
        'name',
        'firstname',
        'function',
        'address',
        'sex',
        'phone',
        'image'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }




    public $timestamps = true; // Assure-toi que c'est activé si nécessaire




}
