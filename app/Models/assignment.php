<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;
    protected $table="assignments";

    protected $fillable=[
        'conductor',
        'vehiculo',
        'fecha_a',
        'fecha_e',
        'odometro_a',
        'odometro_e',
        'combustible_a',
        'combustible_e',
        //Pendientes
        // 'checklist',
        // '',
        // '',
    ];
}