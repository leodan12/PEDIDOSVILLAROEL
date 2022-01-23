<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    //relacion de uno a muchos con user

    public function users() {
       // return $this->hasmany('app\Models\User');
        return $this->hasMany(User::class,'perfils_id','id');
    }
}
