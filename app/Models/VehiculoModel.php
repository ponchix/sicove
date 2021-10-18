<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoModel extends Model
{
    use HasFactory;
    protected $table = "vehiculos";
    protected $fillable=[
        'NombreVehiculo',
        'TipoVehiculo',
        'Marca',
        'StatusInicial',
        'fecha_compra',
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
        'imagen',
        'combustible',
        'motor',
        'cilindraje',
        'cilindrada',
        'fecha_poliza',
        'factura',
      ];
      public function marcasVehiculo(){
        return $this->belongsTo(Marca::class,'Marca');
    }

}
