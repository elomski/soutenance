<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableRh extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
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
}
