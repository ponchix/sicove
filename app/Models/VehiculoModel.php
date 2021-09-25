<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoModel extends Model
{
    use HasFactory;
    public $table = "vehiculos";
    protected $fillable=[
        'NombreVehiculo',
        'TipoVehiculo',
        'Marca',
        'StatusInicial',
        'Estadisticas',
        'Modelo',
        'MedidaUso',
        'MedidaCombustible',
        'anio',
        'Grupo',
        'CompaniaSeguros',
        'NoSerie',
        'PolizaSeguro',
        'Placa',
        'Color',
      ];
}
