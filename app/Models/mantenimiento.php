<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mantenimiento extends Model
{
    use HasFactory;
    protected $table = "mantenimientos";
    protected $fillable=[
        'fecha_inicio',
        'hora_entrada',
        'vehiculo',
        'odometro',
        'servicios',
        'costo_partes',
        'mano_obra',
        'total',
        'referencia_man',
        'tipo_man',
        'proveedor',
        'comentario',
        'imagen_man',
    ];
}
