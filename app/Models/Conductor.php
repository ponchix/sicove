<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
     protected $fillable=[
        'imagen',
        'NombreConductor',
        'APaterno',
        'AMaterno',
        'edad',
        'direccion',
        'telefono',
        'NoLiciencia',
        'fecha_exp',
        'tipoLicencia',
      ];

      public function user(){
        return $this->hasOne(User::class,'id','NombreConductor');
    }
      
}
