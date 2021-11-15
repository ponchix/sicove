<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    use HasFactory;
    protected $table='mecanicos';
    protected $fillable=[
        'imagen',
        'NombreMecanico',
        'APaterno',
        'AMaterno',
        'edad',
        'direccion',
        'telefono',
    ];
}
