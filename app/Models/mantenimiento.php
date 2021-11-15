<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mantenimiento extends Model
{
    use HasFactory;
    protected $table = "mantenimientos";
    protected $fillable=[
        'mecanico',
        'fecha_inicio',
        'hora_entrada',
        'vehiculo',
        'odometro',
        //'servicios',
        'costo_partes',
        'mano_obra',
        'total',
        'referencia_man',
        'tipo_man',
        'proveedor',
        'comentario',
        'imagen_man',
    ];
    public function VehiculosM(){
        return $this->belongsTo(VehiculoModel::class,'vehiculo');
    }

    public function servicios(){
        return $this->belongsToMany(Service::class,'mantenimiento_service');
    }
}
