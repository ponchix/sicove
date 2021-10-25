<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incidente extends Model
{
    use HasFactory;
    protected $table = "incidentes";
    protected $fillable=[
        'vehiculo',
        'conductor',
        'Fecha_reporte',
        'descripcion',
        'importancia',
        'detallada',
        'foto',
    ];
    public function VehiculosIncidentes(){
        return $this->belongsTo(TipoVehiculo::class,'vehiculo');
    }
  
}
