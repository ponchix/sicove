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
    public function asignaciones(){
      return $this->hasMany(assignment::class,'id');
  }
  public function incidentes(){
    return $this->hasMany(incidente::class,'id');
}
}
