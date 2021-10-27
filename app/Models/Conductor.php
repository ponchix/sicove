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
        'correo',
        'telefono',
        'NoLiciencia',
        'fecha_exp',
        'tipoLicencia',
      ];
}
