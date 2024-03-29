<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable=[
        'users_id',
        'vacante_id',
        'cv',
    ];

    public function usuarios(){
        return $this->belongsTo(User::class,'users_id');
    }
}
