<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('NombreVehiculo');
            $table->string('TipoVehiculo');
            $table->string('Marca');    
            $table->string('StatusInicial');    
            $table->string('Estadisticas');    
            $table->string('Modelo');    
            $table->string('MedidaUso');    
            $table->string('MedidaCombustible');    
            $table->string('anio');    
            $table->string('Grupo');
            $table->string('CompaniaSeguros');
            $table->string('NoSerie');
            $table->string('PolizaSeguro');
            $table->string('Placa');
            $table->string('Color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
