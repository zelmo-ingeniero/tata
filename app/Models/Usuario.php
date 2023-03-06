<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function estados(){
        return $this->hasMany(Estado::class, "id");
    }
    public function user()
    {
        return $this->hasOne(User::class, "id");
    }
    public function publicacion(){
        return $this->hasMany(Publicacion::class, "id");
    }
}
