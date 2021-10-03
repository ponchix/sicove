<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    public $table = "marcas";
    public function modelos(){
        return $this->hasMany(Modelo::class,'id');
    }
}
